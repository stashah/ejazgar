$(document).ready(function () {

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
	
	
	//Ajax request for insert datat
	$(window).keydown(function (event) {
		/*if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}else */if (event.keyCode == 40) {

		}
	});
	
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
	
	
	var d = new Date();
	var pdate = d.getFullYear() + "" + (d.getMonth() + 1) + "" + d.getDate();
	let purid = "pur" + pdate + "" + d.getTime();
	
	$("#btnadd").click(function (e) {
		e.preventDefault();
		//console.log("button save clicked");

		let dt1 = new Date($("#iddate").val());
		let dt = dt1.getFullYear() + "-" + (dt1.getMonth() + 1) + "-" + dt1.getDate();
		let product_id = $("#idpid").val();
		let product_quantity = $("#idqty").val();
		let product_price = $("#idcp").val();
		
		let product_name = $("#idname").val();
		let vnam = $("#idvendor").val();
		let action = "add";
		if (product_quantity > 0 && product_id != "" && product_price != "" ) {
			$.ajax({
				url: "cart.php",
				method: "POST",
				dataType: "json",
				data: {
					purid: purid,
					dt: dt,					
					vnam: vnam,
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					product_quantity: product_quantity,
					action: action
				},
				success: function (data) {
					$('#order_table').html(data.order_table);
					$('#idname').val("");
					$('#idqty').val("");
					$('#idcp').val("");
					
					$('#idname').focus();
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
				}
			});
		} else {
			return false;
		}
	});
	$("#savepurdata").click(function (e) {
		e.preventDefault();
		if (confirm("Do you want to confirm purchase?")) {
			$.ajax({
				url: "insert.php",
				method: "POST",
				dataType: "json",
				data: {
				},
				success: function (data) {
					if (data.count == 0) {
						msg = "<div class='alert alert-danger mt-3'>" + data.output + ". </div>";
						$("#msg").html(msg);
						$('#idvendor').val("");
						$('#idvendor').focus();
					} else {
						//alert(data.purid);
						$('#order_table').html("");
						msg = "<div class='alert alert-success mt-3'>" + data.count + " product(s) purchased successfully.</div>";
						$("#msg").html(msg);
						$('#idvendor').val("");
						$('#idvendor').focus();
					}
				}
			});
		}
		else {
			return false;
		}
	});

	

	
	var choices;
		let id ="2";
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
				
				 choices= data;
			},
		});

		

$(function () {

	$('#idname').autoComplete({
		minChars: 0,
		source: function(term, suggest){
			term = term.toLowerCase();
			//var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ['Bulgaria', 'bg'], ['Canada', 'ca'], ['China', 'cn'], ['Czech Republic', 'cz'], ['Denmark', 'dk'], ['Finland', 'fi'], ['France', 'fr'], ['Germany', 'de'], ['Hungary', 'hu'], ['India', 'in'], ['Italy', 'it'], ['Japan', 'ja'], ['Netherlands', 'nl'], ['Norway', 'no'], ['Portugal', 'pt'], ['Romania', 'ro'], ['Russia', 'ru'], ['Spain', 'es'], ['Swiss', 'ch'], ['Turkey', 'tr'], ['USA', 'us']];
			var suggestions = [];
			for (i=0;i<choices.length;i++)
				if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
			suggest(suggestions);
		},
		renderItem: function (item, search){
			search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
			var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
			return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+'"><img src=""> '+item[0].replace(re, "<b>$1</b>")+'</div>';
		},
		onSelect: function(e, term, item){
			console.log('Item "'+item.data('langname')+' ('+item.data('lang')+')" selected by '+(e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click')+'.');
			$('#idname').val(item.data('langname')+' (id: '+item.data('lang')+')');
			$('#idpid').val(item.data('lang'));
		}
	});
	
		$('#idname1').autoComplete({
			minChars: 1,
			source: function (term, suggest) {
				term = term.toLowerCase();
				
			 //choices = ["ActionScript", "AppleScript", "Asp", 'Assembly', 'BASIC', 'Batch', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'PowerShell', 'Python', 'Ruby', 'Scala', 'Scheme', 'SQL', 'TeX', 'XML'];
			 
			 
			 	
				var suggestions = [];
				for (i = 0; i < choices.length; i++)
					if (~choices[i]["pname"].toLowerCase().indexOf(term)) suggestions.push(choices[i]["pname"]);
				suggest(suggestions);
			}
		});
		
	});

	

});