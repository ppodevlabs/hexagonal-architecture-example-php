<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 08/11/2017
 * Time: 15:07
 */

namespace Voiceworks\HexagonalApp\Infrastructure\Service\Dispatcher;


use Voiceworks\HexagonalApp\Application\Service\Dispatcher;
use Voiceworks\HexagonalApp\Domain\Event\DomainEvent;

class FakeEventDispatcher implements Dispatcher
{
    /**
     * @param DomainEvent $event
     */
    public function dispatch(DomainEvent $event)
    {
        // TODO: Implement dispatch() method.
    }
}