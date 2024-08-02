# Nom de l'Application

## Description
Ce projet est une API pour un site de vente de perruques, 
développée en PHP et JavaScript. Elle utilise Composer pour 
la gestion des dépendances PHP.
L'API permet de gérer les produits (perruques), 
les commandes, les utilisateurs, et les paiements. 
Elle est conçue pour être facilement extensible et maintenable,
avec une architecture modulaire et une séparation claire des 
responsabilités.

## Prérequis
- PHP 8 ou supérieur
- Node.js 14 ou supérieur
- Composer
- npm

## Installation

### Cloner le dépôt
```bash
git clone https://github.com/votre-utilisateur/votre-repo.git
cd votre-repo
```

### Cloner le dépôt
```bash
composer install
```

### Installer les dépendances PHP
```bash
composer install
```

### Installer les dépendances JavaScript
```bash
npm install
```

### Configuration
Copiez le fichier .env.example en .env et modifiez les valeurs selon vos besoins.
```bash
cp .env.example .env
php artisan key:generate
```

### Démarrer le serveur de développement
```bash
php artisan serve
```

## Tests
Pour exécuter les tests, nous utilisons Pest. Utilisez les commandes suivantes :

Pest est un framework de test PHP moderne et élégant. Il est conçu pour être simple, minimaliste et agréable à utiliser. Voici quelques détails supplémentaires sur Pest :
```bash
./vendor/bin/pest --init
```
ou

```bash
php artisan test
```
