<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 04/11/2017
 * Time: 11:05
 */

namespace Voiceworks\HexagonalApp\Infrastructure\Repository;

use Voiceworks\HexagonalApp\Domain\UserManagement\User\User;
use Voiceworks\HexagonalApp\Domain\UserManagement\User\UserRepository;

class MemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private $users;

    public function findById(int $id): User
    {
        return isset($this->users[$id]) ? $this->users[$id] : null;
    }

    public function findByEmail(string $email): User
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() == $email) {
                return $user;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function save(User $user) : User
    {
        $this->users[$user->getId()] = $user;

        return $user;
    }

    public function findAll(int $limit, int $offset): array
    {
        return $this->users;
    }

}