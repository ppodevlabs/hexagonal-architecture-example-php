<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedroparraortega
 * Date: 13/11/2017
 * Time: 08:15
 */

namespace Voiceworks\HexagonalApp\Application\Command;

use Voiceworks\HexagonalApp\Domain\BadCommandException;
use Voiceworks\HexagonalApp\Domain\Command as BaseCommand;

abstract class Command implements BaseCommand
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Command constructor.
     *
     * @param array $data
     *
     * @throws BadCommandException
     */
    public function __construct(array $data)
    {
        $this->data = $data;

        if (!$this->validate()) {
            throw new BadCommandException();
        }
    }

    /**
     * @param string $property
     *
     * @return mixed|null
     */
    public function __get(string $property)
    {
        return $this->hasProperty($property)
            ? $this->data[$property]
            : null;
    }

    /**
     * @param string $property
     *
     * @return bool
     */
    public function hasProperty(string $property)
    {
        return isset($this->data[$property]);
    }

    /**
     * @return bool
     * @throws BadCommandException
     */
    abstract protected function validate();
}