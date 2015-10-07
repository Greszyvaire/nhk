/* folio js */
 
jQuery(document).ready(function( $ ) {
	
	// set up variables
	
	var loading = false;
	var item_open = false;
	var folio_display = true;
	var $container = $("#detail"); 
	var current_id = '';
		
	loadDetail = function(e) {
		
   		 $('html, body').animate({scrollTop:0}, 'slow');
		 
		 // get current item 		
		 
		loading = true;
		var post_id = $( this ).attr( "data-id" );
   		var nonce = $( this ).attr( "data-nonce" );
      	var $prev = $( '.detail-link[data-id="' + post_id + '"]' ).parent().prev('.folio-item');
      	var $next = $( '.detail-link[data-id="' + post_id + '"]' ).parent().next('.folio-item');
		current_id = post_id;
		var prev_id = '';
   		var next_id = '';
      	
		if ( $prev.length !== 0 && $next.length !== 0 ) {
      		prev_id = $prev.find('.detail-link').attr( "data-id" );
      		next_id = $next.find('.detail-link').attr( "data-id" );
      	}
      	else if ( $prev.length !== 0 ) {
      		prev_id = $prev.find('.detail-link').attr( "data-id" );
      	}
      	else if ( $next.length !== 0 ) {
      		next_id = $next.find('.detail-link').attr( "data-id" );
      	}
		
		// close existing item
		
		closeItem();
		
		// AJAX Call
		
      	$.ajax({
        	type : "post",
        	context: this,
         	dataType : "json",
         	url : headJS.ajaxurl,
         	data : {action: "load_portfolio_item", post_id : post_id, nonce: nonce, prev_post_id : prev_id, next_post_id : next_id},
         	
			// load portfolio item into container div
			
			success: function(response) {
				$container.html( response['html'] );
            	$container.find('#detail-item, #detail-meta').css( 'opacity', 0 );
           },
		   
		    //set up content
			
         	complete: function() {
				loading = false;
				buildSlider();
				openItem();
				$( ".prev-item, .next-item" ).click( loadDetail );
				$( '.prev-item, .next-item' ).click( fadeLoader );
				$( ".close" ).click( closeItem );				
				$( '#loader' ).fadeOut(600);
				$container.find('#detail-meta, #detail-item').stop().animate({ opacity: 1 }, 400);
			}
      	});
      	
      	e.preventDefault();
   		
   	}
   	
   	function openItem() {
		
		// find the height of the portfolio item
		
		var itemHeight = 0;
		var detailHeight = ( $( '#detail-item img:first-child' ).length ) ? $('#detail-item img:first-child').outerHeight() : $('#page-content').outerHeight();
		
		$( '.slides_control' ).show();
		var check = $( '#slider' ).is(":visible");
		
		var metaHeight = $('#detail-meta').outerHeight( true );	
		
		if( !$( '#detail-item img:first-child' ).length && !$( '#detail-item iframe' ).length ) {
			detailHeight = $( '#detail-item *[height]:first-child' ).outerHeight();
		}
		
		detailHeight += $( '#detail-item .item-description' ).outerHeight( true );
		
		// remove closed class
		
		if( $container.hasClass( 'closed-project' ) ) {
			$container.removeClass( 'closed-project' );	
		}
				
		itemHeight = ( detailHeight >= metaHeight) ? detailHeight : metaHeight; 
		
		// animate to the correct height		
		
		$container.animate({
			height: itemHeight
		}, 600, 'easeOutQuint', function() {
			item_open = true;
			$(this).css({ 'overflow': 'visible', 'height': 'auto' });
		});
		
	}
	
	function closeItem() {
   		
   		var $itemToClose = $(this);
		
		if ( $( 'body' ).hasClass('ie7') ) {
			$container.find('#detail-meta, #detail-item').hide();
		}
		
		// fade out folio item content
		
		$container.find('#detail-meta, #detail-item').stop().animate({
			opacity: 0
		}, 200);
		
		// closing animation
		
		$container.stop().animate({
			height: 0
		}, 500, 'easeOutQuint', function() {
			item_open = false;
			$(this).css('overflow', 'hidden');
			
			if( $itemToClose.hasClass('close') ) {
   				$(this).empty();
   			}
		});
		
	}
	
   	function buildSlider() {
   		
		// setup slider using slides.js plugin
		
	   	if( jQuery().slides ) {
			$( "#slides" ).slides({ 
				preload: true, 
				play: 0, 
				pause: 2000, 
				slideEasing: 'easeOutQuint', 
				fadeEasing: 'easeOutQuint', 
				hoverPause: true, 
				container: 'slides-container', 
				pagination: true, 
				generatePagination: true, 
				generateNextPrev: false,
				autoHeight: true, 
				autoHeightSpeed: 300, 
				fadeSpeed: 300, 
				slideSpeed: 300, 
				effect: "slide", 
				crossfade: true, 
				randomize: false, 
				start: 1
			});
		}
		
	}
	
	function fadeLoader() {
		$( '#loader' ).css('visibility', 'visible');
		$( '#loader' ).fadeIn(500);
	}
	
	buildSlider();
	
	// add actions to controls
	
	$( ".detail-link" ).click( loadDetail );
	$( '.detail-link' ).click( fadeLoader );
	$( ".prev-item, .next-item" ).click( loadDetail );	
	$( '.prev-item, .next-item' ).click( fadeLoader );
	
	// closing or transitioning item
	
	$( ".close, .prev-item, .next-item" ).click( function() {
		
		var $itemToClose = $(this);
			
		if( $itemToClose.hasClass('close') ) {
			$container.addClass('closed-project');
		}
					
		$container.find('#detail-meta, #detail-item').stop().animate({
			opacity: 0
		}, 200);
			
		$container.stop().animate({
			height: 0
		}, 700, 'easeOutQuint', function() {
			$(this).css('overflow', 'hidden');
			
			if( $itemToClose.hasClass('close') ) {
				$(this).empty();
			}
		});
		
	});
	
});