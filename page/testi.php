<!-- ** Main** -->


    <!-- **Breadcrumb** -->
    <div class="breadcrumb">
        <div class="container">
            <a href="" title=""> Home </a>
            <span class="arrow"> </span>
            <span class="current-crumb"> Testimoni </span>
        </div>  <!-- **Breadcrumb - End** -->       
    </div>
    
    <!-- **Main Container** -->
    <div class="main-container">
    
        <!-- **Content Full Width** -->
        <div class="content content-full-width"> 
        
            <h1 class="title"> <span> Testimoni </span> </h1>
            
            <div class="column two-third">
                <div id="ajax_message"></div>
                <form id="booknow-form" method="post" class="booknow-form">
                    <p>
                        <label> Nama Anda <span class="required"> * </span> </label>
                        <input name="cNama" type="text" required/>
                    </p>
                    <p>
                        <label> Email <span class="required"> * </span> </label>
                        <input name="cEmail" type="text" required/>
                    </p>
                    <p>
                        <label> Testimoni  <span class="required"> * </span> </label>
                        <textarea name="cPesan" required>
                            
                        </textarea>
                    </p>
                     <p>
                     <label> Kode Captha  <span class="required"> </span> </label>
                        <img src="page/gambar.php" alt="gambar">
                    </p>
                     <p>
                        <label> Captha<span class="required"> * </span> </label>
                        <input name="nilaiCaptcha" value="" type="text" />
                    </p>
                    <p class="submit">
                        <input name="booknow" type="submit" value="KIRIM" />
                    </p>                    
                </form> 
                <?php

                    if(isset($_POST['booknow'])){
                    $nama= (!empty($_POST['cNama'])) ? $_POST['cNama'] : "" ;
                    $email=(!empty($_POST['cEmail'])) ? $_POST['cEmail'] : "" ;
                    $pesan=(!empty($_POST['cPesan'])) ? $_POST['cPesan'] : "" ;
                        if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
                        echo "<script> alert ('Kode Capta Anda Salah')</script> ";
                        echo "<script>window.location ='testimoni.html' ;   </script>";
                        }else{
                        mysql_query("INSERT INTO testi(nama,pesan,email) VALUES('".$nama."','".$pesan."','".$email."')")or die(mysql_error());
                        echo "<script> alert ('TERIMA KASIH SUDAH MEMBERIKAN TESTIMONI, tunggu beberapa saat kami akan mereview testimoni Anda dan akan segera mempublikasinya')</script> ";
                        echo "<script>window.location ='testimoni.html' ;   </script>";
                        }
                    }  
                ?>


                <div class="hr_invisible"> </div>
                <h1 class="title"> <span> Testimoni Anda </span> </h1>
                    <?php 
                    $More = (!empty($_GET['more'])) ?$_GET['more'] : "" ;
                    if(empty($More)){
                    $Test = mysql_query("SELECT * FROM testi ORDER BY id DESC limit 0,2");
                    }else{
                    $Test = mysql_query("SELECT * FROM testi ORDER BY id DESC");  
                    }
                    while($data = mysql_fetch_array($Test)){
                    ?>
                        <blockquote>
                            <span> <?=$data['email']?> - <?=$data['nama']?></span><br>                              
                            <?=$data['pesan']?>
                            <br>
                         </blockquote>
                    <?php } ?>
                    <br/><br/>
                    <?php if(empty($More)){ ?> 
                   <span><a href="content.php?id=testi&more=all">Load More .. </a><span>
                   <?php } ?>
            </div>
            <div class="column one-third last">    
                <div class="booknow-page">
                   <h1> Contact Details </h1>  
                    <ul class="contact-details">   
                        <li><p> <a href="mailto:info@new-hongkongrestaurant.com" title=""> info@new-hongkongrestaurant.com </a> </p> </li>
                        <li><p> ( 0341 ) - 362683 </p> </li>  
                        <li><p> Jl. A.R. Hakim 7-11, Malang </p> </li>                   
                    </ul>
                
                    <h1> Working Hours </h1>
                    <div class="notice"> <span class="left"> Senin - Sabtu : </span> <br><span class="right">10.00-15.00 & 18.00-21.30 </span> </div>
                    <div class="notice"> <span class="left"> Minggu : </span> <br><span class="right"> 08.00-15.00 & 18.00-21.30 </span> </div>
                    <div class="notice"> <span class="left"> Rabu : </span><br> <span class="right"> LIBUR </span> </div>
                </div>          
            </div>
            
        </div> <!-- **Content Full Width - End** -->    
        
        <!-- **Newsletter** -->
        
        
    </div><!-- **Main Container - End** -->
    
