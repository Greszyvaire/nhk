<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php
include 'include/koneksi.php';
    $cId      = (!empty($_GET['id'])) ? $_GET['id'] : "" ;
    $Blog = mysql_query("SELECT * FROM article WHERE id = '".$cId."' ");
    $ss   = mysql_fetch_array($Blog);
//    print_r($ss);
    ?>
<title> <?php echo $ss['title'] ?> | New Hongkong Restaurant Malang </title>

<!-- **Favicon** -->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- **CSS - stylesheets** -->
<link href="/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- **Additional - stylesheets** -->
<link href="/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/nivo-slider.css" rel="stylesheet"  type="text/css" media="screen"/>

</head>

<body class="home" style="background:url('/images/top-bg.jpg')">

<!-- **Header** -->
<div id="header" >
    <div class="container">
    
        <!-- **Top-Menu** -->
        <?php include 'container/menu.php'; ?>
        <!-- **Top-Menu - End** -->
        
        <!-- **Logo** -->
        <div id="logo">
            <a href="http://new-hongkongrestaurant.com/" title=""> 
                <img src="/images/logo-kiri2.png" alt="" title="" /> 
            </a>
        </div><!-- **Logo - End** -->
        
        <!-- **Searchform** -->
        <div id="searchform" style="margin-top:16px">
               <a href="http://new-hongkongrestaurant.com/" title=""> 
                <img src="/images/logo-kanan2.png" alt="" title="" /> 
              </a>
        </div>
        <!-- **Searchform - End** -->
        
    </div>
</div><!-- **Header - End** -->

<?php
    $dataBlog = mysql_query("SELECT * FROM article WHERE id = '".$cId."' ");
    $vaBlog   = mysql_fetch_array($dataBlog);
    ?>

<!-- ** Main** -->

<!-- ** Main** -->

    <!-- **Breadcrumb** -->
    <div class="breadcrumb">
        <div class="container">
            <a href="#" title=""> Home </a>
            <span class="arrow"> </span>
            <a href="" title=""> Services </a>
            <span class="arrow"> </span>
            <span class="current-crumb"> <?=$vaBlog['title']?> </span>
        </div>  <!-- **Breadcrumb - End** -->           
    </div>
    <!-- **Main Container** -->
    <div class="main-container">
    
        <!-- **Content Full Width** -->
        <div class="content content-full-width">  
        
            <h1 class="title" style="color: currentColor"> <?=$vaBlog['title']?>  </h1>
            
            <div class="column">            
                <p> 
                <?=$vaBlog['content']?>
                </p>          
            </div>
            
            <div class="hr"> </div>
            
            <div class="clear"> </div>
            
        </div> <!-- **Content Full Width - End** -->    
        
        
    </div><!-- **Main Container - End** -->
    
    <!-- ** Footer** -->
    <?php include'container/footer.php'; ?>
    <!-- **Footer - End** -->
    
    <!-- **Footer Bottom** -->
<!--    <div class="footer-bottom"> 
        <div class="main-container">        
            <p> Copyright © 2014 New Hongkong Restaurant   </a> </p>        
        </div>
    </div> **Footer Bottom - End** -->

</div><!-- **Main - End**-->


<!-- **jQuery** -->
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="/js/jquery.arctext.js"></script>
<script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $("span.arctext").each(function(){
            $(this).arctext({radius: $(this).attr('data-radius')});
        });
    });
</script>

<script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>
<script src="/js/jquery.tipTip.minified.js" type="text/javascript"></script>
<script type='text/javascript' src="/js/spa.custom.js"></script>

</body>
</html>
