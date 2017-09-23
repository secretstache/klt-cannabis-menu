<?php

if( function_exists('acf_add_local_field_group') ):

	// Seed Information
	acf_add_local_field_group(array (
		'key' => 'group_59a4b56dd8e7a',
		'title' => 'Seed Information',
		'fields' => array (
			array (
				'key' => 'field_59a4b5971a684',
				'label' => 'Related Flower',
				'name' => 'related_flower',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array (
					0 => 'klt_flower',
				),
				'taxonomy' => array (
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'id',
				'ui' => 1,
			),
			array (
				'key' => 'field_59a4b56ddd229',
				'label' => 'Strain',
				'name' => 'strain',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => 'horz',
					'id' => '',
				),
				'taxonomy' => 'klt_cannabis_strain',
				'field_type' => 'radio',
				'allow_null' => 0,
				'add_term' => 1,
				'save_terms' => 1,
				'load_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_59a4b56ddd299',
				'label' => 'Potency',
				'name' => 'potency',
				'type' => 'clone',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'clone' => array (
					0 => 'group_59c6968e82873',
				),
				'display' => 'group',
				'layout' => 'block',
				'prefix_label' => 0,
				'prefix_name' => 0,
			),
			array (
				'key' => 'field_59c6a276d264e',
				'label' => 'Availability',
				'name' => 'availability',
				'type' => 'clone',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'clone' => array (
					0 => 'group_59c6a10b6c830',
				),
				'display' => 'seamless',
				'layout' => 'block',
				'prefix_label' => 0,
				'prefix_name' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'klt_seed',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));


endif;