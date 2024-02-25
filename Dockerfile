FROM php:7.4-apache

# Aggiorna e installa le dipendenze
RUN apt-get update && apt-get install -y libpq-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl && a2enmod rewrite

# Installa Composer per gestire le dipendenze PHP (se necessario)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia il progetto CodeIgniter nella directory dell'applicazione
COPY . /var/www/html/

# Imposta le autorizzazioni appropriate
RUN chown -R www-data:www-data /var/www/html

# Esponi la porta 80
EXPOSE 80

# Avvia Apache quando il contenitore viene eseguito
CMD ["apache2-foreground"]
