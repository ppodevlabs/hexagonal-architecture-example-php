<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 09/11/2017
 * Time: 11:17
 */

namespace Voiceworks\HexagonalApp\Domain\UserManagement\User;

class Address
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }


}