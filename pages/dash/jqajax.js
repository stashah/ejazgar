$(document).ready(function () {

	try {
		var table1 = $('#example1').DataTable({
			dom: 'Bfrtip',
			responsive: true,
			colReorder: true,
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf'
				
			],
			"order": [[ 2, "ASC" ]],
			columnDefs: [{targets: 2,
							render: function ( data, type, row ) {
							  var color = 'black';
							  
							  var s = data;
							  s = s.replace(/,/g, '');
	
							  let amount = parseFloat(s);
	
							  if (amount > 5000) {
								color = 'blue';
							  }
							  if (amount > 10000) {
								color = 'green';
							  } 
							  if (amount > 15000) {
								color = 'red';
							  }
							  return '<span style="color:' + color + '">' + data + '</span>';
							}
					   }]
		  });
		
	} catch (error) {
		console.log(error);
	}

	getPur(id);
	getSal(sid);
	// editing data
	$("tbody").on("click", ".btn-edit", function () {
		//console.log("btn edit Button Clicked");
		let idpur = $(this).attr("data-pid");

		//	console.log(id);
		getPur(idpur);


	});

	

	function getPur(id) {
		let output = "";
		mydata = { pid: id };
		$.ajax({
			url: "purchase.php",
			method: "POST",
			dataType: "json",
			data: JSON.stringify(mydata),
			success: function (data) {
				console.log(data);
				dataType: "json";
				if (data) {
					x = data;
				} else {
					x = "";
				}
				let totalamount = 0;

				for (i = 0; i < x.length; i++) {
					output += '<tr><td class=" btn-vdetail" data-vid="' + x[i].PM + '" data-vname="' + x[i].PM + '">' + x[i].PM + '</td><td style="text-align:right">' + parseFloat(x[i].totalpur) + '</td></tr>';
					totalamount += parseFloat(x[i].totalpur);

				}
				output += '<tr><th>Year ' + x[0].PYEAR + '</th><th style="text-align:right">' + totalamount + '</th></tr>';


				$('#vlist').html(output);
			},
		});
	}
	//Ajax request for insert datat

	
	$("#btnadd").click(function (e) {
		e.preventDefault();
		console.log("button save clicked");

		let pname = $("#idpname").val();
		let pcateg = $("#idpcateg").val();

		mydata = { name: pname, categ: pcateg };
		//console.log(mydata);
		$.ajax({
			url: "insert.php",
			method: "POST",
			data: JSON.stringify(mydata),
			success: function (data) {
				//console.log(data);
				msg = "<div class='alert alert-dark mt-3'>" + data + "</div>";
				$("#msg").html(msg);
				$("#myform")[0].reset();
				window.location.replace('../product/?msg=' + msg);

			},

		});
	});

	$("#tbodysal").on("click", ".btn-saledit", function () {
		//console.log("btn edit Button Clicked");
		let idsal = $(this).attr("data-sid");

		//	console.log(id);
		getSal(idsal);
		

	});

	function getSal(idsal) {
		let output = "";
		mydata = { sid: idsal };
		$.ajax({
			url: "sale.php",
			method: "POST",
			dataType: "json",
			data: JSON.stringify(mydata),
			success: function (data) {
				console.log(data);
				dataType: "json";
				if (data) {
					x = data;
				} else {
					x = "";
				}
				let totalamount = 0;
				let totalprofit = 0;

				for (i = 0; i < x.length; i++) {
					output += '<tr><td class=" btn-dailydetail" data-dailyid="' + x[i].YMSAL + '" data-vname="' + x[i].PMSAL + '">' + x[i].PMSAL + '</td><td style="text-align:right">' + parseFloat(x[i].TOTALSAL) + '</td><td style="text-align:right"> ' + parseFloat(x[i].PROFIT).toFixed(2) + '</td></tr>';
					totalamount += parseFloat(x[i].TOTALSAL);
					totalprofit += parseFloat(x[i].PROFIT);

				}
				output += '<tr><th>Year ' + x[0].SYEAR + '</th><th style="text-align:right">' + totalamount + '</th><th style="text-align:right">' + totalprofit.toFixed(2) + '</th></tr>';


				$('#slist').html(output);
			},
		});
	}


	$("#slist").on("click", ".btn-dailydetail", function () {
		//console.log("btn edit Button Clicked");
		let idsalD = $(this).attr("data-dailyid");
		var modal = document.getElementById("myModal");
		modal.style.display = "block";
		//	console.log(id);
		getSalDaily(idsalD);
		
		

	});

	$("#btnback").click(function(e){
		e.preventDefault();
		var modal = document.getElementById("myModal");
		modal.style.display = "block";
		let ymsal = $('#btnback').val();
		getSalDaily(ymsal);

	});

	function getSalDaily(idsalD) {
		let output = "";
		let action = "datew"
		mydata = { sid: idsalD, action:action };
		$.ajax({
			url: "dailysale.php",
			method: "POST",
			dataType: "json",
			data: JSON.stringify(mydata),
			success: function (data) {
				console.log(data);
				dataType: "json";
				if (data) {
					x = data;
				} else {
					x = "";
				}
				let totalamount = 0;
				let dailyprof = 0;
				let saldate;
				output = '<thead><th>Date</th><th style="text-align:right">Sale</th><th style="text-align:right">Profit</th><tbody>';
				for (i = 0; i < x.length; i++) {
					output += '<tr><td class=" btn-dailydetailsale" data-saldate="' + x[i].sdate + '" >' + x[i].SALDATE + '</td><td style="text-align:right">' + parseFloat(x[i].DAILYSAL) + '</td><td style="text-align:right">' + parseFloat(x[i].dailyprofit).toFixed(2) + '</td></tr>';
					totalamount += parseFloat(x[i].DAILYSAL);
					dailyprof += parseFloat(x[i].dailyprofit);
					saldate = x[i].YMSAL;
				}
				output += '<tr><th>' + x[0].month + '</th><th style="text-align:right">' + totalamount + '</th><th style="text-align:right">' + dailyprof.toFixed(2) + '</th></tr>';
				output += '</tbody>';
				 
				$('#btnback').val(saldate);
				$('#dlist').html(output);
				
			},
		});
	}

	$("#dlist").on("click", ".btn-dailydetailsale", function () {
		//console.log("btn edit Button Clicked");
		let idsaldate = $(this).attr("data-saldate");
		
		getDailySale(idsaldate);

	});

	function getDailySale(idsaldate) {
		let output = "";
		let action = 'datewise'
		mydata = { sid: idsaldate, action: action};
		$.ajax({
			url: "dailysale.php",
			method: "POST",
			dataType: "json",
			data: JSON.stringify(mydata),
			success: function (data) {
				console.log(data);
				dataType: "json";
				if (data) {
					x = data;
				} else {
					x = "";
				}
				let totalamount = 0;
				let totalprofitdaily = 0;
				let acct ='';
				let custname ="";
				let status = "";
				output = '<thead><tr><th>Date</th><th>Detail</th><th>Account</th><th>Customer Name</th><th>Remarks</th><th>Quantity</th><th>Price</th><th>Total</th><th>Profit</th></tr></thead><tbody  style="cursor:pointer;">';

				for (i = 0; i < x.length; i++) {
					if(x[i].account == 0){
						acct = 'Cash';
						if( x[i].custid==0){
						custname ="-";}
						else{
							custname = x[i].customer;
						}
					}else
					{
						acct = 'Credit';
						custname = x[i].customer;
					}

					if(x[i].remark == "R"){
						status = 'Returned'
					}else
					{
						status = '';
					}
					

					output += '<tr><td class=" btn-dailydetail" data-saldate="' + x[i].SALDATE + '" >' + x[i].fdate + '</td>';
					output += '<td>' + x[i].pname + '</td>';
					output += '<td>'+acct +'</td>';
					output += '<td>'+ custname+'</td>';
					output += '<td style="color:red">'+status +'</td>';
					output += '<td style="text-align:center">' + parseFloat(x[i].qty) + '</td>';
					output += '<td style="text-align:right">' + parseFloat(x[i].price).toFixed(2) + '</td>';
					output += '<td style="text-align:right">' + (parseFloat(x[i].qty) * parseFloat(x[i].price)).toFixed(2) + '</td>';
					output += '<td style="text-align:right">' + ((parseFloat(x[i].qty) * parseFloat(x[i].price)) - (parseFloat(x[i].qty) * parseFloat(x[i].purprice))).toFixed(2)  + '</td>';
					
					output += '</tr>';
					totalamount += parseFloat(x[i].qty) * parseFloat(x[i].price);
					totalprofitdaily += ((parseFloat(x[i].qty) * parseFloat(x[i].price)) - (parseFloat(x[i].qty) * parseFloat(x[i].purprice)));

				}
				output += '<tr><th colspan=5>Grand Total</th><th></th><th></th><th style="text-align:right">' + totalamount.toFixed(2) + '</th><th style="text-align:right">' + (totalprofitdaily).toFixed(2) + '</th></tr>';
				output +='</tbody>';

				$('#dlist').html(output);
				
			},
		});
	}

	var span = document.getElementsByClassName("close")[0];
	span.onclick = function () {
		let modal = document.getElementById("myModal");
		modal.style.display = "none";
	}
	
	
	

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		let modal = document.getElementById("myModal");
		if (event.target == modal) {
			
			modal.style.display = "none";
		}
	}

});