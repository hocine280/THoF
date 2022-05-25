
# **![alt text](public/img/logo.png) - THoF - The House of Forms**

1. [Qu'est-ce que THoF](#chapitre1)
2. [Prérequis pour une utilisation local](#chapitre2)
3. [Créer un compte](#chapitre3)
4. [Les fonctionnalités de THoF](#chapitre4)

<a id="chapitre1"></a>

## **1- Qu'est-ce que THoF ?**
THoF ou The House of Form est une application de gestion de formulaire développée dans le cadre du projet d'INFO 0303.  
Cette application vise donc à gérer les formulaires au sein de l'université.
Pour utiliser THoF il vous faudra créé un compte.

<br>
<a id="chapitre2"></a>

## **2- Prérequis pour une utilisation en local**
THoF est une application web développée à l'aide du framework Laravel. Pour pouvoir en bénéficier localement il vous faudra donc réaliser les commandes suivantes à la racine du projet :   
```
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
```
Une fois ces commandes effectuées n'oubliez pas de compléter les informations dans le fichier ``.env`` avec vos informations de connexion à la base de données. 
Etant donné que des seeders ont étés créées dans ce projet pour disposer d'une base de données permettant de tester l'application. Pour pouvoir en bénéficier exécutez la commande suivante à la racine du projet :
```
php artisan migrate:fresh --seed
```

<br>
<a id="chapitre3"></a>

## **3- Créer un Compte**
Pour pouvoir utiliser THoF et éviter d'être bloqué sur notre merveilleuse page d'accueil il va vous falloir créer un compte.    
Pour créer un compte vous aurez alors besoin d'un code indiquant votre rôle.
<br>

La liste des rôles :    
- Etudiant : 1508526
- Prof : 1605879
- Admin : 1985693
- Extérieur : 1705891

<br>
<a id="chapitre4"></a>

## **4- Les fonctionnalités**
THoF est doté d'une multitude de fonctionnalités tel que :
- La création et la suppression d'un formulaire
- La création, modification et suppression d'une demande
- Valider une demande ou non à l'un de ses formulaires
- Télécharger une version PDF d'un formulaire
- Télécharger une version PDF d'une demande
- La double authentification via JetStream
- Gestion de son profil
<br>

---
***Projet réalisé par HADID Hocine (@hocine280) et CHEMIN Pierre (@PietroCookie)***

