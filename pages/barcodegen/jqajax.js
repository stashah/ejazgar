$(document).ready(function () {
	//Ajax request for insert datat
	$(window).keydown(function (event) {
		/*if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}else */if (event.keyCode == 40) {
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
	
	
	$(function () {
		$('#idcode').autoComplete({
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
				$('#idcode').val(item.data('pname') + ' (id: ' + item.data('pid') + ')');
				//$('#idname').val(item.data('pname') );
				$('#idpid').val(item.data('pid') );
				
			}
		});
	});
	
	
	
});