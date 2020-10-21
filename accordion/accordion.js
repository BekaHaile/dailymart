$(document).ready(function(){
	
var position = $('#dv_document_header').position();	
var position_top = position.top;

var header_height = $('#dv_document_header').height();
//alert(position_top + header_height);	
//alert(header_height);
//$(document).scroll(function(){
	//alert("hello");
//	var position2 = $('.single_container').position();
	//alert(position2.top);
//	if(position2.top != 0){
		//alert(position2.top);
//	}
	
	
//});
var position = $('#dv_document_header').position();	
var position_top = position.top;
var header_height = $('#dv_document_header').height();
var header_bottom = position_top + header_height;
$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
	
		
	
    // Do something
	//if(scroll > 100){
		//alert("hello");
	//}
	
var scroll_bottom = scroll + header_height;
//if(scroll_bottom > 100){
	//alert(scroll_bottom);
//}
$('.single_container').each(function(index,element){
	//alert(index);
	var position_single = $(element).position();
	var position_single_top = position_single.top;
	var single_height = $(element).height();
	var position_single_bottom = position_single_top + single_height;
	//alert($(element).find('.single_container_header').html());
	if(position_single_bottom >= scroll_bottom && position_single_top <= scroll_bottom){
		
		$('#dv_document_header').html($(element).find('.single_container_header').html());
		
	}
	
});
	
});

});