<?php 
include 'include/koneksi.php';
$Id = (!empty($_GET['id'])) ? $_GET['id'] : "" ;
$act = (!empty($_GET['more'])) ? $_GET['more'] : "" ;
$_SESSION['url']	= $Id ;
$_SESSION['act']	= $act ;
echo "<meta content=\"0;".$cServer."contact\" http-equiv=\"refresh\">" ;
?>