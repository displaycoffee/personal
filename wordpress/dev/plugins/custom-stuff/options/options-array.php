<?php 
   
    $optionPages = array();
 
    $optionPages[] = array(
        'slug'          => 'edit.php?post_type=cstmstff-post-type',
        'title'         => 'Options Page',
        'capability'    => 'manage_options',
        'menu-slug'     => 'cstmstff-options.php',
        'options-group' => 'cstmstff-options',
        'fields'        => array(
            array(
                'id'    => 'cstmstff-option-section-01',
                'title' => 'Section 01',
                'desc'  => '<p>Text for Section 01.</p>',
                'type'  => 'section'
            ),
            array(
                'id'    => 'cstmstff-option-section-02',
                'title' => 'Section 02',
                'desc'  => '<p>Text for Section 02.</p>',
                'type'  => 'section'
            ),            
            array(
                'label'    => 'Text box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-text',
                'name'     => 'cstmstff-options[cstmstff-text]',
                'type'     => 'text',
                'validate' => 'cstmstff_sanitize_html',
                'section'  => 'cstmstff-option-section-01'
            ),
            array(
                'label'    => 'URL',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-url',
                'name'     => 'cstmstff-options[cstmstff-url]',
                'type'     => 'url',
                'validate' => 'esc_url',
                'section'  => 'cstmstff-option-section-01'
            ),                                    
            array(
                'label'    => 'Textarea',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-textarea',
                'name'     => 'cstmstff-options[cstmstff-textarea]',
                'type'     => 'textarea',
                'validate' => 'cstmstff_sanitize_html',
                'section'  => 'cstmstff-option-section-01'
            ),
            array(
                'label'    => 'Select Box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-select',
                'name'     => 'cstmstff-options[cstmstff-select]',
                'type'     => 'select',
                'validate' => 'sanitize_text_field',
                'section'  => 'cstmstff-option-section-01',
                'options'  => array(
                    'Option 1', 
                    'Option 2', 
                    'Option 3'
                )
            ),
            array(
                'label'    => 'Radio',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-radio',
                'name'     => 'cstmstff-options[cstmstff-radio]',
                'type'     => 'radio',
                'validate' => 'sanitize_text_field',
                'section'  => 'cstmstff-option-section-02',                
                'options'  => array(
                    array(
                        'label'   => 'Name 1', 
                        'id'      => 'cstmstff-value01', 
                        'name'    => 'cstmstff-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => 'Name 2', 
                        'id'    => 'cstmstff-value02',
                        'name'  => 'cstmstff-value02',
                    )
                )
            ),
            array(
                'label'    => 'Checkbox',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-checkbox',
                'name'     => 'cstmstff-options[cstmstff-checkbox]',
                'type'     => 'checkbox',
                'value'    => 'true',
                'validate' => 'sanitize_text_field',
                'section'  => 'cstmstff-option-section-02'
            ), 
            array(
                'label'    => 'Date',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-date',
                'name'     => 'cstmstff-options[cstmstff-date]',
                'type'     => 'date',
                'validate' => 'cstmstff_sanitize_date',
                'section'  => 'cstmstff-option-section-02'
            ),                     
            array(
                'label'    => 'Color Picker',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-color',
                'name'     => 'cstmstff-options[cstmstff-color]',
                'type'     => 'color',
                'validate' => 'cstmstff_sanitize_hex',
                'section'  => 'cstmstff-option-section-02'
            ),
            array(
                'label'    => 'Media Library',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-image',
                'name'     => 'cstmstff-options[cstmstff-image]',
                'type'     => 'media',
                'validate' => 'esc_url',
                'section'  => 'cstmstff-option-section-02'
            ),
            array(
                'label'    => 'WordPress Editor',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-editor',
                'name'     => 'cstmstff-options[cstmstff-editor]',
                'type'     => 'editor',
                'validate' => 'wp_kses_post',
                'section'  => 'cstmstff-option-section-02'
            )             
        )
    );