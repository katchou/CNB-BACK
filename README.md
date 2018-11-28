# CNB-BACK, une aventure symfony

_Fièrement pompé depuis [un comment sur issue github](https://github.com/symfony/maker-bundle/issues/158#issuecomment-386868227)_

## TL;DR
```
git clone htpp://github.com/katchou/CNB-BACK.git
cd CNB-BACK
composer install
php bin/console server:run
http://127.0.0.1:8000/api
```

## Les étapes simples

* Installer php (si c'est pas déjà fait)

Une version >= 7.1 semble indiquée, pour ce que j'en sais. Perso j'ai mis une 7.2.10 et ça a l'air de marcher en local sur mon poste si les étoiles sont alignées.

* Installer composer. Il y a un installer windows dispo [ici](https://getcomposer.org/Composer-Setup.exe). Il parait qu'il faut faire gaffe à l'endroit où on l'exécute, vu qu'il s'installe dans le cwd comme indiqué dans la documentation.

* Ensuite avec composer on va installer les tools qui vont bien
`composer creater-project symfony/skeleton CNB-BACK` même si cnb-api me sied plus
`cd CNB-BACK` pour se placer dans le bon répertoire
`composer req api orm` req est un raccourci pour `require` donc c'est plus rapide à taper vu que c'est un raccourci
`composer req maker --dev` ici `--dev` c'est une option pour dire qu'on veut la dépendance que en dev. Fou, non ?

* Ensuite j'enchaine avec une série de 
```
php bin/console make:entity
```

Un truc magique pour créer du code chiant en mode cli interactif. Je me suis basé sur le script sql de création de base.

Fun fact : nique les FK, tu peux toujours ajouter une relation entre deux classes à la création de la deuxième, quelque soit la relation. Nique les FK. Bon par contre tu peux pas l'ajouter direct sur la première si la deuxième existe pas. Un appel subséquent à `make:entity`en lui passant un nom d'entity existant fait un update. Oui m'dame, c'est un outil profesionnel.

* Ensuite une série d'alerte a été levée par mes soins consciencieux :

**/!\ WARRING /!\\** ajouter les defaults à la main PHP style : HoraireCours->nombreParticipants (voir le code pour plus de détails, je vais pas *tout* réécrire ici non plus)

**/!\ WARRING /!\\** je mets des s à cours. Partout

**/!\ WARRING /!\\** cour_horaire change en HoraireCours, cour_type change TypeCours. Cohérence reste cohérence. 

**/!\ WARRING /!\\** pas de FK dans seance ???

**/!\ WARRING /!\\** Y aurait pas un soucis avec le modèle de données ?  
Genre la séance avec motif d'absence pas reliée à un user ? (A ce moment là, je me déconcentre un peu)

**/!\ WARRING /!\\** Les phones ça va pas du tout du tout du tout. Pas. On sent la fin de script.

* Pour les dateDeModification et les dateDeCreation sur le User (oui, bon, j'ai gardé User pou l'utilisateur, on a tous droit à nos vices cachés) j'ai utilisé une extension Doctrine : `composer req gedmo/doctrine-extensions`

    J'ai aussi ajouté un fichier doctrin_extensions.yaml dans config/package où j'ai mis de la conf mais si je super pas optimiste sur ce coup. Faut ptêtre la mettre dans doctrine.yaml sous doctrine:orm:mappings mais même ça j'ai un gros doute donc voili voilà toussa tavu.

* La base (sqlite, penser à l'activer dans le php.ini) est (donc) du sqlite. C'est configuré dans le fichier .env à la racine du projet.

* Après ça j'ai généré puis appliqué une migration doctrine `php bin/console make:migration`que j'ai appliqué d'un `php bin/console doctrine:migration:migrate` bien satisfait.

* Ensuite il me faillait un server de dev et je voulais celui de symfony parce que. `composer req server --dev` a fait le taf, suivi d'un petit `php bin/console server:run pour lancer le bouzin. ensuite go sur http://127.0.0.1:8000/api et wahou.

Bisou, bone nuit.

@TODO
- [ ] Gérer la sécurité niveau User
- [x] Dodo!
