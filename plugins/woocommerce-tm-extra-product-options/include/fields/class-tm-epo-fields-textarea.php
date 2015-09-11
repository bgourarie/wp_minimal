<?php
class TM_EPO_FIELDS_textarea extends TM_EPO_FIELDS {

	public function display_field( $element=array(), $args=array() ) {
		return array(
				'textbeforeprice' 	=> isset( $element['text_before_price'] )?$element['text_before_price']:"",
				'textafterprice' 	=> isset( $element['text_after_price'] )?$element['text_after_price']:"",
				'hide_amount'  		=> isset( $element['hide_amount'] )?" ".$element['hide_amount']:"",
				'placeholder'  		=> isset( $element['placeholder'] )?esc_attr(  $element['placeholder']  ):'',
				'min_chars'  		=> isset( $element['min_chars'] )?absint( $element['min_chars'] ):'',
				'max_chars'  		=> isset( $element['max_chars'] )?absint( $element['max_chars'] ):'',
				'default_value'  	=> isset( $element['default_value'] )?esc_attr(  $element['default_value']  ):'',
				'quantity' 			=> isset( $element['quantity'] )?$element['quantity']:"",
			);
	}
	
	public function validate() {

		$passed = true;
									
		foreach ( $this->field_names as $attribute ) {
			if ( !isset( $this->epo_post_fields[$attribute] ) ||  $this->epo_post_fields[$attribute]=="" ) {
				$passed = false;
				break;
			}										
		}

		return $passed;
	}
	
}