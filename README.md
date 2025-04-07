<<<<<<< HEAD
# Conventions de Nommage des Projets et Branches GitLab

Ce document décrit les conventions de nommage pour les projets et les branches au sein des dépôts GitLab. Ces conventions visent à améliorer l'organisation du code, à faciliter la collaboration et à garantir une communication claire.


## Nommage des Branches

Les branches sont utilisées pour isoler le travail de développement et suivre les modifications. Utilisez des préfixes pour identifier clairement l'objectif de la branche et faire référence aux tâches liées dans OpenProject.

* **Format :** `prefix/numéro-de-tâche_nom-de-tâche`
    * `prefix` : Identifie l'objectif de la branche (voir la liste des préfixes de branches ci-dessous).
    * `numéro-de-tâche` : Numéro de référence pour la tâche liée dans OpenProject (ex. : T-456).
    * `nom-de-tâche` : Une brève description de la tâche.

**Exemple :** `feature/T-456_authentification-utilisateur` (branche de fonctionnalité pour la tâche T-456, implémentation de l'authentification utilisateur).

## Liste des Préfixes de Branches

* `feature/` : Utilisé pour le développement de nouvelles fonctionnalités.
* `bugfix/` : Utilisé pour corriger des bugs dans le code.
* `hotfix/` : Utilisé pour des corrections critiques directement depuis la branche de production.
* `release/` : Utilisé pour préparer une nouvelle version.
* `docs/` : Utilisé pour les modifications de la documentation.

## Liste des Préfixes de Messages de Commit

Les messages de commit doivent décrire clairement les modifications apportées. Utilisez des préfixes pour catégoriser le type de changement.

* `feat` : Ajoute ou supprime une nouvelle fonctionnalité.
* `fix` : Corrige un bug.
* `refactor` : Restructure le code sans changer le comportement.
* `perf` : Améliore les performances.
* `style` : Modifications de formatage (espaces, indentation, etc.).
* `test` : Ajoute ou corrige des tests.
* `docs` : Modifications de la documentation.
* `build` : Changements des outils de construction, des pipelines CI, des dépendances ou de la version du projet.
* `ops` : Changements opérationnels (infrastructure, déploiement, sauvegarde, etc.).
* `chore` : Changements divers (ex. : modification de `.gitignore`).

**Exemples de Messages de Commit :**

* `feat: ajouter des notifications par e-mail pour les nouveaux messages directs`
* `fix(caddie) : empêcher la commande d'un caddie vide`
* `refactor : implémenter le calcul du nombre de Fibonacci en utilisant la récursion`
* `style : supprimer la ligne vide`

**Notes Supplémentaires :**

* Pour les changements importants, incluez une explication claire dans le message de commit et utilisez le suffixe `!` après le préfixe (ex. : `feat!: supprimer l'endpoint de liste de billets`).
* Fournissez une brève explication pour les corrections de bugs (`fix : ajouter un paramètre manquant à l'appel de service. L'erreur est survenue à cause de <raisons>`) et pour les améliorations de performance (`perf : réduire l'empreinte mémoire pour déterminer les visiteurs uniques en utilisant HyperLogLog`).

En suivant ces conventions, nous pouvons maintenir un environnement GitLab propre, organisé et collaboratif.
=======
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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> 515f520 (First commit)
