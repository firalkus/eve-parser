<?php

namespace Desoto\EveParser\Formatters;

use Desoto\EveParser\Formatter;

final class Number extends Formatter
{
    public function format(): int
    {
        if (empty($this->getOriginal())) {
            return 0;
        }

        if (is_string($this->getOriginal())) {
            return intval(str_replace(',', '', $this->getOriginal()));
        }

        return 0;
    }
}
