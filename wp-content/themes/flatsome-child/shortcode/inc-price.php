<?php function priceCustom(){
     global $product;
            
     if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ){
         $view_regular 	= get_post_meta( $product->get_id(), '_regular_price', true ); 
         // echo $view_regular;
         $view_sale 	= get_post_meta( $product->get_id(), '_sale_price', true );
         // echo $view_sale;
         if($view_sale!=0 && $view_regular!=0){
             $view_precent=round(100 -($view_sale/$view_regular)*100).'%';
             echo "<span class='home_sale_custom flex flex-center'>".'-'.$view_precent."</span>";
         }
     } 
     if($product->is_type('variable')){
         $percentages = array();

         // Get all variation prices
         $prices = $product->get_variation_prices();
         // print_r($prices);
         // Loop through variation prices
         foreach( $prices['price'] as $key => $price ){
             // Only on sale variations
             if( $prices['regular_price'][$key] !== $price ){
                 // Calculate and set in the array the percentage for each variation on sale
                 $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
             }
         }
         if( ($percentages) ) {
             $percentage = max($percentages) . '%';
             // echo $percentage;
             echo "<span class='home_sale_custom flex flex-center'>".'-'.$percentage."</span>";
         }  
         
     }
}
add_shortcode("priceCustom", "priceCustom");