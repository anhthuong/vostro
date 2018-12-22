<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sanohimi
 */
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    //$.noConflict();
    window.alert = function () {};
    var defaultCSS = document.getElementById('bootstrap-css');

    function changeCSS(css) {
        if (css)
            $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
        else
            $('head > link').filter(':first').replaceWith(defaultCSS);
    }
    jQuery(document).ready(function ($) {
        var iframe_height = parseInt($('html').height());
        window.parent.postMessage(iframe_height, 'https://bootsnipp.com');
    });
</script>
<style>
    .hide-bullets {
        list-style:none;
        margin-top:20px;
    }
    .hide-bullets li{
        list-style: none !important;
    }
    .hide-bullets li:before{
        list-style: none !important;
    }
    .thumbnail {
        padding: 0;
    }
    .carousel-inner>.item>img, .carousel-inner>.item>a>img {
        width: 100%;
    }
</style>

<script src="https://jssors8.azureedge.net/script/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jssor_1_slider_init = function () {

        var jssor_1_options = {
            $AutoPlay: 0,
            $AutoPlaySteps: 1,
            $SlideDuration: 160,
            $SlideWidth: 350,
            $SlideSpacing: 3,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        /*#region responsive code begin*/
        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {
                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                jssor_1_slider.$ScaleWidth(expectedWidth);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<style>
    /*jssor slider loading skin spin css*/
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        
            
    }
    .wrap-carousel-single-item img{
        height: inherit !important;
    }

    @keyframes jssorl-009-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /*jssor slider bullet skin 057 css*/
    .jssorb057 .i {position:absolute;cursor:pointer;}
    .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
    .jssorb057 .i:hover .b {stroke-opacity:.7;}
    .jssorb057 .iav .b {stroke-opacity: 1;}
    .jssorb057 .i.idn {opacity:.3;}

    /*jssor slider arrow skin 073 css*/
    .jssora073 {display:block;position:absolute;cursor:pointer;}
    .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
    .jssora073:hover {opacity:.8;}
    .jssora073.jssora073dn {opacity:.4;}
    .jssora073.jssora073ds {opacity:.3;pointer-events:none;}

    /*css thuongnv*/
    .wrap-tour-item-single {
        position: absolute;
        width: 200px;
        bottom: -10px;
        right: 0;
        background: #F8F8F8;
        padding: 10px 20px 10px 20px;
    }
    .tour-info-tit-single {
        color: #000;
        font-size: 15px;
        text-align: left;
        line-height: 14px;
    }
    .price-tour-info-single {
        text-align: left;
        bottom: -20px;
        position: absolute;
        font-size: 12px;
        color: #000;
    }
    
    .notable_tour__item-content {
        padding: 10px 15px 35px 25px;
        top: 180px;
        right: 0;
        position: absolute;
        width: 250px;
        background: #dee1e2;
        z-index: 2;
    }
    .notable_tour__item-content a{
        font-family: utm-avo;
        font-size: 21px;
        color: #000;
    }
    .notable_tour__item-content a:hover, .notable_tour__item-content a:focus{
        text-decoration: none;
        color: #000;
    }
    .item-single {
        height: 235px !important;
    }
    .item-single:hover .notable_tour__item-content {
        background: #fed300 !important;
        transition: 0.4s;
    }
    .item-single:after {
        width: 100%;
        height: 235px;
        content: '';
        position: absolute;
        background: #fed300;
        top: 0;
        left: 0;
        opacity: 0;
        z-index: 1;
    }
    .item-single:hover:after {
        opacity: 0.5 !important;
        transition: 0.4s;
    }
    span.font-weight-bold {
        font-family: utm-avo;
        color: #000;
        font-size: 12px;
    }
    .entry-title-info {
        font-family: utm-avo;
        font-size: 25px;
        color: #000;
        line-height: 25px;
    }
    .price-tour {
        font-size: 24px;
        margin-top: 20px;
    }
    header.entry-header {
        margin-bottom: 50px;
    }
    .post__cats a {
        color: #fff;
        background-color: #890000;
        padding: 5px 15px;
        letter-spacing: normal;
    }
    .fa {
        font-size: 15px;
        color: #890000;
    }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php $utility = sanohimi_utility()->utility; ?>

    <header class="entry-header">
        <?php
        $utility->attributes->get_title(array(
            'class' => 'entry-title',
            'html' => '<h1 %1$s>%4$s</h1>',
            'echo' => true,
        ));
        ?>

            <?php if ('post' === get_post_type()) : ?>

            <div class="entry-meta">
                <?php $author_visible = sanohimi_is_meta_visible('single_post_author', 'single') ? 'true' : 'false'; ?>
                <?php
                $utility->meta_data->get_author(array(
                    'visible' => $author_visible,
                    'class' => 'posted-by__author',
                    'prefix' => esc_html__('by ', 'sanohimi'),
                    'html' => '<span class="post__posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
                    'echo' => true,
                ));
                ?>
                <span class="post__date">
                    <?php
                    $date_visible = sanohimi_is_meta_visible('single_post_publish_date', 'single') ? 'true' : 'false';

                    $utility->meta_data->get_date(array(
                        'visible' => $date_visible,
                        'class' => 'post__date-link',
                        'echo' => true,
                    ));
                    ?>
                </span>
                <span class="post__comments">
                    <?php
                    $comment_visible = sanohimi_is_meta_visible('single_post_comments', 'single') ? 'true' : 'false';

                    $utility->meta_data->get_comment_count(array(
                        'visible' => $comment_visible,
                        'class' => 'post__comments-link',
                        'sufix' => esc_html__(' %s comments', 'sanohimi'),
                        'echo' => true,
                    ));
                    ?>
                </span>
            </div><!-- .entry-meta -->

            <?php $cats_visible = sanohimi_is_meta_visible('single_post_categories', 'single') ? 'true' : 'false'; ?>

            <?php
            $utility->meta_data->get_terms(array(
                'visible' => $cats_visible,
                'type' => 'category',
                'icon' => '',
                'before' => '<div class="post__cats">',
                'after' => '</div>',
                'echo' => true,
            ));
            ?>

    <?php endif; ?>

    </header><!-- .entry-header -->

    <?php sanohimi_ads_post_before_content(); ?>

<?php
//the_meta('custom_img');
$key = "custom_img";
$arrCustom_img = get_post_meta($post->ID, $key, false);
?>

    <!--	<figure class="post-thumbnail">
                    <?php
                    $utility->media->get_image(array(
                        'size' => 'sanohimi-thumb-l',
                        'html' => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
                        'placeholder' => false,
                        'echo' => true,
                    ));
                    ?>
            </figure> .post-thumbnail -->

    <div class="entry-content">
        <div id="main_area">
            <!-- Slider -->
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider">
                        <div class="row">
                            <div class="col-sm-8" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!--Carousel items--> 
                                    <div class="carousel-inner">
                                        <?php
                                        $j = 0;
                                        foreach ($arrCustom_img as $val):
                                            $j++;
                                            ?>
                                            <div class="<?php if ($j == 1) echo 'active'; ?> item" data-slide-number="<?php echo $j + 1; ?>">
                                                <img src="<?php echo $val; ?>">
                                            </div>
                                        <?php endforeach; ?>                                                
                                    </div>
                                    <!--Carousel nav--> 
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-sm-4 detail-info">
                                <?php
                                $utility->attributes->get_title(array(
                                    'class' => 'entry-title-info',
                                    'html' => '<div %1$s>%4$s</div>',
                                    'echo' => true,
                                ));
                                ?>
                                <div class="price-tour"><?php echo get_post_meta($post->ID, 'price_tour', true); ?></div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8" id="slider-thumbs">
                    <ul class="hide-bullets">
                        <?php
                        $i = 0;
                        foreach ($arrCustom_img as $val):
                            $i++;
                            ?>
                            <li class="col-sm-3">
                                <a class="thumbnail" id="carousel-selector-<?php echo $i; ?>">
                                    <img src="<?php echo $val; ?>">
                                </a>
                            </li>
                        <?php endforeach; ?>                                
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-md-12" style="margin: 50px 0">
            <div class="container">
                <div class=" row tm_pb_row tm_pb_row_2">
                    <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_2 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">

                        <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_left  tm_pb_text_1">
                            <div class="service-title-small">Best tourist places in vietnam</div>
                            <div class="service-title-lager">TOUR INFORMATION</div>
                        </div> <!-- .tm_pb_text -->
                    </div> <!-- .tm_pb_column -->
                </div> <!-- .tm_pb_row -->
            </div>
        </div>
        
        <div class="col-xs-12 col-md-12">
            <div class="wrap-carousel-single">
                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:350px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                    </div>
                    <div class="wrap-carousel-single-item" data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:350px;overflow:hidden;">
                        <?php
                        global $post;
                        $args = array('posts_per_page' => 1000, 'offset' => 0, 'category' => 7);
                        $myposts = get_posts($args);

                        foreach ($myposts as $post) : setup_postdata($post);
                            ?>
                        <div class="item-single">
                            <?php
                                the_post_thumbnail($size, $attr);
                            ?>                                
                                <div class="notable_tour__item-content">
                                    <h4 class="text-uppercase font-weight-normal">
                                        <a href="#"><?php the_title(); ?></a>
                                    </h4>
                                    <div class="old-price ">
                                        <span class="font-weight-bold">
                                            <?php echo get_post_meta($post->ID, 'price_tour', true); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <!-- Bullet Navigator -->
<!--                    <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                            </svg>
                        </div>
                    </div>-->
                    <!-- Arrow Navigator -->
                    <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                        </svg>
                    </div>
                </div>
                <script type="text/javascript">jssor_1_slider_init();</script>
            </div>
        </div>
        
        <div class="col-xs-12 col-md-12" style="margin: 50px 0">
            <div class="content-info">
                <?php the_content();  ?>
            </div>
        </div>
        
        

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links__title">' . esc_html__('Pages:', 'sanohimi') . '</span>',
            'after' => '</div>',
            'link_before' => '<span class="page-links__item">',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'sanohimi') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php $tags_visible = sanohimi_is_meta_visible('single_post_tags', 'single') ? 'true' : 'false'; ?>

        <?php
        $utility->meta_data->get_terms(array(
            'visible' => $tags_visible,
            'type' => 'post_tag',
            'delimiter' => '',
            'before' => '<div class="post__tags">',
            'after' => '</div>',
            'echo' => true,
        ));
        ?>

        <div class="entry-footer-wrapper">
            <?php echo( '<span>' . esc_html__('Like this post? Share it!', 'sanohimi') . '</span>' ); ?>
            <?php sanohimi_share_buttons('single'); ?>
        </div>
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->

<script type="text/javascript">
    jQuery(document).ready(function ($) {


        $('#myCarousel').carousel({
            interval: 5000
        });

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
            var id_selector = $(this).attr("id");

            try {
                var id = /-(\d+)$/.exec(id_selector)[1];
                console.log(id_selector, id);

                jQuery('#myCarousel').carousel(parseInt(id));
            } catch (e) {
                console.log('Regex failed!', e);
            }
        });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-' + id).html());
        });
    });
</script>
