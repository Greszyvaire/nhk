<?php
$this->title = "Sahid Group";
?>
<section id="internal-title" class="container" data-background="parallax" style="background-attachment: fixed; background-position: 50% 12px;"> 
    <h1><?php echo $this->title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->urlManager->createUrl('home'); ?>">Home</a></li> 
        <li><a href="#">Sahid Group</a></li> 
        <li class="active"><?= ucwords(strtolower($group)); ?></li> 
    </ol> 
</section>
<section id="agents-boxes" class="padding-bottom">
    <!--<h3><span><b>Sahid Group</b> <?php echo ucwords(strtolower($group)); ?></span></h3>--> 
    <div class="container" style="padding:0px;"> 
        <?= $model->content?>
    </div>
</section>
