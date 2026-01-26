<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



# 🏊‍♂️🚴‍♂️🏃‍♂️ Ctrl-Triathlon

> Application de gestion de triathlon développée dans le cadre du cours SIO2 – AP2

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com/)
[![SQL Server](https://img.shields.io/badge/SQL_Server-CC2927?style=flat&logo=microsoft-sql-server&logoColor=white)](https://www.microsoft.com/sql-server)

---

## 📋 Description

Application PHP moderne utilisant Laravel et SQL Server pour gérer l'ensemble des activités liées à l'organisation d'événements de triathlon :

- ✅ **Gestion des participants** : inscription, profils, catégories
- ✅ **Gestion des épreuves** : natation, cyclisme, course à pied
- ✅ **Gestion des résultats** : chronométrage, classements, statistiques

---

## 🚀 Installation

Suivez ces étapes pour installer et configurer le projet sur votre environnement Windows avec PHP et SQL Server.

### Prérequis

- PHP 8.0 ou supérieur
- Composer
- SQL Server
- Git

### 1️⃣ Cloner le repository

```bash
git clone https://github.com/AP2TRIATHLON/Ctrl-Triathlon.git
cd Ctrl-Triathlon
```

### 2️⃣ Installer les dépendances

```bash
composer install
```

> **💡 Note :** Si Composer n'est pas installé, téléchargez-le depuis [getcomposer.org](https://getcomposer.org)

### 3️⃣ Configurer les drivers SQL Server pour PHP

#### Télécharger les extensions

Récupérez les drivers officiels Microsoft :
- 📥 [Microsoft Drivers for PHP for SQL Server](https://learn.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server)
- Téléchargez les fichiers : `php_sqlsrv.dll` et `php_pdo_sqlsrv.dll`

#### Installer les extensions

1. Copiez les fichiers `.dll` dans le dossier `php/ext/` de votre installation PHP

2. Éditez le fichier `php.ini` et ajoutez les lignes suivantes :

```ini
extension=php_sqlsrv.dll
extension=php_pdo_sqlsrv.dll
```

3. Redémarrez votre serveur web pour appliquer les changements

### 4️⃣ Configurer l'environnement

1. Copiez le fichier `.env.example` en `.env` :

```bash
copy .env.example .env
```

2. Configurez vos paramètres de base de données dans le fichier `.env` :

```env
DB_CONNECTION=sqlsrv
DB_HOST=localhost
DB_PORT=1433
DB_DATABASE=ctrl_triathlon
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

3. Générez la clé d'application :

```bash
php artisan key:generate
```

### 5️⃣ Initialiser la base de données

Exécutez les migrations pour créer les tables :

```bash
php artisan migrate
```

> **⚠️ Attention :** Assurez-vous que SQL Server est démarré et que les informations de connexion dans `.env` sont correctes.

### 6️⃣ Lancer l'application

Démarrez le serveur de développement :

```bash
php artisan serve
```

🎉 **L'application est maintenant accessible sur** : [http://localhost:8000](http://localhost:8000)

---

## 📂 Structure du projet

```
Ctrl-Triathlon/
├── app/                # Logique applicative (Modèles, Contrôleurs)
├── config/             # Fichiers de configuration
├── database/           # Migrations et seeders
├── public/             # Fichiers publics (CSS, JS, images)
├── resources/          # Vues et assets
├── routes/             # Définition des routes
├── .env.example        # Template de configuration
└── composer.json       # Dépendances PHP
```

---

## 🛠️ Commandes utiles

| Commande | Description |
|----------|-------------|
| `php artisan serve` | Démarre le serveur de développement |
| `php artisan migrate` | Exécute les migrations de base de données |
| `php artisan migrate:fresh` | Réinitialise et recrée la base de données |
| `php artisan db:seed` | Remplit la base avec des données de test |
| `composer install` | Installe les dépendances PHP |

---

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Poussez vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

---

## 📝 Licence

Ce projet est développé dans un cadre éducatif pour le cours SIO2 – AP2.

---

## 👥 Équipe

Projet réalisé par l'équipe **AP2TRIATHLON**

---

## 📞 Support

Pour toute question ou problème :
- 🐛 Ouvrez une [issue](https://github.com/AP2TRIATHLON/Ctrl-Triathlon/issues)
- 📧 Contactez l'équipe de développement

---

<p align="center">Fait avec ❤️ pour SIO2</p>
