<?php

namespace Ferasbbm\Transcription;

class Line
{
    public function __construct(int $position, string $timestamp, string $body)
    {
        //
    }

    /**
     * @return string
     * @author <ferasbbm>
     */
    public function beginningTimestamp(): string
    {
        preg_match('/^\d{2}:(\d{2}:\d{2})\.\d{3}/', $this->timestamp, $matches);

        return $matches[ 1 ];
    }

    /**
     * @param string $line
     *
     * @return bool
     * @author <ferasbbm>
     */
    public static function valid(string $line): bool
    {
        return $line !== 'WEBVTT' && $line !== '';
    }
}
