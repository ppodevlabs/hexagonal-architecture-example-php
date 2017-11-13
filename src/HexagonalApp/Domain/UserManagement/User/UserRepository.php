<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 01/11/2017
 * Time: 11:15
 */

namespace Voiceworks\HexagonalApp\Domain\UserManagement\User;

interface UserRepository
{
    /**
     * @param int $id
     * @return User
     */
    public function findById(int $id) : User;

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email) : User;

    /**
     * @param int $limit
     * @param int $offset
     * @return User[]
     */
    public function findAll(int $limit, int $offset) : array;

    /**
     * @param User $user
     *
     * @return User
     */
    public function save(User $user) : User;
}