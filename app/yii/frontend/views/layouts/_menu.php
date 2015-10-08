<ul class=main-menu> 
    <?php
    $current = $_SERVER['REQUEST_URI'];
    ?>
    <li><a href="<?= Yii::$app->urlManager->createUrl('home') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('home')) ? "current" : ""; ?>">Overview</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('facility/room') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('facility/room')) ? "current" : ""; ?>">Room</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('facility/meeting-and-banquet') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('facility/meeting-and-banquet')) ? "current" : ""; ?>">Meeting & Banquet</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('facility/restaurant') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('facility/restaurant')) ? "current" : ""; ?>">Service & Facility</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('news/promotion') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('news/promotion')) ? "current" : ""; ?>">Promotion</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('gallery') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('gallery')) ? "current" : ""; ?>">Gallery</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('news/news-and-event') ?>" class="<?= ($current == Yii::$app->urlManager->createUrl('news/news-and-event')) ? "current" : ""; ?>">News & Event</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl('contact-us') ?>" class="<?= ($current ==  Yii::$app->urlManager->createUrl('contact-us')) ? "current" : ""; ?>">Contact Us</a></li>
    <li class=has-sub-menu>
        <a href=# class="<?= ($current == "home") ? "sahid" : ""; ?>">Sahid Group</a>
        <ul>
            <?php
            foreach ($sahid as $val) {
                $alias = strtolower(str_replace(" ", "-", $val->alias));
                echo '<li align="left"><a href="' . Yii::$app->urlManager->createUrl('sahid/' . $alias) . '">' . ucwords(strtolower($val->title)) . '</a></li>';
            }
            ?>
        </ul>
    </li>
</ul>