$(document).ready(function(){
	
 //------------------------------------------end get ip-----------------------------------------------------------
    //url_land_mark= "http://localhost/daily_mart_land_mark/land_mark_view.php/find_all_land_mark";
	//url_land_mark= "/land_mark_list.php";
    //$.post(url_land_mark,{},function(data){  //to decide to show the div or not
       // $('#slc_land_mark').html(data);
        
    //});
    //------------------------------------------------for the branch response new---------------------------------------

$('#btn_view').click(function(){
	 url_land_mark= "http://localhost/dailyMart2/admin/ajax/show_shop.php";
	//url_land_mark= "/show_shop.php"; $('#frm_land_mark').serialize()
    $.post(url_land_mark, $("#frm_land_mark").serialize() ,function(data){  //to decide to show the div or not
        $('#dv_shops').html(data);
		
		$(".txt_price").blur(function(){
			//alert("hello");
			
			url_shop = "http://localhost/dailyMart2/admin/ajax/save_shop.php";
		$.post(url_shop, $(this).closest('form').serialize() ,function(data){
		$('#dv_message').html(data);
	});
			
		});
		
		
        
    });
	return false;
});

});