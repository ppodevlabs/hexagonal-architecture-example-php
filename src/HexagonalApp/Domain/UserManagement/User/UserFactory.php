<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 07/11/2017
 * Time: 18:00
 */

namespace Voiceworks\HexagonalApp\Domain\UserManagement\User;

class UserFactory
{
    /**
     * @param string       $username
     * @param string       $password
     * @param string       $email
     * @param Address|null $address
     *
     * @return User
     */
    public function createUser(string $username, string $password, string $email, Address $address = null): User
    {
        return new User($username, $password, $email, $address);
    }
}