<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 01/11/2017
 * Time: 16:29
 */

namespace Voiceworks\HexagonalApp\Domain;


/**
 * Interface CommandHandler
 */
interface CommandHandler
{
    /**
     * @param Command $command
     * @return mixed
     */
    public function handle(Command $command);

}