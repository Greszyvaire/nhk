jQuery(function($){
$(document).ready(function(){
jQuery(document).ready(function() {
	jQuery.noConflict();
	var myTime = new Date(<?php if(!empty($data['503_year'])) { ?><?php echo $data['503_year']; ?><?php } ?>, <?php if(!empty($data['503_month'])) { ?><?php echo $data['503_month']; ?><?php } ?>-1, <?php if(!empty($data['503_day'])) { ?><?php echo $data['503_day']; ?><?php } ?>);
	jQuery('#time').countdown({
		format: 'odHMS',
		until: myTime
	});
});
}); // END doc ready
}); // END function
