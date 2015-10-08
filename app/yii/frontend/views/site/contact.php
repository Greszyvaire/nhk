<?php
$this->title = "Contact Us";
?>
<section id="internal-title" class="container" data-background="parallax" style="background-attachment: fixed; background-position: 50% 12px;">
    <h1><?php echo $this->title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->urlManager->createUrl('home'); ?>">Home</a></li> 
        <li class="active"><?= $this->title; ?></li> 
    </ol> 
</section>
<section id=contact-page class="container" style="padding:15px; padding-top:0px;"> 
    <div class="row">
        <div class="col-md-12">
            <div class="contact-info clearfix" style="margin-top:0px;"> 
                <div class=contact-info-contnet>
                    <div class="location col-md-4 col-xs-4"> 
                        Jl. Kahuripan No. 09 Malang,<br> Jawa Timur – Indonesia </div> 
                    <div class="phone col-md-4 col-xs-4">  
                        +62-341 362 751<br>
                        +62-341 328 370 </div>
                    <div class="email col-md-4 col-xs-4"> 
                        <a href="mailto:#">reservation@sahidmontana.com</a><br>
                        <a href="mailto:#">sales@sahidmontana.com</a> 
                    </div>
                </div> 
            </div>
            <section id=google-map class=col-md-4> 
                <div id=map></div> 
            </section> 
            <div class="contact-us-content col-md-8"> 
                <form id=contact-form name=contact-form action=#> 
                    <div class=row> 
                        <div class="name-field col-md-6 col-xs-6"> 
                            <input type=text id=name-field name=name-field placeholder="Name *" required></div> 
                        <div class="email-field col-md-6 col-xs-6"> 
                            <input type=email id=email-field name=email-field placeholder="Email *" required><!-- Email Field --> </div> </div> 
                    <div class=row> <div class="phone-field col-md-6 col-xs-6"> 
                            <input type=tel name=phone-field placeholder=Phone></div>
                        <div class="website-field col-md-6 col-xs-6"> 
                            <input type=url id=website-field name=website-field placeholder=Website><!-- Website Field --> </div> </div> 
                    <div class="message-field row"> 
                        <textarea name=message-field id=message-field placeholder="Message *" required></textarea><!-- Main Message Field --> 
                        <input type=submit class="contact-submit btn colored" value=Send>
                    </div> 
                </form> 
            </div> 
        </div>
    </div>
</section>
