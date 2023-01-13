Installation de Nelmio - API-doc

https://openclassrooms.com/fr/courses/7709361-construisez-une-api-rest-avec-symfony/7795180-documentez-votre-api-avec-nelmio

- Accepter la recette pour la création automatiques des fichiers de configuration
- composer udpate si erreur après installation

produire les liens dans security.yaml -> access.control : - { path: ^/api/login, roles: PUBLIC_ACCESS } - { path: ^/api/doc, roles: PUBLIC_ACCESS } - { path: ^/api/, roles: IS_AUTHENTICATED_FULLY }

Décommenter les lignes basses de config\routes\nelmio_api_doc.yaml
