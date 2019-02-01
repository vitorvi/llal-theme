$(document).ready(function(){

    var header_height = $('.page-header').outerHeight();

    if ($(document).scrollTop() > 117 ) {
        if ( $('.page-header').hasClass( 'shrunk' ) === false ) {
            $('.page-header').addClass('shrunk');
        }
    } else {
        if ( $('.page-header').hasClass( 'shrunk' ) === true ) {
            $('.page-header').removeClass('shrunk');
        }
    }

    $('a[href="#contato"]').click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 1000);
    });

});

$(window).scroll(function(){
	if ( $('#menu-button').hasClass( 'collapsed' ) === false ) {
		$('#menu-mobile').collapse('hide');
	}
	if ($(document).scrollTop() > 117 ) {
        if ( $('.page-header').hasClass( 'shrunk' ) === false ) {
            $('.page-header').addClass('shrunk');
        }
    } else {
        if ( $('.page-header').hasClass( 'shrunk' ) === true ) {
            $('.page-header').removeClass('shrunk');
        }
     }
});
