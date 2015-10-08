var j = jQuery.noConflict();

j(function($){
j(document).ready(function(){
   
   //slides in the right panel
    j('#thumbnails').delay(1500).hide("slide", {
        direction: "down"
    }, 800);
    
     j('.close-panels').hide();
	
    //When panel is open this closed it
    j('.close-panels').click(function() {
        j('#thumbnails').hide('slide', {
            direction: 'down'
        }, 200);
		j('.open-panels,.close-panels').toggle();
    });
    
    //When panel is open this closed it
    j('.open-panels').click(function() {
        j('#thumbnails').show('slide', {
            direction: 'down'
        }, 200);
		j('.open-panels,.close-panels').toggle();
    });

}); // END doc ready
}); // END function