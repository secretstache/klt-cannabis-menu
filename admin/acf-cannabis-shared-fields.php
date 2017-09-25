<?php

if( function_exists('acf_add_local_field_group') ):

	// Potency
	acf_add_local_field_group(array (
		'key' => 'group_59c6968e82873',
		'title' => 'Group - Potency',
		'fields' => array (
			array (
				'key' => 'field_59c69b9f08175',
				'label' => 'THC',
				'name' => 'thc',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '%',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_59c69bb708176',
				'label' => 'CBD',
				'name' => 'cbd',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '34',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '%',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_59c69bc408177',
				'label' => 'Strength',
				'name' => 'strength',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '33',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					2 => 'Mild',
					4 => 'Strong',
					5 => 'Very Strong',
				),
				'default_value' => array (
					0 => 2,
				),
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'return_format' => 'array',
				'placeholder' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'klt_flower',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 0,
		'description' => '',
	));

	// Availability
	acf_add_local_field_group(array (
		'key' => 'group_59c6a10b6c830',
		'title' => 'Availability',
		'fields' => array (
			array (
				'key' => 'field_59c6a133a41e3',
				'label' => 'Can Customer Order Ahead?',
				'name' => 'customer_can_order_ahead',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => 'hide-label',
					'id' => '',
				),
				'message' => 'Can Customer Order Ahead?',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 0,
		'description' => '',
	));


endif;