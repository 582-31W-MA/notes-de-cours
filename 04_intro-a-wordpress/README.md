# Installer WordPress

Pour installer WordPress, il suffit de télécharger le dossier `wordpress` à l'adresse suivante : https://wordpress.org/download/, et d'extraire son contenu à la racine de votre projet.

## Créer et configurer la base de données

WordPress stocke le contenu de votre site Web dans une base de données MySQL ou MariaDB. La [documentation à ce sujet](https://developer.wordpress.org/advanced-administration/before-install/creating-database/) explique comment créer cette base de données selon l'outil que vous préférez (phpMyAdmin, cPanel, Plesk, etc.).

Pour ce cours, il est suggéré d'installer et de configurer MySQL à travers votre interface en ligne de commande, ce qui permet de simplifier votre environnement de développement, et d'éviter MAMP, XAMPP, et compagnie.

### Mac

Sur Mac, vous pouvez installer MySQL à travers le gestionnaire de paquets Homebrew. Il suffit d'exécuter la commande suivante dans votre interface en ligne de commande :

```sh
brew install mysql
```

Une fois installé, vous pouvez démarrer MySQL avec la commande : 

```sh
mysql.server start # et `mysql.server stop` pour l'arrêter
```

Il est ensuite possible de se connecter à MySQL, et de créer une nouvelle base de données grâce aux commandes suivantes :

```sh
mysql -u root
CREATE DATABASE wpdb;
exit
```

### Windows

Sur Windows, vous pouvez installer MySQL à travers le gestionnaire de paquet Scoop. Il suffit d'exécuter la commande suivante dans votre interface en ligne de commande :

```sh
scoop install mysql
```

Il est également possible de télécharger et d'installer MySQL manuellement. Pour ce faire, télécharger MySQL (version « Windows x86, 64-bit, ZIP Archive ») à l'adresse suivante : https://dev.mysql.com/downloads/mysql/. Renommer le dossier téléchargé `mysql`, créez à l'intérieur de celui-ci un dossier `data`, puis placez-le à la racine de votre disque `C:`. Enfin, ajoutez le dossier `mysql/bin` à votre PATH.

Une fois installé, vous pouvez démarrer MySQL avec la commande :

```sh
mysqld # et `mysqladmin shutdown` pour l'arrêter
```

Il est ensuite possible de se connecter à MySQL, et de créer une nouvelle base de données grâce aux commandes suivantes :

```sh
mysql mysql -u root
CREATE DATABASE wpdb;
exit
```

## Configurer WordPress

Il reste à configurer WordPress afin d'utiliser la base de données tout juste créée. Pour ce faire, changer le nom du fichier `wp-config-sample.php` pour `wp-config.php`. Modifiez ensuite les lignes suivantes :

```php
define( 'DB_NAME', 'database_name_here' ); // Mettre comme valeur 'wpdb'

/** Database username */
define( 'DB_USER', 'username_here' ); // Mettre comme valeur 'root'

/** Database password */
define( 'DB_PASSWORD', 'password_here' ); // Mettre comme valeur ''
```

## Démarrer le serveur de développement local

Une fois la base de données créée et WordPress configuré, vous pouvez démarrer le serveur PHP à la racine de votre projet avec la commande habituelle :

```sh
php -S localhost:8000
```

Vous aurez accès au tableau de bord de votre site une fois le formulaire d'installation rempli (un long temps d'attente est normal).