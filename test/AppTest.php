<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/App.php';

/**
 * Pruebas unitarias para la clase App.
 * Ejecutar con: ./vendor/bin/phpunit tests/
 */
class AppTest extends TestCase
{
    private App $app;

    protected function setUp(): void
    {
        $this->app = new App();
    }

    /** ✅ El saludo debe ser exactamente "Hello, World!" */
    public function testGreetingReturnsHelloWorld(): void
    {
        $this->assertSame("Hello, World!", $this->app->getGreeting());
    }

    /** ✅ El saludo no debe estar vacío */
    public function testGreetingIsNotEmpty(): void
    {
        $this->assertNotEmpty($this->app->getGreeting());
    }

    /** ✅ El autor debe ser el nombre correcto */
    public function testAuthorIsCorrect(): void
    {
        $this->assertSame("Alb3rtsonTL", $this->app->getAuthor());
    }

    /** ✅ El stack debe contener PHP */
    public function testStackContainsPHP(): void
    {
        $this->assertTrue($this->app->hasTech("PHP"));
    }

    /** ✅ El stack debe contener Docker */
    public function testStackContainsDocker(): void
    {
        $this->assertTrue($this->app->hasTech("Docker"));
    }

    /** ✅ El stack debe contener GitHub Actions */
    public function testStackContainsGitHubActions(): void
    {
        $this->assertTrue($this->app->hasTech("GitHub Actions"));
    }

    /** ✅ El stack debe contener Render.com */
    public function testStackContainsRender(): void
    {
        $this->assertTrue($this->app->hasTech("Render.com"));
    }

    /** ✅ El stack no debe contener tecnologías no usadas */
    public function testStackDoesNotContainLaravel(): void
    {
        $this->assertFalse($this->app->hasTech("Laravel"));
    }

    /** ✅ El stack debe retornar un array */
    public function testTechStackIsArray(): void
    {
        $this->assertIsArray($this->app->getTechStack());
    }

    /** ✅ El stack debe tener al menos 3 tecnologías */
    public function testTechStackHasMinimumEntries(): void
    {
        $this->assertGreaterThanOrEqual(3, count($this->app->getTechStack()));
    }

    /** ✅ El nombre del curso debe contener "DevOps" */
    public function testCourseNameContainsDevOps(): void
    {
        $this->assertStringContainsString("DevOps", $this->app->getCourseName());
    }
}