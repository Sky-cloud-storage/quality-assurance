<?php

  namespace Drupal\phpunit_tests\Plugin\Block;

  use Drupal\Core\Block\BlockBase;

  /**
   * Provides a 'Contact Form' Block.
   *
   * @Block(
   *   id = "contact_admin_form",
   *   admin_label = @Translation("Contact Form block"),
   *   category = @Translation("Unit Testing block"),
   * )
   */
  class ContactBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
      $form = \Drupal::formBuilder()->getForm('\Drupal\phpunit_tests\Form\ContactUsForm');
      return $form;
    }

  }
