<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 01/11/2017
 * Time: 16:38
 */

namespace Voiceworks\HexagonalApp\Application\CommandHandler;

use Voiceworks\HexagonalApp\Domain\Command;
use Voiceworks\HexagonalApp\Domain\CommandHandler;
use Voiceworks\HexagonalApp\Application\Service\Dispatcher;
use Voiceworks\HexagonalApp\Application\Service\Mailer;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserCreatedEvent;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserFactory;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserRepository;

class CreateUserCommandHandler implements CommandHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * CreateUserCommandHandler constructor.
     *
     * @param UserRepository $repository
     * @param UserFactory    $factory
     * @param Dispatcher     $dispatcher
     * @param Mailer         $mailer
     */
    public function __construct(
        UserRepository $repository,
        UserFactory $factory,
        Dispatcher $dispatcher,
        Mailer $mailer
    ) {
        $this->userRepository = $repository;
        $this->userFactory    = $factory;
        $this->dispatcher     = $dispatcher;
        $this->mailer         = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(Command $command)
    {
        $user = $this->userFactory->createUser(
            $command->username,
            $command->password,
            $command->email
        );

        return $this->userRepository->save($user);
    }

}