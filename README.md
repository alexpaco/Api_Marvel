Application utilisant l'API Marvel  
==================================

1) Installation de l'application  
   ----------------------------

Pour commencer cloner le projet **https://github.com/alexpaco/Api_Marvel.git**  

2) Utilisation de l'application
   ----------------------------
Pour pouvoir utiliser l'application il vous faudra les clés api de Marvel que vous trouverez après inscription à ce lien <https://developer.marvel.com/>. Une fois les clés obtenues créez le fichier **Cles.php** dans *src/AP/PersonnagesBundles/Services* et mettez ce code la avec vos clés publique et privée.  
! [screen Cles.php](/images/ServiceKey.PNG)  

Pour ensuite accéder à l'application, allez dans le dossier de l'application, faire un bin/console serve:run.  
Copiez le lien donné dans la console et rajoutez /fr/1. Il indique la langue utilisée en occurence le français sans cela l'application de marchera pas. Il y a aussi /en/1 pour l'anglais.  
En arrivant sur la page vous verrez les items représentant les personnages de Marvel. Tout en bas vous une pagination pouvant voir d'autres personnages.  
Au clic d'un item vous accédez à la fiche détail du personnage avec :  

  * Son nom
  * Son image
  * Sa description, s'il y en a une
  * Le nombre de comics où il apparait
  * les 3 premiers comics où il apparait, s'il y en à  

3) Amélioration future
   -------------------
Voici quelques améliorations qui pourrait venir :  
  * Elargissement du catalogue de traduction
  * Possibilité de s'inscrire
  * Possibilité d'aimer des personnages
