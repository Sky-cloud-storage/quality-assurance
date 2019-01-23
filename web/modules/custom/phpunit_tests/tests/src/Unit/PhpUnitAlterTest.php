<?php

  /**
   * @file
   * Contains \Drupal\Tests\phpunit_tests\Unit\PhpUnitAlterTest.
   */

  namespace Drupal\Tests\phpunit_tests\Unit;

  use Drupal\Tests\UnitTestCase;

  /**
   * Test the existence of Admin Toolbar module.
   *
   * @group phpunit_tests
   */
  class PhpUnitAlterTest extends UnitTestCase {

    /**
     * Modules to enable.
     *
     * @var array
     */
    protected static $modules = [
      'phpunit_tests',
      'node',
    ];

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
      parent::setUp();


    }





  }