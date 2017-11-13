<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 01/11/2017
 * Time: 16:32
 */

namespace Voiceworks\HexagonalApp\Application\Command;


class CreateUserCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function validate()
    {
        return isset($this->data['email'])
            && isset($this->data['password'])
            && isset($this->data['username']);
    }
}