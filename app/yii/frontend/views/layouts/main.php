<!DOCTYPE html>
<?php

use common\models\Article;
use common\models\ArticleCategory;
?>
<html>
    <head>
        <title>Pressroom - Responsive News &amp; Magazine Template</title>
        <!--meta-->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="keywords" content="Medic, Medical Center" />
        <meta name="description" content="Responsive Medical Health Template" />
        <!--style-->
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/superfish.css">
        <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.qtip.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/menu_styles.css">
        <link rel="stylesheet" type="text/css" href="css/animations.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/odometer-theme-default.css">
        <link rel="shortcut icon" href="img/favicon.ico">
    </head>
    <body>
        <div class="site_container">

            <div class="header_top_bar_container clearfix">
                <div class="header_top_bar">
                    <form class="search" action="search.html" method="get">
                        <input type="text" name="s" placeholder="Search..." value="Search..." class="search_input hint">
                        <input type="submit" class="search_submit" value="">
                    </form>
                    <!--<ul class="social_icons dark clearfix">
                    <ul class="social_icons colors clearfix">-->
                    <ul class="social_icons clearfix">
                        <li>
                            <a href="mailto:contact@pressroom.com" class="social_icon mail" title="mail">
                                &nbsp;
                            </a>
                        </li>
                    </ul>
                    <div class="latest_news_scrolling_list_container">

                        <ul>
                            <li class="category">HEADLINES</li>
                            <li class="left"><a href="#"></a></li>
                            <li class="right"><a href="#"></a></li>
                            <?php
                            $headlines = Article::find()->where(['publish' => 1])->orderBy('created DESC')->limit(3)->all();

                            foreach ($headlines as $vals) {
                                ?>

                                <li class="posts">
                                    <ul class="latest_news_scrolling_list">
                                        <li style=>
                                            <a href="post.html" title="<?= $vals->title ?>"><?= $vals->title ?></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="date">
                                    <abbr title="<?= $vals->created ?>" class="timeago current"><?= $vals->created ?></abbr>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="header_container">
                <div class="header clearfix">
                    <div class="logo">
                        <img src="img/logo.png"/>
                        <h1><a href="/index.html" title="BKD Sampang"></a></h1>
                        <h4>BADAN KEPEGAWAIAN DAERAH<br/>Kabupaten Sampang</h4>
                    </div>
                </div>
            </div>
            <div class="menu_container clearfix">
                <nav>
                    <ul class="sf-menu">
                        <li class="selected">
                            <a href="/index.html" title="Home">
                                Home
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="#" title="Pages">
                                Profil
                            </a>
                            <ul>
                                <li>
                                    <a href="about.html" title="About Style 1">
                                        Tentang Kami
                                    </a>
                                </li>
                                <li>
                                    <a href="about_2.html" title="About Style 2">
                                        Visi & Misi
                                    </a>
                                </li>
                                <li>
                                    <a href="default.html" title="Default">
                                        Struktur Organisasi
                                    </a>
                                </li>
                                <li>
                                    <a href="404.html" title="404 Not Found">
                                        Kepala BKD
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="Mega Menu">
                                Persyaratan
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="#" title="Post Formats">
                                Layanan
                            </a>
                            <ul>
                                <li>
                                    <a href="post.html" title="Post Default">
                                        Kepala Badan
                                    </a>
                                </li>
                                <li>
                                    <a href="post.html" title="Post Default">
                                        Kesekretariatan
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="blog.html" title="Blog With Right Sidebar">
                                                Bagian Umum
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog_left_sidebar.html" title="Blog With Left Sidebar">
                                                Bagian Keuangan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog_left_sidebar.html" title="Blog With Left Sidebar">
                                                Bagian Program
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="blog.html" title="Blog">
                                Berita
                            </a>
                        </li>
                        <li>
                            <a href="authors.html" title="Authors">
                                Galeri
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Categories">
                                Download
                            </a>
                        </li>
                        <li>
                            <a href="contact.html" title="Contact">
                                Kontak
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="mobile_menu_container">
                    <a href="#" class="mobile-menu-switch">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </a>
                    <div class="mobile-menu-divider"></div>
                    <nav>
                        <ul class="mobile-menu">
                            <li class="submenu selected">
                                <a href="home.html" title="Home">
                                    Home
                                </a>
                                <ul>
                                    <li>
                                        <a href="home.html" title="Home Style 1">
                                            Home Style 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="home_2.html" title="Home Style 2">
                                            Home Style 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="home_3.html" title="Home Style 3">
                                            Home Style 3
                                        </a>
                                    </li>
                                    <li>
                                        <a href="home_4.html" title="Home Style 3">
                                            Home Style 4
                                        </a>
                                    </li>
                                    <li>
                                        <a href="home_5.html" title="Home Style 5">
                                            Home Style 5
                                        </a>
                                    </li>
                                    <li>
                                        <a href="home_6.html" title="Home Style 6">
                                            Home Style 6
                                        </a>
                                    </li>
                                    <li class="selected">
                                        <a href="home_7.html" title="Home Style 7">
                                            Home Style 7
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="about.html" title="Pages">
                                    Pages
                                </a>
                                <ul>
                                    <li>
                                        <a href="about.html" title="About Style 1">
                                            About Style 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about_2.html" title="About Style 2">
                                            About Style 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="default.html" title="Default">
                                            Default
                                        </a>
                                    </li>
                                    <li>
                                        <a href="404.html" title="404 Not Found">
                                            404 Not Found
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="post.html" title="Post Formats">
                                    Post Formats
                                </a>
                                <ul>
                                    <li>
                                        <a href="post.html" title="Post Default">
                                            Post Default
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_gallery.html" title="Post Gallery">
                                            Post Gallery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_small_image.html" title="Post Small Image">
                                            Post Small Image
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_video.html" title="Post Video YouTube">
                                            Post Video Youtube
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_video_2.html" title="Post Video Vimeo">
                                            Post Video Vimeo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_soundcloud.html" title="Post Soundcloud">
                                            Post Soundcloud
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_review.html" title="Post Review Style 1">
                                            Post Review Style 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_review_2.html" title="Post Review Style 2">
                                            Post Review Style 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_quote.html" title="Post Quote Style 1">
                                            Post Quote Style 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post_quote_2.html" title="Post Quote Style 2">
                                            Post Quote Style 2
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="blog.html" title="Blog">
                                    Blog
                                </a>
                                <ul>
                                    <li>
                                        <a href="blog_small_slider.html" title="Blog Small Slider">
                                            Blog Small Slider
                                        </a>
                                    </li>
                                    <li class="submenu">
                                        <a href="blog.html" title="Blog 1 column">
                                            Blog 1 Column
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="blog.html" title="Blog With Right Sidebar">
                                                    Blog With Right Sidebar
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog_left_sidebar.html" title="Blog With Left Sidebar">
                                                    Blog With Left Sidebar
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="blog_2_columns.html" title="Blog 2 columns">
                                            Blog 2 Columns
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="blog_2_columns.html" title="Right Sidebar">
                                                    Right Sidebar
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog_2_columns_left_sidebar.html" title="Left Sidebar">
                                                    Left Sidebar
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog_3_columns.html" title="Blog 3 Columns">
                                            Blog 3 Columns
                                        </a>
                                    </li>
                                    <li>
                                        <a href="search.html?s=Maecenas+Mauris" title="Search Page Template">
                                            Search Page Template
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="authors.html" title="Authors">
                                    Authors
                                </a>
                                <ul>
                                    <li>
                                        <a href="authors.html" title="Authors List">
                                            Authors List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="author.html" title="Author Single">
                                            Author Single
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="category_health.html" title="Categories">
                                    Categories
                                </a>
                                <ul>
                                    <li>
                                        <a href="category_health.html" title="Health">
                                            Health
                                        </a>
                                    </li>
                                    <li>
                                        <a href="category_science.html" title="Science">
                                            Science
                                        </a>
                                    </li>
                                    <li>
                                        <a href="category_sports.html" title="Sports">
                                            Sports
                                        </a>
                                    </li>
                                    <li>
                                        <a href="category_world.html" title="World">
                                            World
                                        </a>
                                    </li>
                                    <li>
                                        <a href="category_lifestyle.html" title="Lifestyle">
                                            Lifestyle
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="contact.html" title="Contact">
                                    Contact
                                </a>
                                <ul class="expand_left_contact">
                                    <li>
                                        <a href="contact.html" title="Contact Style 1">
                                            Contact Style 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact_2.html" title="Contact Style 2">
                                            Contact Style 2
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>			
            <div class="page">
                <div class="page_layout clearfix">
                    <div class="row page_margin_top">
                        <div class="column column_2_3">
                            <ul class="small_slider">
                                <?php
                                $slider = Article::find()->where(['publish' => 1])->orderBy('created DESC')->limit(7)->all();
//                                Yii::error($slider);
                                foreach ($slider as $val) {
                                    $category = ArticleCategory::find()->where(['id' => $val->article_category_id])->one();
                                    ?>
                                    <li class="slide">
                                        <a href="post.html" title=".<?= $val->title ?>.">
                                            <img src='img/samples/690x450/image_09.jpg' alt=".<?= $val->title ?>.">
                                        </a>
                                        <div class="slider_content_box">
                                            <ul class="post_details simple">
                                                <li class="category"><a href="category_health.html" title="<?= strtoupper($category->name); ?>"><?= strtoupper($category->name); ?></a></li>
                                                <li class="date">
                                                    <?= $val->created ?>
                                                </li>
                                            </ul>
                                            <h2><a href="post.html" title="<?= $val->title ?>"><?= $val->title ?></a></h2>
                                            <p class="clearfix">
                                                <?= substr($val->content, 0, 100); ?>
                                            </p>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                            <div class='slider_posts_list_container'>
                            </div>
                            <h4 class="box_header page_margin_top_section">BERITA POPULER</h4>
                            <div class="row">
                                <ul class="blog column column_1_2">
                                    <li class="post">
                                        <a href="post_small_image.html" title="Nuclear Fusion Closer to Becoming a Reality">
                                            <img src='img/samples/330x242/image_01.jpg' alt='img'>
                                        </a>
                                        <h2 class="with_number">
                                            <a href="post_small_image.html" title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to Becoming a Reality</a>
                                            <a class="comments_number" href="post_small_image.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
                                        </h2>
                                        <ul class="post_details">
                                            <li class="category"><a href="category_world.html" title="WORLD">WORLD</a></li>
                                            <li class="date">
                                                10:11 PM, Feb 02
                                            </li>
                                        </ul>
                                        <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
                                        <a class="read_more" href="post_small_image.html" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
                                    </li>
                                    <li class="post">
                                        <a href="post_quote_2.html" title="High Altitudes May Aid Weight Control">
                                            <img src='img/samples/330x242/image_02.jpg' alt='img'>
                                        </a>
                                        <h2 class="with_number">
                                            <a href="post_quote_2.html" title="High Altitudes May Aid Weight Control">High Altitudes May Aid Weight Control</a>
                                            <a class="comments_number" href="post_quote_2.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
                                        </h2>
                                        <ul class="post_details">
                                            <li class="category"><a href="category_health.html" title="HEALTH">HEALTH</a></li>
                                            <li class="date">
                                                10:11 PM, Feb 02
                                            </li>
                                        </ul>
                                        <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
                                        <a class="read_more" href="post_quote_2.html" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
                                    </li>
                                </ul>
                                <ul class="blog column column_1_2">
                                    <li class="post">
                                        <a href="post.html" title="Built on Brotherhood, Club Lives Up to Name">
                                            <img src='img/samples/330x242/image_04.jpg' alt='img'>
                                        </a>
                                        <h2 class="with_number">
                                            <a href="post.html" title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood, Club Lives Up to Name</a>
                                            <a class="comments_number" href="post.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
                                        </h2>
                                        <ul class="post_details">
                                            <li class="category"><a href="category_science.html" title="SCIENCE">SCIENCE</a></li>
                                            <li class="date">
                                                10:11 PM, Feb 02
                                            </li>
                                        </ul>
                                        <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
                                        <a class="read_more" href="post.html" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
                                    </li>
                                    <li class="post">
                                        <a href="post_video.html" title="Struggling Nuremberg Sack Coach Verbeek">
                                            <span class="icon video"></span>
                                            <img src='img/samples/330x242/image_03.jpg' alt='img'>
                                        </a>
                                        <h2 class="with_number">
                                            <a href="post_video.html" title="Struggling Nuremberg Sack Coach Verbeek">Struggling Nuremberg Sack Coach Verbeek</a>
                                            <a class="comments_number" href="post_video.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
                                        </h2>
                                        <ul class="post_details">
                                            <li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
                                            <li class="date">
                                                10:11 PM, Feb 02
                                            </li>
                                        </ul>
                                        <p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
                                        <a class="read_more" href="post_video.html" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="column column_1_3">
                            <h4 class="box_header">Sambutan Kepala BKD</h4>
                            <ul class="blog small_margin clearfix">
                                <li class="post">
                                    <a href="post.html" title="The Public Health Crisis Hiding in Our Food">
                                        <img src='img/samples/510x187/image_12.jpg' alt='img'>
                                    </a>
                                    <div class="post_content">
                                        <h5>
                                            <a href="post.html" title="The Public Health Crisis Hiding in Our Food">The Public Health Crisis Hiding in Our Food</a>
                                        </h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="category_lifestyle.html" title="LIFESTYLE">LIFESTYLE</a></li>
                                            <li class="date">
                                                10:11 PM, Feb 02
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <h4 class="box_header page_margin_top_section">DOKUMEN TERBARU</h4>
                            <ul class="list">
                                <li class="bullet style_1"><a href="post.html" title="Climate Change Debate While Britain Floods">Climate Change Debate While Britain Floods</a></li>
                                <li class="bullet style_1"><a href="post.html" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a></li>
                                <li class="bullet style_1"><a href="post.html" title="Supreme Court Skeptical Of Ohio Law">Supreme Court Skeptical Of Ohio Law</a></li>
                                <li class="bullet style_1"><a href="post_small_image.html" title="Struggling Nuremberg Sack Coach Verbeek">Struggling Nuremberg Sack Coach Verbeek</a></li>
                                <li class="bullet style_1"><a href="post.html" title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to Becoming a Reality</a></li>
                            </ul>

                            <h4 class="box_header page_margin_top_section">PERSYARATAN</h4>
                            <div class="vertical_carousel_container clearfix">


                                <?php
                                $syarat = Article::find()->where(['publish' => 1, 'article_category_id' => 51])->orderBy('created DESC')->all();
                                foreach ($syarat as $vals) {
                                    ?>
                                    <ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">

                                        <li class="post">
                                            <a href="post_gallery.html" title="<?= $vals->title; ?>">
                                                <span class="icon small gallery"></span>
                                                <img src='img/samples/100x100/image_06.jpg' alt='img'>
                                            </a>
                                            <div class="post_content">
                                                <h5>
                                                    <a href="post_gallery.html" title="<?= $vals->title; ?>"><?= $vals->title; ?></a>
                                                </h5>

                                                <ul class="post_details simple">
                                                    <li class="date">
                                                        <?= $vals->created; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_container">
                <div class="footer clearfix">
                    <div class="row">
                        <div class="column column_3_4">
                            <ul class="footer_menu">
                                <li>
                                    <h4><a href="category_world.html" title="World">BKD Kab. Sampang</a></h4>
                                </li>
                            </ul>
                        </div>
                        <div class="column column_1_4">
                            <a class="scroll_top" href="#top" title="Scroll to top">Top</a>
                        </div>
                    </div>
                    <div class="row copyright_row">
                        <div class="column column_2_3">
                            Jl. KH.Wachid Hasyim 43, Sampang, Jawa Timur
                            Telp:(+62-323) 323451<br/>
                            Email: infobkd@sampangkab.go.id
                        </div>
                        <div class="column column_1_3">
                            <ul class="footer_menu">
                                <li>
                                    <h6><a href="about.html" title="About">Copyright &copy; 2015</a></h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background_overlay"></div>
        <!--js-->
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.11.1.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
        <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript" src="js/jquery.transit.min.js"></script>
        <script type="text/javascript" src="js/jquery.sliderControl.js"></script>
        <script type="text/javascript" src="js/jquery.timeago.js"></script>
        <script type="text/javascript" src="js/jquery.hint.js"></script>
        <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="js/jquery.qtip.min.js"></script>
        <script type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/odometer.min.js"></script>
    </body>
</html>