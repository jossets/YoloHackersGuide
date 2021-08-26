

<!--- category: NetworkDiscovery --->
<!--- id: intro --->
<!--- title: Network Discovery --->
<!--- keywords:  --->
## Network Discovery




<!--- category: NetworkDiscovery --->
<!--- id: dicoverhost --->
<!--- title: Network scanner: Recherche des serveurs --->
<!--- keywords:  --->
## Network scanner: Recherche des serveurs

Utiliser nmap pour identifier les serveurs sur le sous-réseau 10.10.10.4/24
```
# nmap 10.10.10.4/24
# nmap 10.10.10.1-255
```




<!--- category: NetworkDiscovery --->
<!--- id: portscanner --->
<!--- title: Port scanner: Scan des ports ouverts d'un serveur --->
<!--- keywords:  --->
## Port scanner: Scan des ports ouverts d'un serveur

```
# nmap 10.10.10.4
# nmap -A  10.10.10.4          : Scan les 1000 ports les plus utilisés. Cherche les versions des services et l'OS
# nmap -sV -sC -p- 10.10.10.4  : scan les 655535 ports TCP et cherche les versions des services ouverts. 
# nmap -sU 10.10.10.4          : scan des ports UDP (trés trés lent)
    -sV : Tente d'identifier la version du service
    -sC : Scanne avec les scripts NMap par défaut. Les scripts considérés comme sans risque.
    -A  : Tente de détecter la version de l'OS, la version des services, utilise les scripts par défaut, et réalise un traceroute
    -p- : Scanne les 65535 ports TCP
    -sU : Scanne les ports UDP (trés long)
    -oN nmap.log : output file
```
 
On peut lancer ces trois commandes dans trois shells en parallèle.



<!--- category: NetworkDiscovery --->
<!--- id: portidentification --->
<!--- title: Identification des services --->
<!--- keywords:  --->
## Identification des services

Les services de type ftp, web, ldap tournent peuvent fonctionner sur n'importe quel port, mais utilisent généralement les ports qui leur sont réservés.
Le port 80 par exemple est le port utilisé par les serveurs web pour HTTP.
Le port 443 est le port pour HTTPS.
```
TCP
	20: ftp data
	21: ftp control
	22: ssh
	23: telnet
	25: SMTP (mail)
	37: Time protocol
	53: Bind/DNS
	69: TFTP (Trivial FTP)
	80: HTTP
	109: POP2
	110: POP3
	111: RPC Remote Procedure Call
	137: Netbios Name Service
	138: Netbios Datagram Service
	139: Netbios Session Service
	143: IMAP (mail)
	161: SNMP
	220: IMAP
	389: LDAP
	443: HTTPS
	445: MS Active Directory, SMB
	464: Kerberos
	1521: Oracle Database
	3000: Node JS
	3306: MySQL
UDP
	69: TFTP
	161: SNMP
	
http://www.0daysecurity.com/penetration-testing/enumeration.html 
```
 



<!--- category: NetworkDiscovery --->
<!--- id: 21FtpAnonymous --->
<!--- title: 21: FTP - Anonymous --->
<!--- keywords:  --->
## 21: FTP - Anonymous

Les serveurs ftp permettent de transférer des fichiers.  
Une fois connecté avec un login/password, il est possible de se déplacer dans l'arborescence des répertoire pour  d'uploader/downloader des fichiers.   
Par défaut, le protocole est optimisé pour les fichiers textes. Ne pas oublier d'activer le mode binaire si nécessaire.   
Un compte invité, ou anonymous permet sur certain serveur de télécharger librement des documents publics.   
Le login est 'anonymous', le mot de passe est par convention le mail de l'invité.   
```
$ ftp 10.0.0.11
Name (10.0.0.11:yolo): anonymous
Password: yolo@yolospacehacker.com
ftp> pwd 
ftp> cd docs
ftp> ls 
ftp> bin
ftp> get flag.txt
ftp> put backdoor.php
ftp> bye
```




<!--- category: NetworkDiscovery --->
<!--- id: 22Ssh --->
<!--- title: 22: Ssh --->
<!--- keywords:  --->
## 22: Ssh

Le port 22 est le port ssh, qui permet l'accès distant à un terminal.   
Il est possible de se connecter avec un login/password.
```
$ ssh yolo@10.0.0.11
```


Il est aussi possible de se connecter avec un fichier de clef privé.    
```
$ ssh -i id_rsa yolo@10.0.0.11
```

Le fichier de clef privée ne doit être en lecture que par son propriétaire.   
```
$ chmod 600 id_rsa
```




<!--- category: NetworkDiscovery --->
<!--- id: 80HTTProbots --->
<!--- title: 80: HTTP - Robots.txt --->
<!--- keywords:  --->
## 80: HTTP - Robots.txt

Le fichier robots.txt, quand il existe, est enregistré à la racine d'un site web. 
Il contient une liste des ressources du site qui ne sont pas censées être indexées par les robots d'indexation des moteurs de recherche.<br/>
Par convention, les robots consultent robots.txt avant d'indexer un site Web.<br/>
Son contenu peut donc nous interresser.
```
http://10.10.10.8/robots.txt
```

Plus d'info : <a href='https://fr.wikipedia.org/wiki/Protocole_d%27exclusion_des_robots'>https://fr.wikipedia.org/wiki/Protocole_d%27exclusion_des_robots</a>



<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPsrc --->
<!--- title: 80: HTTP - Page source --->
<!--- keywords:  --->
## 80: HTTP - Page source

Les développeurs laissent parfois des informations utiles, voire des mots de passe dans les commentaires du code. Ce sont souvent des urls,ou des champs de formulaires utilisés pour les tests.<br/><br/>
<div>Commentaires dans le code source HTML ou JS de la page</div>
```
/* Secret code */
&lt;!--- Secret code ---&gt;
```


<div>Elements HTML cachés</div>
```
&lt;p hidden&gt;Secret code.&lt;/p&gt;
&lt;label style=&apos;display: none&apos;&gt;Secret code.&lt;/label&gt;
```




<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPdirs --->
<!--- title: 80: HTTP - Brute force de fichiers et répertoires --->
<!--- keywords:  --->
## 80: HTTP - Brute force de fichiers et répertoires

Bruteforcer un site web consiste à tester la présence de pages accessibles, telles /register, /register.php, /admin, /upload, /users/login.txt, /admin/password.sav, ...
Pour celà il existe des listes de répertoires et de noms de fichiers fréquemment présents sur les serveurs web.<br/>
<br/>
Une fois la techno du serveur connue (php, java, wordpress, joomla, ...) il est possible d'utiliser des listes optimisées, et ne chercher que les extensions adaptées: php, php4, php5, exe, jsp, ...<br/>
Il est aussi possible de chercher des fichiers aux extensions intéressantes : cfg, txt, sav, jar, zip, sh, ...

<br/>
Logiciels de brute force usuels :
<ul>
<li>dirb : Ligne de commande. A utiliser pour un check rapide avec sa liste 'common.txt'.</li>
<li>gobuster : Ligne de commande. A utiliser avec la liste 'directory-list-2.3-medium.txt' de dirbuster</li>
<li>dirbuster : Interface graphique. Visuel mais pas forcément le meilleur choix</li>
</ul>

Il est crucial de bien choisir la liste de répertoires/noms de fichiers:
<ul>
<li>/usr/share/wordlists/dirb/common.txt : petite liste bien construite</li>
<li>/usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt : grosse liste. Normalement couvre tous les CTF.</li>   
<li>https://github.com/danielmiessler/SecLists : Une fois à l'aise avec les deux listes précédentes, il est possible de trouver des listes plus optimisées sur ce git.
<li>Sur les distribution Kali et Parrot, le répertoire /usr/share/wordlists contient des liens vers de nombreuses listes. Prenez le temps de le regarder en détail.</li>
</ul>
<br/>

<h5>Dirb</h5>
Dirb est préinstallé sur Kali ou Parrot. Si ce n'est pas le cas:
```
sudo apt-get install -y dirb
```

Lancer un scan rapide avec dirb, qui va utiliser sa liste 'common.txt':
```
dirb http://10.10.10.11
```

<br/>
Rechercher les fichiers avec l'extension .php:
```
dirb http://10.10.10.11  -X .php
```

<br/>


<h5>Gobuster</h5>
```
https://github.com/OJ/gobuster
```

Le télécharger et l'installer en /opt
```
wget https://github.com/OJ/gobuster/releases/download/v3.0.1/gobuster-linux-amd64.7z
sudo apt install p7zip-full
7z x gobuster-linux-amd64.7z
sudo cp gobuster-linux-amd64/gobuster /opt/gobuster
chmod a+x /opt/gobuster
```


Bruteforce le site http://10.10.10.11, avec la liste directory-list-2.3-medium.txt, avec des extensions de fichier html,php,txt
```
/opt/gobuster dir -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -u http://10.10.10.11  -l -x html,php,txt
```


Pour une url en HTTPS, ajouter l'option de ligne de commande 
```
-k : skip HTTPS ssl verification
```




<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPbrutebasicauth --->
<!--- title: 80: HTTP - Basic Auth - Brute force --->
<!--- keywords:  --->
## 80: HTTP - Basic Auth - Brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt  -f 10.10.10.157 http-get /monitoring
```

```
-l login 
-P password file 
-f server adress
http-get : HTTP request type
/monitoring : url path
```




<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPbruteformpost --->
<!--- title: 80: HTTP - Form HTTP Post - Authent brute force --->
<!--- keywords:  --->
## 80: HTTP - Form HTTP Post - Authent brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.11 http-post-form '/admin/login.php:username=^USER^&password=^PASS^:F=Wrong password:H=Cookie\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4' -V
```

Attention si la réponse est un 302 Redirect, hydra ne va pas suivre et va générer un faux positif.



<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPbruteformget --->
<!--- title: 80: HTTP - Form HTTP GET - Brute force --->
<!--- keywords:  --->
## 80: HTTP - Form HTTP GET - Brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.4 http-get-form '/login.php:username=^USER^&password=^PASS^:F=Login failed:H=Cookie\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4' -V
```

Attention si la réponse est un 302 Redirect, hydra ne va pas suivre et va générer un faux positif.



<!--- category: NetworkDiscovery --->
<!--- id: wordpress --->
<!--- title: CMS: Wordpress --->
<!--- keywords:  --->
## CMS: Wordpress

<h5>Wordpress</h5>

Format des urls
```
Posts : /index.php?p=22
        /index.php/2017/04/12/hello-world/
        /index.php/jobs/apply/8/
Login : /wp-login/
        /wp-login.php
Uploaded files : /wp-content/uploads/%year%/%month%/%filename%
```


Fichier de config, et credentials de la base de donnée
```
/var/www/html/   
wordpress/wp-config.php
wordpress/htdocs/wp-config.php
```


<h5>Wpscan</h5>
Wpscan connait la structure d'un site wordpress et va faire du brute force pour identifier les pages, le posts, les users, le thème, les plugins.<br/>
Les failles de wordpress viennent essentiellement des plugins non mis à jour. 
```
wpscan --url http://10.10.10.10/wordpress/ -e
--url : url de la page wordpress.
-e : énumeration
```

Brute force du login
```
wpscan --url http://10.10.10.10/wordpress/  -P rockyou.txt -U admin
```




<!--- category: NetworkDiscovery --->
<!--- id: 110POP3 --->
<!--- title: 110: POP3 --->
<!--- keywords:  --->
## 110: POP3

Le protocole POP3 sert à relever ses mails sur un serveur distant.    
Si vous avez les identifiants et mots de passe, connectez vous en netcat ou telnet.
```
$ nc 10.0.12.10 110
```

Une fois connecté, s'authentifier avec 
```
USER XXXXXX
PASS XXXXXX
```

Afficher la liste des mails avec:
```
LIST
```

Lire le mail numéro 1
```
RETR 1
```

Quitter le serveur.
```
QUIT
```




<!--- category: NetworkDiscovery --->
<!--- id: 110POP3BF --->
<!--- title: 110: POP3 Bruteforce --->
<!--- keywords:  --->
## 110: POP3 Bruteforce

L'authentification POP3 peut être brute forcée avec hydra.
```
hydra -V -l username -P wordlist.txt 10.0.12.10 pop3
```




<!--- category: NetworkDiscovery --->
<!--- id: 3306MySQL --->
<!--- title: 3306: MySQL --->
<!--- keywords:  --->
## 3306: MySQL

Si vous avez les identifiants et mots de passe. Se connecter avec le client mysql.
```
mysql --host=HOST -u USER -p
--host=précise le nom du serveur
-u le login
-p force la saisie du mot de passe.
```

Dumper le contenu de la base.
```
show databases; -- Liste les bases de données. 
                -- La base 'information_schema' contient des informations internes à mysql ou mariadb. On peut généralement l'ignorer.
use DATABASE;
show tables;    -- Liste les tables
SELECT * FROM TABLENAME;
quit;
```




<!--- category: NetworkDiscovery --->
<!--- id: PORTKNOCK --->
<!--- title: Port knocking --->
<!--- keywords:  --->
## Port knocking

Pour rendre certains services invisibles aux scans, les serveurs peuvent utiliser une fonctionnalité de Port Knocking.    
Les ports sensibles ne sont ouverts qu'une fois une séquence particulière de paquets reçus, idéalement en UDP.    
Cette fonctionnalité peut être implémentée directement dans le routeur, le firewall ou l'application.
Envoyer un unique paquet vide en UDP sur le port 1337
```
nc -u -z localhost 1337
```

Envoyer une série de paquets vides sur les port UDP 1337 4444 6666
```
nc -u -z localhost 1337 4444 6666
```

Envoyer un unique paquet contenant le message KnockKnockKnock sur le port UDP 1337
```
for i in 10124 11056 18639; do printf Knock | nc -u -q1 localhost $i; done
```


