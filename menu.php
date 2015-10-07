    <?php 
    include 'include/koneksi.php';
    function url($Id){
    	$A = mysql_query("SELECT * FROM article WHERE id = '".$Id."' ");
    	$B = mysql_fetch_array($A);
    	$cUrl = $B['id'];
    	return $cUrl ;
    }
    ?>
         <div id="top-menu">
               <ul class="menu">
                <li class="current_page_item"> <a href="<?=$cServer?>home" title=""> <span> Its home </span> HOME </a></li> 
                <li> <a href="redirect.php?id=<?=url('110')?>" title=""> <span> Who we are </span> ABOUT US </a></li>
                <li> <a href="#" title=""> <span> Our Facility </span> FACILITY </a> 
                    <ul>
                        <li> <a href="redirect.php?id=<?=url('105')?>" title=""> FUNCTION ROOM </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('106')?>" title=""> MEMBER CARD </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('107')?>" title=""> FREE WIFI </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('108')?>" title=""> VIP ROOM </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('109')?>" title=""> SMOKING ROOM </a>  </li>
                    </ul>  
                </li>
                 <li> <a href="#" title=""> <span> Food  </span> MENU </a> 
                    <ul>
                        <li> <a href="redirect.php?id=<?=url('101')?>" title=""> DIMSUM </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('103')?>" title=""> BARBEQUE </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('104')?>" title=""> LIVE SEAFOOD  </a>  </li>
                        <li> <a href="redirect.php?id=<?=url('102')?>" title=""> CHINESE CUISINE </a>  </li>
                    </ul>  
                </li>
                <li> <a href="redirect.php?id=<?=url('111')?>" title=""> <span> Our Program </span> PROMOTION </a></li>
                  <li> <a href="gallery.php" title=""> <span> Photo & Video  </span> Gallery </a> 
                    
                </li>
                <li> <a href="action.php?id=testi" title=""> <span> Testimoni  </span> Testimoni </a> </li>
                <li> <a href="#" title=""> <span> Have a Problem ?  </span> Contact Us </a> 
                    <ul>
                        <li> <a href="action.php?id=testimoni" title=""> Hubungi Kami </a>  </li>
                        <li> <a href="action.php?id=lokasi" title=""> Career </a>  </li>
                    </ul>  
                </li>
            </ul>           
        </div>