@api
Feature: Test contact us form
  In order for a customer to be able to contact us
  As a website anonymous user
  I need to be able to successfully submit the form

  Scenario: Make sure that anonymous users see the contact form
    Given I am not logged in
    And I am going to "/contact_us" page
    Then I should see the "Save" button
    When I fill field "gender" with value "male"
    And I fill field "name" with value "John"
    When I press button "Save"
    And I break
    Then I should see "Thank you for your message Mister John!"
    And I go to main site page
