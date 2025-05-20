FROM php:8.2-apache

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli

# Copiar solo los archivos necesarios (para produccion)
# COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80
