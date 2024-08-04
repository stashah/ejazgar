$(document).ready(function(){
//Ajax request for insert datat


$("#btnadd").click(function(e){
e.preventDefault();
 console.log("button save clicked");

 let cname = $("#idcname").val();
 
 
 mydata = {name:cname};
 //console.log(mydata);
$.ajax({
	url:"insert.php",
	method: "POST",
	data: JSON.stringify(mydata),
	success: function(data){
		//console.log(data);
		msg = "<div class='alert alert-dark mt-3'>"+ data +"</div>";
		$("#msg").html(msg); 
		$("#myform")[0].reset();
		window.location.replace('../category/?msg='+msg);
			
	},
	
});
});



});