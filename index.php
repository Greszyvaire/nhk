<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title> New Hongkong Restaurant Malang | Restaurant Masakan Cina di Malang</title>

<!-- **Favicon** -->
<link href="./app/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- **CSS - stylesheets** -->
<link href="style.css" rel="stylesheet" type="text/css" media="all" />

<!-- **Additional - stylesheets** -->
<link href="responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/nivo-slider.css" rel="stylesheet"  type="text/css" media="screen"/>

</head>

<body class="home" style="background:url('images/top-bg.jpg')">

<!-- **Header** -->
<div id="header" >
    <div class="container">
    
        <!-- **Top-Menu** -->
        <?php include 'container/menu.php'; ?>
        <!-- **Top-Menu - End** -->
        
        <!-- **Logo** -->
        <div id="logo">
            <a href="http://new-hongkongrestaurant.com/" title=""> 
                <img src="images/logo-kiri2.png" alt="" title="" /> 
            </a>
        </div><!-- **Logo - End** -->
        
        <!-- **Searchform** -->
        <div id="searchform" style="margin-top:16px">
               <a href="http://crystalballroom.new-hongkongrestaurant.com/" target="_blank" title=""> 
                <img src="images/logo-kanan2.png" alt="" title="" /> 
              </a>
        </div>
        <!-- **Searchform - End** -->
        
    </div>
</div><!-- **Header - End** -->

<!-- ** Home Slider** -->
<?php include 'container/slider.php'; ?>
<!-- **Home Slider - End** -->

<!-- ** Main** -->
<div id="main">
    <!-- **Main Container** -->
    <div class="main-container">
    
        <!-- **Content Full Width** -->
        <div class="content content-full-width">
        
            <!-- **Services** -->
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
                    <a href="ballroom.php" title="" target="_blank"> <span class="arctext" data-radius="150"> Gallery 360 </span> <span class="rounded-img border"> <img src="images/services/new-hongkong-restaurant-malang-ballroom.jpg" alt="" title="" /> </span> </a>
                </div>
            </div>
            <div class="column one-fourth last">
                <div class="content-center-aligned">   
                    <a href="http://new-hongkongrestaurant.com/kontak-kami.html" title=""> <span class="arctext" data-radius="240"> Maps </span> <span class="rounded-img border"> <img src="images/services/maps.jpg" alt="" title="" /> </span> </a>
                </div>
            </div>
            <!-- **Services - End** -->
            
            <div class="hr_invisible"> </div>
            
            <!-- **Popular Procedures** -->
            <h1 class="title"> <span> TOP CUISINES </span> </h1>
            
           <?php
           
            $dataBlog = mysql_query("SELECT * FROM article WHERE id = '102' ");
            while($vaBlog   = mysql_fetch_array($dataBlog)){
            ?>
            <div class="column one-half">
                <div class="box-content">
                    <a href="berita/<?=$vaBlog['id']?>-<?=$vaBlog['alias']?>.html"> <img src="<?=$vaBlog['primary_image']?>" alt="" title="" class="alignleft" /> </a>
                    <a href="berita/<?=$vaBlog['id']?>-<?=$vaBlog['alias']?>.html" > <h2> <?=$vaBlog['title']?> </h2></a>
                    <p>  <?=$vaBlog['content']?><p>
                    <a href="berita/<?=$vaBlog['id']?>-<?=$vaBlog['alias']?>.html" title="Read More" class="tooltip-top readmore"> </a> 
                </div>
            </div>
            <?php } ?>
             <?php
            
            $dataBlog = mysql_query("SELECT * FROM article WHERE id = '101' ");
            while($vaBlog   = mysql_fetch_array($dataBlog)){
            ?>
            <div class="column one-half last">
                <div class="box-content">
                    <a href="berita/<?=$vaBlog['id']?>-<?=$vaBlog['alias']?>.html"> <img src="<?=$vaBlog['primary_image']?>" alt="" title="" class="alignleft" /> </a>
                    <a href="berita/<?=$vaBlog['id']?>-<?=$vaBlog['alias']?>.html" > <h2> <?=$vaBlog['title']?> </h2></a>
                    <p>  <?=$vaBlog['content']?></p>
                    <a href="berita/<?=$vaBlog['id']?>-<?=$vaBlog['alias']?>.html" class="tooltip-top readmore"> </a> 
                </div>
            </div>
            <?php } ?>
            <!-- **Popular Procedures - End** -->
            
            <div class="hr_invisible"> </div>
            
            
            
        </div> <!-- **Content Full Width - End** -->    
        
        <!-- **Newsletter** 
        <div id="newsletter">
            <h2> Subscribe to Newsletter </h2>
            <form action="#" method="get">
                <input name="name" type="text" onblur="this.value=(this.value=='') ? 'Enter Name' : this.value;" onfocus="this.value=(this.value=='Enter Name') ? '' : this.value;" value="Enter Name" />
                <input name="name" type="text" onblur="this.value=(this.value=='') ? 'Enter Email Address' : this.value;" onfocus="this.value=(this.value=='Enter Email Address') ? '' : this.value;" value="Enter Email Address" />
                <input name="submit" type="submit" value="Subscribe" />
            </form>
        </div><!-- **Newsletter - End** -->
        
    </div><!-- **Main Container - End** -->
    
    <!-- ** Footer** -->
    <?php include'container/footer.php'; ?>
    <!-- **Footer - End** -->
    
    <!-- **Footer Bottom** -->
<!--    <div class="footer-bottom"> 
        <div class="main-container">        
            <p> Copyright &copy; 2015 New Hongkong Restaurant   </a> </p>        
        </div>
    </div>-->
    <!-- **Footer Bottom - End** -->

</div><!-- **Main - End**-->


<!-- **jQuery** -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="js/jquery.arctext.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script src="js/responsive-nav.js" type="text/javascript"></script>
<script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("span.arctext").each(function(){
            $(this).arctext({radius: $(this).attr('data-radius')});
        });
    });
</script>

<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script src="js/jquery.tipTip.minified.js" type="text/javascript"></script>
<script type='text/javascript' src="js/spa.custom.js"></script>

</body>
</html>
