<?php

namespace Ferasbbm\Transcription;

class Transcription
{
    /**
     * @param $path
     *
     * @return string
     * @author <ferasbbm>
     */
    public static function load($path): string
    {
        return file_get_contents($path);
    }
}
