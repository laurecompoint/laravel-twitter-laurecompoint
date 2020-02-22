<h3 align="center">Laravel Twitter</h3>

<p align="center">
   <img align="center" src="public/img/tweet.png" width="100">
</p>

<h3>Etape du projet</h3>

<h4>Creation Projet avec laravel  <a href="https://travis-ci.org/laravel/framework"> 
<img align="center" src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" alt="Build Status" width="100"></a></h4>
<p>Creation du projet avec la commande : new laravel non du projet -auth </p>


<h4>Creation de la base de donnée</h4>
<p></p>

<h4>Migration - Seeder</h4>
<p>Creation des différente migrations pour les tables de la base de donnée ( table posts, users, followers)</p>
<p>Creation des seeder pour remplir la table des users avec des vrais info ( realiser avec faker ) ainsi que image pour chaque user, la tables des posts et aussi la table des followers. </p>

<h4>Authentification : Login / Register</h4>
<p>Grace à laravel, la partie authentification à été rapide è faire grace a la commande du début -auth. J'ai juste du rajouter un champ username et mettre un champs avatar par defaut.</p>

<h4>Interface</h4>
<p>J'ai commence par l'interface de la page tweet. Avec un champ textera pour que les users ajoute des tweets, puis une partie pour que les tweet s'affichent sur la page avec la date de creation ainsi que le nom de user qui là écrit et son avatar ( relation entre post et user ). Puis la partie supression d'un tweet, qui permet à user connecte des suprime ses tweet.

<p>Puis j'ai fait la page welcome, qui représente la premier page du site, les users pouront se connecter directement en cliquant sur les boutons, login ou register. Ou acceder directement aux tweet si ils sont déja connecte</p>
<p>Ensuite la page account, qui permet au utilisateur de modifier leur donnee de leur compte ( avatar, nom, username, email et mot de passe ), et aussi de suprimer leur compte</p>
<p>Pour finir, la page profil, qui permet aus users de voir leur tweets, leur followers, leur following, mais aussi de pouvoir voir les page profil des autres users, et de les suivres pour avoir l'affichage de leur tweet dans la page tweet </p>


<h3>Lancer le projet</h3>

<p>Cloner le repos</p>
<p>Lancer les migration et seeder</p>
<p>Lancer le serve avec la commande php artisa serve</p>


