<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 08/11/2017
 * Time: 11:28
 */

namespace Voiceworks\HexagonalApp\Domain\UserManagement\User;

use Voiceworks\HexagonalApp\Domain\Event\DomainEvent;
use Voiceworks\HexagonalApp\Domain\UserManagement\User;

class UserCreatedEvent implements DomainEvent
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