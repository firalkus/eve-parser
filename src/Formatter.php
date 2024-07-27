<?php

namespace Desoto\EveParser;

abstract class Formatter
{
    public function __construct(private readonly mixed $original)
    {
    }

    public function getOriginal()
    {
        return $this->original;
    }

    public function getValue()
    {
        return $this->format();
    }

    abstract public function format();
}