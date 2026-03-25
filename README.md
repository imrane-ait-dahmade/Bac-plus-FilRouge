# Bac Plus - Fil Rouge

Guide d'installation et de configuration du projet Bac Plus.

## 📋 Prérequis

Avant de commencer, assurez-vous d'avoir installé:

- **PHP** >= 8.2
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js** et **NPM** (pour les dépendances frontend)
- **PostgreSQL** >= 12 (base de données)
- **Git** (pour le contrôle de version)

## 🚀 Installation

### Étape 1 : Cloner le projet

```bash
git clone [URL du repository]
cd Bac-plus-FilRouge
```

### Étape 2 : Installer les dépendances PHP

```bash
composer install
```

### Étape 3 : Configurer le fichier .env

Copiez le fichier `.env.example` en `.env`:

```bash
cp .env.example .env
```

Ensuite, modifiez les variables d'environnement dans `.env`:

```env
APP_NAME="Bac Plus"
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=bacplus
DB_USERNAME=votre_utilisateur_postgres
DB_PASSWORD=votre_mot_de_passe_postgres
```

### Étape 4 : Générer la clé d'application

```bash
php artisan key:generate
```

### Étape 5 : Créer la base de données PostgreSQL

Connectez-vous à PostgreSQL:

```bash
psql -U postgres
```

Créez la base de données:

```sql
CREATE DATABASE bacplus;
```

Quittez pour continuer:

```sql
\q
```

### Étape 6 : Exécuter les migrations

Cette commande crée les tables nécessaires:

```bash
php artisan migrate
```

### Étape 7 : Remplir la base de données avec les données de test (optionnel)

```bash
php artisan db:seed
```

### Étape 8 : Installer les dépendances Node.js

```bash
npm install
```

## 🔨 Démarrage du projet

### Option 1 : Démarrage simultané (recommandé)

Dans un terminal, lancez les deux serveurs:

```bash
npm run dev
```

Dans un autre terminal:

```bash
php artisan serve
```

L'application sera disponible sur: **http://localhost:8000**

### Option 2 : Serveur de développement Laravel uniquement

```bash
php artisan serve
```

## 📦 Commandes utiles

### Migrations

```bash
# Exécuter les migrations
php artisan migrate

# Annuler la dernière migration
php artisan migrate:rollback

# Annuler toutes les migrations
php artisan migrate:reset

# Réinitialiser et remplir les données
php artisan migrate:refresh --seed
```

### Seeders (données de test)

```bash
# Remplir la base de données
php artisan db:seed

# Remplir avec un seeder spécifique
php artisan db:seed --class=DatabaseSeeder
```

### Tests

```bash
# Exécuter tous les tests
php artisan test

# Exécuter les tests avec verbose
php artisan test --verbose

# Exécuter une classe de test spécifique
php artisan test tests/Feature/ExampleTest.php
```

### Tinker (console interactive)

```bash
php artisan tinker
```

### Cache et optimisation

```bash
# Vider le cache
php artisan cache:clear

# Vider toutes les caches
php artisan optimize:clear

# Optimiser le projet
php artisan optimize
```

## 🗃️ Structure du projet

```
app/
├── Enums/              # Énumérations (RoleUser, Ville)
├── Http/
│   ├── Controllers/    # Contrôleurs
│   ├── Middleware/     # Middlewares
│   └── Requests/       # Formulaire requests
├── Models/             # Modèles Eloquent
├── Policies/           # Policies d'autorisation
├── Services/           # Services métier
└── Providers/          # Service providers

database/
├── factories/          # Factories pour les tests
├── migrations/         # Migrations de base de données
└── seeders/           # Seeders pour les données de test

resources/
├── views/             # Vues Blade
└── css/               # Styles CSS/Tailwind

routes/
├── web.php            # Routes web
└── console.php        # Commandes Artisan

tests/
├── Feature/           # Tests fonctionnels
└── Unit/              # Tests unitaires
```

## 🔐 Variables d'environnement importantes

| Variable | Description | Défaut |
|----------|-------------|--------|
| `APP_NAME` | Nom de l'application | Laravel |
| `APP_DEBUG` | Mode debug | false |
| `APP_URL` | URL de l'application | http://localhost |
| `DB_CONNECTION` | Type de base de données | pgsql |
| `DB_DATABASE` | Nom de la base de données | bacplus |
| `SESSION_DRIVER` | Stockage des sessions | database |
| `CACHE_STORE` | Type de cache | database |

## 🐛 Dépannage

### Erreur : "Class not found"

Régénérez l'autoloader Composer:

```bash
composer dump-autoload
```

### Erreur : "SQLSTATE[HY000]"

Vérifiez que PostgreSQL est en cours d'exécution et que les identifiants DB sont corrects dans `.env`.

### Le port 8000 est utilisé

Utilisez un autre port:

```bash
php artisan serve --port=8001
```

### Nodes modules manquent

Réinstallez les dépendances:

```bash
npm install
```

### Erreur : "SQLSTATE[42P01]: Undefined table: sessions"

La table `sessions` n'existe pas. Exécutez:

```bash
php artisan session:table
php artisan migrate
```

### Erreur : "SQLSTATE[HY000]: General error" ou tables manquantes

Réinitialiser toutes les migrations et recommencer:

```bash
php artisan migrate:reset
php artisan migrate
php artisan db:seed
```

## 📝 Notes importantes

- Ne committez jamais le fichier `.env` dans le repository
- Utilisez `.env.example` pour les variables par défaut
- Assurez-vous que PostgreSQL est installé et en cours d'exécution
- Pour la première installation, exécutez `php artisan migrate` après la configuration

## 📚 Documentation utile

- [Laravel Documentation](https://laravel.com/docs)
- [PostgreSQL Documentation](https://www.postgresql.org/docs/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vite Documentation](https://vitejs.dev/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
