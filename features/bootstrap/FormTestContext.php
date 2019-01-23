<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Drupal\DrupalExtension\Context\DrupalContext;
use Behat\Behat\Tester\Exception\PendingException;

class FormTestContext extends RawMinkContext {

  /**
   * @Given I am going to :arg1 page
   */
  public function iAmGoingToPage($arg1)
  {
    $session = $this->getSession();
    $session->visit($this->locatePath($arg1));
  }

  /**
   * @When I fill field :arg1 with value :arg2
   */
  public function iFillFieldWithValue($arg1, $arg2)
  {
    $this->getSession()->getPage()->fillField($arg1, $arg2);
  }

  /**
   * @When I press button :arg1
   */
  public function iPressButton($arg1)
  {
    $button = $this->assertSession()
      ->elementExists('css', '.form-submit');
    $button->press();
  }

  /**
   * @Then I go to main site page
   */
  public function iGoToMainSitePage()
  {
    $this->visitPath('/');
  }


}