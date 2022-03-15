<?php get_header();?>

    <!-- Slider -->
    <?php if (get_field('home_slider_status','option') == true): ?>
        <div class="home-banner">
            <div class="slider-swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php if (have_rows('home_slider_rp','option')): while (have_rows('home_slider_rp','option')) : the_row(); ?>
                                
                            <?php  
                                    $image = get_sub_field('image','option');
                                    $link = get_sub_field('link','option');

                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo $link;?>">
                                    <img src="<?php echo $image;?>" alt="">
                                </a>
                            </div> 
                        
                    <?php endwhile;else :endif;?>
                </div>
                <div class="swiper-button-next banner-next flex flex-center "><img src="https://theme.hstatic.net/1000069970/1000828363/14/ega-caret-right.png" alt=""></div>
                <div class="swiper-button-prev banner-prev flex flex-center"><img src="https://theme.hstatic.net/1000069970/1000828363/14/ega-caret-left.png" alt=""></div></div>
            </div>
        </div>    
    <?php endif;?>

    
    <!-- Section Pre Order -->
    <div class="pre-order-section home-product-section">
        <div class="container">
            <?php 
                $orderid=get_field('pre_order','option');
                // $preid=(string)$t;
                // var_dump($t);
                // price_status=,sale_status || 0: false , 1:true
                echo do_shortcode( "[preOrderProduct title='CHIẾN DỊCH PRE-ORDER' cat=$orderid  pricestatus=0 salestatus=0 swiperid=1 titlestyle='style1']" );
            ?>
        </div>
    </div>

    <!-- Sản phẩm mới -->
    <div class="newsProduct-section home-product-section">
        <div class="container">
        <?php 
            // price_status=,sale_status || 0: false , 1:true
            echo do_shortcode( "[preOrderProduct title='SẢN PHẨM MỚI' pricestatus=1 salestatus=1 swiperid=2]" );
        ?>
        </div>
    </div>
    
    <!-- Banner 1 -->
    <div class="banner1 banner-common">
        <div class="container">
            <?php $rows = get_field('banner_rp','option');
                  $img = $rows[0];
                  $img_link = $img['image'];
            ?>
            <img src="<?php echo $img_link; ?>" alt="">
        </div>
    </div>
    <!-- Không gian làm việc -->
    <div class="work-section home-product-section">
        <div class="container">
        <?php 
            $workid=get_field('work','option');
            // price_status=,sale_status || 0: false , 1:true
            echo do_shortcode( "[preOrderProduct title='KHÔNG GIAN LÀM VIỆC' cat=$workid pricestatus=1 salestatus=1 swiperid=2]" );
        ?>
        </div>
    </div>
    <!-- Banner 2 -->
    <div class="banner1 banner-common">
        <div class="container">
            <?php $rows = get_field('banner_rp','option');
                  $img = $rows[1];
                  $img_link = $img['image'];
            ?>
            <img src="<?php echo $img_link; ?>" alt="">
        </div>
    </div>
    <!-- Section kênh Youtube -->
    <?php if (get_field('home_yt_status','option') == true): ?>
        <div class="yotube-section home-product-section">
            <div class="container">
                <h3 class="text-center"><?php the_field('home_yt_title','option'); ?></h3>
                <div class="youtube-list flex">
                    <?php if (have_rows('home_yt_rp','option')): while (have_rows('home_yt_rp','option')) : the_row(); ?>
                        
                        <?php  $term = get_sub_field('product','option');
                            // echo "<pre>";
                            //     var_dump($term->ID);
                            // echo "</pre>";
                            $apikey= 'AIzaSyAIugRt6iPOcfWuJXvvcdKTs5BL1Eh-93s';
                            $youtube_link =  get_field('link_youtube',$term->ID);
                            $youtube_id = str_replace('https://www.youtube.com/watch?v=','',$youtube_link);
                            $apidata = @file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=' . $youtube_id . '&key=' . $apikey . '&part=snippet');
                            $videolist = json_decode($apidata);
                            // echo "<pre>";
                            $thumb_img = ($videolist->items[0]->snippet->thumbnails->high->url);
                                $thumb_title = ($videolist->items[0]->snippet->title);
                            // echo "</pre>";
                        ?>
                        <div class="youtube-item">
                            <img src="<?php echo $thumb_img; ?>" alt="">
                            <p><?php echo $thumb_title;?></p>
                        </div>
                        
                    <?php endwhile;else :endif;?>
                </div>
            </div>
        </div>
    <?php endif;?>
    
    <!-- Section gallery san pham -->
    <div class="gallery-section home-product-section">
        <div class="container">
            <?php  echo do_shortcode( "[galleryProduct title='GALLERY SẢN PHẨM' cat=18 ]" ); ?>
        </div>
    </div>

    <!--Section Khám phá -->
    <div class="intro">
        <div class="container">
            
            <div class="intro-wrapper flex">
                <h3 class="text-center intro-main-title home-main-title">KHÁM PHÁ</h3>
                <?php if (have_rows('intro_rp','option')): $i=0;while (have_rows('intro_rp','option')) : the_row(); ?>
                                    
                        <?php  
                                $intro_img = get_sub_field('image','option');
                                $intro_title = get_sub_field('title','option');
                                $intro_subtitle= get_sub_field('subtitle','option');
                                $intro_link = get_sub_field('link','option');

                        ?>
                        <div class="intro-item intro-item<?php echo $i;?>">
                            <a href="<?php echo $intro_link;?>" class="link">
                                <div class="item flex">
                                    <div class="intro-img flex flex-center">
                                        <img src="<?php echo $intro_img;?>" alt="">
                                    </div>
                                    
                                    <div class="intro-info">
                                        <h3><?php echo $intro_title; ?></h3>
                                        <p><?php echo $intro_subtitle; ?></p>
                                        <div class="btn-more white-bkg text-center">
                                            <div class="btn-more-wrapper flex flex-center">
                                                KHÁM PHÁ THÊM  <span class="lnr lnr-arrow-right main-bkg" style="margin-left:10px;background: #fff;padding: 10px;border-radius: 50%;"></span> 
                                            </div>                                
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> 
                    
                <?php $i++;endwhile;else :endif;?>
            </div>
        </div>
    </div>

    <!-- Section Dịch vụ -->
    <div class="service">
        <div class="container">
            <h3 class="text-center home-main-title"><?php the_field('service_title','option'); ?></h3>
            <div class="service-wrapper flex">
                <?php if (have_rows('service_rp','option')): while (have_rows('service_rp','option')) : the_row(); ?>             
                        <?php  
                                $service_img = get_sub_field('image','option');
                                $service_title = get_sub_field('title','option');

                        ?>
                        <div class="service-item text-center">
                            <img src="<?php echo $service_img;?>" alt="">
                            <h4><?php echo $service_title; ?></h4>
                        </div> 
                    
                <?php endwhile;else :endif;?>
            </div>
        </div>
    </div>

    <!-- Section Liên hệ -->
    <div class="home-contact">
        <div class="container">
            <div class="home-form-contact">
                <h2 class="title">LIÊN HỆ NGAY ĐỂ ĐỒNG HÀNH CÙNG CHÚNG TÔI</h2>
                <?php echo do_shortcode( '[contact-form-7 id="167" title="Home Contact"]' ); ?>
                
            </div>
        </div>
    </div>
<?php get_footer();?>