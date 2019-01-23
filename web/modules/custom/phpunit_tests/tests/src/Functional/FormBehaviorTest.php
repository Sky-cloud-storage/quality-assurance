<?php

  /**
   * @file
   * Contains \Drupal\Tests\phpunit_tests\Functional\FormBehaviorTest.
   */

  namespace Drupal\Tests\phpunit_tests\Functional;

  use Drupal\Tests\BrowserTestBase;

  /**
   * Test the existence of Form.
   *
   * @group phpunit_tests
   */
  class FormBehaviorTest extends BrowserTestBase {

    /**
     * Modules to enable.
     *
     * @var array
     */
    protected static $modules = [
      'phpunit_tests',
      'node',
      'toolbar',
      'admin_toolbar',
    ];

    /**
     * A test user with permission to access the administrative toolbar.
     *
     * @var \Drupal\user\UserInterface
     */
    protected $adminUser;

    /**
     * We use the minimal profile because we want to test local action links.
     *
     * @var string
     */
    protected $profile = 'minimal';


    /**
     * {@inheritdoc}
     */
    protected function setUp() {
      parent::setUp();

      // Create an article content type that we will use for testing.
//      $type = $this->container->get('entity_type.manager')->getStorage('node_type')
//        ->create([
//          'type' => 'article',
//          'name' => 'Article',
//        ]);
//      $type->save();
//      $this->container->get('router.builder')->rebuild();

            $this->drupalCreateContentType(['type' => 'article', 'name' => 'Article']);
//      $this->page = new Page(['id' => 'contact_us'], 'page');





    }

    function testAccessToPage() {
      $session = $this->getSession();
      $assert = $this->assertSession();


      $account_1 = $this->drupalCreateUser([
//          'administer site configuration',
//        'access toolbar',
        'access content',
        'create article content',
//        'administer nodes',
//          'access administration pages',
      ]);

      if (!$this->adminUser || $account_1) {
        $pageSession = $session->getPage();
        $this->drupalGet('/contact_form');
//        $this->initFrontPage();
      }
//      if ($account_1) {
//        $pageSession = $session->getPage();
//        $this->drupalLogin($account_1);
//        $this->drupalGet('/contact_us');
////        $this->initFrontPage();
//      }


    }


  }