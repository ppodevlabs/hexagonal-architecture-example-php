<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 09/11/2017
 * Time: 11:21
 */

namespace Voiceworks\HexagonalApp\Application\CommandHandler;


use Voiceworks\HexagonalApp\Domain\Command;
use Voiceworks\HexagonalApp\Domain\CommandHandler;
use Voiceworks\HexagonalApp\Application\Service\Mailer;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserRepository;

class GenerateRecoveryHashCommandHandler implements CommandHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * GenerateRecoveryHastCommand constructor.
     *
     * @param UserRepository $userRepository
     * @param Mailer         $mailer
     */
    public function __construct(UserRepository $userRepository, Mailer $mailer)
    {
        $this->userRepository = $userRepository;
        $this->mailer         = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(Command $command)
    {
        $user = $this->userRepository->findByEmail($command->email);

        $user->generateRecoveryHash();

        $this->mailer->send(array($user->getEmail()), 'subject', 'message');
    }
}