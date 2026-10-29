<?php
declare(strict_types = 1);

use CRM_GrantHideFields_ExtensionUtil as E;

return [
  'grant_hide_fields_hidden' => [
    'name' => 'grant_hide_fields_hidden',
    'type' => 'Array',
    'html_type' => 'checkboxes',
    'pseudoconstant' => [
      'callback' => ['CRM_GrantHideFields_Fields', 'getOptions'],
    ],
    'default' => ['amount_requested', 'grant_due_date', 'grant_report_received', 'rationale', 'note'],
    'is_domain' => 1,
    'is_contact' => 0,
    'title' => E::ts('Hidden grant fields'),
    'description' => E::ts('Fields to hide on the grant add, edit and view screens. Existing values are kept.'),
    'settings_pages' => ['grant_hide_fields' => ['weight' => 10]],
  ],
];
