<h1 align="center">Laravel Twitter</h1>


<p align="center">
   <img align="center" src="public/img/tweet.png" width="600">
</p>

<h2>Etape du projet</h2>

<h4>Creation Projet avec laravel  <a href="https://travis-ci.org/laravel/framework"> 
<img align="center" src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" alt="Build Status" width="150"></a></h4>
<p>Creation du projet avec la commande : new laravel nom du projet -auth </p>


<h4>Création de la base de donnée


<a href="https://www.mamp.info/fr/"> 
<img align="center" src="https://www.mamp.info/images/icons/mamp.png" alt="Build Status" width="40"></a>



<img align="center" src="https://c7.uihere.com/icons/210/340/991/mysql-5fba0f1cddb0c0db446ec9f49b1b5d31.png" alt="Build Status" width="40">
</h4>

<p>Création de la base avec mamp puis connexion a cette base de données depuis le fichier .env.</p>

<h4>Migration - Seeder</h4>
<p>Création des différentes migrations pour les tables de la base de données ( table posts, users, followers)</p>
<p>Création des seeders pour remplir la table des users avec des vraies infos ( réaliser avec faker ) ainsi qu'une image pour chacun des users, la table des posts et aussi la table des followers. </p>

<h4>Authentification : Login / Register</h4>
<p>Grâce à laravel, la partie authentification a été rapide à faire grace à la commande du début -auth. J'ai juste dû rajouter un champ username et mettre un champ avatar par defaut.</p>

<h4>Interface
<img align="center" src="https://www.kindpng.com/picc/m/300-3001456_bootstrap-bootstrap-4-icon-png-transparent-png.png" width="40">
</h4>

<p>J'ai utilisé Boostrap comme framwork pour l'interface</p>
<p>J'ai commencé par l'interface de la page tweet. Avec un champ textera pour que les users ajoutent des tweets, puis une partie pour que les tweet s'affiche sur la page avec la date de création ainsi que le nom de l'user qui là écrit et son avatar ( relation entre post et user ). Puis la partie supression d'un tweet, qui permet à un user connecté de suprimé ses tweet.

<p>Puis j'ai fait la page welcome, qui représente la premier page du site, les users pourront se connecter directement en cliquant sur les boutons, login ou register. Ou accéder directement aux tweet si ils sont déja connecte</p>
<p>Ensuite la page account, qui permet au utilisateurs de modifier leur donnée de leur compte ( avatar, nom, username, email et mot de passe ), et aussi de suprimer leur compte</p>
<p>Pour finir, la page profil, qui permet aux users de voir leurs tweets, leurs followers, leurs following, mais aussi de pouvoir voir les page de profil des autres users, et de les suivres pour avoir l'affichage de leur tweet dans la page tweet </p>


<h2>Lancer le projet</h2>

<p># Cloner le repo</p>
<p># Lancer les migrations et seeders</p>
<p># Lancer le projet avec la commande php artisan serve</p>


