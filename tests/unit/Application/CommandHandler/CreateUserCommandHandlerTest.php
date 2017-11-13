<?php

use Mockery\MockInterface;
use Voiceworks\HexagonalApp\Application\Command\CreateUserCommand;
use Voiceworks\HexagonalApp\Application\CommandHandler\CreateUserCommandHandler;
use Voiceworks\HexagonalApp\Application\Service\Dispatcher;
use Voiceworks\HexagonalApp\Application\Service\Mailer;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserFactory;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\User;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserRepository;

/**
 * Class CreateUserCommandHandlerTest
 *
 * @coversDefaultClass CreateUserCommandHandler
 */
class CreateUserCommandHandlerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var CreateUserCommand
     */
    private $command;

    /**
     * @var dispatcher | MockInterface
     */
    private $dispatcher;

    /**
     * @var Mailer | MockInterface
     */
    private $mailer;

    /**
     * @var UserFactory | MockInterface
     */
    private $factory;

    /**
     * @var UserRepository | MockInterface
     */
    private $repository;

    /**
     * @var CreateUserCommandHandler | MockInterface
     */
    private $commandHandler;

    /**
     * @var User | MockInterface
     */
    private $userMock;

    protected function _before()
    {
        $this->repository     = Mockery::mock(UserRepository::class);
        $this->factory        = Mockery::mock(UserFactory::class);
        $this->dispatcher     = Mockery::mock(Dispatcher::class);
        $this->command        = Mockery::mock(CreateUserCommand::class);
        $this->userMock       = Mockery::mock(User::class);
        $this->mailer         = Mockery::mock(Mailer::class);
        $this->commandHandler = new CreateUserCommandHandler(
            $this->repository,
            $this->factory,
            $this->dispatcher,
            $this->mailer
        );
    }

    protected function _after()
    {
        Mockery::close();
    }

    /**
     * @covers CreateUserCommandHandler::handle()
     */
    public function testHandle()
    {
        $emailStub    = 'pepe@voiceworks.com';
        $userNameStub = 'pepe';
        $passwordStub = 'password';

        $this->configureCommand($emailStub, $userNameStub, $passwordStub);
        $this->configureFactory();
        $this->configureRepository();
        $user = $this->commandHandler->handle($this->command);
        $this->assertEquals($this->userMock, $user);
    }

    private function configureCommand($emailStub, $userNameStub, $passwordStub)
    {

        $this->command->shouldReceive('getUsername')
            ->times(1)
            ->andReturn($userNameStub);

        $this->command->shouldReceive('getEmail')
            ->times(1)
            ->andReturn($emailStub);

        $this->command->shouldReceive('getPassword')
            ->times(1)
            ->andReturn($passwordStub);
    }

    private function configureFactory()
    {

        $this->factory->shouldReceive('createUser')
            ->times(1)
            ->andReturn($this->userMock);
    }

    private function configureRepository()
    {

        $this->repository->shouldReceive('save')
            ->times(1)
            ->with($this->userMock);
    }
}