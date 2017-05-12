<?php include ROOT."/views/layouts/htmlSet.php"; ?>
<title><?php echo Config::getConfig('title') ?></title>
<?php
include ROOT."/views/layouts/links.php";
include ROOT."/views/layouts/header.php"; ?>
<div id="content">
    <div class="container">
        <div class="row">
            <section class="content__left col-md-12">
                <div class="block">
                    <div class="block__content">
                        <div class="articles articles__horizontal">
                            <article class="article">
                                <div class="article__info__preview">
                                    <?php Content::getText(
                                        "new-business-block",
                                        "Why book with Skylux?"
                                    ); ?>
                                </div>
                            </article>
                            <article class="article">
                                <div class="article__info__preview">
                                    <?php Content::getText(
                                        "new-business-about",
                                        "SkyLux TRavel is ranked #3 ou of 59 in the category lights"
                                    ); ?>
                                </div>
                            </article>

                            <article class="article">
                                <div class="article__info__preview">
                                    <?php Content::getText(
                                        "new-business-trust",
                                        "Trustpilot top 3 in category"
                                    ); ?>
                                </div>
                            </article>
                            <article class="article">
                                <div class="article__info__preview">
                                    <?php Content::getText(
                                        "new-business-expert",
                                        "DEFAULT VALUE"
                                    ); ?>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
