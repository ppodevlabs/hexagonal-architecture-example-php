<?php

use Behat\Gherkin\Node\TableNode;
use Voiceworks\HexagonalApp\Application\Command\CreateUserCommand;
use Voiceworks\HexagonalApp\Application\Command\GenerateRecoveryHashCommand;
use Voiceworks\HexagonalApp\Application\CommandHandler\GenerateRecoveryHashCommandHandler;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserFactory;
use Voiceworks\HexagonalApp\Application\CommandHandler\CreateUserCommandHandler;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserRepository;
use Voiceworks\HexagonalApp\Infrastructure\Repository\MemoryUserRepository;
use Voiceworks\HexagonalApp\Infrastructure\Service\Dispatcher\FakeEventDispatcher;
use Voiceworks\HexagonalApp\Infrastructure\Service\Mailer\FakeMailer;


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var UserFactory
     */
    protected $userFactory;
    protected $dispatcher;
    protected $mailer;

    /**
     * @When i try to register a new user with the following data:
     */
    public function iTryToRegisterANewUserWithTheFollowingData(TableNode $tableNode)
    {
        $this->initializeProperties();

        $userData             = $tableNode->getRowsHash();
        $command              = new CreateUserCommand(
            $userData['username'],
            $userData['password'],
            $userData['email']
        );
        $handler              = new CreateUserCommandHandler(
            $this->userRepository,
            $this->userFactory,
            $this->dispatcher,
            $this->mailer
        );
        $handler->handle($command);

    }

    /**
     * @Then a user should be create with the following data:
     */
    public function aUserShouldBeCreateWithTheFollowingData(TableNode $tableNode)
    {
        $userData = $tableNode->getRowsHash();
        $user     = $this->userRepository->findByEmail($userData['email']);
        $this->assertEquals($user->getUsername(), $userData['username']);
        $this->assertEquals($user->getPassword(), $userData['password']);
    }

    /**
     * @Then a new mail should be sent
     */
    public function aNewMailShouldBeSent()
    {
        $this->assertEquals(true, true);
    }

    /**
     * @Given that user with email :email exists
     */
    public function thatUserWithEmailExists($email)
    {
        $this->initializeProperties();
        $user = $this->userFactory->createUser('pepe', 'pass', $email);
        $this->userRepository->save($user);
    }

    /**
     * @When i try to generate a recovery hash key for the user with email :arg1
     */
    public function iTryToGenerateARecoveryHashKeyForTheUserWithEmail($arg1)
    {
        $command = new GenerateRecoveryHashCommand($arg1);
        $commandHandler = new GenerateRecoveryHashCommandHandler($this->userRepository, $this->mailer);
        $commandHandler->handle($command);
    }

    /**
     * @Then the user with email :arg1 should have a hash key created
     */
    public function theUserWithEmailShouldHaveAHashKeyCreated($arg1)
    {
        $user = $this->userRepository->findByEmail($arg1);

        $this->assertNotNull($user->getRecoveryHash());
    }

    private function initializeProperties()
    {
        $this->userRepository = new MemoryUserRepository();
        $this->userFactory    = new UserFactory();
        $this->dispatcher     = new FakeEventDispatcher();
        $this->mailer         = new FakeMailer();
    }
}
