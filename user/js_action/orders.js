
	var nomor = 1;
	function removeProductRow(number){
		$('tr#'+number).remove();
		nomor -= 1;
	}

	function addRow(){
		nomor +=1;
		$('tbody#post').append('<tr id="'+ nomor +'">'+
							'<td style="margin-left:20px;">'+
								'<div class="form-group">'+
									'<input type="text" class="form-control" id="pid" onchange="cek_database('+ nomor +')" name="pid" autocomplete="off">'+
								'</div>'+
							'</td>'+
							'<td style="margin-left:0px">'+
								'<button type="button" id="searchPid" name="searchPid" onclick="searchButton('+ nomor +')" data-toggle="modal" data-target="#searchP" data-backdrop="static" data-keyboard="false" class="btn btn-default glyphicon glyphicon-search"></button>'+
							'</td>'+
							'<td style="padding-left:20px;">'+			  					
								'<input type="text" name="pname" id="pname" autocomplete="off" disabled="true" class="form-control" />'+	
							'</td>'+
							'<td style="padding-left:20px;">'+
								'<div class="form-group">'+
									'<input type="text" name="sid" id="sid" autocomplete="off" disabled="true" class="form-control" min="1" />'+
								'</div>'+
							'</td>'+
							'<td style="padding-left:20px;">'+
								'<input type="text" name="cid" id="cid" autocomplete="off" class="form-control" disabled="true" />'+
							'</td>'+
							'<td style="padding-left:20px;">'+
								'<input type="text" name="pqty" id="pqty" autocomplete="off" class="form-control" readonly="true" />'+
							'</td>'+
							'<td style="padding-left:20px;">'+
								'<div class="form-group">'+
									'<input type="number" name="quantity" id="quantity" autocomplete="off" class="form-control" min="1" onchange="cekBarang('+ nomor +')" />'+
								'</div>'+
							'</td>'+
							'<td>'+
								'<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow('+ nomor +')"><i class="glyphicon glyphicon-trash"></i></button>'+
							'</td>'+
						'</tr>')
	}

	$('#reset').click(function(){
		$('tbody#post').find('tr').remove()
		nomor = 0;
		addRow()
	})

	function searchButton(value){
		idelement = value;
		console.log(idelement)
	}

	function insertData(number){
		var status = $('#status').text()
		$.ajax({
			url: 'js_action/fungsiphp/cekdata.php',
			type: 'POST',
			dataType: 'JSON',
			data: {id: number},
			success: function(data){
				$('tr#'+idelement).find('#pid').val(data[0].productid)
				$('tr#'+idelement).find('#pname').val(data[0].name)
				$('tr#'+idelement).find('#sid').val(data[0].suppliername)
				$('tr#'+idelement).find('#cid').val(data[0].categories_name)
				$('tr#'+idelement).find('#pqty').val(data[0].qty)
				console.log(data)

			}
		})
	}

	$('#createOrderBtn').click(function(){
		pid = JSON.stringify($('form input[name="pid"]').serializeArray())
		quantitys = JSON.stringify($('form input[name="quantity"]').serializeArray())
		qtys = JSON.stringify($('form input[name="pqty"]').serializeArray())
		// console.log(qtys)
		// test = JSON.stringify(test)
		$.ajax({
			url: 'js_action/fungsiphp/quantity.php',
			type: 'GET',
			dataType: 'JSON',
			data: {id: pid, qty: qtys, quantity: quantitys, operasi: 'tambah'},
			beforeSend: function(){
				$('#createOrderBtn').text('Loading...')
			},
			complete: function(){
				alert("Berhasil ditambahkan");
			}
		})

		setTimeout(function(){
			location.reload();
		}, 1500)
	})

	$('#kurangiProduct').click(function(){
		pid = JSON.stringify($('form input[name="pid"]').serializeArray())
		quantitys = JSON.stringify($('form input[name="quantity"]').serializeArray())
		qtys = JSON.stringify($('form input[name="pqty"]').serializeArray())
		console.log(quantitys)

		// test = JSON.stringify(test)
		$.ajax({
			url: 'js_action/fungsiphp/quantity.php',
			type: 'GET',
			dataType: 'JSON',
			data: {id: pid, qty: qtys, quantity: quantitys, operasi: 'kurangi'},
			beforeSend: function(){
				$('#createOrderBtn').text('Loading...')
			},
			complete: function(){
				alert("Berhasil dikurangi");
				for(a=0;a<JSON.parse(pid).length;a++){
					var kurang = eval(JSON.parse(qtys)[a].value - JSON.parse(quantitys)[a].value)
					if (kurang <= 3) {
						alert("Barang "+JSON.parse(pid)[a].value+" tersisa sedikit")
					}
				}
			}
		})

		setTimeout(function(){
			location.reload();
		}, 1500)
	})

	function cekBarang(val){
		var teks = $('#status').text()
		var kuantitas = $('tr#'+val).find('#quantity').val()
		var kuant = $('tr#'+val).find('#pqty').val()
		var hasil = eval(kuant - kuantitas)
		console.log(teks)
		// console.log(hasil)
		if(teks == 'keluar' && hasil < 0){
			$('#status').after('<div class="alert alert-danger alert-dismissible">'+
				  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
				  'Barang '+$('tr#'+val).find('#pname').val()+' tidak cukup'+
				'</div>')
			$('tr#'+val).find('#pid').css('background-color', 'red')
			$('#kurangiProduct').prop('disabled', true)
		} else {
			$('tr#'+val).find('#pid').css('background-color', 'white')
			$('#kurangiProduct').prop('disabled', false)
		}
	}
$('body').on("click", ".modal-dialog, .modal", function(){
	$('#searchP').modal('hide')
})
 // $('#searchP').modal({
 //    show: false,
 //    keyboard: false,
 //    backdrop: 'static'
 //  });