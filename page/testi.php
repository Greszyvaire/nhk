<!-- ** Main** -->


<!-- **Breadcrumb** -->

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
            if (isset($_POST['booknow'])) {
                $nama = (!empty($_POST['cNama'])) ? $_POST['cNama'] : "";
                $email = (!empty($_POST['cEmail'])) ? $_POST['cEmail'] : "";
                $pesan = (!empty($_POST['cPesan'])) ? $_POST['cPesan'] : "";
                if ($_SESSION["Captcha"] != $_POST["nilaiCaptcha"]) {
                    echo "<script> alert ('Kode Capta Anda Salah')</script> ";
                    echo "<script>window.location ='testimoni-1.html' ;   </script>";
                } else {
                    mysql_query("INSERT INTO testi(nama,pesan,email,status) VALUES('" . $nama . "','" . $pesan . "','" . $email . "','0')")or die(mysql_error());
                    echo "<script> alert ('TERIMA KASIH SUDAH MEMBERIKAN TESTIMONI, tunggu beberapa saat kami akan mereview testimoni Anda dan akan segera mempublikasinya')</script> ";
                    echo "<script>window.location ='testimoni-1.html' ;   </script>";
                }
            }
            ?>


            <div class="hr_invisible"> </div>
            <h1 class="title"> <span> Testimoni Anda </span> </h1>
            <?php
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $start_from = ($page - 1) * 3;
//        $sql = "SELECT * FROM article ORDER BY tile ASC LIMIT $start_from, 3";
            $A = mysql_query("SELECT * FROM testi where status='1' ORDER BY id DESC LIMIT $start_from, 3");

            while ($data = mysql_fetch_array($A)) {
                ?> 
                <blockquote style="  width: 87%;">
                    <span> <?= $data['email'] ?> - <?= $data['nama'] ?></span><br>                              
                    <?= $data['pesan'] ?>
                    <br>
                </blockquote>
            <?php } ?>
           <?php
        $sql = mysql_query("SELECT COUNT(id) FROM testi where status='1' ");
        $row = mysql_fetch_row($sql);
        $total_records = $row[0];
        $total_pages = ceil($total_records / 3);
//print_r($total_pages);
        ?>
        <div class = "pagination">
            <ul>
                <?php
                echo'';
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($_GET["page"] == $i) {
                        $warna = 'black';
                    } else {
                        $warna = '';
                    }
                    echo " <li > <a href='testimoni-" . $i . ".html' style='background: " . $warna . ";'>" . $i . "</a> </li>";
                };
                ?>
            </ul>

        </div><!--**Pagination - End** -->
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

    </div> 
</div>
<!-- **Main Container - End** -->

