<?php
require_once __DIR__ . '/src/App.php';

$app    = new App();
$year   = date('Y');
$greeting  = $app->getGreeting();
$author    = $app->getAuthor();
$techStack = $app->getTechStack();
$course    = $app->getCourseName();
?>
<!DOCTYPE html>
<html lang="es" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DevOps · Práctica Final</title>
  <meta name="description" content="Práctica Final DevOps – CI/CD con PHP, Docker, GitHub Actions y Render" />
  <meta name="author" content="<?= htmlspecialchars($author) ?>" />
  <link rel="icon" href="/img/logo.png" type="image/png" />
  <meta property="og:title" content="DevOps · Práctica Final CI/CD" />
  <meta property="og:description" content="CI/CD completo con PHP, Docker, GitHub Actions y Render.com" />
  <meta property="og:type" content="website" />
  <link rel="stylesheet" href="styles.css" />
</head>
<body>

  <button class="theme-toggle" aria-label="Cambiar tema">🌙</button>

  <main class="card">
    <div class="card-inner"></div>
    <div class="card-content">

      <!-- Badge -->
      <span class="badge">
        <span class="status-dot"></span>
        <?= htmlspecialchars($course) ?>
      </span>

      <!-- Título PHP dinámico -->
      <h1 class="hero-name"><?= htmlspecialchars($greeting) ?> 🐘</h1>

      <p class="hero-text">
        <span>
          PHP · Docker · GitHub Actions · Pruebas Unitarias · Render.com · Pipeline CI/CD completo
        </span>
      </p>

      <!-- Tools grid -->
      <div class="layout">

        <div class="card">
          <div class="card-content">
            <strong>🐘 PHP 8.2</strong>
            <p class="tool-desc">
              Lenguaje de la app. La clase <code>App</code> genera el saludo y expone métodos testeables con PHPUnit.
            </p>
            <span class="tool-tag">App.php · index.php · composer</span>
          </div>
        </div>

        <div class="card">
          <div class="card-content">
            <strong>🧪 PHPUnit</strong>
            <p class="tool-desc">
              Framework de pruebas unitarias para PHP. Valida el comportamiento de cada método de la app antes del deploy.
            </p>
            <span class="tool-tag">AppTest · assertions · ./vendor/bin/phpunit</span>
          </div>
        </div>

        <div class="card">
          <div class="card-content">
            <strong>🐳 Docker</strong>
            <p class="tool-desc">
              Conteneriza la app con <code>php:8.2-apache</code>. La imagen se construye y se publica en Docker Hub automáticamente.
            </p>
            <span class="tool-tag">Dockerfile · docker build · docker push</span>
          </div>
        </div>

        <div class="card">
          <div class="card-content">
            <strong>⚙️ GitHub Actions</strong>
            <p class="tool-desc">
              Pipeline CI/CD con 3 jobs: ejecuta tests → sube imagen a Docker Hub → hace deploy en Render.
            </p>
            <span class="tool-tag">test → build-push → deploy</span>
          </div>
        </div>

        <div class="card">
          <div class="card-content">
            <strong>🗂 Docker Hub</strong>
            <p class="tool-desc">
              Registro donde se almacena y versiona la imagen Docker. Render jala la imagen desde aquí en cada deploy.
            </p>
            <span class="tool-tag">registry · latest · sha tag</span>
          </div>
        </div>

        <div class="card">
          <div class="card-content">
            <strong>🚀 Render.com</strong>
            <p class="tool-desc">
              Plataforma de producción. Recibe el Deploy Hook de GitHub Actions y actualiza el servicio con la nueva imagen.
            </p>
            <span class="tool-tag">Web Service · Deploy Hook · Free tier</span>
          </div>
        </div>

      </div>

      <!-- Stack info dinámica desde PHP -->
      <div class="stack-info">
        <span class="tool-tag">
          Stack: <?= implode(' · ', array_map('htmlspecialchars', $techStack)) ?>
        </span>
      </div>

      <!-- Botones -->
      <div class="btns">
        <a href="https://github.com/Alb3rtsonTL/DevOps-Final" target="_blank">
          GitHub Repo ↗
        </a>
        <a href="https://hub.docker.com/u/alb3rtsontl" target="_blank">
          Docker Hub ↗
        </a>
        <a href="https://dashboard.render.com" target="_blank">
          Render Deploy ↗
        </a>
      </div>

    </div>
  </main>

  <footer class="page-footer">
    &copy; <?= $year ?>
    <a href="https://github.com/Alb3rtsonTL" target="_blank">
      <strong><?= htmlspecialchars($author) ?></strong>
    </a>
  </footer>

  <script src="scripts.js"></script>
</body>
</html>