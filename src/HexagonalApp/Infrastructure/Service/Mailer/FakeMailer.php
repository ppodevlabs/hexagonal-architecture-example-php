<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 08/11/2017
 * Time: 19:24
 */

namespace Voiceworks\HexagonalApp\Infrastructure\Service\Mailer;

use Voiceworks\HexagonalApp\Application\Service\Mailer;

class FakeMailer implements Mailer
{
    /**
     * {@inheritdoc}
     */
    public function send(array $destination, string $subject, string $body)
    {
        // TODO: Implement send() method.
    }
}