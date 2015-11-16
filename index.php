<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title> New Hongkong Restaurant Malang | Restaurant Masakan Cina di Malang</title>
            <link href="./app/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
            <link href="style.css" rel="stylesheet" type="text/css" media="all" />
            <link href="responsive.css" rel="stylesheet" type="text/css" media="all" />
            <link href="css/nivo-slider.css" rel="stylesheet"  type="text/css" media="screen"/>
    </head>
    <body class="home" style="background:url('images/top-bg.jpg')">
        <div id="header" >
            <div class="container">
                <?php include 'container/menu.php'; ?>
            </div>
        </div>
        <?php include 'container/slider.php'; ?>
        <div id="main">
            <div class="main-container">
                <div class="content content-full-width">
                    <div class="slider-container" style="margin-bottom: 20px">
                        <div class="slider-wrapper theme-default">    
                            <div id="slider" class="nivoSlider">
                                <?php
                                $cFolder = "app/img/slider";
                                $cHandle = opendir($cFolder);
                                $i = 1;
                                $cImageExtension = array('png', 'jpg', 'jpeg', 'gif');
                                while (false !== ($file = readdir($cHandle))) {
                                    $fileAndExt = explode('.', $file);
                                    if (in_array(end($fileAndExt), $cImageExtension)) {
                                        //Remove Extension
                                        $cName = str_replace($cImageExtension, " ", $file);
                                        ?>
                                        <img src="app/img/slider/<?= $file ?>" alt="" title="#htmlcaption<?= $i++ ?>" />
                                        <?php
                                    }
                                }
                                ?>
                            </div>  
                        </div>
                    </div>
                    <h1 class="title"> <span> Services </span> </h1>                     
                    <div class="column one-fourth">
                        <div class="content-center-aligned">   
                            <a href="http://new-hongkongrestaurant.com/promotion-1.html" title=""> <span class="arctext" data-radius="100"> Promotion </span> <span class="rounded-img border"> <img src="images/services/promotion.jpg" alt="" title="" /> </span> </a>
                        </div>
                    </div>
                    <div class="column one-fourth">
                        <div class="content-center-aligned">   
                            <a href="restaurant.php" target="_blank" title=""> <span class="arctext" data-radius="150"> Gallery 360 </span> <span class="rounded-img border"> <img src="images/services/new-hongkong-restaurant-malang-360.jpg" alt="" title="" /> </span> </a>
                        </div>
                    </div>
                    <div class="column one-fourth">
                        <div class="content-center-aligned">   
                            <a href="galery.html" title=""> <span class="arctext" data-radius="150"> Gallery</span> <span class="rounded-img border"> <img src="images/services/new-hongkong-restaurant-malang-ballroom.jpg" alt="" title="" /> </span> </a>
                        </div>
                    </div>
                    <div class="column one-fourth last">
                        <div class="content-center-aligned">   
                            <a href="http://new-hongkongrestaurant.com/kontak-kami.html" title=""> <span class="arctext" data-radius="240"> Maps </span> <span class="rounded-img border"> <img src="images/services/maps.jpg" alt="" title="" /> </span> </a>
                        </div>
                    </div>
                    <div class="hr_invisible"> </div>
                    <h1 class="title"> <span> TOP CUISINES </span> </h1>
                    <?php
                    $dataBlog = mysql_query("SELECT * FROM article WHERE id = '102' ");
                    while ($vaBlog = mysql_fetch_array($dataBlog)) {
                        ?>
                        <div class="column one-half">
                            <div class="box-content">
                                <a href="<?= $vaBlog['id'] ?>-<?= $vaBlog['alias'] ?>.html"> <img src="<?= $vaBlog['primary_image'] ?>" alt="" title="" class="alignleft" /> </a>
                                <a href="<?= $vaBlog['id'] ?>-<?= $vaBlog['alias'] ?>.html" > <h2> <?= $vaBlog['title'] ?> </h2></a>
                                <p><?= $vaBlog['content'] ?></p>
                                <a href="<?= $vaBlog['id'] ?>-<?= $vaBlog['alias'] ?>.html" title="Read More" class="tooltip-top readmore"> </a> 
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $dataBlog = mysql_query("SELECT * FROM article WHERE id = '101' ");
                    while ($vaBlog = mysql_fetch_array($dataBlog)) {
                        ?>
                        <div class="column one-half last">
                            <div class="box-content">
                                <a href="berita/<?= $vaBlog['id'] ?>-<?= $vaBlog['alias'] ?>.html"> <img src="<?= $vaBlog['primary_image'] ?>" alt="" title="" class="alignleft" /> </a>
                                <a href="berita/<?= $vaBlog['id'] ?>-<?= $vaBlog['alias'] ?>.html" > <h2> <?= $vaBlog['title'] ?> </h2></a>
                                <p>  <?= $vaBlog['content'] ?></p>
                                <a href="berita/<?= $vaBlog['id'] ?>-<?= $vaBlog['alias'] ?>.html" class="tooltip-top readmore"> </a> 
                            </div>
                        </div>
                    <?php } ?>
                    <div class="hr_invisible"> </div>
                </div>
            </div>
            <?php include'container/footer.php'; ?>
        </div>
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.2.1.js"></script>
        <script type="text/javascript" src="js/jquery.arctext.js"></script>
        <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
        <script src="js/responsive-nav.js" type="text/javascript"></script>
        <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("span.arctext").each(function () {
                    $(this).arctext({radius: $(this).attr('data-radius')});
                });
            });
        </script>
        <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
        <script src="js/jquery.tipTip.minified.js" type="text/javascript"></script>
        <script type='text/javascript' src="js/spa.custom.js"></script>
    </body>
</html>
