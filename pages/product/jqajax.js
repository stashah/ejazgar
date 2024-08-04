$(document).ready(function(){

	
	try {
        // start grouping
        var table = $('#example2').DataTable({
    "columnDefs": [
        { "visible": false, "targets": 2 }
    ],
    "order": [[ 1, 'asc' ]],
    dom: 'Bfrtip',
    "buttons": [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf',
                'print',
                { text:'PDF',
        extend: 'pdf',
        footer : true,
        header : true,
        orientation:'landscape',
        customize: function (doc) {
            var lastColX=null;
            var lastColY=null;
            var bod = []; // this will become our new body (an array of arrays(lines))
            //Loop over all lines in the table
            doc.content[1].table.body.forEach(function(line, i){
                //Group based on first column (ignore empty cells)
                // if(lastColX != line[0].text && line[0].text != ''){
                //     //Add line with group header
                //     bod.push([{text:line[0].text, style:'tableHeader'},'','','','']);
                //     //Update last
                //     lastColX=line[0].text;
                // }
                //Group based on second column (ignore empty cells) with different styling
                if(lastColY != line[2].text && line[2].text != ''){
                    //Add line with group header
                    bod.push([{text:line[2].text, style:'subheader'},'','','','','','','','']);
                    //Update last
                    lastColY=line[1].text;
                }
                //Add line with data except grouped data
                if( i < doc.content[1].table.body.length-1){
                    bod.push(['',{text:line[1].text, style:'defaultStyle'},
                                    {text:line[3].text, style:'defaultStyle'},
                                    {text:line[4].text, style:'defaultStyle'},
                                    {text:line[5].text, style:'defaultStyle'},
                                    {text:line[6].text, style:'defaultStyle'},
                                    {text:line[7].text, style:'defaultStyle'},
                                    {text:line[8].text, style:'defaultStyle'},
                                    {text:line[9].text, style:'defaultStyle'}]);   
                }
                //Make last line bold, blue and a bit larger
                else{
                    bod.push(['',{text:line[1].text, style:'lastLine'},
                                {text:line[3].text, style:'lastLine'},
                                {text:line[4].text, style:'lastLine'},
                                {text:line[5].text, style:'defaultStyle'},
                                {text:line[6].text, style:'defaultStyle'},
                                {text:line[7].text, style:'defaultStyle'},
                                {text:line[8].text, style:'defaultStyle'},
                                {text:line[9].text, style:'defaultStyle'}]);
                }
                 
            });
            //Overwrite the old table body with the new one.
            doc.content[1].table.headerRows = 3;
            doc.content[1].table.widths = [100, 35, 90, 90, 35,90,90,35,90];
            doc.content[1].table.body = bod;
            doc.content[1].layout = 'lightHorizontalLines';
             
            doc.styles = {
                subheader: {
                    fontSize: 10,
                    bold: true,
                    color: 'black'
                },
                tableHeader: {
                    bold: true,
                    fontSize: 10.5,
                    color: 'black'
                },
                lastLine: {
                    bold: true,
                    fontSize: 11,
                    color: 'blue'
                },
                defaultStyle: {
                fontSize: 10,
                color: 'black'
                }
            }
        }
    }
				
			],
    "displayLength": 25,
    "drawCallback": function ( settings ) {
        var api = this.api();
        var rows = api.rows( {page:'current'} ).nodes();
        var datatb = rows.data();
				var count = 0;
        var last=null;
 
        api.column(2, {page:'current'} ).data().each( function ( group, i ) {
            if (last !== group) {
						var gtotal = 0;
							for (let index = 0; index < datatb.length; index++) {
								if (datatb[index][2] === group) {
									gtotal = gtotal + parseFloat(datatb[index][9].replace(/\,/g, ''));
									count++;
								}
							}
						$(rows).eq(i).before(
							'<tr class="group" ><td style="background-color:#9d9292;color:white;" colspan="8"><h5>' + group + '</h5></td><td style="background-color:#9d9292;color:white;text-align:right;"><h5>Rs. '+ Math.round(gtotal).toFixed(2) +'</h5></td></tr>'
						);
						last = group;
					}
        } );
    }
    });
        //end grouping
		var table1 = $('#example1').DataTable({
			dom: 'Bfrtip',
			
			colReorder: false,
			
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

 let id = $("#idpid").val();
 let pname = $("#idpname").val();
 let pcateg = $("#idpcateg").val();
 
 mydata = {id:id, name:pname,categ:pcateg};
 //console.log(mydata);
$.ajax({
	url:"insert.php",
	method: "POST",
	data: JSON.stringify(mydata),
	success: function(data){
		$('#myform')[0].reset();
		//console.log(data);
		msg = "<div class='alert alert-dark mt-3'>"+ data +"</div>";
		$("#msg").html(msg); 
		$("#myform")[0].reset();
		window.location.replace('../product/?msg='+msg);
			
	},
	
});
});
// editing data

// editing data
$("tbody").on("click", ".btn-edit", function () {
	//console.log("btn edit Button Clicked");
	let id = $(this).attr("data-pid");
	//console.log(id);
	mydata = { id: id };
	//console.log(mydata);
	$.ajax({
		url: "edit.php",
		method: "POST",
		dataType: "json",
		data: JSON.stringify(mydata),
		success: function (data) {
			//console.log(data);
			dataType: "json";
			window.location.replace('update.php?id=' + data.pid + '&name=' + data.pname + '&pcat=' + data.cid);

		},
	});
});

//delete product

$("tbody").on("click", ".btn-del", function () {
	if (confirm("Are you sure you want to remove this product?")) {
	//console.log("btn edit Button Clicked");
	let id = $(this).attr("data-pid");
	//console.log(id);
	mydata = { id: id };
	//console.log(mydata);
	$.ajax({
		url: "delete.php",
		method: "POST",
		dataType: "json",
		data: JSON.stringify(mydata),
		success: function (data) {
			//console.log(data);
			dataType: "json";
			//window.location.replace('update.php?cnic=' + data.cust_cnic + '&name=' + data.cust_name + '&fname=' + data.cust_fname + '&mob1=' + data.cust_mob1 + '&mob2=' + data.cust_mob2 + '&mob3=' + data.cust_mob3 + '&add=' + data.cust_add + '&addoff=' + data.cust_addofficial + '&rest=' + data.cust_res_type + '&occ=' + data.cust_occupation + '&sal=' + data.cust_salary);
			if(data == 1){
				msg = "<div class='alert alert-primary mt-3'>Success: Product Deleted...</div>";
				window.location.replace('../product/?msg='+msg);
			}else{
				msg = "<div class='alert alert-danger mt-3'>Error: Product Not Deleted...</div>";
				window.location.replace('../product/?msg='+msg);
			}
		},
	});
}
});
  
  

//updatin
$("#btnaddupdate").click(function(e){
e.preventDefault();
 console.log("button save clicked");

 let id = $("#idpid").val();
 let pname = $("#idpname").val();
 let pcateg = $("#idpcateg").val();
 
 mydata = {id:id, name:pname,categ:pcateg};
 //console.log(mydata);
$.ajax({
	url:"updateinsertion.php",
	method: "POST",
	data: JSON.stringify(mydata),
	success: function(data){
		$('#myform')[0].reset();
		//console.log(data);
		msg = "<div class='alert alert-dark mt-3'>"+ data +"</div>";
		$("#msg").html(msg); 
		$("#myform")[0].reset();
		window.location.replace('../product/?msg='+msg);
			
	},
	
});
});
 
});