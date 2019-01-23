@api
Feature: Test contact us form
  In order for a customer to be able to contact us
  As a website anonymous user
  I need to be able to successfully submit the form

  Scenario: Make sure that anonymous users see the contact form
    Given I am not logged in
    And I am at "/contact_us"
    Then I should see the "Save" button
    When I fill in "gender" with "male"
    And I fill in "name" with "John"
    And I press "Save"
    Then I should see "Thank you for your message Mister John!"
