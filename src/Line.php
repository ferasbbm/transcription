<?php

namespace Ferasbbm\Transcription;

class Line
{
    public function __construct(public string $timestamp, public string $body)
    {
        //
    }

    /**
     * @param string $line
     *
     * @return bool
     * @author <ferasbbm>
     */
    public static function valid(string $line): bool
    {
        return $line !== 'WEBVTT' && !is_numeric($line) && $line !== '';
    }
}
