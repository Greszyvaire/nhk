<!-- ** Main** -->


<!-- **Breadcrumb** -->
<div class="breadcrumb">
    <div class="container">
        <a href="#" title=""> Home </a>
        <span class="arrow"> </span>
        <span class="current-crumb"> List Promotion</span>
    </div>  <!-- **Breadcrumb - End** -->           
</div>

<!-- **Main Container** -->
<div class="main-container">

    <!-- **Content Full Width** -->
    <div class="content content-full-width">  
        <?php
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };
        $start_from = ($page - 1) * 3;
//        $sql = "SELECT * FROM article ORDER BY tile ASC LIMIT $start_from, 3";
        $A = mysql_query("SELECT * FROM article where publish='1' and article_category_id=12 ORDER BY id DESC LIMIT $start_from, 3");

        while ($data = mysql_fetch_array($A)) {
            ?> 

         <div class="blog-post">
                <div class="post-title">
                    <h2> 
                        <a href="berita/<?= $data['id'] ?>-<?= $data['alias'] ?>.html" title="<?= $data['title'] ?>">
                            <?= $data['title'] ?>
                        </a> 
                    </h2>
                    <a href="berita/<?= $data['id'] ?>-<?= $data['alias'] ?>.html" class="tooltip-top readmore" title="Read More"> </a>
                    <span class="arrow"> </span>
                </div>

                <div class="post-details">                
                    <div class="date">
                        <span class="day"> <?=date('d',$data['modified'])?> </span>
                        <span class="date-group">
                            <span class="month"> <?=date('M',$data['modified'])?> </span>
                            <span class="year"> <?=date('Y',$data['modified'])?> </span>
                        </span>
                        <span class="arrow"> </span> 
                    </div>
                </div>

                <div class="post-content">
                    <p> 
                   <?= substr(strip_tags($data['content']), 0, 500) ?>.....
                    </p>
                </div> 
            </div>

            <?php
        };
        ?> 
        <?php
        $sql = mysql_query("SELECT COUNT(title) FROM article where publish='1' and article_category_id=12");
        $row = mysql_fetch_row($sql);
        $total_records = $row[0];
        $total_pages = ceil($total_records / 3);
//print_r($total_pages);
        ?>
        <div class = "pagination">
<!--            <a href = "" title = "" class = "prev-post"> <span> Prev Post </span> </a>
            <a href = "" title = "" class = "next-post"> <span> Next Post </span> </a>-->
            <ul>
                <?php
                echo'';
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($_GET["page"] == $i) {
                        $warna = 'black';
                    } else {
                        $warna = '';
                    }
                    echo " <li > <a href='promotion-" . $i . ".html' style='background: " . $warna . ";'>" . $i . "</a> </li>";
                };
                ?>
            </ul>

        </div><!--**Pagination - End** -->


    </div> <!--**Content Full Width - End** -->


</div><!--**Main Container - End** -->