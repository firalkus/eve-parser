<?php

namespace Desoto\EveParser;

abstract class Parser
{
    protected array $definitions = [];

    protected array $mappings = [];

    public function regexMatchLines(array $lines): array
    {
        $matches = [];
        $badLines = [];

        foreach ($this->definitions as $definition) {
            foreach ($lines as $line) {
                if (preg_match($definition, $line, $match)) {
                    $matches[] = array_slice($match, 1);
                } else {
                    $badLines[] = $line;
                }
            }
        }

        $matches = collect(
            array_map(function (array $line) {
                return array_intersect_key($line, array_flip(array_keys($this->mappings)));
            }, $matches))
            ->map(function ($item) {
                $lineItems = [];

                foreach ($item as $key => $value) {
                    if (in_array($key, array_keys($this->mappings)) && class_exists($this->mappings[$key])) {
                        /** @var Formatter $formatter */
                        $formatter = (new $this->mappings[$key]($value));

                        $lineItems[$key] = $formatter->getValue();
                        continue;
                    }

                    $lineItems[$this->mappings[$key]] = $value;
                }

                return $lineItems;
            })
            ->toArray();

        return [
            'matches' => $matches,
            'bad_lines' => $badLines
        ];
    }

    public function parse(array $lines): array
    {
        $matches = $this->regexMatchLines($lines);

        return $matches['matches'];
    }

    public static function analyze(array $lines): array
    {
        return (new static())->parse($lines);
    }
}