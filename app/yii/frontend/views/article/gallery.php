<?php

use common\models\Article;

$this->title = "Gallery";
?>
<section id="internal-title" class="container" data-background="parallax" style="background-attachment: fixed; background-position: 50% 12px;"> 
    <h1><?php echo $this->title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->urlManager->createUrl('home'); ?>">Home</a></li> 
        <li class="active"><?= $this->title; ?></li> 
    </ol> 
</section>
<section id="gallery-page" style="margin-top: 0px;" class="container">
    <ul class="gallery-img-container clearfix">
        <?php
        $files = \yii\helpers\FileHelper::findFiles(Yii::$app->params['galleryImg']);
        $gallery = array();
        foreach ($files as $index => $file) {
            $name = substr($file, strrpos($file, '/') + 1);
            $gallery[] = $name;
        }

        if (!empty($gallery)) {
            $perHalaman = 12;
            if (empty($_GET['page'])) {
                $start = 0;
                $end = 11;
            } else {
                $start = ($perHalaman * $_GET['page']) - 12;
                $end = ($perHalaman * $_GET['page']) - 1;
            }

            for ($i = $start; $i <= $end; $i++) {
                if (isset($gallery[$i])) {
                    $name = $gallery[$i];
                    $title = ucwords(strtolower(str_replace("-", " ", substr($gallery[$i], 0, -4))));
                    echo '<li class="col-xs-6 col-md-3 suite"> 
                            <a href="' . Yii::$app->params['urlImg'] . $name . '" title="' . $title . '">
                                <img src="' . Yii::$app->params['urlImg'] . $name . '" alt="' . $title . '">
                                <div class=caption>
                                    <span>' . $title . '</span>
                                </div> 
                            </a> 
                        </li> ';
                }
            }
        } else {
            echo "There are no gallery to view.";
        }
        ?>
    </ul> 
    <?php
    $jmlHalaman = ceil(count($gallery) / $perHalaman);

    echo '<div class="pagination-box"> 
                <ul>';
    for ($i = 1; $i <= $jmlHalaman; $i++) {
        $active = "";
        if (!isset($_GET['page']) and $i == 1) {
            $active = 'class="active"';
        } else if (isset($_GET['page']) and $i == $_GET['page']) {
            $active = 'class="active"';
        }
        echo '<li ' . $active . '>
                        <a href="' . Yii::$app->urlManager->createUrl("gallery/" . $i) . '">
                            <span>' . $i . '</span>
                        </a>
               </li>';
    }
    echo '</ul>
               </div>';
    ?>
</section>
