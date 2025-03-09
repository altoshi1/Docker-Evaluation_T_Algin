EXERCICE 2 : 


Exercice 1 : 
On crée le fichier init.sql puis on lance le service database 
avec la commande suivante: docker compose up -d database

Résultat ci-dessous:

![1](https://github.com/user-attachments/assets/bb18b3db-6833-41aa-9216-08c40963df72)



Exercice 2 : 
La commande à éxecuter pour ouvrir un processus bash interactif est
la commande : docker compose exec database bash

Ci-dessous: Les commandes shell pour vérifier que la base par défaut est bien présente ainsi
que son contenu initial.

![Capture d’écran du 2025-03-09 17-58-57](https://github.com/user-attachments/assets/50e92afb-7cc7-4753-8a76-841ae2d81200)
![docker 3](https://github.com/user-attachments/assets/bae0d632-17b3-42de-bb2c-e627a3ccd675)


Exercice 3 : 
Voici la commande utilisée pour cette exercice: 

docker compose exec database mysqldump --no-tablespaces -u db_client -p"password" docker_doc_dev > dump.sql


Exercice 4 : Pour associer un volume permettant de persister les données sur le disque 
voici les lignes rajouter au fichier docker-compose.yml:

volumes:
      - ./data:/var/lib/mysql
      - ./init.sql:/docker-entrypoint-initdb.d/init.sql



Exercice 5 : Pour afficher les données de la table article j'ai crée un fichier index.php

Puis pour pour lancer l'image on effectue les commandes suivantes: 

docker compose build

docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d

Et enfin affichage des résultats sur localhost via le port 80:
http://localhost:8080



Exercice 6 : 
La command epour relancer le projet après modification des sources :

docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d

Exercice 7 :
Voici les deux commandes pour dev et prod : 

docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d --build

docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d --build

Fermer le docker et Faire un : sudo rm -rf ./data/* avant de lancer la deuxieme commande prod

Exercice 8 : Est-ce une bonne pratique de placer des données sensibles (password, clés secrètes, etc.) dans des variables d’environnement comme on le fait ici ? Pourquoi ? Quelle autre option mise à disposition
par Docker faut-il privilégier pour le faire et pourquoi ?


Non il n'est pas conseillé de placer des données sensible dans des variables d'environnement 
car ce serait risqué au niveau de la sécurité 

le variable d'environnement pouvant être inspecter via docker inspect
et le données peuvent être visible en clair dans les logs 

La solution que je recommande serait d'utiliser docker secrets qui est un outils mis en place par docker pour chiffrer automatiquement les données pour les éxposer uniquement aux conteneurs autorisés 








