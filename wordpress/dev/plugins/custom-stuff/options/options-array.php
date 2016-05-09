<?php 
    // Option array for all sections and fields
    $optionPages = array();
 
    $optionPages[] = array(
        'slug'          => 'edit.php?post_type=cstmstff-post-type',
        'title'         => __( 'Options Page', 'custom-stuff' ),
        'capability'    => 'manage_options',
        'menu-slug'     => 'cstmstff-options.php',
        'options-group' => 'cstmstff-options',
        'fields'        => array(
            array(
                'id'    => 'cstmstff-option-section-01',
                'title' => __( 'Section 01', 'custom-stuff' ),
                'desc'  => __( 'Text for Section 01.', 'custom-stuff' ),
                'type'  => 'section'
            ),
            array(
                'id'    => 'cstmstff-option-section-02',
                'title' => __( 'Section 02', 'custom-stuff' ),
                'desc'  => __( 'Text for Section 02.', 'custom-stuff' ),
                'type'  => 'section'
            ),            
            array(
                'label'    => __( 'Text box', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-text',
                'name'     => 'cstmstff-options[cstmstff-text]',
                'type'     => 'text',
                'validate' => 'cstmstff_sanitize_html',
                'section'  => 'cstmstff-option-section-01'
            ),
            array(
                'label'    => __( 'URL', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-url',
                'name'     => 'cstmstff-options[cstmstff-url]',
                'type'     => 'url',
                'validate' => 'esc_url',
                'section'  => 'cstmstff-option-section-01'
            ),                                    
            array(
                'label'    => __( 'Textarea', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-textarea',
                'name'     => 'cstmstff-options[cstmstff-textarea]',
                'type'     => 'textarea',
                'validate' => 'cstmstff_sanitize_html',
                'section'  => 'cstmstff-option-section-01'
            ),
            array(
                'label'    => __( 'Select Box', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-select',
                'name'     => 'cstmstff-options[cstmstff-select]',
                'type'     => 'select',
                'validate' => 'cstmstff_sanitize_select',
                'section'  => 'cstmstff-option-section-01',
                'options'  => cstmstff_select_choices()
            ),
            array(
                'label'    => __( 'Radio', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-radio',
                'name'     => 'cstmstff-options[cstmstff-radio]',
                'type'     => 'radio',
                'validate' => 'sanitize_text_field',
                'section'  => 'cstmstff-option-section-02',                
                'options'  => array(
                    array(
                        'label'   => __( 'Name 1', 'custom-stuff' ), 
                        'id'      => 'cstmstff-value01', 
                        'name'    => 'cstmstff-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => __( 'Name 2', 'custom-stuff' ), 
                        'id'    => 'cstmstff-value02',
                        'name'  => 'cstmstff-value02',
                    )
                )
            ),
            array(
                'label'    => __( 'Checkbox', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-checkbox',
                'name'     => 'cstmstff-options[cstmstff-checkbox]',
                'type'     => 'checkbox',
                'value'    => 1,
                'validate' => 'cstmstff_sanatize_checkbox',
                'section'  => 'cstmstff-option-section-02'
            ), 
            array(
                'label'    => __( 'Date', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-date',
                'name'     => 'cstmstff-options[cstmstff-date]',
                'type'     => 'date',
                'validate' => 'cstmstff_sanitize_date',
                'section'  => 'cstmstff-option-section-02'
            ),                     
            array(
                'label'    => __( 'Color Picker', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-color',
                'name'     => 'cstmstff-options[cstmstff-color]',
                'type'     => 'color',
                'validate' => 'cstmstff_sanitize_hex',
                'section'  => 'cstmstff-option-section-02'
            ),
            array(
                'label'    => __( 'Media Library', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-image',
                'name'     => 'cstmstff-options[cstmstff-image]',
                'type'     => 'media',
                'validate' => 'esc_url',
                'section'  => 'cstmstff-option-section-02'
            ),
            array(
                'label'    => __( 'WordPress Editor', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-editor',
                'name'     => 'cstmstff-options[cstmstff-editor]',
                'type'     => 'editor',
                'validate' => 'wp_kses_post',
                'section'  => 'cstmstff-option-section-02'
            )             
        )
    );