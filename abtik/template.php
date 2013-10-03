<?php

/**
 * Button to bootstrap
 */
function abtik_button_class($text) {
  switch ($text) {
    case 'Save':
      return 'btn-primary';
    case 'Create':
      return 'btn-primary';
    case 'Submit':
      return 'btn-primary';
    case 'Export':
      return 'btn-primary';
    case 'Import':
      return 'btn-primary';
    case 'Rebuild':
      return 'btn-primary';
    case 'Add':
      return 'btn-info';
    case 'Update':
      return 'btn-info';
    case 'Restore':
      return 'btn-success';
    case 'Confirm':
      return 'btn-success';
    case 'Submit':
      return 'btn-success';
    case 'Delete':
      return 'btn-danger';
    case 'Remove':
      return 'btn-danger';
    case 'Filter':
      return 'btn-inverse';
  }
}

/*
 * Return Abtik region width
 * @return
 * Return the span width of the particular regions.
*/
function abtik($check_region, $span_size, $alternate_span_size, $check_region2 = NULL) {
  if ($check_region2 !== NULL) {
    if ($check_region && $check_region2) {
      $span_size = $span_size;
    } else if ($check_region || $check_region2) {
      $span_size = $alternate_span_size;
    } else {
      // print default width
      $span_size = 12;
    }
  } else {
    $span_size = $check_region ? $span_size : $alternate_span_size;
  }
  return 'span' . $span_size;
}

/**
 * Implimenting hook_process_page()
 * Allows you to use node-type based page templates.
 */
function abtik_preprocess_page(&$vars) {
  global $user;
  //Allows you to use node-type, and node ID base page templates
  if (!empty($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->vid;
  } 
}


/**
 * Implimenting hook_css_alter
 * Turning off some system.css files
 */
function abtik_css_alter(&$css) {
  // Turn off some styles from the system module
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);

}

/**
 * Implimenting hook_html_head_alter()
 */
function abtik_html_head_alter(&$vars) {
  //Change the meta content type to HTML5 content type
  $vars['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  //Unsetting the content generator. (Why keep it?)
  unset($vars['system_meta_generator']);
  
  //Adding the mobile viewport
  $vars['viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1.0',
    )
  );
  
  //If in IE, and chrome frame is available, and theme option says you can use it, USE IT!
  $vars['chrome_frame_compatability'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge,chrome=1',
    ),
    '#access' => theme_get_setting('chrome_frame_on_off'),
  );

}


/**
 * Implimenting hook_menu_tree()
 * Bootstrapping Main Menu
 */
function abtik_menu_tree($vars) {
  return '<ul class="nav nav-pills">' . $vars['tree'] . '</ul>';
}


/**
 * Implimenting hook_menu_tree()
 * Adding active class to active LIs
 */
function abtik_preprocess_menu_link(&$vars) {
  if ($vars['element']['#href'] == $_GET['q'] || (drupal_is_front_page() && $vars['element']['#href'] === '<front>')) {
    $vars['element']['#attributes']['class'][] = 'active';
  }
}


/**
 * Implimenting hook_menu_local_tasks()
 * Bootstrapping Tabs 
 */
function abtik_menu_local_tasks(&$vars) {
  $output = '';

  if (!empty($vars['primary'])) {
    $vars['primary']['#prefix'] = '<ul class="nav nav-tabs">';
    $vars['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['primary']);
  }

  if (!empty($vars['secondary'])) {
    $vars['secondary']['#prefix'] = '<ul class="nav nav-pills">';
    $vars['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['secondary']);
  }

  return $output;
}


/**
 * Implimenting hook_preprocess_table()
 * Bootstrapping Tables
 */
function abtik_preprocess_table(&$vars) {
  $vars['attributes']['class'] = array();
  $vars['attributes']['class'][] = 'table';
  $vars['attributes']['class'][] = 'table-striped';
  $vars['attributes']['class'][] = 'table-bordered';
  return;
}


/**
 * Implimenting hook_preprocess_button
 * Bootstrapping Buttons
 */
function abtik_preprocess_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn ' . abtik_button_class($vars['element']['#value']);
}

/**
 * Implimenting hook_preprocess_image_button
 * Bootstrapping Image Button
 */
function abtik_preprocess_image_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn';
}


/**
 * Bootstrapping the messages
 */
 function abtik_get_status($status) {
  if ($status == 'status') {
    return 'alert-success';
  } 
  elseif ($status == 'warning') {
    return 'alert-block';
  } 
  elseif ($status == 'error') {
    return 'alert-error';
  }
  return NULL;
}


/**
 * Implimenting theme_status_messages()
 */
function abtik_status_messages($variables) {
  $display = $variables['display'];
  $output = '';
  
  foreach (drupal_get_messages($display) as $type => $messages) {   
    $output .= '<div class="messages alert ' . abtik_get_status($type) . '" data-alert="alert">';
    
    foreach ($messages as $message) {
      $output .= $message . '<br>';
    }

    $output .= '</div>';   
  }

  return $output;
}

/**
 * Implimenting theme_form_element()
 */
function abtik_form_element($variables) {  
	$element = &$variables['element'];
	// This is also used in the installer, pre-database setup.
	$t = get_t();

	// This function is invoked as theme wrapper, but the rendered form element
	// may not necessarily have been processed by form_builder().
	$element += array(
			'#title_display' => 'before',
	);

	// Add element #id for #type 'item'.
	if (isset($element['#markup']) && !empty($element['#id'])) {
		$attributes['id'] = $element['#id'];
	}

	$attributes['class'] = array('form-item');
	
	//Add twitter bootstrap class
	$attributes['class'][] = (isset($element['#value']) && is_array($element['#value'])) ? 'control-groups' : 'control-group';

	//Check for errors and set correct error class
	if (isset($element['#parents']) && form_get_error($element)) {
		$attributes['class'][] = 'error';
	}

	if (!empty($element['#type'])) {
		$attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
	}
	if (!empty($element['#name'])) {
		$attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
	}
	// Add a class for disabled elements to facilitate cross-browser styling.
	if (!empty($element['#attributes']['disabled'])) {
		$attributes['class'][] = 'form-disabled';
	}
	$output = '<div' . drupal_attributes($attributes) . '>' . "\n";

	// If #title is not set, we don't display any label or required marker.
	if (!isset($element['#title'])) {
		$element['#title_display'] = 'none';
	}
	$prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
	$suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

 switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      // Temporary fix for hierarchical select, problem with compatibility
      $output .= ($element['#type'] != 'hierarchical_select') ? '<div class="controls">' : '';
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      // Temporary fix for hierarchical select, problem with compatibility
      $output .= ($element['#type'] != 'hierarchical_select') ? '</div>' : '';
      break;

    case 'after':
    	$output .= '<div class="controls">';
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      $output .= '</div>';
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="help-block">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
}

/**
 * Implimenting theme_form_element_label()
 */
function abtik_form_element_label($variables) {
  $element = $variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // If title and required marker are both empty, output no label.
  if ((!isset($element['#title']) || $element['#title'] === '') && empty($element['#required'])) {
    return '';
  }

  // If the element is required, a required marker is appended to the label.
  $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';

  $title = filter_xss_admin($element['#title']);

  $attributes = array();
  $attributes['class'] = array('control-label');
  $attributes['class'][] = $element['#type'];
  
  // Style the label as class option to display inline with the element.
  if ($element['#title_display'] == 'after') {
    $attributes['class'][] = 'option';
    
  }
  // Show label only to screen readers to avoid disruption in visual flows.
  elseif ($element['#title_display'] == 'invisible') {
    $attributes['class'] = 'element-invisible';
  }

  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }

  // The leading whitespace helps visually separate fields from inline labels.
  return ' <label' . drupal_attributes($attributes) . '>' . $t('!title !required', array('!title' => $title, '!required' => $required)) . "</label>\n";
}
