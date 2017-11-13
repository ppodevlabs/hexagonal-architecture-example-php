<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 01/11/2017
 * Time: 16:30
 */

namespace Voiceworks\HexagonalApp\Application;

use Voiceworks\HexagonalApp\Domain\Command;

interface CommandBus
{
    public function execute(Command $command);

}