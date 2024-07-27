<?php

namespace Desoto\EveParser\Formatters;

use Desoto\EveParser\Formatter;

final class Currency extends Formatter
{
    public function format(): string
    {
        if (empty($this->getOriginal())) {
            return $this->formatResult($this->getOriginal());
        }

        if (is_string($this->getOriginal())) {
            return $this->formatResult(
                round((float)str_replace(',', '', $this->getOriginal()),2)
            );
        }

        return $this->formatResult($this->getOriginal());
    }

    private function formatResult(float $value): string
    {
        return sprintf(
            "%s ISK",
            $value
        );
    }
}