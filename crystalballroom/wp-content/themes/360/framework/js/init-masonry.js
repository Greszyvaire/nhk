jQuery(function($){
$(document).ready(function(){

$(function(){

    var $container = $('#container');
  
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.box'
      });
    });
  
  });

}); // END doc ready
}); // END function