# DevOps · Proyecto Final CI/CD

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![PHPUnit](https://img.shields.io/badge/PHPUnit-11-6C3483?logo=php&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?logo=docker&logoColor=white)
![GitHub Actions](https://img.shields.io/badge/GitHub%20Actions-2088FF?logo=github-actions&logoColor=white)
![Render](https://img.shields.io/badge/Render-46E3B7?logo=render&logoColor=black)
[![MIT License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Objetivo

Este proyecto demuestra un flujo completo de Integración y Despliegue Continuo (CI/CD), automatizando desde la ejecución de pruebas unitarias hasta la publicación de una imagen Docker y el despliegue en producción mediante Render.

### Lo que demuestra

- Automatización de pruebas
- Contenedorización de aplicaciones
- Integración continua
- Despliegue continuo
- Gestión segura de secretos en GitHub Actions

---

## Descripción

Proyecto Final de la Electiva DevOps. Implementa el ciclo completo de CI/CD:

1. App web **Hello World en PHP**
2. **Pruebas unitarias** con PHPUnit (11 tests)
3. **Dockerfile** con `php:8.2-apache`
4. **GitHub Actions** con 3 jobs encadenados:
   - Instala dependencias + ejecuta tests
   - Construye y sube imagen a Docker Hub
   - Hace deploy automático en Render.com

---

## Flujo CI/CD

```
git push origin main
        │
        ▼
┌─────────────────────┐
│  JOB 1 · 🧪 Tests   │  composer install → phpunit tests/
└─────────┬───────────┘
          │ si ✅ pasa
          ▼
┌──────────────────────────────┐
│  JOB 2 · 🐳 Build & Push     │  docker build → docker push Docker Hub
└─────────┬────────────────────┘
          │ si ✅ pasa
          ▼
┌──────────────────────────────┐
│  JOB 3 · 🚀 Deploy Render    │  curl Deploy Hook → producción actualizada
└──────────────────────────────┘
```

---

## Estructura del Proyecto

```
DevOps-ProyectoFinal/
├── Dockerfile
├── LICENSE
├── README.md
├── composer.json
├── .github/
│   └── workflows/
│       └── ci-cd.yml        ← Pipeline CI/CD (3 jobs)
├── src
│   ├── App.php
│   ├── img
│   │   └── background.webp
│   ├── index.php
│   ├── scripts.js
│   └── styles.css
└── tests
    └── AppTest.php
```

---

## Secrets requeridos en GitHub

Ir a: **Settings → Secrets and variables → Actions**

| Secret | Descripción | Dónde obtenerlo |
|---|---|---|
| `DOCKERHUB_USERNAME` | Usuario de Docker Hub | hub.docker.com |
| `DOCKERHUB_TOKEN` | Access Token Docker Hub | Account Settings → Security → New Token |
| `RENDER_DEPLOY_HOOK_URL` | URL del Deploy Hook | Render → tu servicio → Settings → Deploy Hook |

---

## Correr localmente

```bash
# Instalar dependencias
composer install

# Ejecutar tests
./vendor/bin/phpunit tests/ --testdox

# Construir imagen Docker
docker build -t devops-proyecto-final .

# Correr contenedor
docker run -d -p 8080:80 devops-proyecto-final
# → http://localhost:8080

# Agregar el tag
docker tag devops-proyecto-final alb3rtsontl/devops-proyecto-final:1.0

# Publicar imagen en Docker Hub
docker push alb3rtsontl/devops-proyecto-final:1.0
```

---

## Pruebas unitarias (AppTest.php)

| Test | Descripción |
|---|---|
| `testGreetingReturnsHelloWorld` | El saludo es exactamente "Hello, World!" |
| `testGreetingIsNotEmpty` | El saludo no está vacío |
| `testAuthorIsCorrect` | El autor retorna "Alb3rtsonTL" |
| `testStackContainsPHP` | El stack incluye PHP |
| `testStackContainsDocker` | El stack incluye Docker |
| `testStackContainsGitHubActions` | El stack incluye GitHub Actions |
| `testStackContainsRender` | El stack incluye Render.com |
| `testStackDoesNotContainLaravel` | No incluye tecnologías no usadas |
| `testTechStackIsArray` | El stack retorna un array |
| `testTechStackHasMinimumEntries` | El stack tiene al menos 3 entradas |
| `testCourseNameContainsDevOps` | El nombre del curso contiene "DevOps" |

---

- **Autor:** AlbertsonTL – Albertson Terrero López
- **Licencia:** MIT License
