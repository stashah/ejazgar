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
	
	//Deleteing data from cart
	$(document).on('click', '.delete', function (e) {
		e.preventDefault();
		let product_id = $(this).attr("p-id");
        let salid = $(this).attr("s-id");
        let acctype =$(this).attr("acc-type");
        let saldate = $(this).attr("s-date")
		let action = "remove";
        let mydata =  {
            saldate : saldate,
            product_id : product_id,
            salid : salid,
            acctype :acctype,
            action: action
        }
		if (confirm("Are you sure you want to remove this product?")) {
			$.ajax({
				url: "retproduct.php",
				method: "POST",
				dataType: "json",
				data: JSON.stringify(mydata),
				success: function (data) {
					$('#msg').html(data.output);
					document.getElementById("btnSearch").click();
				}
			});
		} else {
			return false;
		}
	});
	
} catch (error) {
	
}

try {
	
	//Deleteing data from cart
	$(document).on('click', '.delete-cash', function (e) {
		e.preventDefault();
		let c_id = $(this).attr("c-id");
        let balid = $(this).attr("b-id");
        let ldate = $(this).attr("l-date")
		let action = "remove";
        let mydata =  {
            c_id : c_id,
            balid : balid,
            ldate : ldate,
            action: action
        }
		if (confirm("Are you sure you want to remove cash?")) {
			$.ajax({
				url: "retcash.php",
				method: "POST",
				dataType: "json",
				data: JSON.stringify(mydata),
				success: function (data) {
					$('#msg').html(data.output);
					document.getElementById("btnSearch").click();
				}
			});
		} else {
			return false;
		}
	});
	
} catch (error) {
	
}
try {
	
	//Deleteing data from cart
	$(document).on('click', '.delete-rec-amount', function (e) {
		e.preventDefault();
		let id = $(this).attr("r-rid")
		let c_id = $(this).attr("c-id");
        let saleid = $(this).attr("r-id");
        let ldate = $(this).attr("r-date")
		let action = "remove";
        let mydata =  {
			id:id,
            c_id : c_id,
            saleid : saleid,
            ldate : ldate,
            action: action
        }
		if (confirm("Are you sure you want to remove cash?")) {
			$.ajax({
				url: "retrecpayment.php",
				method: "POST",
				dataType: "json",
				data: JSON.stringify(mydata),
				success: function (data) {
					$('#msg').html(data.output);
					document.getElementById("btnSearch").click();
				}
			});
		} else {
			return false;
		}
	});
	
} catch (error) {
	
}
});