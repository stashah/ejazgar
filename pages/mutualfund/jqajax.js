$(document).ready(function () {
	//Ajax request for insert datat
	$(window).keydown(function (event) {
		/*if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}else */if (event.keyCode == 40) {
		}
	});

	

	salid();
	function salid() {
		try {
	
		
			var today = new Date();
				var selectdate = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
				selectdate = selectdate.toLocaleString('en-US', { timeZone: 'Asia/Karachi' })
				document.getElementById("iddate").value = selectdate;
	
		} catch (error) {
			console.log(error);
		}	
	}
	
	
	function getProductById(val) {
		let pid = val;
		mydata = { pid: pid };
		//console.log(mydata);
		if (pid != "") {
			$.ajax({
				url: "getProductByID.php",
				method: "POST",
				dataType: "json",
				data: JSON.stringify(mydata),
				success: function (data) {
					//alert(data.p_model);
					//$('#idmodal').val(data.p_model);
				},
			});
		} else {
		}
	}
	var d = new Date();
	var pdate = d.getFullYear() + "" + (d.getMonth() + 1) + "" + d.getDate();
	let cashid = "C" + pdate + "" + d.getTime();
	
	$("#btnsave").click(function (e) {
		e.preventDefault();
		let custid = $('#idcustid').val();
		let amountpaid = $('#idcash').val();
		let dt1 = new Date($("#iddate").val());
		let dt = dt1.getFullYear() + "-" + (dt1.getMonth() + 1) + "-" + dt1.getDate();
		let detail = $("#iddetail").val();

		mydata ={custid:custid,cashid:cashid, amountpaid:amountpaid, dt:dt, detail:detail};
		
			$.ajax({
				url: "insert.php",
				method: "POST",
				data: JSON.stringify(mydata),
				success: function (data) {
					data = JSON.parse(data);
					if (data.count == 0) {
						msg = "<div class='alert alert-danger mt-3'> Failed... </div>";
						$("#msg1").html(msg);
						
					} else {
						$('#myform')[0].reset();
							msg = "<div class='alert alert-primary mt-3'> Payment received, thanks...  </div>";
							$("#msg1").html(msg);
							window.location.href = "index.php?msg=Payment received, thanks...&cls=alert alert-info";
					}
				}
			});
		
		
	});

    $("#btnsaveexp").click(function (e) {
		e.preventDefault();
		
		let amountpaid = $('#idcash').val();
		let dt1 = new Date($("#iddate").val());
		let dt = dt1.getFullYear() + "-" + (dt1.getMonth() + 1) + "-" + dt1.getDate();
		let detail = $("#iddetail").val();

		mydata ={cashid:cashid, amountpaid:amountpaid, dt:dt, detail:detail};
		
			$.ajax({
				url: "insertexp.php",
				method: "POST",
				data: JSON.stringify(mydata),
				success: function (data) {
					data = JSON.parse(data);
					if (data.count == 0) {
						msg = "<div class='alert alert-danger mt-3'> Failed... </div>";
						$("#msg1").html(msg);
						
					} else {
						$('#myform')[0].reset();
							msg = "<div class='alert alert-primary mt-3'> Amount paid, thanks...  </div>";
							$("#msg1").html(msg);
							window.location.href = "index.php?msg=Amount paid, thanks...&cls=alert alert-info";
					}
				}
			});
		
		
	});
	
	var choicesCust;
	let idc = "3";
	mydata = { id: idc };
	$.ajax({
		url: "getTotalCustomer.php",
		method: "POST",
		dataType: "json",
		data: JSON.stringify(mydata),
		success: function (data) {
			if (data) {
				x = data;
			} else {
				x = "";
			}
			output = '';
			for (i = 0; i < x.length; i++) {
				output += '"' + x[i].custname + '",';
			}
			output += '"0"';
			choicesCust = data;
		},
	});
	
	$(function () {
		$('#idcustomername').autoComplete({
			minChars: 0,
			source: function (term, suggest) {
				term = term.toLowerCase();
				//	var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ['Bulgaria', 'bg'], ['Canada', 'ca'], ['China', 'cn'], ['Czech Republic', 'cz'], ['Denmark', 'dk'], ['Finland', 'fi'], ['France', 'fr'], ['Germany', 'de'], ['Hungary', 'hu'], ['India', 'in'], ['Italy', 'it'], ['Japan', 'ja'], ['Netherlands', 'nl'], ['Norway', 'no'], ['Portugal', 'pt'], ['Romania', 'ro'], ['Russia', 'ru'], ['Spain', 'es'], ['Swiss', 'ch'], ['Turkey', 'tr'], ['USA', 'us']];
				var suggestions = [];
				for (i = 0; i < choicesCust.length; i++)
					if (~(choicesCust[i][0] + ' ' + choicesCust[i][1]).toLowerCase().indexOf(term)) suggestions.push(choicesCust[i]);
				suggest(suggestions);
			},
			renderItem: function (item, search) {
				search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
				var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
				return '<div class="autocomplete-suggestion" data-custname="' + item[0] + '" data-custid="' + item[1] + '" data-val="' + search + '"><img src=""> ' + item[0].replace(re, "<b>$1</b>") + '</div>';
			},
			onSelect: function (e, term, item) {
				console.log('Item "' + item.data('custname') + ' (' + item.data('custid') + ')" selected by ' + (e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click') + '.');
				$('#idcustomername').val(item.data('custname') + ' (id: ' + item.data('custid') + ')');
				$('#idcustid').val(item.data('custid'));
				
			}
		});
	});
	
    
    

	$('#example1').DataTable({
		dom: 'Bfrtip',
		responsive: true,
		colReorder: true,
		buttons: [
            'copyHtml5',
				'excelHtml5',
				'csvHtml5',
                'pdfHtml5'
                ]
	});
    $('#exampleex').DataTable({
		dom: 'Bfrtip',
		responsive: true,
		colReorder: true,
		buttons: [
            'copyHtml5',
				'excelHtml5',
				'csvHtml5',
                'pdfHtml5'
            ]
	});

$('#contr_tbl').DataTable({
		dom: 'Bfrtip',
		responsive: true,
		colReorder: true,
		buttons: [
            'copyHtml5',
				'excelHtml5',
				'csvHtml5',
                'pdfHtml5'
]
});
});