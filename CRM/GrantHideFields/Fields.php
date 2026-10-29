<?php
declare(strict_types = 1);

use CRM_GrantHideFields_ExtensionUtil as E;

/**
 * Grant fields that can be hidden on the grant screens.
 */
class CRM_GrantHideFields_Fields {

  /**
   * Gets the hideable fields, keyed by the name used in the grant screens' row classes.
   *
   * @return array
   */
  public static function getOptions(): array {
    return [
      'amount_requested' => E::ts('Amount Requested (original currency)'),
      'grant_due_date' => E::ts('Grant Report Due'),
      'grant_report_received' => E::ts('Grant Report Received'),
      'rationale' => E::ts('Rationale'),
      'note' => E::ts('Notes'),
      'attachment' => E::ts('Attachments'),
    ];
  }

}
