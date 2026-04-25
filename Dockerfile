#─ Imagen base
# php:8.2-apache incluye Apache listo para servir PHP sin configuración extra
FROM php:8.2-apache

#─ Metadatos
LABEL maintainer="Alb3rtsonTL"
LABEL description="Práctica Final DevOps – Hello World PHP CI/CD"
LABEL version="1.0"

#─ Copiar código fuente al document root de Apache
COPY src/   /var/www/html/scr/
COPY composer.json   /var/www/html/scr/

#─ Permisos correctos para Apache
RUN chown -R www-data:www-data /var/www/html

#─ Puerto expuesto
EXPOSE 80

#─ Apache corre en primer plano
CMD ["apache2-foreground"]