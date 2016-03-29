<?php 

/*
	Hampton Rhodes product page inclusions

*/

add_filter('woocommerce_product_tabs','hr_modify_prod_tabs', 100, 1);
function hr_modify_prod_tabs($tabs){
	$tabs['faq'] = array(
		'title' => __('FAQ', 'woocommerce'),
		'priority' => 40,
		'callback' 	=> 'hr_faq_tab',
		);
	if($tabs['additional_information'])
		$tabs['additional_information']['title'] = __('Details', 'woocommerce');
	if($tabs['description'])
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