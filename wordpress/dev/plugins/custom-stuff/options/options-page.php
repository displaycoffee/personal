<?php

	// Class for putting together option pages
	class XYZOptionPage {

        protected $_optionPage;        

        // Add actions for option pages
        function __construct($optionPage) {
            $this->_optionPage = $optionPage;
            add_action('admin_init', array(&$this, 'register'));
            add_action('admin_menu', array(&$this, 'add'));
        }

		// Add options page
		function add(){
		    add_submenu_page(
		    	$this->_optionPage['slug'], 
		    	sprintf( __( '%s', 'xyz-textdomain' ), $this->_optionPage['title'] ), 
		    	sprintf( __( '%s', 'xyz-textdomain' ), $this->_optionPage['title'] ), 
		    	$this->_optionPage['capability'], 
		    	$this->_optionPage['menu-slug'], 
		    	array(&$this, 'show_page')
		    ); 
		}

		// Show options content
		function show_page() {

			// Start opening HTML
			$opening = '<div class="xyz-options">';
			$opening .= '<h1>' . sprintf( __( '%s', 'xyz-textdomain' ), $this->_optionPage['title'] ) . '</h1>';
			$opening .= '<form method="post" enctype="multipart/form-data" action="options.php">';
			echo $opening;

			// Use nonce for verification
            echo '<input type="hidden" name="optionPage_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

			// Add settings
			do_settings_sections($this->_optionPage['menu-slug']);

			// Add fields
			settings_fields($this->_optionPage['options-group']);

			// Start closing HTML
			$closing = '<p class="submit"> ';
			$closing .= '<input type="submit" class="button-primary" value="' . __( 'Save Changes', 'xyz-textdomain' ) . '" />';
			$closing .= '</p>';
			$closing .= '</form>';
			$closing .= '</div>';
			echo $closing;

		}		

		// Register sections and fields to place on options page
		function register() {

			// Register settings
			register_setting($this->_optionPage['options-group'],$this->_optionPage['options-group'], array(&$this, 'save'));

			// Add sections and fields base on type
			foreach ($this->_optionPage['fields'] as $field) {
				if($field['type'] == 'section') {
					add_settings_section(
						$field['id'],
						sprintf( __( '%s', 'xyz-textdomain' ), $field['title'] ),
						array(&$this, 'show_section'), 
						$this->_optionPage['menu-slug']
					);
				} else {
					add_settings_field(
						$field['id'], 
						sprintf( __( '%s', 'xyz-textdomain' ), $field['label'] ),
						array(&$this, 'show_fields'), 
						$this->_optionPage['menu-slug'], 
						$field['section'], 
						$field
					);
				}
			}

		}

		// Show extra section content
		function show_section($section) {
			foreach ($this->_optionPage['fields'] as $field) {
				if (($field['type'] == 'section') && ($field['id'] == $section['id'])) {
					echo sprintf( __( '%s', 'xyz-textdomain' ), $field['desc'] );
				}
			}
		}

		function show_fields($field) {

			// Get values for named option
			$getOption = get_option($this->_optionPage['options-group']);

			// Option ID to get specific value
			$optionID = $field['id'];

			// Common display value
			if (isset($getOption[$optionID])) {
				$value = $getOption[$optionID];
			} else {
				$value = '';
			}

			// Loop through basic field types
			xyz_display_fields($field, $value);

		    // Display description if one is there
            xyz_display_description($field);

		}

		// Save data from fields
		function save($input) {

			// Verify nonce
            if (!isset($_POST['optionPage_nonce']) || !wp_verify_nonce($_POST['optionPage_nonce'], basename(__FILE__))) {
                return;
            }

            // Validate fields before updating
			if (isset($input)) {
				foreach($input as $k => $v) {
					foreach ($this->_optionPage['fields'] as $field) {
						if ($field['id'] == $k) {
							$new[$k] = $field['validate']($v);
						}
					}
				}
				return $new;
			}
		}		

	}

    // Go through each option page array and build them
    foreach ($optionPages as $optionPage) {
        new XYZOptionPage($optionPage);
    }