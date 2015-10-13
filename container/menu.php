<?php
include 'include/koneksi.php';
$current = $_SERVER['REQUEST_URI'];
$A = mysql_query("SELECT * FROM article ");
$B = mysql_fetch_array($A);
?>
<div id="top-menu">
    <ul class="menu">
        <li class="<?= ($current == '/home') ? "current_page_item" : ""; ?>"> <a href="<?= $cServer ?>home" title=""> <span> Its home </span> HOME </a></li> 
        <li class="<?= ($current == '/tentang-kami.html') ? "current_page_item" : ""; ?>"> <a href="/tentang-kami.html" title=""> <span> Who we are </span> ABOUT US </a></li>
        <li class="<?php if($current == '/function-room.html'){echo($current == '/function-room.html') ? "current_page_item" : "";}
         elseif($current == '/member-card.html'){echo($current == '/member-card.html') ? "current_page_item" : "";}
         elseif($current == '/free-wifi.html'){echo($current == '/free-wifi.html') ? "current_page_item" : "";}
         elseif($current == '/vip-room.html'){echo($current == '/vip-room.html') ? "current_page_item" : "";}
         elseif($current == '/smoking-room.html'){echo($current == '/smoking-room.html') ? "current_page_item" : "";}else{}
         ?>"> 
        <a href="#" title=""> <span> Our Facility </span> FACILITY </a> 
            <ul>
                <li> <a href="/function-room.html" title=""> FUNCTION ROOM </a>  </li>
                <li> <a href="/member-card.html" title=""> MEMBER CARD </a>  </li>
                <li> <a href="/free-wifi.html" title=""> FREE WIFI </a>  </li>
                <li> <a href="/vip-room.html" title=""> VIP ROOM </a>  </li>
                <li> <a href="/smoking-room.html" title=""> SMOKING ROOM </a>  </li>
            </ul>  
        </li>
        <li class="<?php if($current == '/dimsum-cuisine.html'){echo($current == '/dimsum-cuisine.html') ? "current_page_item" : "";}
         elseif($current == '/chinese-cuisine.html'){echo($current == '/chinese-cuisine.html') ? "current_page_item" : "";}
         elseif($current == '/barbaque.html'){echo($current == '/barbaque.html') ? "current_page_item" : "";}
         elseif($current == '/live-seafood.html'){echo($current == '/live-seafood.html') ? "current_page_item" : "";}else{}
         ?>"> 
        <a href="#" title=""> <span> Food  </span> MENU </a> 
            <ul>
                <li> <a href="/dimsum-cuisine.html" title=""> DIMSUM </a>  </li>
                <li> <a href="/chinese-cuisine.html" title=""> BARBEQUE </a>  </li>
                <li> <a href="/barbaque.html" title=""> LIVE SEAFOOD  </a>  </li>
                <li> <a href="/live-seafood.html" title=""> CHINESE CUISINE </a>  </li>
            </ul>  
        </li>
        <li  class="<?= ($current == '/promotion-1.html') ? "current_page_item" : ""; ?>"> <a href="/promotion-1.html" title=""> <span> Our Program </span> PROMOTION </a></li>
        <li class="<?= ($current == '/galery.html') ? "current_page_item" : ""; ?>"> <a href="/galery.html" title=""> <span> Photo & Video  </span> Gallery </a> 

        </li>
        <li class="<?= ($current == '/testimoni-1.html') ? "current_page_item" : ""; ?>"> <a href="/testimoni-1.html" title=""> <span> Testimoni  </span> Testimoni </a> </li>
        <li class="<?php if($current == '/kontak-kami.html'){echo($current == '/kontak-kami.html') ? "current_page_item" : "";}
         elseif($current == '/karir.html'){echo($current == '/karir.html') ? "current_page_item" : "";}else{}
         ?>"> 
         <a href="#" title=""> <span> Have a Problem ?  </span> Contact Us </a> 
            <ul>
                <li> <a href="/kontak-kami.html" title=""> Hubungi Kami </a>  </li>
                <li> <a href="/karir.html" title=""> Career </a>  </li>
            </ul>  
        </li>
    </ul>           
</div>