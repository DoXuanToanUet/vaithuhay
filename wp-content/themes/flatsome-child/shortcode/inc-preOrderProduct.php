<?php  function preOrderProduct($attr)
{
    ?>
       <?php
            extract( shortcode_atts(
                [
                    'cat'=>'',
                    'title'=>'',
                    'pricestatus'=>'',
                    'salestatus'=>'',
                    'swiperid'=>'',
                    'titlestyle'=>''
                ], $attr
            ));
            if ( isset($cat) & $cat !=''){
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'DATE',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $cat,
                        ),
    
                    ),
                   
                );
            }  else{
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'DATE',
                    'posts_per_page' => 4,
                );
            }
            
            $getCat = new WP_Query($args);
        ?>
        <h2 class="home-main-title text-center">
            <span> <?php echo $title;?></span>
            <?php //var_dump($titlestyle);?>
        </h2>
        <div class="devProduct-list">
                <div class="preOrder-swiper preOrder-swiper<?php echo $swiperid; ?> swiper-container">
                    <div class="swiper-wrapper">
                        <?php if ( $getCat->have_posts() ) : while ( $getCat->have_posts() ) :
                                $getCat->the_post();
                            ?>
                            <?php 
                                //  echo "<pre>";
                                // var_dump($getCat);
                                // echo "</pre>"; 
                            ?>
                                <div class="swiper-slide"> 
                                    <div class="card-wrapper">
                                        <div class="card">
                                            <?php if($pricestatus == '1') echo do_shortcode( "[priceCustom]" )?>
                                            <div class="cart-img">
                                                <a href="<?php the_permalink( );?>" >
                                                    <?php //if (has_post_thumbnail()): the_post_thumbnail();  endif;?>
                                                    <img src="https://product.hstatic.net/1000069970/product/ban_nang_ha_copy_a4d6f1a323ca4b4883b16a648e7d74e7_grande.jpg" alt="">
                                                    <img class="image-overlay" src="https://theme.hstatic.net/1000069970/1000828363/14/pd_frame_3_img_large.png?v=140" alt="">
                                                </a> 
                                                <?php if( $salestatus == '1' ): ?>
                                                    <?php $product = wc_get_product( get_the_ID() ); /* get the WC_Product Object */ ?>
                                                    <div class="price"><?php  echo $product->get_price_html() ?  $product->get_price_html() : ''; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-title">
                                                <a  href="<?php the_permalink( );?>" class="<?php if( $titlestyle == 'style1' ): echo 'home-product-title'; else: echo ' '; endif; ?>" style="padding-bottom:15px;"><h4><?php the_title();?></h4></a>
                                                <div class="item-info">
                                                    <p>
                                                        <?php
                                                        echo wp_trim_words( get_the_excerpt(), 30, '...' );
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="<?php the_permalink( ); ?>" class="btn-buy-now">Mua ngay  <span class="lnr lnr-arrow-right" style="background: #fff;padding: 2px;border-radius: 50%;"></span></a>
                                            </div>
                                        </div> 
                                                
                                    </div>
                                    
                                </div>
                        <?php endwhile; wp_reset_postdata();  endif;?>
                    </div>
                    
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper-button-next preOrder-next preOrder-next<?php echo $swiperid; ?> flex flex-center ">
                    <img src="https://theme.hstatic.net/1000069970/1000828363/14/ega-caret-right.png" alt="">
                </div>
                <div class="swiper-button-prev preOrder-prev preOrder-prev<?php echo $swiperid; ?>  flex flex-center">
                    <img src="https://theme.hstatic.net/1000069970/1000828363/14/ega-caret-left.png" alt="">
                </div>
                <div class="btn-more main-bkg text-center">
                    <div class="btn-more-wrapper flex flex-center">
                        KHÁM PHÁ THÊM  <span class="lnr lnr-arrow-right white-bkg" style="margin-left:10px;background: #fff;padding: 10px;border-radius: 50%;"></span> 
                    </div>                                
                </div>
        </div>

    <?php //ob_get_clean();
}


add_shortcode("preOrderProduct", "preOrderProduct");