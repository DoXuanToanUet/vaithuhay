<?php  function galleryProduct($attr)
{
    ?>
       <?php
            extract( shortcode_atts(
                [
                    'cat'=>'',
                    'title'=>'',
                ], $attr
            ));
           
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
            $getCat = new WP_Query($args);
        ?>
        <h2 class="home-main-title text-center">
            <span> <?php echo $title;?></span>
            <?php //var_dump($titlestyle);?>
        </h2>
        <div class="gallery-list">
                <div class="gallery-swiper swiper-container">
                    <div class="swiper-wrapper">
                        <?php if ( $getCat->have_posts() ) : while ( $getCat->have_posts() ) :
                                $getCat->the_post();
                            ?>
                                <div class="swiper-slide"> 
                                    <div class="gallery-items">
                                        <div class="card">
                                            <div class="cart-img">
                                                <div class="gallery-img" >
                                                    <?php //if (has_post_thumbnail()): the_post_thumbnail();  endif;?>
                                                    <img src="https://product.hstatic.net/1000069970/product/ban_nang_ha_copy_a4d6f1a323ca4b4883b16a648e7d74e7_grande.jpg" alt="">
                                                    <div class="tag-product flex">
                                                        <?php 
                                                            $terms = get_the_terms( get_the_ID(), 'product_tag' );
                                                            if( $terms){
                                                                foreach ($terms as $term){
                                                                    ?>
                                                                        <a href=""><?php echo $term->name;?></a>
                                                                    <?php 
                                                                }
                                                            }
                                                           
                                                            // echo "<pre>";
                                                            // var_dump($terms);
                                                            // echo "</pre>";
                                                        ?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>         
                                    </div>
                                    
                                </div>
                        <?php endwhile; wp_reset_postdata();  endif;?>
                    </div>
                    
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper-button-next preOrder-next flex flex-center "><span class="lnr lnr-chevron-right"></span></div>
                <div class="swiper-button-prev preOrder-prev  flex flex-center"><span class="lnr lnr-chevron-left"></span></div>
                <div class="btn-more white-bkg text-center">
                    <div class="btn-more-wrapper flex flex-center">
                        KHÁM PHÁ THÊM  <span class="lnr lnr-arrow-right main-bkg" style="margin-left:10px;background: #fff;padding: 10px;border-radius: 50%;"></span> 
                    </div>                                
                </div>
        </div>

    <?php //ob_get_clean();
}


add_shortcode("galleryProduct", "galleryProduct");