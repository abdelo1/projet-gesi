# projet-gesi

Ce site responsive concerne la gestion d'une equipe de foot .Il est possible de:
-ajouter un joueur 
-supprimer un joueur
-inserer des matchs 
-supprimer des matchs
-mettre a jour des matchs
-poster un article
-modifier un article
-supprimer un article

tous ces actions sont geres par l'admin qui possede son interface depuis lequel il peut gerer le site.
pour acceder a l'espace admin il suffit juste d'ajouter /admin au lien de la page se trouvant dans la barre de tache . 

L'utilisateur ne peut que consulter les articles poste par l'admin ainsi que les matchs .Il peut egalement avoir des informations sur les differents joueurs.Il a la possibilite de contactez le club depuis la page de contact 

-----------------------------------Technologies utilisees --------------------------------

-HTML,CSS(Bootstrap),JQUERY,PHP,MYSQL(mariaDB)
 la fonction init_bdd() se trouvant dans le fichier functions.php sous le repertoire functions permet la connexion a la base de donnee avec root comme nom d'utilisateur sans mot de passe

-----------------------------------Style du site et architecture --------------------------------

Couleur secondaire = #f23a2e
Couleur primaire = #185e8f
police utilise= Montserrat 
nombre de pages =12 pages dont 5 accessibles par l'utilisateur et 4 accessibles par l'admin.
le repertoire ressources contient les images stockes dans la base donnee et la police utilise
le repertoire sources contient les fichiers:
- css de bootstrap et ceux du site sous le repertoire css
-js de bootstrap et ceux du site sous le repertoire js


