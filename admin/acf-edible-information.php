<?php

if( function_exists('acf_add_local_field_group') ):

	// Edible Information
	acf_add_local_field_group(array (
		'key' => 'group_59a479d29172e',
		'title' => 'Edible Information',
		'fields' => array (
			array (
				'key' => 'field_59a47e03417d1',
				'label' => 'Type',
				'name' => 'edible_type',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => 'horz',
					'id' => '',
				),
				'taxonomy' => 'klt_edible_type',
				'field_type' => 'radio',
				'allow_null' => 0,
				'add_term' => 1,
				'save_terms' => 1,
				'load_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c3f7b394ad2',
				'label' => 'Brand',
				'name' => 'brand',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59a479d297458',
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
				'key' => 'field_59a479d2974be',
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
				'key' => 'field_59c930345e31f',
				'label' => 'Ingredients',
				'name' => 'ingredients',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'block',
				'button_label' => 'Add Ingredient',
				'sub_fields' => array (
					array (
						'key' => 'field_59c930465e320',
						'label' => 'Ingredient',
						'name' => 'ingredient',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array (
				'key' => 'field_59c6a22e095da',
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
					'value' => 'klt_edible',
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