<div id="footer">
        <div class="main-container">
        
            <!-- **Recent Entries** -->
            <div class="column one-fourth">
                <div class="widget widget_recent_entries">
                    <h2 class="widgettitle"> <span> Latest Posts </span> </h2>
                    <ul class="contact-details">
                         <?php 
                        $A = mysql_query("SELECT * FROM article ORDER BY id DESC LIMIT 3");
                        while ($data = mysql_fetch_array($A)) 
                        {
                            ?>
                        <li> 
                            <p> <a href="berita/<?=$data['id']?>-<?=$data['alias']?>.html"> <h4><?=$data['title']?></h4> </a> </p> 
                            <p><?=substr(strip_tags($data['content']), 0 , 50)?>.....</p>
                        </li>  
                        <?php } ?>
                    </ul>  
                </div>
            </div><!-- **Recent Entries - End** -->

             <!-- **Testimonials** -->
            <div class="column one-fourth">
                <div class="widget">
                    <h2 class="widgettitle"> <span> Testimonials </span> </h2>
                    
                    <div class="testimonial-skin-carousel">
                        <ul class="testimonial-carousel">
                        <?php 
                        $A = mysql_query("SELECT * FROM testi ORDER BY id DESC LIMIT 3");
                        while ($data = mysql_fetch_array($A)) 
                        {
                        ?>
                            <li>
                                <blockquote>                                
                                    <?= $data['pesan']?>
                                    <span> <?= $data['email']?> - <?=$data['nama']?></span>
                                </blockquote>
                            </li>
                        <?php } ?>
                        </ul> 
                    </div>
                    
                </div>
            </div><!-- **Testimonials - End** -->
            
             <!-- **Contact Us** -->
            <div class="column one-fourth ">
                <div class="widget">
                    <h2 class="widgettitle"> <span> Contact Us </span> </h2>
                    <p>Kesempatan berkarir dengan kami New Hongkong Restaurant 
                    Malang didukung dengan sistem kerja yang profesional, dan manajemen yang kompeten.</p>
                    <ul class="contact-details">
                        <li> <span class="mail"> </span> <p> <a href="mailto:info@new-hongkongrestaurant.com" title=""> info@new-hongkongrestaurant.com </a> </p> </li>
                        <li> <span class="phone"> </span> <p> ( 0341 ) - 362683 </p> </li>  
                        <li> <span class="address"> </span> <p> Jl. A.R. Hakim 7-11, Malang </p> </li>                
                    </ul>                                      
                </div>
                <div class="widget social-widget">
                    <h2> <span> We're Social </span> </h2>
                    <ul>
                        <li> 
                            <a href="" title=""> 
                                <img src="/images/facebook-hover.png" alt="image" title="" />
                                <img src="/images/facebook.png" alt="image" title="" />                                
                            </a> 
                        </li>
                        <li> 
                            <a href="" title=""> 
                                <img src="/images/twitter-hover.png" alt="image" title="" />
                                <img src="/images/twitter.png" alt="image" title="" />                                
                            </a> 
                        </li>
                        <li> 
                    </ul>  
                </div>
            </div><!-- **Contact Us - End** -->

            <!-- **Resources** -->
            <div class="column one-fourth last">
                <div class="widget">
                    <h2 class="widgettitle"> <span> Working Hours </span> </h2>
                    <p style="text-align: right;">Senin - Sabtu :<br>
                        10.00-15.00 &amp; 18.00-21.30</p>
                        <p style="text-align: right;">Minggu :<br>
                        08.00-15.00 &amp; 18.00-21.30</p>
                        <p style="text-align: right;">Hari Rabu libur.
                        </p>
                </div>
            </div><!-- **Resources - End** -->
            
           
           
        
        
        </div>
    </div>
