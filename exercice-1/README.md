Exercice 1 : Validation d’acquis (20 points)


1. Qu’est ce qu’un conteneur ?

Un conteneur est une application ou un processus que l'on isole et que l'on va virtualiser 
sur notre PC pour nous permettre de travailler dessus tout en choisissant les différentes configurations que l'on souhaite utiliser dans le cadre du développement de l'application en question, c'est à dire que l'on pourra choisir les différentes configurations réseaux, système, dépendances etc. Un conteneur est en quelque sorte un environnement complet, qui nous évite de devoir virtualiser un système d'exploitation complet via une machine virtuelle lors d'un nouveau projet.



2. Est-ce que Docker a inventé les conteneurs Linux ? Qu’a apporté Docker à cette technologie ?

Non, Docker n'a pas inventé les conteneurs Linux,
La conteneurisation existait déjà bien avant, Docker et à surtout permis de rendre la technologie plus accessible et conviviale notamment grâce à une CLI et API Simple
Un nouveau format d'images -> Les Dockerfile.
Le docker HUB pour partager et récupérer des images d'autres projets existants
Docker a permis aussi de faciliter la création et l'exécution de conteneurs.



3. Pourquoi est-ce que Docker est particulièrement pensé et adapté pour la conteneurisation de
processus sans états (fichiers, base de données, etc.) ?

Un conteneur étant éphémère, une fois celui-ci arrêté, les données stockées localement sont perdues. C'est pour cette raison que ce type de système est adapté aux bases de données externes ou aux fichiers partagés. Le système de conteneurs éphémères permet d’avoir une application facilement déployable en production, car l'application n'a pas de données stockées localement.



4. Quel artefact distribue-t-on et déploie-t-on dans le workflow de Docker ? Quelles propriétés
désirables doit-il avoir ?

On distribue des images docker.

Les propriétés que l'on souhaite avoir sont:
La portabilité : L'image doit fonctionner partout ou docker est installé.
La légèreté de limage qui doit être la plus petite possible pour un déploiement rapide.
Le versioning de l'image pour retrouver un historique clair.
et enfin elle doit contenir toutes les dépendances nécessaires.



5. Quelle est la différence entre les commandes docker run et docker exec ?

docker run crée et démarre un nouveau conteneur à partir d’une image alors que
docker exec exécute une nouvelle commande/processus dans un conteneur déjà en cours d’exécution.



6. Peut-on lancer des processus supplémentaires dans un même conteneur docker en cours
d’execution ?

Oui on peut lancer plusieurs processus dans un même conteneur mais ce n'est pas recommandé 
pour des raisons de clarté.



7. Pourquoi est il fortement recommandé d’utiliser un tag précis d’une image et de ne pas utiliser le tag latest dans un projet Docker ?

Lorsqu’on utilise le tag latest, on ne sait pas quelle version de l’image est en cours d’exécution parce que le tag latest peut changer, ce qui peut causer des problème de compatibilité
Un tag précis garantit la stabilité on utilise toujours toujours la même version de l’image.



8. Décrire le résultat de cette commande : docker run -d -p 9001:80 --name my-php -v
"$PWD":/var/www/html php:8.2-apache.

Cette commande lance une image docker en arrière plan avec -d, sur le port 9001 du pc hôte 
avec comme nom my-php 
$PWD est le repertoire courant qu'on va monter dans var/www/html qui est le répertoire du serveur web du conteneur 
php-apache => l'image utilisé du serveur qui contient PHP et apache



9. Avec quelle commande docker peut-on arrêter tous les conteneurs ?

Commande : docker stop $(docker ps -q)



10. Quelles précautions doit-on prendre pour construire une image afin de la garder de petite taille et faciliter sa reconstruction ? (2 points)

Utiliser un système léger comme par exemple alpine ou debian:slim
Minimiser le nombre de couche en regroupant les instructions RUN dans un même bloc
supprimer le cache et les fichiers temporaires, On peut aussi renseigner un fichier .dockerignore pour ignorer tout fichier inutile. Enfin, utiliser les multi-stage builds pour séparer la phase de compilation de l’image finale, évitant ainsi d’alourdir cette dernière.
 


11. Lorsqu’un conteneur s’arrête, tout ce qu’il a pu écrire sur le disque ou en mémoire est perdu. Vrai ou faux ? Pourquoi ?

Oui car le système de fichiers d'un conteneur est éphémère lorsque le conteneur est détruit ou quand on le redémarre les données interne disparaissent
sauf dans le cas ou on monte un volume ou on fait un montage de répertoire en local en spécifiant le chemin du dossier, ce qui va permettre de garder les données même en cas d'arrêt de l'image docker.



12. Lorsqu’une image est crée, elle ne peut plus être modifiée. Vrai ou faux ?

Vrai on ne peut pas la modifier il faut crée une nouvelle image à partir de celle-ci.
On crée une nouvelle couche 



13. Comment peut-on publier et obtenir facilement des images ?

On utilise un registre (Docker Hub, GitHub etc.).
Pour publier : docker push nom-du-registre/nom-image:tag
Pour récupérer : docker pull nom-du-registre/nom-image:tag ou docker run nom-image.



14. Comment s’appelle l’image de plus petite taille possible ? Que contient-elle ?

Elle se nomme scratch, elle ne contient rien elle est utilisé pour partir de 0.



15. Par quel moyen le client docker communique avec le serveur dockerd ? Est-il possible de
communiquer avec le serveur via le protocole HTTP ? Pourquoi ?

Le client Docker communique généralement via UNIX (sous Linux) ou une socket Windows, ou éventuellement via TCP quand on configure Docker pour du réseau.
Pas de simple HTTP, pour des raisons de sécurité car http n'est pas sécurisé et les données sont en clair.



16. Un conteneur doit lancer un processus par défaut que l’on pourra override à l’execution. Quelle commande faut-il utiliser pour lancer ce processus : CMD ou ENTRYPOINT ?

Si on met CMD python script.py, Docker va exécuter ce programme automatiquement. Mais si on lance le conteneur avec docker run mon-image python autre_script.py, il remplacera script.py par autre_script.py. Avec ENTRYPOINT, la commande principale ne peut pas être changée aussi simplement, donc CMD est mieux dans ce cas précis.


