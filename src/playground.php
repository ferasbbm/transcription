<?php

use Ferasbbm\Transcription\Transcription;

require 'vendor/autoload.php';

$path = __DIR__ . '/../tests/stubs/basic-example.vtt';

var_dump(Transcription::load($path));
