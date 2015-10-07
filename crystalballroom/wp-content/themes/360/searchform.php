<?php global $data; ?>

<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
	
<input value="<?php _e('Search Here...', 'siiimple'); ?>" onfocus="if(this.value=='Search Here...'){this.value='';}" onblur="if(this.value==''){this.value='Search Here...';}" name="s" type="text" id="s" maxlength="99" />

</form>