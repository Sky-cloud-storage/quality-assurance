<?php


  /**
   * @file
   * Contains \Drupal\Tests\phpunit_tests\FunctionalJavascript\AccessToPageTest.
   */

  namespace Drupal\Tests\phpunit_tests\FunctionalJavascript;

  use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
  use Drupal\page_manager\Entity\Page;
  use Drupal\page_manager\Entity\PageAccess;
  use Drupal\page_manager\PageInterface;

  /**
   * Test the existence form.
   *
   * @group phpunit_tests
   */
  class AccessToPageTest extends WebDriverTestBase {

    /**
     * Modules to enable.
     *
     * @var array
     */
    protected static $modules = [
      'phpunit_tests',
      'node',
      'toolbar',
      'system',
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

      // Set the front page to "/contact_form".
      \Drupal::configFactory()
        ->getEditable('system.site')
        ->set('page.front', '/contact_form')
        ->save(TRUE);




    }

    function testAccessToPage() {
      $session = $this->getSession();
      $assert = $this->assertSession();


      $account_1 = $this->drupalCreateUser([
          'administer site configuration',
//        'access toolbar',
        'access content',
        'create article content',
//        'administer nodes',
//          'access administration pages',
      ]);

//      if ($this->adminUser) {
//      $this->drupalLogin($account_1);
        $pageSession = $session->getPage();
        $this->drupalGet('<front>');
      $assert->statusCodeEquals(200);

        $this->getSession()->wait(4000);



    }


  }