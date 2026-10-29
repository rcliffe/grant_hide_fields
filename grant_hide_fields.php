<?php
declare(strict_types = 1);

// phpcs:disable PSR1.Files.SideEffects
require_once 'grant_hide_fields.civix.php';
// phpcs:enable

use CRM_GrantHideFields_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function grant_hide_fields_civicrm_config(\CRM_Core_Config $config): void {
  _grant_hide_fields_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function grant_hide_fields_civicrm_install(): void {
  _grant_hide_fields_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function grant_hide_fields_civicrm_enable(): void {
  _grant_hide_fields_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * Hides the configured rows on the grant add/edit and view screens. The fields are hidden
 * with CSS rather than removed from the form, because the grant form's save resets
 * "report received" and the note when their values are missing.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_buildForm
 */
function grant_hide_fields_civicrm_buildForm($formName, &$form): void {
  $rowPrefixes = [
    'CRM_Grant_Form_Grant' => 'crm-grant-form-block-',
    'CRM_Grant_Form_GrantView' => 'crm-grant-view-form-block-',
  ];
  if (!isset($rowPrefixes[$formName])) {
    return;
  }
  $hidden = array_intersect((array) Civi::settings()->get('grant_hide_fields_hidden'), array_keys(CRM_GrantHideFields_Fields::getOptions()));
  if (!$hidden) {
    return;
  }

  $selectors = array_map(fn($field) => '.' . $rowPrefixes[$formName] . $field, $hidden);
  // page-body is rendered for full pages and popups alike.
  CRM_Core_Region::instance('page-body')->add([
    'markup' => '<style>' . implode(', ', $selectors) . ' { display: none; }</style>',
  ]);
}
