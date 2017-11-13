Feature: User Management
  Scenario: create new user
    When i try to register a new user with the following data:
      | username | pedrop                           |
      | password | password                         |
      | email    | pedro.parraortega@voiceworks.com |
    Then a user should be create with the following data:
      | username | pedrop                           |
      | password | password                         |
      | email    | pedro.parraortega@voiceworks.com |
    And a new mail should be sent
  Scenario: generate a recovery hash key
    Given that user with email "pedro.parraortega@voiceworks.com" exists
    When i try to generate a recovery hash key for the user with email "pedro.parraortega@voiceworks.com"
    Then the user with email "pedro.parraortega@voiceworks.com" should have a hash key created