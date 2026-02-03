<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Env;

class EnvTest extends TestCase
{
    private $testEnvFile;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testEnvFile = sys_get_temp_dir() . '/.env.test.' . uniqid();
    }

    protected function tearDown(): void
    {
        if (file_exists($this->testEnvFile)) {
            unlink($this->testEnvFile);
        }
        parent::tearDown();
    }

    public function testLoadEnvFile(): void
    {
        file_put_contents($this->testEnvFile, "TEST_KEY=test_value\nTEST_KEY2=test_value2");
        
        Env::load($this->testEnvFile);
        
        $this->assertEquals('test_value', Env::get('TEST_KEY'));
        $this->assertEquals('test_value2', Env::get('TEST_KEY2'));
    }

    public function testGetWithDefault(): void
    {
        $this->assertEquals('default', Env::get('NON_EXISTENT_KEY', 'default'));
    }

    public function testHasMethod(): void
    {
        file_put_contents($this->testEnvFile, "EXISTING_KEY=value");
        Env::load($this->testEnvFile);
        
        $this->assertTrue(Env::has('EXISTING_KEY'));
        $this->assertFalse(Env::has('NON_EXISTENT_KEY'));
    }

    public function testEnvFileWithComments(): void
    {
        $content = "# This is a comment\nVALID_KEY=valid_value\n# Another comment";
        file_put_contents($this->testEnvFile, $content);
        
        Env::load($this->testEnvFile);
        
        $this->assertEquals('valid_value', Env::get('VALID_KEY'));
    }

    public function testEnvFileWithQuotes(): void
    {
        $content = "KEY_WITH_QUOTES=\"quoted value\"";
        file_put_contents($this->testEnvFile, $content);
        
        Env::load($this->testEnvFile);
        
        $this->assertEquals('quoted value', Env::get('KEY_WITH_QUOTES'));
    }

    public function testLoadThrowsExceptionForNonExistentFile(): void
    {
        $this->expectException(\RuntimeException::class);
        Env::load('/non/existent/file.env');
    }
}
