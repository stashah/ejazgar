$(document).ready(function(){

	try {
		var today = new Date();
	var selectdate = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
	selectdate = selectdate.toLocaleString('en-US', { timeZone: 'Asia/Karachi' })
	document.getElementById("iddate").value = selectdate;

	} catch (error) {
		console.log(error);
	}
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
			"order": [[ 4, "ASC" ]],
			columnDefs: [{targets: 4,
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
		
		var table = $('#example').DataTable({
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
		
		  var columnmob = table1.column(2);
		  var columnadd = table1.column(3);
 
        // Toggle the visibility
        columnmob.visible( false );
		columnadd.visible( false );

		  $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );

	$('a.toggle-vis-ex1').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table1.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
		
	} catch (error) {
		console.log(error);
	}
	
	
	
	
//Ajax request for insert datat


$("#btnadd").click(function(e){
e.preventDefault();
 console.log("button save clicked");

 let custname = $("#idcustname").val();
 let custmob = $("#idcustmob").val();
 let custaddress =  $("#idcustaddress").val();
 let action = "insert";
 
 mydata = {custid:custid,name:custname,custmob:custmob,custaddress:custaddress, action:action};
 //console.log(mydata);
$.ajax({
	url:"insert.php",
	method: "POST",
	dataType: "json",
	data: JSON.stringify(mydata),
	success: function(data){
		
		if (data.count == 0) {
			
			msg = "<div class='alert alert-danger mt-3'>" + data.output + ". </div>";
			$("#msg").html(msg);
			$("#idcustname").focus();

		} else {
			
			msg = "<div class='alert alert-primary mt-3'>" + data.output + ". </div>";
			$("#msg").html(msg);
			$("#myform")[0].reset();
			$("#idcustname").focus();
			
		}
			
	},
	
});
});

$("#btnupdate").click(function(e){
	e.preventDefault();
	 console.log("button save clicked");
	
	 let custname = $("#idcustname").val();
	 let custmob = $("#idcustmob").val();
	 let custaddress =  $("#idcustaddress").val();
	 let custid = $("#idcustid").val();
	 let action = "update";
	 
	 mydata = {custid:custid,name:custname,custmob:custmob,custaddress:custaddress, action:action};
	 //console.log(mydata);
	$.ajax({
		url:"insert.php",
		method: "POST",
		dataType: "json",
		data: JSON.stringify(mydata),
		success: function(data){
			
			if (data.count == 0) {
				
				msg = "<div class='alert alert-danger mt-3'>" + data.output + ". </div>";
				$("#msg").html(msg);
				$("#idcustname").focus();

	
			} else {
				
				msg = "<div class='alert alert-primary mt-3'>" + data.output + ". </div>";
				$("#msg").html(msg);
				$("#myform")[0].reset();
				$("#idcustname").focus();
				window.location.href = "../customer/index.php?msg="+custname+" details updated successfully..&cls=alert alert-primary";
				
				
			}
				
		},
		
	});
	});
	

$("#btnaddpayment").click(function(e){
	e.preventDefault();
	 console.log("button save clicked");

	 var d = new Date();
	var pdate = d.getFullYear() + "" + (d.getMonth() + 1) + "" + d.getDate();
	let payid = "p" + pdate + "" + d.getTime();
	
	 let paymentdetails = $("#iddetails").val();
	 let amount = $("#idamount").val();
	 let dt1 = new Date($("#iddate").val());
	let dt = dt1.getFullYear() + "-" + (dt1.getMonth() + 1) + "-" + dt1.getDate();
	let custid = $("#idcustid").val();
	 let action =  "payment";
	 
	 mydata = {payid:payid,paymentdetails:paymentdetails,custid:custid,amount:amount,pdate:dt,action:action};
	 //console.log(mydata);
	$.ajax({
		url:"insert.php",
		method: "POST",
		dataType: "json",
		data: JSON.stringify(mydata),
		success: function(data){
			
			if (data.count == 0) {
				
				msg = "<div class='alert alert-danger mt-3'>" + data.output + ". </div>";
				$("#msg").html(msg);
				$("iddetails").focus();
	
			} else {
				
				msg = "<div class='alert alert-primary mt-3'>" + data.output + ". </div>";
				$("#msg").html(msg);
				
				window.location.href = "../customer/report.php?id="+custid+"&msg=Payment recieved..&cls=alert alert-primary";
				
			}
				
		},
		
	});
	});

(function($) {
	$.fn.inputFilter = function(inputFilter) {
	  return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
		if (inputFilter(this.value)) {
		  this.oldValue = this.value;
		  this.oldSelectionStart = this.selectionStart;
		  this.oldSelectionEnd = this.selectionEnd;
		} else if (this.hasOwnProperty("oldValue")) {
		  this.value = this.oldValue;
		  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		} else {
		  this.value = "";
		}
	  });
	};
  }(jQuery));
  
  //for phone validation
  // Install input filters.
  $("#idcustmob").inputFilter(function(value) {
	return /^-?\d*$/.test(value);
  });
  $("#uintTextBox").inputFilter(function(value) {
	return /^\d*$/.test(value);
  });
  $("#idcustmob1").inputFilter(function(value) {
	return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500);
  });
  $("#floatTextBox").inputFilter(function(value) {
	return /^-?\d*[.,]?\d*$/.test(value);
  });
  $("#currencyTextBox").inputFilter(function(value) {
	return /^-?\d*[.,]?\d{0,2}$/.test(value);
  });
  $("#latinTextBox").inputFilter(function(value) {
	return /^[a-z]*$/i.test(value);
  });
  $("#hexTextBox").inputFilter(function(value) {
	return /^[0-9a-f]*$/i.test(value);
  });
  
  try {
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
  } catch (error) {
	  
  }
  

 
});