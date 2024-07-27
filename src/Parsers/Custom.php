<?php

namespace Desoto\EveParser\Parsers;

use Desoto\EveParser\Parser;

final class Custom extends Parser
{
    public function setDefinitions(array $definitions): Custom
    {
        $this->definitions = $definitions;

        return $this;
    }

    public function setMappings(array $mappings): Custom
    {
        $this->mappings = $mappings;

        return $this;
    }
}
