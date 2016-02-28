<?php

	// Hex color validation
    function xyz_sanitize_hex($x) {
        if ('' === $x) {
            return '';
        }     
        // 3 or 6 hex digits, or the empty string.
        if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $x)) {
            return $x;
        }
        return null;
    }

	// Date validation
    function xyz_sanitize_date($x) {
    	// Get each value in the date - month, day, year
        $date = preg_match('/(\d{2})\/(\d{2})\/(\d{4})/', $x, $match);

        if ($date == '1' && checkdate($match[1], $match[2], $match[3])) {
        	return $x;
        } else {
        	return null;
        }
    }

	// Use wp_kses to allow only certain html values in text and text area fields
    function xyz_sanitize_html($x) {
	    $args = array(
		    'strong' => array(),
		    'em'     => array(),
		    'b'      => array(),
		    'i'      => array(),
		    'br'     => array(),
		);
		return wp_kses($x, $args);
	}

	// For santizing numbers
    function xyz_sanitize_number($x) {
	    if ($x === '0') {
	    	return '0';
	    } elseif (is_numeric($x)) {
    		return floatval($x);
	    } else {
	    	return null;
	    }
	}

	// If a number is over a certain amount, don't update (for ratings)
    function xyz_sanitize_rating($x) {
	    if ($x === '0') {
	    	return '0';
	    } elseif (is_numeric($x) && $x <= 5) {
    		return floatval($x);
	    } elseif (is_numeric($x) && $x > 5) {
    		return 5;
	    } else {
	    	return null;
	    }	    
	}
	
	// If the value is a number, left, right, or center (for positioning background)
	function xyz_sanitize_image_x_pos($x) {
	    if ($x === '0') {
	    	return '0';
	    } elseif (is_numeric($x)) {
    		return floatval($x);
	    } elseif (strtolower($x) == 'center') {
	    	return 'center';
	    } elseif (strtolower($x) == 'left') {
	    	return 'left';
	    } elseif (strtolower($x) == 'right') {
	    	return 'right';
	    } else {
	    	return null;
	    }		
	}

	// If the value is a number, top, bottom, or center (for positioning background)
	function xyz_sanitize_image_y_pos($x) {
	    if ($x === '0') {
	    	return '0';
	    } elseif (is_numeric($x)) {
    		return floatval($x);
	    } elseif (strtolower($x) == 'center') {
	    	return 'center';
	    } elseif (strtolower($x) == 'top') {
	    	return 'top';
	    }  elseif (strtolower($x) == 'bottom') {
	    	return 'bottom';
	    } else {
	    	return null;
	    }		
	}

	// If the value is a number or auto (for positioning content)
	function xyz_sanitize_pos($x) {
	    if ($x === '0') {
	    	return '0';
	    } elseif (is_numeric($x)) {
    		return floatval($x);
	    } elseif (strtolower($x) == 'auto') {
	    	return 'auto';
	    } else {
	    	return null;
	    }			
	}