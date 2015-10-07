<?php
/**
 * @package WordPress
 * @subpackage siiimple
 * Template Name: Template Contact
 */
global $data;
get_header();
?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

<?php include (trailingslashit( get_template_directory() ) . '/framework/includes/bg.php'); ?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = $data['email'];
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>

<?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); ?>

<div id="portfolio1" class="container contact-page">

	<div class="grid16 col top-header">
	
		<h1 class="main-header-title"><?php the_title(); ?></h1>
		
		<?php if(!empty($data['tagline_contact'])) { ?>
		<p class="portfolio"><?php echo $data['tagline_contact']; ?></p>
		<?php } ?>
	
	</div>

	<div class="page-content single">

		<div class="container" id="page-bottom">
	
			<div class="grid10 col full-width" id="content-wrapper">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>
	
					<?php if(isset($emailSent) && $emailSent == true) { ?>

                    <div class="thanks">
                        <p><?php _e('Thanks, your email was sent successfully.', 'siiimple') ?></p>
                    </div>
        
                    <?php } else { ?>
                
                         <?php if(isset($hasError) || isset($captchaError)) { ?>
                               <p class="error"><?php _e('Sorry, an error occured.', 'siiimple') ?><p>
                         <?php } ?>
            
                            <form action="<?php the_permalink(); ?>" id="contactForm" method="post" class="clearfix">
                                <ul class="contactform">
                                    <li><label for="contactName"><?php _e('Name:', 'siiimple') ?></label>
                                        <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField large input-text" />
                                        <?php if($nameError != '') { ?>
                                            <span class="error"><?php echo $nameError; ?></span> 
                                        <?php } ?>
                                    </li>
                        
                                    <li><label for="email"><?php _e('Email:', 'siiimple') ?></label>
                                        <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email large input-text" />
                                        <?php if($emailError != '') { ?>
                                            <span class="error"><?php echo $emailError; ?></span>
                                        <?php } ?>
                                    </li>
                        
                                    <li class="textarea"><label for="commentsText"><?php _e('Message:', 'siiimple') ?></label>
                                        <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField form.nice textarea"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                                        <?php if($commentError != '') { ?>
                                            <span class="error"><?php echo $commentError; ?></span> 
                                        <?php } ?>
                                    </li>
                        
                                    <li class="button-submit">
                                        <input type="hidden" name="submitted" id="submitted" value="true" />
                                        <button name="submit" class="default-button button2 nice" type="submit" id="submit" tabindex="5"><?php _e('Send Email', 'siiimple') ?></button>
                                    </li>
                                </ul>
                            </form>
                        <?php } ?>
                        
                       </div>
					
		<?php endwhile; endif; ?>
	
</div>
</div>
</div>
</div>

<?php include (trailingslashit( get_template_directory() ) . '/pre-footer.php'); ?>

<?php get_footer(); ?>