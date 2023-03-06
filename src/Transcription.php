<?php

namespace Ferasbbm\Transcription;

class Transcription
{
    private array $lines;

    /**
     * @param array $lines
     */
    public function __construct(array $lines)
    {
        $this->lines = $this->discardIrrelevantLines(array_map('trim', $lines));
    }

    /**
     * @param $path
     *
     * @return self
     * @author <ferasbbm>
     */
    public static function load($path): self
    {
        return new static(file($path));
    }

    /**
     * @param array $lines
     *
     * @return array
     * @author <ferasbbm>
     */
    private function discardIrrelevantLines(array $lines): array
    {
        return array_values(
            array_filter(
                $lines,
                fn ($line) => Line::valid($line)
            )
        );
    }

    /**
     * @return array
     * @author <ferasbbm>
     */
    public function lines(): array
    {
        return array_map(
            fn ($line) => new Line($line[ 0 ], $line[ 1 ]),
            array_chunk($this->lines, 2)
        );
    }

    /**
     * @return string
     * @author <ferasbbm>
     */
    public function __toString(): string
    {
        return implode('', $this->lines);
    }
}
