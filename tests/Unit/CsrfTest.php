<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Csrf;

class CsrfTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Clear session for each test
        $_SESSION = [];
    }

    protected function tearDown(): void
    {
        $_SESSION = [];
        parent::tearDown();
    }

    public function testGenerateToken(): void
    {
        $token = Csrf::generateToken();
        
        $this->assertNotEmpty($token);
        $this->assertEquals(64, strlen($token)); // 32 bytes = 64 hex characters
    }

    public function testGetToken(): void
    {
        $token = Csrf::getToken();
        
        $this->assertNotEmpty($token);
        
        // Getting token again should return the same token
        $token2 = Csrf::getToken();
        $this->assertEquals($token, $token2);
    }

    public function testVerifyValidToken(): void
    {
        $token = Csrf::generateToken();
        
        $this->assertTrue(Csrf::verifyToken($token));
    }

    public function testVerifyInvalidToken(): void
    {
        Csrf::generateToken();
        
        $this->assertFalse(Csrf::verifyToken('invalid_token'));
    }

    public function testVerifyTokenWithNoSessionToken(): void
    {
        $this->assertFalse(Csrf::verifyToken('any_token'));
    }

    public function testInvalidateToken(): void
    {
        $token = Csrf::generateToken();
        
        Csrf::invalidateToken();
        
        $this->assertFalse(Csrf::verifyToken($token));
    }

    public function testTimingSafeComparison(): void
    {
        $token = Csrf::generateToken();
        
        // Create a token with same length but different content
        $similarToken = str_repeat('a', strlen($token));
        
        $this->assertFalse(Csrf::verifyToken($similarToken));
    }
}
