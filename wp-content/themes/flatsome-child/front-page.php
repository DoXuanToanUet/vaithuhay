<?php get_header();?>

    <!-- Slider -->
    <?php if (get_field('home_slider_status','option') == true): ?>
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
    
<?php get_footer();?>