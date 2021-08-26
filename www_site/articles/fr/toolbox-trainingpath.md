

<!--- category: TrainingPath --->
<!--- id: intro --->
<!--- title: Se former  --->
<!--- keywords:  --->
## Se former 

En cyber, il est important d'avoir des bases dans de nombreux domaines. Une formation complète en partant de zéro nécessite plusieurs années de dur travail, on ne devient pas expert en quinze jours. 
     
La bonne nouvelle c'est que le critère principal n'est pas le parcours scolaire, mais la motivation.   
En étant motivé et avec du temps, la connaissance va venir.  
Et surtout, il est possible de se faire plaisir très rapidement.   
   
___Réseau et Shell___
On peut débuter en acquérant une base en réseau (adresse IP et ports) et en système (shell linux), et commencer à lancer des scans réseaux et pratiquer ses premiers exploits (LFI, injection de commande, brute force de mots de passe).   
  
___SQL___ 
On continue avec une initiations aux bases de données relationelles (Select sur mySQL/MariaDB) et les SQLi.  

___HTTP___
Etudier le protocole HTTP permet de comprendre les requètes aux serveurs webs, et apprendre à faire des GET/POST avec curl.   

___Serveur web___
Etudier l'architecture des applications web permet de comprendre la notion de front et de back, frameworks applicatifs. Une base en php permet de mettre en place des applications dynamiques.

___Framework Web___

___Python___
Une découverte de python permet de comprendre les exploits d'exploitdb, et automatiser les siens.

___Mobiles___
, dévelopement, applications web, techno mobiles... 




<!--- category: TrainingPath --->
<!--- id: Guide --->
<!--- title: Metiers --->
<!--- keywords:  --->
## Metiers

Vous désirez travailler dans le milieu de la cyber-sécurité ?   
Excellent choix !   
Il existe des métiers pour tous les profils, et les besoins en cyber-sécurité ne cessent d'augmenter.
L'ANSII édite un guide des métiers de la cyber: [-> Guide des métiers](metiercyber.pdf)    

- Les métiers de l'expertise et de l'attaque sont les plus connus (pentesters, spécialistes en forensic/virus/OSint, chercheur en failles de sécurité,...)

- les métiers techniques de la défense sont ceux pour lesquels il y a le plus d'offres d'emploi (admin système, ingénieur devops, architecte réseau,...)

- Les métiers de l'encadrement sont souvent moins connus, mais correspondent à des besoins en augmentation des entreprises. Les états sont de plus en plus sensibles à la sécurité des données, et votent des loi, telle la GDPR qui rendent les entreprises responsables en cas de piratage de leur base client. Les entreprises doivent pouvoir prouver qu'elle ont fait tout ce qui était possible pour se protéger, et celà se traduit par la mise en place de process qui respectent les normes/recommandations et soient régulièrement audités.
Ce sont des métiers moins techniques, mais qui nécessitent une bonne connaissance des bases techniques.







Ce guide a pour but de simplifier la vie du débutant.     
Il suit une méthodologie complète mais très simplifiée. Vous pourrez ainsi travailler sur vos premiers serveurs de niveaux faciles, et les powner sans vous perdre dans les méandres d'Internet.   
<br>
<br>

    
Les grandes phases d'un pentest (test de pénétration) sont les suivantes:  
   
___Définition du scope___   
Définir clairement la cible, et les limites.   
En formation, ce qui est notre cas, il s'agit de serveurs sur une plage d'adresse IP locale, non routable sur Internet.   
Pour simplifier, vous ne devez travailler que sur des adresses qui commencent par 10. comme 10.10.0.10.      
Nous ne ciblons jamais les infrastructures, ni nos collègues.   
 
   
___Phase de reconnaissance___      
Recueillir des données et des renseignements sur votre cible.   
Les sources d’informations peuvent être sources externes accessibles à tous comme les moteurs de recherche, les réseaux sociaux et le DNS (Domain Name Service) ou des informations fournies par le client.   
Bases Internet: Recherches sur Google, dns,...
      
___Phase de cartographie et énumération___   
Identifier les serveurs, les ports ouverts et les services accessibles.   
Bases en réseau: IP, port, services HTTP, ftp, smtp,...   
[-> IP](?cat=Network)  
[-> Découverte de réseau](?cat=NetworkDiscovery)   
[-> HTTP](?cat=HTTP)   
   
___Recherche de vulnérabilité___   
Identifier des vulnérabilités connues en utilisant les versions des logiciels et des bases de données de logiciels vulnérables comme exploit_db, ou rechercher soi même des vulnérabilités basées sur le Top 10 OWASP.   
Base : CVE, et idéalement python, sql,... pour comprendre l'exploit et l'adapter.  
[-> CVE](?id=cve)    
[-> Default Password and patterns](?cat=Password)    
[-> LFI](?cat=lfi)    
[-> Command injection](?cat=cmdinjection)    
[-> SQLi](?cat=sqli)    
  
      
___Exploitation___   
Mise en application d'un exploit de manière à pouvoir lancer des commandes shell sur un serveur.    
[-> Webshells](?cat=Webshell)  

___Elévation de privilèges___   
Passer d'un compte disposant de faibles privilèges, comme un serveur web, à un compte administrateur.   
Base en shell: cd, système de fichiers, droits utilisateurs, fichier de config, sbit, sudo, ...   
[-> Commandes shell](?cat=Shell)   
[-> Transfert de fichiers](?cat=transfert)   
[-> Elévation de privilège sur Linux](?cat=PrivEscUx)   

___Maintient de l'accès et nettoyage___   
Mise en place de backdoor et nettoyage des traces pour pouvoir se reconnecter facilement sur le serveur.   
Cette manoeuvre est considérée comme avancée.   
Bases: systèmes de logs   
      
___Déplacement latéral___   
Utiliser le serveur pour rebondir sur d'autres machines éventuellement situées sur d'autres réseaux internes.   
Cette manoeuvre est considérée comme avancée.   
Bases: tunnelling et redirection de ports   


Bon hacks !

