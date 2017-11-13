<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 09/11/2017
 * Time: 10:45
 */

namespace Voiceworks\HexagonalApp\Domain\UserManagement\User;

use Voiceworks\HexagonalApp\Domain\Event\DomainEvent;
use Voiceworks\HexagonalApp\Domain\UserManagement\User;

class PasswordChangedEvent implements DomainEvent
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

}