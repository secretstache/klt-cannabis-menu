<?php

if( function_exists('acf_add_local_field_group') ):

	// Flower Information
	acf_add_local_field_group(array (
		'key' => 'group_59a461a4ec8c0',
		'title' => 'Flower Information',
		'fields' => array (
			array (
				'key' => 'field_59a46645c43e2',
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
				'key' => 'field_59a4647103f14',
				'label' => 'Profile',
				'name' => 'profile',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array (
					array (
						'key' => 'field_59c6999f8e994',
						'label' => 'Scent',
						'name' => 'scent',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'klt_cannabis_scent',
						'field_type' => 'select',
						'allow_null' => 0,
						'add_term' => 1,
						'save_terms' => 1,
						'load_terms' => 1,
						'return_format' => 'object',
						'multiple' => 0,
					),
					array (
						'key' => 'field_59c699cd8e995',
						'label' => 'Taste',
						'name' => 'taste',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '34',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'klt_cannabis_taste',
						'field_type' => 'select',
						'allow_null' => 0,
						'add_term' => 1,
						'save_terms' => 1,
						'load_terms' => 1,
						'return_format' => 'object',
						'multiple' => 0,
					),
					array (
						'key' => 'field_59c699fa8e996',
						'label' => 'Feeling',
						'name' => 'feeling',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'klt_cannabis_feeling',
						'field_type' => 'select',
						'allow_null' => 0,
						'add_term' => 1,
						'save_terms' => 1,
						'load_terms' => 1,
						'return_format' => 'object',
						'multiple' => 0,
					),
				),
			),
			array (
				'key' => 'field_59c69004f65b1',
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
				'key' => 'field_59c6a254986d9',
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
		'active' => 1,
		'description' => '',
	));

endif;