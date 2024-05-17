# PiePHP

# Fonctionnement de l'Application

## Description

Cette application suit l'architecture MVC (Model-View-Controller) pour créer une structure organisée et modulaire. Elle inclut un routage statique et dynamique, une gestion sécurisée des utilisateurs et une interface utilisateur avec des vues. L'objectif est de fournir un cadre permettant de comprendre et de mettre en pratique les concepts MVC.

## Architecture MVC

### Routing
- **Statique** : Définir des routes spécifiques qui mappent les URL aux contrôleurs et actions correspondants.
- **Dynamique** : Permettre un routage basé sur les paramètres d'URL, simplifiant ainsi la gestion des routes.

### Controller
- **Logique de l'application** : Les contrôleurs contiennent la logique de l'application, gèrent les modèles et affichent les vues.
- **Exemples de méthodes** : `addAction`, `indexAction`.

### Model
- **Gestion des données** : Chaque table de la base de données a son propre modèle qui gère les requêtes en BDD.
- **Méthodes CRUD** : `create`, `read`, `update`, `delete`, `read_all`.

### View
- **Logique d'affichage** : Les vues sont des fichiers PHP contenant uniquement la logique d'affichage.
- **Layout** : Utilisation de layouts pour une structure HTML cohérente.

## Fonctionnalités Clés

### Utilisateurs
- **Table `users`** : Contient les champs `id`, `email`, et `password`.
- **Modèle et contrôleur associés** : `UserModel` et `UserController`.

### Sécurité
- **Hashage des mots de passe** : Utilisation de techniques sécurisées pour le stockage des mots de passe.
- **Classe `Request`** : Gère et sécurise les entrées utilisateur.

### Routage
- **Classe `Router`** : Gère les connexions de routes et la récupération des routes basées sur l'URL.

### ORM
- **Classe `ORM`** : Fournit des méthodes pour manipuler les entités sans écrire de requêtes SQL explicites.
- **Méthodes de l'ORM** : `create`, `read`, `update`, `delete`, `find`.

## Exemple d'Utilisation

### Controller
```php
class UserController extends \Core\Controller {
    function addAction() {
        $this->render('register'); // Va rendre la vue src/View/User/register.php
    }
}
