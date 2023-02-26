<?php

namespace Ferasbbm\Transcription;

class Transcription
{
    private array $lines;

    /**
     * @param $path
     *
     * @return self
     * @author <ferasbbm>
     */
    public static function load($path): self
    {
        $instance = new static();
        $instance->lines = $instance->discardIrrelevantLines(file($path));

        return $instance;
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
                array_map('trim', $lines),
                fn ($line) => $line !== 'WEBVTT' && !is_numeric($line) && $line !== ''
            )
        );
    }

    /**
     * @return array
     * @author <ferasbbm>
     */
    public function lines(): array
    {
        return $this->lines;
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
