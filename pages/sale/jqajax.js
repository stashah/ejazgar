$(document).ready(function () {
	//Ajax request for insert datat
	$(window).keydown(function (event) {
		/*if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}else */if (event.keyCode == 40) {
		}
	});
try {
	

	try {
		var table = $('#example').DataTable({
			dom: 'Bfrtip',
			responsive: true,
			colReorder: true,
			"order": [[ 0, "desc" ]],
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf'
				
			]
			
		  });
		
		  
		
	} catch (error) {
		console.log(error);
	}
	 salid=salid();
	
	function salid() {
		var d = new Date();
	var pdate = d.getFullYear() + "" + (d.getMonth() + 1) + "" + d.getDate();
	salid = "S" + pdate + "" + d.getTime();
		return salid;
	}

	try {
		var today = new Date();
	var selectdate = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
	selectdate = selectdate.toLocaleString('en-US', { timeZone: 'Asia/Karachi' })
	document.getElementById("iddate").value = selectdate;
	} catch (error) {
		console.log(error);
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
	

	$("#btnadd").click(function (e) {
		e.preventDefault();
		
		$("#idcustomername").attr("disabled", true);
		$("#chkcredit").attr("disabled", true);
		$("#iddate").attr("disabled", true);
		//console.log("button save clicked");
		let onaccount = 0;  //cash = 0; Credit= 1
		if (document.getElementById('chkcredit').checked) {
			onaccount = 1;
		}else{
			onaccount = 0;
		}
		let dt1 = new Date($("#iddate").val());
		let dt = dt1.getFullYear() + "-" + (dt1.getMonth() + 1) + "-" + dt1.getDate();
		let product_id = $("#idpid").val();
		let product_quantity = $("#idqty").val();
		let product_price = $("#idcp").val();
		let product_name = $("#idname").val();
		let custid = $("#idcustid").val();
		let purpric = $("#idpprice").val();
		let action = "add";
		if (product_quantity > 0 && product_id != "" && product_price != "") {
			$.ajax({
				url: "cart.php",
				method: "POST",
				dataType: "json",
				data: {
					salid: salid,
					dt: dt,
					custid: custid,
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					product_ppric: purpric,
					product_quantity: product_quantity,
					onaccount: onaccount,
					action: action
				},
				success: function (data) {
					$('#order_table').html(data.order_table);
					$('#cartitem').val(data.cart_item);
					$('#idTotalAmount').val(data.carttotalamount);
					$('#idname').val("");
					$('#idqty').val("");
					$('#idcp').val("");
					$('#idpid').val("");
					$('#idpid').focus();
				}
			});
		} else {
			alert("Please fill all fields");
		}
	});
	//Deleteing data from cart
	$(document).on('click', '.delete', function (e) {
		e.preventDefault();
		let product_id = $(this).attr("id");
		let action = "remove";
		if (confirm("Are you sure you want to remove this product?")) {
			$.ajax({
				url: "cart.php",
				method: "POST",
				dataType: "json",
				data: {
					product_id: product_id,
					action: action
				},
				success: function (data) {
					$('#order_table').html(data.order_table);
					$('#cartitem').val(data.cart_item);
					$('#idTotalAmount').val(data.carttotalamount);
				}
			});
		} else {
			return false;
		}
	});
	$("#savedata").click(function (e) {
		e.preventDefault();
		let amountpaid = $('#idcash').val();
		mydata ={amountpaid:amountpaid};
		if (confirm("Confirm sale, please.")) {
			$.ajax({
				url: "insert.php",
				method: "POST",
				data: JSON.stringify(mydata),
				success: function (data) {
					data = JSON.parse(data);
					if (data.count == 0) {
						msg = "<div class='alert alert-danger mt-3'>" + data.output + ". </div>";
						$("#msg1").html(msg);

					} else {
						
						if(data.custaccount==1){
							//alert(data.purid);
							$('#myform')[0].reset();
							document.getElementById("creditdiv").style.display = "none";
							$('#order_table').html("");
							document.getElementById("creditdiv").style.display = "block";
							msg = "<div class='alert alert-primary mt-3'> Sold " + data.count + " item(s).. </div>";
							$("#msg1").html(msg);
							$("#idcustomername").attr("disabled", false);
							$("#chkcredit").attr("disabled", false);
							$("#cartitem").val("");
							document.getElementById("iddate").value = selectdate;
						}else if(data.custaccount==1){
							//alert(data.purid);
							$('#myform')[0].reset();
							document.getElementById("creditdiv").style.display = "none";
							$('#order_table').html("");
							document.getElementById("creditdiv").style.display = "block";
							msg = "<div class='alert alert-danger mt-3'> Sold " + data.count + " item(s). But payment of customer no recieved please enter manually... </div>";
							$("#msg1").html(msg);
							$("#idcustomername").attr("disabled", false);
							$("#chkcredit").attr("disabled", false);
							$("#cartitem").val("");
							document.getElementById("iddate").value = selectdate;
						}else{
							//alert(data.purid);
							$('#myform')[0].reset();
							document.getElementById("creditdiv").style.display = "none";
							$('#order_table').html("");
							document.getElementById("creditdiv").style.display = "block";
							msg = "<div class='alert alert-primary mt-3'> Sold " + data.count + " item(s).. </div>";
							$("#msg1").html(msg);
							$("#idcustomername").attr("disabled", false);
							$("#chkcredit").attr("disabled", false);
							$("#cartitem").val("");
							document.getElementById("iddate").value = selectdate;
						}
					}
				}
			});
		}
		else {
			return false;
		}
	});
	var choices;
	let id = "2";
	mydata = { id: id };
	$.ajax({
		url: "getTotalProduct.php",
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
				output += '"' + x[i].pname + '",';
			}
			output += '"0"';
			choices = data;
		},
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
		$('#idpid').autoComplete({
			minChars: 0,
			source: function (term, suggest) {
				term = term.toLowerCase();
				//var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ['Bulgaria', 'bg'], ['Canada', 'ca'], ['China', 'cn'], ['Czech Republic', 'cz'], ['Denmark', 'dk'], ['Finland', 'fi'], ['France', 'fr'], ['Germany', 'de'], ['Hungary', 'hu'], ['India', 'in'], ['Italy', 'it'], ['Japan', 'ja'], ['Netherlands', 'nl'], ['Norway', 'no'], ['Portugal', 'pt'], ['Romania', 'ro'], ['Russia', 'ru'], ['Spain', 'es'], ['Swiss', 'ch'], ['Turkey', 'tr'], ['USA', 'us']];
				var suggestions = [];
				for (i = 0; i < choices.length; i++)
					if (~(choices[i][0] + ' ' + choices[i][1] + ' ' + choices[i][2]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
				suggest(suggestions);
			},
			renderItem: function (item, search) {
				search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
				var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
				return '<div class="autocomplete-suggestion" data-pname="' + item[0] + '" data-pid="' + item[1] + '" data-qty="' + item[2] + '" data-pprice="' + item[3] + '" data-val="' + search + '"><img src="">' + item[1] + '--> ' + item[0].replace(re, "<b>$1</b>") + '  </div>';
			},
			onSelect: function (e, term, item) {
				console.log('Item "' + item.data('pname') + ' (' + item.data('pid') + ')" selected by ' + (e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click') + '.');
				$('#idname').val(item.data('pname') + ' (id: ' + item.data('pid') + ')');
				$('#idpid').val(item.data('pid'));
				$('#idstock').val(item.data('qty'));
				$('#idpprice').val(item.data('pprice'));
			}
		});
	});
	$(function () {
		$('#idname').autoComplete({
			minChars: 0,
			source: function (term, suggest) {
				term = term.toLowerCase();
				//var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ['Bulgaria', 'bg'], ['Canada', 'ca'], ['China', 'cn'], ['Czech Republic', 'cz'], ['Denmark', 'dk'], ['Finland', 'fi'], ['France', 'fr'], ['Germany', 'de'], ['Hungary', 'hu'], ['India', 'in'], ['Italy', 'it'], ['Japan', 'ja'], ['Netherlands', 'nl'], ['Norway', 'no'], ['Portugal', 'pt'], ['Romania', 'ro'], ['Russia', 'ru'], ['Spain', 'es'], ['Swiss', 'ch'], ['Turkey', 'tr'], ['USA', 'us']];
				var suggestions = [];
				for (i = 0; i < choices.length; i++)
					if (~(choices[i][0] + ' ' + choices[i][2] + ' ' + choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
				suggest(suggestions);
			},
			renderItem: function (item, search) {
				search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
				var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
				return '<div class="autocomplete-suggestion" data-pname="' + item[0] + '" data-pid="' + item[1] + '" data-qty="' + item[2] + '" data-val="' + search + '"><img src=""> ' + item[0].replace(re, "<b>$1</b>") + '</div>';
			},
			onSelect: function (e, term, item) {
				console.log('Item "' + item.data('pname') + ' (' + item.data('pid') + ')" selected by ' + (e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click') + '.');
				$('#idname').val(item.data('pname') + ' (id: ' + item.data('pid') + ')');
				$('#idpid').val(item.data('pid'));
				$('#idstock').val(item.data('qty'));
			}
		});
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
				document.getElementById("creditdiv").style.display = "block";
			}
		});
	});
	// Get the modal
	var modal = document.getElementById("myModal");
	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	// When the user clicks the button, open the modal 
	btn.onclick = function () {
		modal.style.display = "block";
	}
	// When the user clicks on <span> (x), close the modal
	span.onclick = function () {
		modal.style.display = "none";
	}
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	$("#idqty").change(function () {
		let stock = $('#idstock').val();
		let selectqty = $('#idqty').val();
		if (parseFloat(stock) < parseFloat(selectqty)) {
			document.getElementById("msg").style.display = "block";
			msg = "<div class='alert alert-danger mt-3'>Only " + stock + " stock(s) is/are availabe.</div>";
			$("#msg").html(msg);
			$("#idqty").focus();
		} else {
			msg = "";
			document.getElementById("msg").style.display = "none";
		}
	});
	$('#example').DataTable({
		dom: 'Bfrtip',
		responsive: true,
		colReorder: true,
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdf'
		]
	});
} catch (error) {
	
}
});