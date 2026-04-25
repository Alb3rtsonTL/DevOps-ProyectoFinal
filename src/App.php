<?php

/**
 * Clase principal de la aplicación Hello World.
 * Separada del index para poder hacer pruebas unitarias.
 */
class App
{
    /**
     * Retorna el mensaje principal de la app.
     */
    public function getGreeting(): string
    {
        return "Hello, World!";
    }

    /**
     * Retorna el nombre del autor.
     */
    public function getAuthor(): string
    {
        return "Alb3rtsonTL";
    }

    /**
     * Retorna el stack de tecnologías como array.
     */
    public function getTechStack(): array
    {
        return ["PHP", "Docker", "GitHub Actions", "Render.com", "Nginx"];
    }

    /**
     * Retorna true si el stack contiene una tecnología.
     */
    public function hasTech(string $tech): bool
    {
        return in_array($tech, $this->getTechStack(), true);
    }

    /**
     * Retorna el nombre del curso.
     */
    public function getCourseName(): string
    {
        return "Electiva DevOps · Práctica Final";
    }
}