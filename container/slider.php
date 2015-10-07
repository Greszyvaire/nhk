<div id="home-slider">
    <div class="slider-container">
    
        <div class="slider-wrapper theme-default">    
            <div id="slider" class="nivoSlider">
            <?php 
                $cFolder = "images/slider";  
                $cHandle = opendir($cFolder); 
                $i = 1;  
                $cImageExtension = array('png', 'jpg', 'jpeg', 'gif');  
                while(false !== ($file = readdir($cHandle))){  
                $fileAndExt = explode('.', $file);  
                if(in_array(end($fileAndExt), $cImageExtension)){ 
                //Remove Extension
                $cName  = str_replace($cImageExtension, " ", $file); 
               
            ?>
                <img src="images/slider/<?=$file?>" alt="" title="#htmlcaption<?=$i++?>" />
            <?php 
              }
            }   
            ?>
            </div>
            <div id="htmlcaption1" class="nivo-html-caption">
            </div>
            <div id="htmlcaption2" class="nivo-html-caption">
            </div>    
            <div id="htmlcaption3" class="nivo-html-caption">
            </div>    
            <div id="htmlcaption4" class="nivo-html-caption">
            </div>    
                    
        </div>
        
    </div>
</div>