<?php
$this->title = ucwords(strtolower($group));

use common\models\Article;
use common\models\ArticleCategory;
?>
<section id="internal-title" class="container" data-background="parallax" style="background-attachment: fixed; background-position: 50% 12px;"> 
    <h1><?php echo $this->title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->urlManager->createUrl('home'); ?>">Home</a></li> 
        <li><a href="#">Facility</a></li> 
        <li class="active"><?= $this->title; ?></li> 
    </ol> 
</section>
<div id="post-pages" class="container padding-bottom"> 
<section id=agents-boxes class="padding-bottom col-md-9" style="margin-left:-15px; padding-bottom: 0px">
    <!--<h3><span><b><?php echo $this->title; ?></b></span></h3>--> 
    <!--<div class=container>-->
        <?php
        foreach ($model as $val) {
            echo '<div class="agent-boxes expand" data-animation=fadeInUp>
                        <div class="agent-box clearfix"> 
                            <div class="agent-pic col-xs-5 col-md-4"> 
                                <img src="' . $val->imgMedium . '" alt="' . $val->title . '" style="width: 350px; margin-top:15px;"> 
                            </div> 
                            <div class="agent-details col-xs-7 col-md-8"> 
                                <div class=name>' . $val->title . '</div> 

                                <div class=description align="justify"> 
                                    ' . $val->content . '
                                </div> 
                            </div>

                        </div> 
                    </div>';
        }
        ?>
    <!--</div>-->
</section>
