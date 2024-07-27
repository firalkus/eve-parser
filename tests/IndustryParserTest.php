<?php

use Desoto\EveParser\Parsers\Industry;
use PHPUnit\Framework\TestCase;

final class IndustryParserTest extends TestCase
{
    const TEST_STRING = "Components
Item	Required	Available	Est. Unit price	typeID
Fusion Thruster	721	728	41679.16	11532";

    public function testCanGetCorrectItem(): void
    {
        $results = Industry::analyze(explode("\n", self::TEST_STRING));

        $this->assertEquals('Fusion Thruster', $results[0]['item']);
        $this->assertEquals(721, $results[0]['required']);
        $this->assertEquals(728, $results[0]['available']);
        $this->assertEquals('41679.16 ISK', $results[0]['estimated_unit_price']);
        $this->assertEquals(11532, $results[0]['type_id']);
    }
}