

<!--- category: Shell --->
<!--- id: intro --->
<!--- title: Shell --->
<!--- keywords:  --->
## Shell

Ton terminal utilise des commandes shell pour manipuler le système de fichier.
.
Il existe plusieurs shells, chacun avec leur particularité.
Nous regardons le plus commun, le shell bash.
.
Tu es connecté sur un compte, que tu peux connaitre avec la commande id.
Ce compte a des droits, et appartient à des groupes.
Avec la commande ls -al xxx, tu affiches les droits de chaque fichiers.
.
Le jeu va consister à trouver les fichiers appartenant à d'autres comptes, avec des droits en lecture trop ouverts.
Nous allons aussi essayer de nous connecter à d'autres comptes.
L'objectif étant de passer sur le compte administrateur (root).



<!--- category: Shell --->
<!--- id: commandes --->
<!--- title: Commandes shell usuelles --->
<!--- keywords:  --->
## Commandes shell usuelles

```
ls        : afficher le contenu du répertoire courant
ls -l     : afficher le contenu du répertoire courant, avec des info sur les droits des fichiers
ls -l xxx : afficher les droits du fichier xxx
ls -al    : afficher le contenu du répertoire courant, y compris les fichiers cachés
cat xxx   : afficher le contenu du fichier xxx
pwd       : répertoire courant
cd xxx    : se déplacer dans le répertoire xxx
cd ..     : se déplacer vers le répertoire parent
id        : identifiant du compte et groupes auquel il appartient
uname -a  : informations sur le serveur: quelle distribution et version du kernel.
```




<!--- category: Shell --->
<!--- id: flag_shell --->
<!--- title: Flag --->
<!--- keywords:  --->
## Flag

Quelques flags sont accessibles dans ton terminal.<br/>
Tu peux commencer dans le répertoire /home/yolo/flags avant d'étendre à tout ton système.<br/>
C'est l'occasion de mettre en pratique les commandes détaillées dans ce chapitre.
Et puisque tu lis la doc, c'est cadeau : Flag_rtfm_shell
```
cd ~/flags
```




<!--- category: Shell --->
<!--- id: dir --->
<!--- title: Répertoires courants --->
<!--- keywords:  --->
## Répertoires courants

Le système de fichier Unix part de la racine : /<br/>
Il contient généralement les répertoires:
```
/home/xxx : un répertoire par compte utilisateur xxx
~        : votre répertoire utilisateur
/root    : le répertoire de l'administrateur
/tmp     :  fichiers temporaires
/bin     : commandes systèmes
/etc     : fichiers de configuration du système
/var/log : logs des programmes comme le serveur web
/var/www : emplacement par défaut des fichiers des serveurs web
```




<!--- category: Shell --->
<!--- id: shell-permissions --->
<!--- title: Unix - Permissions des fichiers --->
<!--- keywords:  --->
## Unix - Permissions des fichiers
Tous les fichiers et répertoires ont un propriétaire, et font parti d'un groupe.   
Chaque fichier défini donc des permissions pour:   
- User:  le propriétaire   
- Group: les utilisateurs qui font partie du groupe   
- Other: les utilisateurs qui ne sont ni propriétaire ni dans le groupe   
   
Les permissions de base sont:   
- Read: Lecture    
- Write: Ecriture    
- eXecute: Execution    
   
Lecture des droits des fichiers
```
ls -al          : -al permet de lister les droits des fichiers, y compris cachés
 rwxr-xr--
 \ /\ /\ /
  v  v  v
  |  |  droits des autres utilisateurs (o)
  |  |
  |  droits des utilisateurs appartenant au groupe (g)
  |
 droits du propriétaire (u)
```
 
 
```
$ ls -al           
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .          : droits du répertoire courant
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..         : droits du répertoire parent
-rw-rw-r--  1 yolo yolo 5917 janv. 25 14:23 readme.txt : lecture /écriture User/Group, lecture seule pour Other
-rwxr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : lecture/écriture/execution pour le User, lecture/execution pour le groupe et les autres
```
   
   
Des permissions supplémentaires existent:   
- SUID: Set UID, le fichier est éxécuté avec les droits de son propriétaire   
- SGID: Set GUID, le fichier est éxécuté avec les droits de son groupe   
- Sticky Bit: Lorsque ce droit est positionné sur un répertoire, il interdit la suppression d'un fichier qu'il contient à tout utilisateur autre que le propriétaire du fichier.   
   
```
$ ls -al           
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .          
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..         
rwsr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : le x est remplacé par un s pour le User
```
  
Le SUID bit nous permet de lancer des commandes avec les droits d'un autre utilisateur et faire de l'élévation de privilège.



<!--- category: Shell --->
<!--- id: chmod --->
<!--- title: Changer les droits d'un fichier --->
<!--- keywords:  --->
## Changer les droits d'un fichier
La commande chmod permet d'ajouter (+) ou supprimer (-) les droits (r,w,x) aux propriétaire (u), group (g), autres (o) ou tous (a)
```
chmod u+x ./run  : ajout du droit en execution pour le propriétaire
chmod g-x ./run  : suppression du droit d'execution pour le groupe
chmod o+r ./run  : ajout du droit en lecture pour les autres
chmod a+w ./run  : ajout du droit en écriture pour tous
```

   
Il est possible de préciser les valeurs de x,r,w sont directement sous forme binaire.
```
r=4, w=2, x=1 

rwx = 4+2+1 = 7
r-x = 4+0+1 = 5
r-- = 4+0+0 = 4

rwxrx-r-- = 764
chmod 764 readme.txt
```





<!--- category: Shell --->
<!--- id: files --->
<!--- title: Fichiers utiles --->
<!--- keywords:  --->
## Fichiers utiles

```
/etc/passwd : liste des comptes de la machine
/etc/hosts : le nom de la machine et ses alias
```




<!--- category: Shell --->
<!--- id: find --->
<!--- title: find --->
<!--- keywords:  --->
## find
La commande find permet de chercher des fichiers dans les répertoires, et éventuellement d'effectuer des actions sur les fichiers trouvés.
```
find . -name *.txt```

Rechercher les fichiers ayant l'extention .txt dans le répertoire courant et les sous répertoires
```
find / -name *.php```

Rechercher les fichiers ayant l'extention .php à partir de la racine. 
```
find / -name *.php 2&gt;/dev/null```

L'écran est saturé par la liste des répertoires qui nous sont interdits en lecture. La commande 2>/dev/null redirige les erreurs vers le fichier virtuel /dev/null ce qui les fait disparaitre de l'affichage.
```
find / -name *.php -exec ls {} \; 2&gt;/dev/null```

L'option -exec permet d'éxécuter une commande sur chaque fichier trouvé. Souvent ls -al, ou cat.    
{} est remplacé par le nom du fichier trouvé.    
\; signale la fin de la commande à éxécuter.



<!--- category: Shell --->
<!--- id: find-exec --->
<!--- title: find -exec --->
<!--- keywords:  --->
## find -exec
La commande find permet d'éxecuter des commandes sur les fichiers trouvés.
    
```
find / -name *.txt -user yolo -exec cat {} \; 2&gt;/dev/null```

Executer la commande cat sur tous les fichiers .txt appartenant à yolo à partir de la racine.    
    
___Syntaxe de la commande:___      
Le {} est remplacé par le nom des fichiers trouvés, et le \; sert de délimiteur de fin de commande à éxécuter.



<!--- category: Shell --->
<!--- id: ssh --->
<!--- title: SSH --->
<!--- keywords:  --->
## SSH

Les connexions aux serveurs se font en ssh.<br/>
Soit avec un login/password
```
ssh user@hostname
```

Soit avec un fichier de clef privée
```
ssh -i id_rsa user@hostname
```




<!--- category: Shell --->
<!--- id: sshidrsa --->
<!--- title: SSH : Clef privées / Publiques --->
<!--- keywords:  --->
## SSH : Clef privées / Publiques

Sur les serveurs, il est fréquent de s'identifier avec une clef privée plutôt qu'un mot de passe. 
Vos clefs se trouvent en : 
```
$ ls -al ~/.ssh
total 20
drwx------  2 yolo yolo 4096 Apr  4 13:47 .
drwxr-xr-x 27 yolo yolo 4096 Apr  4 13:22 ..
-rw-------  1 yolo yolo 2610 Apr  4 13:47 id_rsa
-rw-r--r--  1 yolo yolo  575 Apr  4 13:47 id_rsa.pub
-rw-r--r--  1 yolo yolo 1998 Apr  1 19:45 known_hosts
```

Les clefs privées permettant de se connecter à votre compte sont dans le fichier :
```
~/.ssh/authorized_keys
```




<!--- category: Shell --->
<!--- id: sshidrsagen --->
<!--- title: SSH : Générer des clef --->
<!--- keywords:  --->
## SSH : Générer des clef

Générer une paire de clef privée/publique:<br/>
Taper juste [entrée] à (empty for no passphrase) pour générer une clef privée sans mot de passe.
Si vous saisissez un mot de passe, votre clef sera chiffrée, et vous devrez taper le mot de passe à chaque utilisation.
```
$ ssh-keygen -t rsa -b 4096 -C yolo@yoloctf.org -f id_rsa
Generating public/private rsa key pair.
Enter passphrase (empty for no passphrase): 
Enter same passphrase again:
Your identification has been saved in id_rsa
Your public key has been saved in id_rsa.pub
The key fingerprint is:
SHA256:OSHYGRwrI7LM9/8haFfVXgBlXrdHcdfEZxIv9CeWg5Q yolo@yoloctf.org
The key's randomart image is:
+---[RSA 4096]----+
|     .o.   .+=o*O|
|     o.+   .Eo+=X|
|. . + = .  ..o*=*|
|oo . o . o. ...+o|
|.o .    S.   .   |
|  . . . ..       |
|     + o .       |
|    . o . .      |
|       ...       |
+----[SHA256]-----+
```

Le fichier de clef privée ne doit être lisible que par son propriétaire.<br/>
Si besoin faire : chmod 600 id_rsa.
```
vagrant@kali:/home/yolo/tmp$ ls -al
total 16
drwxrwxrwx  2 yolo      yolo   4096 Apr  4 13:24 .
drwxr-xr-x 27 yolo 		yolo   4096 Apr  4 13:22 ..
-rw-------  1 yolo      yolo   3381 Apr  4 13:24 id_rsa
-rw-r--r--  1 yolo      yolo    742 Apr  4 13:24 id_rsa.pub
```

Les entêtes de clef privées sont caractéristiques
```
$ cat id_rsa
-----BEGIN OPENSSH PRIVATE KEY-----
b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAACFwAAAAdzc2gtcn
NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
7KrJLvv/4Ve+Dm5bLwhJ9BkLessiIlGgx0ju+ghI7V+Ar+qAhir5chpVSGH4YIk0J8VDbJ
...
O9mUtgl8PKUd5AQL6sMM/FaYffu7+OFQkJzv3hxyiFEQPhsAo2K55cG8S0RWCX9Jp96U54
lOXLj6MfGkfzuvvFS4pm9iTBrwKq8h7CubmNOnHe3TH3U/Mrzf6wq8MwAEpSeTWfnBGdRP
tHOBQdCIQj3JAAAAEHlvbG9AeW9sb2N0Zi5vcmcBAg==
-----END OPENSSH PRIVATE KEY-----
```

Entête d'une clef privée protégée par mot de passe:
```
$ cat id_rsa
-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: AES-128-CBC,2AF25325A9B318F344B8391AFD767D6D

NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
```



La clef publique associée :
```
$ cat id_rsa.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQAxxxxx8/QoN3NBob3zs4l2mfZWkZNAtCHN2CpQ== yolo@yoloctf.org
```




<!--- category: Shell --->
<!--- id: sshidrsadechiffre --->
<!--- title: SSH :Enlever le mot de passe d'une clef chiffree --->
<!--- keywords:  --->
## SSH :Enlever le mot de passe d'une clef chiffree

Une fois le mot passe d'une clef privée trouvé avec John, il est possible de l'enlever pour se simplifier la vie.
```
openssl rsa -in [id_rsa_sec] -out [id_rsa]
```




<!--- category: Shell --->
<!--- id: sshidrsaauth --->
<!--- title: SSH : Authoriser l'authentification par clef privée --->
<!--- keywords:  --->
## SSH : Authoriser l'authentification par clef privée

Les clefs publiques permettant de se connecter en ssh sont listées, une clef par ligne, dans le fichier.
```
~/.ssh/authorized_keys
```


Une fois sur un compte utilisateur d'un serveur, injectez votre clef publique pour avoir un accès direct en ssh.
```
echo 'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org' >> /home/victim/.ssh/authorized_keys
```

Si le répertoire n'existe pas, il suffit de le créer:
```
mkdir /home/victim/.ssh
chmod 700 /home/victim/.ssh
echo 'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org' >> /home/victim/.ssh/authorized_keys
chmod 600 /home/victim/.ssh/authorized_keys
```

Laissez tomber votre webshell, et revenez en ssh:
```
ssh -i id_rsa_yolo victim@target.com
```


