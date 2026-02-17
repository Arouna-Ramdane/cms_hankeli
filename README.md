# cms_hankeli

# 1. Prérequis Système 
Virtualisation : Doit être activée dans le BIOS (souvent sous le nom VT-x ou AMD-V).

WSL 2 : Il est fortement recommandé d'utiliser le moteur WSL 2 (Windows Subsystem for Linux) pour de meilleures performances. Si nécessaire, mettez-le à jour via la commande wsl --update. 
		Comment démarrer WSL sous Windows ?
			Activez WSL en ouvrant « Panneau de configuration », « Programmes », « Activer ou désactiver des fonctionnalités Windows », en sélectionnant « Sous-système Windows pour Linux » et en appuyant sur OK .

# 2. Installation de Docker Desktop
Téléchargement : Récupérez l'installeur sur le site officiel de Docker: https://docs.docker.com/desktop/setup/install/windows-install/

Configuration : Lors de l'installation, assurez-vous que l'option "Use WSL 2 instead of Hyper-V" est cochée.


Redémarrage : Redémarrez votre PC pour finaliser l'activation des fonctionnalités Windows nécessaires.


Vérification : Ouvrez un terminal (PowerShell ou CMD) et tapez :
	- docker --version
	- docker compose version. 

