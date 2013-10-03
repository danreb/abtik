<?php

/**
 * Implements hook_form_FORM_ID_alter().
 */
 
function abtik_form_system_theme_settings_alter(&$form, $form_state) {

  $form['chrome_frame'] = array( 
    '#type' => 'fieldset',
    '#title' => 'IE Compatability',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['chrome_frame']['chrome_frame_on_off'] = array(
    '#type' => 'checkbox',
    '#title' => t('Edge and Chrome Frame Meta Tag'),
    '#description' => t('Forces Edge and Chrome Frame on IE if enabled.'),
    '#default_value' => theme_get_setting('chrome_frame_on_off'),
  );
  $form['abtik_settings']['footer'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['abtik_settings']['footer']['footer_credits'] = array(
      '#type' => 'checkbox',
      '#title' => t('Show theme credits in footer'),
      '#default_value' => theme_get_setting('footer_credits'),
      '#description'   => t("Check this option to show copyright text in footer. Uncheck to hide."),
  );
  $form['abtik_settings']['footer']['footer_credits_label'] = array(
      '#type' => 'textfield',
      '#title' => t('Footer credit label'),
      '#default_value' => t(theme_get_setting('footer_credits_label')),
      '#description'   => t("This will change the label for the credits."),
      '#states' => array(
          'invisible' => array(
              'input[name="footer_credits"]' => array('checked' => FALSE),      
          ),
      ),
  );
  $form['abtik_settings']['footer']['footer_credits_url'] = array(
      '#type' => 'textfield',
      '#title' => t('Footer credit URL'),
      '#default_value' => t(theme_get_setting('footer_credits_url')),
      '#description'   => t("Change this to your url path. format: http://mydomain.com/path | Text for url"),
      '#states' => array(
          'visible' => array(
              ':input[name="footer_credits"]' => array('checked' => TRUE),
          ),
      ),
  );
  return $form;
}
