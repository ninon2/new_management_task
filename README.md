#Pour installer ce projet, il faut executer ceci:

    git clone <repository-url>
    cd task_management
    composer install
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate

Pour lancer le serveur, il faut utiliser ceci:
php bin/console server:run

#Pour effectuer les tests, il faut:
php bin/phpunit

Choix techniques
Framework
Nous avons utilisé Symfony car c'est un framework PHP parfait pour développer des applications web complexes. Et en plus, il offre plein d'outils qui facilitent le travail.
ORM
Doctrine ORM est utilisé pour la gestion de la base de données. Il permet de travailler avec des objets au lieu d'écrire directement des requetes SQL ce qui rend le code plus simple et plus clair.
Serveur de développement
Le serveur de développement intégré de Symfony est utilisé pour simplifier le processus de développement et de test.
