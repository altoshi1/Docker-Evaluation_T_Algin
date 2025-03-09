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
Voici la commande utiliser pour cette exercice: 
docker compose exec database mysqldump --no-tablespaces -u db_client -p"password" docker_doc_dev > dump.sql
