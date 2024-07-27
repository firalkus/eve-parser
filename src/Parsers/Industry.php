<?php

namespace Desoto\EveParser\Parsers;

use Desoto\EveParser\Formatters\Currency;
use Desoto\EveParser\Formatters\Number;
use Desoto\EveParser\Parser;

final class Industry extends Parser
{
    protected array $definitions = [
        "/(?P<item>[^\t]*)\t(?P<required>\d+)\t(?P<available>\d+)\t(?P<estimated_unit_price>[^\t]*)\t(?P<type_id>[^\t]*)/"
    ];

    protected array $mappings = [
        'item',
        'required' => Number::class,
        'available' => Number::class,
        'estimated_unit_price' => Currency::class,
        'type_id' => Number::class,
    ];
}
