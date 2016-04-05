<?php 

/*
	Hampton Rhodes product page inclusions

*/
add_action('init', 'move_and_remove_pdp_stuff');
function move_and_remove_pdp_stuff(){
	remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10,0);
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40,0);
}

// add logo above product name -- priority 4 because title is 5
add_action('woocommerce_single_product_summary', 'add_logo_on_pdp',4,0);
function add_logo_on_pdp(){
	echo "<div class='ben'>PRODUCT LOGO</div>";
}

add_filter('woocommerce_product_tabs','hr_modify_prod_tabs', 100, 1);
function hr_modify_prod_tabs($tabs){
	$tabs['faq'] = array(
		'title' => __('FAQ', 'woocommerce'),
		'priority' => 40,
		'callback' 	=> 'hr_faq_tab',
		);
	if(array_key_exists('additional_information',$tabs))
		$tabs['additional_information']['title'] = __('Details', 'woocommerce');
	if(array_key_exists('description', $tabs))
		$tabs['description']['title'] = __('Overview', 'woocommerce');
	return $tabs;
}

function hr_faq_tab(){
	$faqs = get_field('associated_faqs');
	if($faqs){
		foreach($faqs as $faq){
			echo '<div class="faq">';
			echo '<h3>'. $faq->post_title.'</h3>';
			echo '<p>' .$faq->post_content . '</p>
			</div>';
		}
	}else{
		echo '<div class="faq"> No FAQ associated with this mattress </div>';
	}

}