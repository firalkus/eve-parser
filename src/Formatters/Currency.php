<?php

namespace Desoto\EveParser\Formatters;

use Desoto\EveParser\Formatter;

final class Currency extends Formatter
{
    public function format(): float
    {
        if (empty($this->getOriginal())) {
            return $this->formatResult();
        }

        if (is_string($this->getOriginal())) {
            return $this->formatResult();
        }

        return $this->formatResult();
    }

    private function formatResult(): float
    {
        return round((float)str_replace(',', '', $this->getOriginal()), 2);
    }
}
