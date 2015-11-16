

<!-- **Main Container** -->
<div class="main-container">

    <!-- **Content Full Width** -->
    <div class="content content-full-width"> 

        <h1 class="title"> <span> Contact Us </span> </h1>


        <div class="hr_invisible"> </div>

        <div class="column two-third">
            <div id="ajax_message"></div>
            <form id="booknow-form" method="post" class="booknow-form">
                <p>
                    <label> Nama Anda <span class="required"> * </span> </label>
                    <input name="cNama" type="text" required/>
                </p>
                <p>
                    <label> Telepon <span class="required"> * </span> </label>
                    <input name="cPhone" type="text" required/>
                </p>
                <p>
                    <label> Email <span class="required"> * </span> </label>
                    <input name="cEmail" type="text" required/>
                </p>
                <p>
                    <label> Pesan  <span class="required"> * </span> </label>
                    <textarea name="cPesan" required>
                            
                    </textarea>
                </p>

                <p class="submit">
                    <input name="booknow" type="submit" value="KIRIM" />
                </p>                    
            </form> 
            <?php
            if (isset($_POST['booknow'])) {
                $nama = (!empty($_POST['cNama'])) ? $_POST['cNama'] : "";
                $tlp = (!empty($_POST['cPhone'])) ? $_POST['cPhone'] : "";
                $email = (!empty($_POST['cEmail'])) ? $_POST['cEmail'] : "";
                $pesan = (!empty($_POST['cPesan'])) ? $_POST['cPesan'] : "";
                $to = "info@new-hongkongrestaurant.com";
                $header = "From: $email";
                @mail($to, $nama, $pesan, $header);
                echo "<script> alert ('Pesan Anda Sudah Terkirim , Mohon Menunggu balasan')</script> ";
                echo "<script>window.location ='action.php?id=testimoni' ;   </script>";
            }
            ?>
            <div class="hr_invisible"> </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1693919793233!2d112.6290799!3d-7.981435399999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822860d58d3%3A0x8debbc7f77565d86!2sNew+Hongkong!5e0!3m2!1sid!2sid!4v1443860328935" width="630" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="hr_invisible"> </div>
        </div>
        <div class="column one-third last">    
            <div class="booknow-page">
                <h1> Contact Details </h1>  
                <ul class="contact-details">   
                    <li> <a href="mailto:info@new-hongkongrestaurant.com" title=""> info@new-hongkongrestaurant.com </a></li>
                    <li> (0341) - 362 683</li>  
                    <li> Jl. A.R. Hakim 7-11, Malang, Jawa Timur</li>                   
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
