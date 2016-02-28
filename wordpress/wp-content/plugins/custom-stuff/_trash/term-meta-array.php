<?php 

    $termMetaBoxes = array();
 
    $termMetaBoxes[] = array(
        'category' => 'xyz-cat-public',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione ut culpa, illo, odit tempore dignissimos nisi consequatur voluptatem.',
        'fields' => array(           
            array(
                'label' => 'Text box',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-text',
                'name' => 'term-meta[xyz-text]',
                'type' => 'text',
                'validate' => 'xyz_sanitize_html'
            ),
            array(
                'label' => 'URL',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-url',
                'name' => 'term-meta[xyz-url]',
                'type' => 'url',
                'validate' => 'esc_url'
            ),                                    
            array(
                'label' => 'Textarea',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-textarea',
                'name' => 'term-meta[xyz-textarea]',
                'type' => 'textarea',
                'validate' => 'xyz_sanitize_html'
            ),
            array(
                'label' => 'Select Box',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-select',
                'name' => 'term-meta[xyz-select]',
                'type' => 'select',
                'options' => array(
                    'Option 1', 
                    'Option 2', 
                    'Option 3'
                ),
                'validate' => 'sanitize_text_field'
            ),
            array(
                'label' => 'Radio',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-radio',
                'name' => 'term-meta[xyz-radio]',
                'type' => 'radio',
                'options' => array(
                    array(
                        'label' => 'Name 1', 
                        'id' => 'xyz-value01', 
                        'name' => 'xyz-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => 'Name 2', 
                        'id' => 'xyz-value02',
                        'name' => 'xyz-value02',
                    )
                ),
                'validate' => 'sanitize_text_field'
            ),
            array(
                'label' => 'Checkbox',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-checkbox',
                'name' => 'term-meta[xyz-checkbox]',
                'type' => 'checkbox',
                'value' => 'true',
                'validate' => 'sanitize_text_field'
            ),         
            array(
                'label' => 'Color Picker',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-color',
                'name' => 'term-meta[xyz-color]',
                'type' => 'color',
                'validate' => 'xyz_sanitize_hex'
            ),
            array(
                'label' => 'Media Library',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-image',
                'name' => 'term-meta[xyz-image]',
                'type' => 'media',
                'validate' => 'esc_url'
            ),
            array(
                'label' => 'WordPress Editor',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => 'xyz-editor',
                'name' => 'term-meta[xyz-editor]',
                'type' => 'editor',
                'validate' => 'wp_kses_post'
            )            
        )
    );