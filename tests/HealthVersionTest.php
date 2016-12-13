<?php
namespace GenTux\Healthz;

use GenTux\Healthz\HealthVersion;
use Mockery;
use Exception;
use GenTux\Healthz\Exceptions\HealthWarningException;


class HealthVersionTest extends \TestCase
{
    protected $correctPathHealthVersion;

    protected $badPathHealthVersion;

    public function setUp()
    {
        parent::setUp();

        $this->correctPathHealthVersion = new HealthVersion("tests/committest.txt");
        $this->badPathHealthVersion = new HealthVersion("badpath.txt");
    }

    /** @test */
    public function it_returns_true_when_version_matches()
    {
        $this->assertTrue($this->correctPathHealthVersion->checkVersion("2d39ff989b3f18bd332cfc7a5c2a0abea1308e27"));
    }

    /** @test */
    public function it_returns_false_when_version_mismatches()
    {
        $this->assertFalse($this->correctPathHealthVersion->checkVersion("e700d71ddd5b0e31d521107507afb42e00f386b3"));
    }

    /** @test */
    public function it_returns_false_when_text_file_not_found()
    {
        $this->assertFalse($this->badPathHealthVersion->checkVersion("2d39ff989b3f18bd332cfc7a5c2a0abea1308e27"));
    }
}