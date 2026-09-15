# Guide d'Installation - LMS Laravel sur MAMP/WAMP

## Pour MacOS avec MAMP

### Étape 1: Installer les outils nécessaires

1. **Installer Homebrew** (si non installé)
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

2. **Installer PHP via Homebrew**
```bash
brew install php@8.1
brew install composer
brew install node
```

3. **Ou installer MAMP** (Recommandé pour les débutants)
   - Télécharger depuis: https://www.mamp.info/en/downloads/
   - Installer normalement

### Étape 2: Cloner et configurer le projet

1. **Cloner le repository**
```bash
cd ~/Applications/MAMP/htdocs  # Ou votre dossier de projets
git clone https://github.com/bonthierry2025/lms-laravel.git
cd lms-laravel
```

2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Configurer le fichier .env**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Éditer .env** (Utilisez TextEdit ou un éditeur)
```bash
nano .env
```

Modifier ces valeurs:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_laravel
DB_USERNAME=root
DB_PASSWORD=root
```

5. **Installer les dépendances Node.js**
```bash
npm install
```

6. **Compiler les assets**
```bash
npm run build
```

### Étape 3: Configurer la base de données

1. **Ouvrir MAMP** et cliquer sur "Start Servers"
2. **Accéder phpMyAdmin**: http://localhost:8888/phpMyAdmin/
3. **Créer une base de données**:
   - Clic sur "Nouvelle base de données"
   - Nom: `lms_laravel`
   - Cliquer "Créer"

### Étape 4: Exécuter les migrations

```bash
php artisan migrate
php artisan db:seed
```

### Étape 5: Démarrer le serveur

```bash
php artisan serve
```

L'application est disponible à: **http://localhost:8000**

---

## Pour Windows avec WAMP

### Étape 1: Installer les outils nécessaires

1. **Télécharger et installer WAMP**
   - Site: https://www.wampserver.com/
   - Installer dans le dossier par défaut

2. **Télécharger et installer Composer**
   - Site: https://getcomposer.org/download/
   - Installer la version Windows

3. **Télécharger et installer Node.js**
   - Site: https://nodejs.org/
   - Installer la version LTS

### Étape 2: Cloner et configurer le projet

1. **Ouvrir le PowerShell ou Command Prompt**

2. **Aller au dossier WAMP**
```powershell
cd C:\wamp64\www
```

3. **Cloner le repository**
```powershell
git clone https://github.com/bonthierry2025/lms-laravel.git
cd lms-laravel
```

4. **Installer les dépendances**
```powershell
composer install
npm install
```

5. **Configurer .env**
```powershell
copy .env.example .env
php artisan key:generate
```

Editer le fichier `.env` (Ouvrir avec Bloc-notes):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_laravel
DB_USERNAME=root
DB_PASSWORD=
```

6. **Compiler les assets**
```powershell
npm run build
```

### Étape 3: Configurer la base de données

1. **Démarrer WAMP** (Clic sur l'icône WAMP)
2. **Ouvrir phpMyAdmin**: http://localhost/phpmyadmin/
3. **Créer une base de données**:
   - Aller à l'onglet "Bases de données"
   - Nom: `lms_laravel`
   - Cliquer "Créer"

### Étape 4: Exécuter les migrations

```powershell
php artisan migrate
php artisan db:seed
```

### Étape 5: Démarrer le serveur

```powershell
php artisan serve
```

L'application est disponible à: **http://localhost:8000**

---

## Utilisateurs de test

Après les seeders, utilisez ces comptes:

### Admin
- Email: `admin@lms.local`
- Mot de passe: `password`

### Enseignant
- Email: `teacher@lms.local`
- Mot de passe: `password`

### Étudiant
- Email: `student@lms.local`
- Mot de passe: `password`

---

## Problèmes courants

### Erreur: "composer not found"
```bash
# Ajouter composer au PATH ou utiliser le chemin complet
"C:\ProgramData\ComposerSetup\bin\composer" install
```

### Erreur: "php not found"
```bash
# Vérifier que PHP est installé
php -v
# Ou utiliser le chemin WAMP
"C:\wamp64\bin\php\php8.1.x\php.exe" -v
```

### Erreur: "Connexion à la base de données"
```bash
# Vérifier que WAMP/MAMP est démarré
# Vérifier les identifiants dans .env
# Créer la base de données manuellement
```

### Erreur: "npm not found"
```bash
# Redémarrer le PowerShell/CMD après avoir installé Node.js
# Vérifier l'installation
node -v
npm -v
```

---

## Mode développement

### Pour surveiller les changements CSS/JS

```bash
npm run watch
```

### Pour nettoyer le cache

```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

---

## Prochaines étapes

1. Explorer le dashboard
2. Créer des cours en tant qu'enseignant
3. S'inscrire aux cours en tant qu'étudiant
4. Gérer les utilisateurs en tant qu'admin

Bon développement! 🚀
