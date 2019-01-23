<?php

  /**
   * @file
   * Contains \Drupal\Tests\phpunit_tests\FunctionalJavascript\SubmitFormTest.
   */
  namespace Drupal\Tests\phpunit_tests\FunctionalJavascript;

  use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

  /**
   * Test form behavior.
   *
   * @group phpunit_tests
   */
  class SubmitFormTest extends WebDriverTestBase {

    /**
     * Modules to enable.
     *
     * @var array
     */
    protected static $modules = [
      'toolbar',
      'admin_toolbar',
      'system',
      'phpunit_tests',
    ];

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
      parent::setUp();

      $account_1 = $this->drupalCreateUser(['access content']);
      $this->drupalLogin($account_1);

    }

    function testCustomSubmit() {
      $session = $this->getSession();
      $assert = $this->assertSession();
      $pageSession = $session->getPage();
      $this->drupalGet('/contact_form');

      $pageSession->fillfield('gender', 'male');
      $pageSession->fillfield('name', 'John');
      $pageSession->fillfield('subject', 'Default text to test message.');
      $pageSession->fillfield('email', 'test@mail.com');
      $this->getSession()->wait(4000);
      $assert->buttonExists('Save');
      $pageSession->pressButton('Save');

      $messages = $pageSession->find('css', '.messages--status');
      $message = $messages->getText();
      $this->getSession()->wait(4000);
      $this->assertEquals('Status message Thank you for your message Mister John!', $message, 'Incorrect message found, check your $message variable!');
    }

  }