<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="blog-carousel">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="public/images/rio.jpg">
                        <div class="carousel-caption">
                            <h3>Rio</h3>
                            <p>Welcome to the Rio!!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="public/images/monte.jpg">
                        <div class="carousel-caption">
                            <h3>Monte Carlo</h3>
                            <p>Thank you, Monte Carlo</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="public/images/bali.jpg">
                        <div class="carousel-caption">
                            <h3>Bali</h3>
                            <p>Hello</p>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="feature-destination">
            <div class="destination-title text-center">
                <h2>Top Destinations</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="index1.php" class="single-destination">
                        <img src="public/images/single-destination-1.jpg" alt="">
                        <div class="destination-overlay text-center text-uppercase">
                            <h2>Paris</h2>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="index1.php" class="single-destination">
                        <img src="public/images/single-destination-2.jpg" alt="">
                        <div class="destination-overlay text-center text-uppercase">
                            <h2>Singapore</h2>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="index1.php" class="single-destination">
                        <img src="public/images/single-destination-3.jpg" alt="">
                        <div class="destination-overlay text-center text-uppercase">
                            <h2>NewYork</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php foreach($articles as $article):?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt=""></a>

                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"> <?= $article->category->title; ?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= $article->title?></a></h1>


                            </header>
                            <div class="entry-content">
                                <p><?= $article->description?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Continue Reading</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <?= $article->author->name; ?> On <?= $article->getDate();?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<script src="public/js/jquery-1.12.4.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/slick.min.js"></script>
<script src="public/js/main.js"></script>
<!-- end main content-->
<!--footer start-->