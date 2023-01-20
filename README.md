Installation de Nelmio - API-doc

https://openclassrooms.com/fr/courses/7709361-construisez-une-api-rest-avec-symfony/7795180-documentez-votre-api-avec-nelmio

- Accepter la recette pour la création automatiques des fichiers de configuration
- composer udpate si erreur après installation

produire les liens dans security.yaml -> access.control : - { path: ^/api/login, roles: PUBLIC_ACCESS } - { path: ^/api/doc, roles: PUBLIC_ACCESS } - { path: ^/api/, roles: IS_AUTHENTICATED_FULLY }

Décommenter les lignes basses de config\routes\nelmio_api_doc.yaml


# BISH Back_End

## Getting started

To make it easy for you to get started with GitLab, here's a list of recommended next steps.

Already a pro? Just edit this README.md and make it your own. Want to make it easy? [Use the template at the bottom](#editing-this-readme)!

## Add your files

- [ ] [Create](https://docs.gitlab.com/ee/user/project/repository/web_editor.html#create-a-file) or [upload](https://docs.gitlab.com/ee/user/project/repository/web_editor.html#upload-a-file) files
- [ ] [Add files using the command line](https://docs.gitlab.com/ee/gitlab-basics/add-file.html#add-a-file-using-the-command-line) or push an existing Git repository with the following command:

```
cd existing_repo
git remote add origin https://gitlab.com/incubateur_m2i_afpa_2/team-les-codetenus/back_end.git
git branch -M main
git push -uf origin main
```
---
## Initialisation du Projet avec la base de données

- [ ] [Installer Composer si vous ne l'avez pas !](https://getcomposer.org/)
- [ ] initialisation de composer avec le projet

```
cd back_end
composer update
```

- [ ] Configurer la connexion de votre base de données
- Copier Coller le `.env` et renomer le en `.env.local`
- Ensuite configurer le `.env.local`

```
DATABASE_URL="mysql://{NomUtilisateur}:{Motdepasse}@127.0.0.1:3306/#NomBDD#?serverVersion=5.7.36&charset=utf8mb4"
```

- [ ] Si la base de donnée est déjà existante avec des données
  - il faudra d'abord la supprimer (pour éviter toutes **_erreur_**)

```
php bin/console doctrine:database:drop --force
```

- [ ] Initialisation de la base de données

```
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migration:migrate
```

- [ ] Générer les données fictives

```
php bin/console doctrine:fixtures:load
```
---
## Générer les Clés privés pour Token JWT

Installer le .exe de [Win64 OpenSSL v3.0.7 Light](https://slproweb.com/download/Win64OpenSSL_Light-3_0_7.exe)

Dans votre terminal :

``` composer update ```

``` php bin/console lexik:jwt:generate-keypair ```

Vous pouvez maintenant vous connecter sur le site.

---
## Configuration de Mailer

- Pour utiliser mailer il faut configurer le `.env.local` comme ci-dessous.

``` 
###> symfony/mailer ###
MAILER_DSN=gmail+smtp://{email}:{motdepasse d'application}@default
```
- Une fois `MAILER_DSN` configuré vous allez pouvoir lancer le service d'envoi de mail avec cette ligne de commande.

``` 
php bin/console messenger:consume -vv 
```
- Puis selectionner `async,failed`.
```bash
 Select receivers to consume: [async]:
  [0] async
  [1] failed
 > async,failed
```
---
## Les Différentes requêtes
|            N°            |    Entity     |                                         URI                                         | Method | Status HTTP |                               Description                                |
|:------------------------:|:-------------:|:-----------------------------------------------------------------------------------:|:------:|:-----------:|:------------------------------------------------------------------------:|
|  <a id="request1">1</a>  |     Blog      |                                      /api/blog                                      |  GET   |     200     |               Permet de retourner tout les blogs existants               |
|  <a id="request2">2</a>  |     User      |      /api/user/register/{name}/{surname}/{email}/{password}/{passwordConfirm}       |  POST  |     200     |                    Permet d'enregister un utilisateur                    |
| <a id="request10">10</a> |     User      |                           /api/user/getUserByMail/{email}                           |  GET   |     200     |             Permet de récupérer un utilisateur via son email             |
|  <a id="request3">3</a>  |    Produit    |                                    /api/produit                                     |  GET   |     200     |             Permet de retourner tout les produits existants              |
|  <a id="request4">4</a>  |    Produit    | /api/produit/add/{name}/{description}/{pathImage}/{price}/{is_trend}/{is_available} |  POST  |     200     |                       Permet d'ajouter un produit                        |
|  <a id="request5">5</a>  |    Contact    |                                    /api/contact/                                    |  GET   |     200     |             Permet de retourner tout les contacts existants              |
|  <a id="request6">6</a>  |    Contact    |             /api/contact/add/{name}/{surname}/{email}/{message}/{phone}             |  POST  |     200     |                       Permet d'ajouter un contact                        |
|  <a id="request7">7</a>  |    Contact    |                                  /api/remove/{id}                                   | DELETE |     200     |                      Permet de supprimer un contact                      |
|  <a id="request8">8</a>  | ResetPassword |                        /api/reset-password/sendMail/{email}                         |  GET   |     200     | Permet d'envoyer un mail avec un lien de reintialisation de mot de passe |
|  <a id="request9">9</a>  | ResetPassword |           /api/reset-password/reset/{token}/{password}/{passwordConfirm}            |  POST  |     200     |          Permet de creer le nouveau mot de passe avec un token           |


## Success Gérer par l'application
| Success Code |            Error Message            | Status HTTP | Success generated by |
|:------------:|:-----------------------------------:|:-----------:|:--------------------:|
|     002      |   Your password has been changed    |     200     |    [9](#request9)    | 
|     003      |    This contact has been create     |     200     |    [6](#request6)    | 
|     004      |    This contact has been remove     |     200     |    [7](#request7)    |



## Erreur Gérer par l'application
| Error Code |                      Error Message                       | Status HTTP | Error generated by |
|:----------:|:--------------------------------------------------------:|:-----------:|:------------------:|
|    001     | L'adresse email est déjà inscrite dans la base de donnée |     409     |   [2](#request2)   | 
|    002     |                le produit n'éxiste pas !                 |     409     |   [2](#request2)   | 
|    003     |               la catégorie n'éxiste pas !                |     409     |   [2](#request2)   | 
|    004     |                is_trend is not boolean !                 |     409     |   [2](#request2)   | 
|    005     |              is_available is not boolean !               |     409     |   [2](#request2)   | 
|    006     |               le produit est en commande !               |     409     |   [2](#request2)   | 
|    007     |               la promotion n'existe pas !                |     409     |   [2](#request2)   | 
|    013     |                 This contact don't exist                 |     409     |   [7](#request7)   | 


## Variable SQL
Remove value "ONLY_FULL_GROUP_BY" in var = sql_mod
![img.png](img.png)