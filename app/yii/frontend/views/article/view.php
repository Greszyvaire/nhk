<?php
$this->title = $model->title;
?>
<section id="internal-title" class="container" data-background="parallax" style="background-attachment: fixed; background-position: 50% 12px;">
    <h1><?= $this->title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->urlManager->createUrl('home'); ?>">Home</a></li> 
        <li class="active"><?php echo $this->title; ?></li> 
    </ol> 
</section>
<div id="post-pages" class="container padding-bottom">
    <section id="single-post" class="col-md-12">
        <div class="post-boxes" style="border-bottom: none;"> 

            <div class="post-details"> 
                <div class="post-date"><?php echo date("d M Y", strtotime($model->created)); ?></div>
                <div class="post-author">By <a href="#"><?php echo $model->user->username ?></a></div>
            </div> 
            <h4 class="post-title"><a href="#"><?php echo $model->title; ?></a></h4>
            <div class="post-short-desc" style="text-align: justify">
                <a href="#">
                    <img src="<?php echo $model->imgBig; ?>" alt="<?php echo $model->title ?>" class="alignleft size-full" style="max-width: 400px;">
                </a>
                <?php
                echo $model->content;
                ?>    
            </div> 
            <div style="float:right;">
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.3&appId=825402027535189";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <table>
                    <tr>
                        <td style="padding: 10px">
                            <div class="fb-share-button" 
                                 data-href="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" 
                                 data-layout="box_count">
                            </div>
                        </td>
                        <td style="padding-top: 6px;">
                            <a class="twitter-share-button"
                               href="https://twitter.com/share"
                               data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                               data-text="<?= $model->title . ' - Indomobilecell.com' ?>"
                               data-count="vertical">
                                Tweet
                            </a>
                            <script>
                                window.twttr = (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
                                    if (d.getElementById(id))
                                        return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "https://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                    t._e = [];
                                    t.ready = function(f) {
                                        t._e.push(f);
                                    };
                                    return t;
                                }(document, "script", "twitter-wjs"));
                            </script>
                        </td>
                    </tr>
                </table>


            </div>
    </section>
</div>