function speakerRollover($){

	$('.speaker', '.grid').hover(function(){
		$(this).children('.info').stop(true, true).fadeIn('slow');
	},
	function(){
		$(this).children('.info').stop(true, true).fadeOut('slow');
	});

}

jQuery(document).ready(function($) {

	$('#tweetFavList').cycle();

	speakerRollover($);

});
