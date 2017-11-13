<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 08/11/2017
 * Time: 12:22
 */

namespace Voiceworks\HexagonalApp\Application\Service;

use Voiceworks\HexagonalApp\Domain\Event\DomainEvent;

interface Dispatcher
{
    /**
     * @param DomainEvent $event
     */
    public function dispatch(DomainEvent $event);
}