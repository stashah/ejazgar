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
        
        let saldate = $(this).attr("s-date")
		let action = "remove";
        let mydata =  {
            saldate : saldate,
            product_id : product_id,
            salid : salid,
            
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


});