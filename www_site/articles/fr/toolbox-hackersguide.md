

<!--- category: HackersGuide --->
<!--- id: intro --->
<!--- title: Guide du Hacker --->
<!--- keywords:  --->
## Guide du Hacker




<!--- category: HackersGuide --->
<!--- id: Guide --->
<!--- title: Intro --->
<!--- keywords:  --->
## Intro
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

