# projet-gesi

Ce site responsive concerne la gestion d'une equipe de foot .Il est possible de:
-ajouter un joueur 
-supprimer un joueur
-modifier les details d'un joueur
-inserer des matchs 
  NB:la date du match suit le format (mois jour,annee Heure:minute) en anglais ex:march 23,2020 12:34
  pour dire 23 mars 2020 a 12h34
  Cela est du au faite que la machine sur laquelle a ete cree le site est en anglais  
-supprimer des matchs
-mettre a jour des matchs
-poster un article
-modifier un article
-supprimer un article

toutes ces actions sont geres par l'admin qui possede son interface depuis lequel il peut gerer le site.
pour acceder a l'espace admin il suffit juste d'ajouter /admin au lien de la page se trouvant dans la barre de liens tout en haut dans le navigateur. Un identifiant et mot de passe vous est demande.

identifiant:admin
mot de passe:projet-gesi2020

L'utilisateur ne peut que consulter les articles poste par l'admin ainsi que les matchs .Il peut egalement avoir des informations sur les differents joueurs.Il a la possibilite de contactez le club depuis la page de contact 

-----------------------------------Technologies utilisees --------------------------------

-HTML,CSS(Bootstrap),JQUERY,PHP,MYSQL
 la fonction init_bdd() se trouvant dans le fichier functions.php sous le repertoire functions permet la connexion a la base de donnee avec root comme nom d'utilisateur sans mot de passe

-----------------------------------Style du site et architecture --------------------------------
Couleur primaire = noir
Couleur secondaire = #f23a2e
Couleur tertiaire =#185e8f
police utilise= Montserrat 
nombre de pages =14 pages dont 8 accessibles par l'utilisateur et 6 accessibles que par l'admin.
le repertoire ressources contient les images stockes dans la base donnee et la police utilise
le repertoire sources contient les fichiers:
- css de bootstrap et ceux du site sous le repertoire css
-js de bootstrap et ceux du site sous le repertoire js
les fichiers php accessibles par l'utilisateur se trouvent a la racine du dossier
ceux accessibles que par l'admin se trouve dans le dossier admin

------------------------------------Architecture de la base de donnee------------------------
base de donne utilise pour le developpement est mariadb
le nom de la base donnee est : equipe. Il est composee de 3 tables :
-titulaire (ou sont stocke les joueurs de l'equipe )
-match (ou sont stocke le programme des matchs)
-article(ou sont stocke les articles ) 





