<?php


use PHPUnit\Framework\TestCase;
use Ferasbbm\Transcription\Line;
use Ferasbbm\Transcription\Transcription;

class TranscriptionTest extends TestCase
{
    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_load_a_vtt_file_as_a_string(): void
    {
        $file = __DIR__ . '/stubs/basic-example.vtt';
        $transcription = Transcription::load($file);

        $this->assertStringContainsString('Here is a', $transcription);
    }

    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_can_convert_to_an_array_of_line_objects(): void
    {
        $file = __DIR__ . '/stubs/basic-example.vtt';
        $lines = Transcription::load($file)->lines();

        $this->assertCount(2, $lines);
        $this->assertContainsOnlyInstancesOf(Line::class, $lines);
    }

    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_discards_irrelevant_lines(): void
    {
        $file = __DIR__ . '/stubs/basic-example.vtt';
        $transcription = Transcription::load($file);

        $this->assertStringNotContainsString('WEBVTT', $transcription);
        $this->assertCount(2, $transcription->lines());
    }
}
