<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php
 $cId      = (!empty($_GET['id'])) ? $_GET['id'] : "" ;
 if($cId == 'blog'){
     $title = 'Promotion';
 }elseif($cId == 'testi'){
     $title = 'Testimonial';
 }else{
     $title = 'Contact Us';
 }
?>
<title> <?php echo $title ?> | New Hongkong Restaurant Malang</title>

<!-- **Favicon** -->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

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
        
        <!-- **Searchform - End** -->
        
    </div>
</div><!-- **Header - End** -->


<?php include 'container/slider.php'; ?>
<br>
<!-- ** Main** -->
<!-- ** Main** -->

    <!-- **Breadcrumb** -->
   
   
        
        
            <?php 
           
            include"page/".$cId.".php";
            ?>
                
        
 
    <!-- ** Footer** -->
    <?php include'container/footer.php'; ?>
    <!-- **Footer - End** -->
    
    <!-- **Footer Bottom** -->
    

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
