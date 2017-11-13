<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 08/11/2017
 * Time: 11:39
 */

namespace Voiceworks\HexagonalApp\Application\Service;

/**
 * Interface Mailer
 * @package Voiceworks\HexagonalApp\Domain\Service
 */
interface Mailer
{
    /**
     * @param array  $destination
     * @param string $subject
     * @param string $body
     */
    public function send(array $destination, string $subject, string $body);
}