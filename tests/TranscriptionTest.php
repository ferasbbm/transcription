<?php


use PHPUnit\Framework\TestCase;
use Ferasbbm\Transcription\Line;
use Ferasbbm\Transcription\Transcription;

class TranscriptionTest extends TestCase
{

    protected Transcription $transcription;

    /**
     * @return void
     * @author <ferasbbm>
     */
    protected function setUp(): void
    {
        $this->transcription = Transcription::load(__DIR__ . '/stubs/basic-example.vtt');
    }

    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_load_a_vtt_file_as_a_string(): void
    {
        $this->assertStringContainsString('Here is a', $this->transcription);
    }

    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_can_convert_to_an_array_of_line_objects(): void
    {
        $this->assertCount(2, $this->transcription->lines());
        $this->assertContainsOnlyInstancesOf(Line::class, $this->transcription->lines());
    }

    /**
     * @test
     * @return void
     * @author <ferasbbm>
     */
    function it_discards_irrelevant_lines(): void
    {
        $this->assertStringNotContainsString('WEBVTT', $this->transcription);
        $this->assertCount(2, $this->transcription->lines());
    }
}
