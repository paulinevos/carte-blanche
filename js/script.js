$(document).ready(function(){

	//create the responsive navigation:
	if( $('#menu-main').length > 0 ){

		var i = 0;
		var html = '<div class="responsive-nav"><select id="chef-main-nav">';

		html += '<option value="nav" selected>NAVIGATIE</option>';
		//get the children:
		$('#menu-main li').each(function(){

			var item = $(this).find('a');
			var link = item.attr('href');
			var text = item.html();
			/*
			if( $(this).hasClass('current-menu-item') ){
				var selected = true;
			}else{
				var selected = false;
			}*/

			html += '<option value="'+link+'">'+text+'</option>';
		});

		html += '</select></div>';

		$('#container header').append(html);

		$('#chef-main-nav').change(function(){
			var value = $(this).val();

			if( value != 'nav' ){
				window.location = value;
			}

		})

	}



});