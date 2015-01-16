jQuery(document).ready(function($) {

	
   


    $(window).scroll(function(){
	//alert(1);
         $('.senNav').toggleClass('navbar-fixed-top senNav-fixed-top', $(this).scrollTop() > 1);
     });



   

});
