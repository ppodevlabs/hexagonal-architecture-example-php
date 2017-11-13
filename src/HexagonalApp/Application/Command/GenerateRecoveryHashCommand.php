<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 09/11/2017
 * Time: 11:16
 */

namespace Voiceworks\HexagonalApp\Application\Command;

class GenerateRecoveryHashCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function validate()
    {
        return isset($this->data['email']);
    }
}