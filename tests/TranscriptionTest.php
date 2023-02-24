<?php


use PHPUnit\Framework\TestCase;
use Ferasbbm\Transcription\Transcription;

class TranscriptionTest extends TestCase
{
    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_load_a_vtt_file(): void
    {
        $this->assertStringEqualsFile(__DIR__ . '/stubs/basic-example.vtt', Transcription::load(__DIR__ . '/stubs/basic-example.vtt'));
    }
}
