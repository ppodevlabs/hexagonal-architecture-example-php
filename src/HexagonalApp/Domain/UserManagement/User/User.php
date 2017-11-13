<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 01/11/2017
 * Time: 11:06
 */

namespace Voiceworks\HexagonalApp\Domain\UserManagement\User;

class User
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $recoveryHash;

    /**
     * @var Address
     */
    protected $address;

    /**
     * User constructor.
     *
     * @param string       $username
     * @param string       $password
     * @param string       $email
     * @param Address|null $address
     */
    public function __construct(
        string $username,
        string $password,
        string $email,
        Address $address = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email    = $email;
        $this->id       = md5($email);
        $this->address  = $address;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRecoveryHash()
    {
        return $this->recoveryHash;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Generate a recovery hash key to recover password
     */
    public function generateRecoveryHash()
    {
        $codedText          = $this->createHash();
        $this->recoveryHash = $codedText;
    }

    /**
     * @return string
     */
    private function createHash()
    {
        $now         = new \DateTime();
        $uncodedText = sprintf('%s-%s', $this->email, $now->format('Y-m-d'));

        return md5($uncodedText);
    }
}