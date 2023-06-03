# Utilisez l'image officielle PHP avec la version spécifique
FROM php:7.4-cli

# Installez les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Installez Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurez le répertoire de travail
WORKDIR /var/www/html

# Copiez les fichiers de votre application dans le conteneur
COPY . /var/www/html

# Installez les dépendances PHP avec Composer
RUN composer install --no-interaction

# Installez Node.js et les dépendances JavaScript
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
RUN npm install

# Exposez le port 80 (vous pouvez modifier cela si nécessaire)
EXPOSE 80

# Démarrez le serveur PHP intégré lorsque le conteneur démarre
CMD php artisan serve --host=0.0.0.0 --port=80
