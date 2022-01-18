<?php

namespace Drupal\bakery\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Defines a social menu block.
 *
 * @Block(
 *  id = "bakery_block",
 *  admin_label = @Translation("Bakery"),
 * )
 */
class BakeryBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\bakery\Form\SettingsForm');
      return [
        $form,
        '#theme' => 'bakery',
        '#attached' => ['library' => ['bakery/bakery']],
        /*         
        '#first_name' => \Drupal::state()->get('bakery.first_name'),
        '#last_name' => \Drupal::state()->get('bakery.last_name'),
        '#phone' => \Drupal::state()->get('bakery.phone'),
        */

      ];
  }

}
