

<!--- category: Password --->
<!--- id: intro --->
<!--- title: Passwords --->
<!--- keywords:  --->
## Passwords

Outils et listes de mots de passe.



<!--- category: Password --->
<!--- id: password --->
<!--- title: Deviner un mot de passe --->
<!--- keywords:  --->
## Deviner un mot de passe

Quand il faut choisir un mot de passe, ça tombe toujours au plus mauvais moment.<br/>
Et comme, en plus, il faut s'en souvenir... les mots de passe sont souvent basés sur des notions simples: prénom, marque, souvenir...<br/>
<br/>
Heureusement, les responsables de la sécurité imposent des politiques de gestion des mots de passe, conçues pour éviter ces dérives... <br/>
Enfin, il faut le dire vite ;)<br/>
Dans 90% des cas, la majuscule est en début de mot de passe, les chiffres et le caractère spécial à la fin...<br/>
Evitez d'utiliser Vacances12! comme mot de passe...



<!--- category: Password --->
<!--- id: rockyou --->
<!--- title: Liste de mots de passe : Rockyou.txt --->
<!--- keywords:  --->
## Liste de mots de passe : Rockyou.txt

RockYou, une société basée en Californie, permettait de s'authentifier sur des application facebook sans avoir à saisir de mots de passe. En décembre 2009, elle s'est fait hacker. <br/>
<br/>
La base de données contenant les noms et mots de passe en clair de ses 32 millions de clients a été volée puis rendue publique.<br/>
Une analyse des mots de passe à montré que les deux tiers des mots de passe faisaient moins de 6 caractères, et que le mot de passe le plus utilisé était 123456.<br/>
<br/>
Cette liste des mots de passes, triés par fréquence est fréquement utilisée dans les CTF.<br/>
Sur Kali, le fichier, zippé, est rangé en : /usr/share/wordlists/rockyou.zip<br/>
Dans le terminal, pour prendre de bonnes habitudes, le fichier est rangé en : /usr/share/wordlists/rockyou.txt<br/>
<br/>
<a href='rockyou.txt'>fichier de mots de passe Rockyou: rockyou.txt</a>



<!--- category: Password --->
<!--- id: fuite --->
<!--- title: Firefox Monitor --->
<!--- keywords:  --->
## Firefox Monitor

Pour savoir si ton adresse email est présente dans une fuite de donnée, tu peux utiliser le service de Firefox Monitor.<br/>
https://monitor.firefox.com/



<!--- category: Password --->
<!--- id: hash --->
<!--- title: Hash --->
<!--- keywords:  --->
## Hash

Un professionnel ne garde jamais un mot de passe en clair. <br/>
Il enregistre un Hash.<br/>
<br/>
Un Hash est généré par une fonction mathématique à partir du mot de passe de l'utilisateur. <br/>
Quand l'utilisateur saisit son mot de passe, le logiciel calcule le Hash et le transmet au serveur qui le compare avec le Hash qu'il a stocké.
Si les deux Hash coincident, alors l'utilisateur connait le mot de passe, et est authentifié.<br/>
Si un curieux sniffe les messages, il ne verra pas le mot de passe, juste le Hash.<br/>
Connaissant le Hash, il est compliqué de retrouver le mot de passe.<br/>
<br/>
Pour calculer un Hash du mot de passe '123456' avec la fonction MD5, utilise la commande suivante dans le terminal :<br/>
$ printf '123456' | md5sum<br/>
123456 donnera toujours le même Hash MD5.<br/>
<br/>
La fonction MD5 a été très utilisée par le passé, mais la puissance des processeurs actuels impose l'utilisation de fonctions plus complexes à craquer comme SHA1, SHA256 ou SHA512.<br/>
La taille du Hash augmente avec la complexité de l'algorithme.<br/>
<br/>
printf '123456' | sha1sum<br/>
7c4a8d09ca3762af61e59520943dc26494f8941b<br/>
<br/>
printf '123456' | sha256sum<br/>
8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92 <br/>
<br/>
Note: on utilise 'printf' et pas 'echo' pour un calcul de Hash. Echo ajoute un saut de ligne qui est pris en compte par le Hash.



<!--- category: Password --->
<!--- id: hash --->
<!--- title: Salt --->
<!--- keywords:  --->
## Salt

Les Hash plus longs sont plus compliqués à casser, mais il est toujours possible de pré-calculer les valeurs de listes comme RockYou.<br/>
<br/>
Pour éviter le précalcul des Hash, nous utilisons des Salts.<br/>
Ce sont des valeurs supplémentaires que l'on ajoute au début du mot de passe avant de calculer le Hash.<br/>
La vérification du Hash reste rapide, mais les tables pré-calculées deviennent inutiles, il faut les recalculer pour chaque Salt.<br/>
<br/>
Calculer le hash de 123456 avec le Salt ABCDE et la fonction de Hash MD5 en python:
```
$ python3 -c &quot;import crypt; print(crypt.crypt('123456', '$1$ABCDE$'))&quot;
```


Avec openssl: -1: MD5 password, -5:SHA256 and -6:SHA512
```
$ openssl passwd -1 -salt ABCDE  123456
```


Le résultat est : $1$ABCDE$Kn5RIMYO1QXy7GtJysNSC1<br/>
Il est composé de 3 champs : <br/>
$1 : la fonction utilisée est MD5 ($5 SHA256, $6 SHA512)<br/>
$ABCDE : le Salt<br/>
$Kn5RIMYO1QXy7GtJysNSC1 : le Hash calculé en ajoutant le Salt<br/>



<!--- category: Password --->
<!--- id: hashonline --->
<!--- title: Online Hash crack --->
<!--- keywords:  --->
## Online Hash crack

Use online services to crack hash:<br/>
- Crackstation : https://crackstation.net/

Try: e10adc3949ba59abbe56e057f20f883e



<!--- category: Password --->
<!--- id: etcpasswd --->
<!--- title: /etc/passwd --->
<!--- keywords:  --->
## /etc/passwd

Le fichier /etc/passwd est un fichier texte dont chaque ligne décrit un compte d'utilisateur.<br/>
Chaque ligne se compose de sept champs séparés par un deux-points. <br/>
Voici un exemple d'un enregistrement :<br/>
```
jsmith:x:1001:1000:Joe Smith,Room 1007,(234)555-8910,(234)5550044,email:/home/jsmith:/bin/sh
```

Les champs, de gauche à droite, sont :<br/>
<br/>
<ul>
	<li>jsmith : le nom de l'utilisateur (login name). </li>
	<li>x : un x signifie que le hash du mots de passe est stocké, dans le fichier /etc/shadow qui n'est lisible que par le compte 'root'. Un * empêche les connexions d'un compte tout en conservant son nom d'utilisateur. Dans les premières version d'unix, ce champ contenait le hachage cryptographique du mot de passe de l'utilisateur.</li>
	<li>1001 : l'identifiant d'utilisateur.</li>
	<li>1000 : l'identifiant de groupe. Un nombre qui identifie le groupe principal de l'utilisateur. </li>
	<li>Joe Smith,Room 1007,(234)555-8910,(234)5550044,email : le champ Gecos. Un commentaire qui décrit la personne ou le compte. Généralement, il s'agit d'un ensemble de valeurs séparées par des virgules, fournissant le nom complet de l'utilisateur et ses coordonnées.</li>
	<li>/home/jsmith : le chemin vers le répertoire personnel de l'utilisateur.</li>
	<li>/bin/sh : le programme qui est lancé chaque fois que l'utilisateur se connecte au système. Peut être nologin.</li>
</ul>
Les premières lignes du fichier sont généralement des comptes systèmes.<br/>
Les comptes utilisateurs sont souvent décrits dans les dernière lignes.<br/>
Ce fichier permet d'identifier rapidement les utlisateurs, les applications (tomcat, mysql, www_data,...), leurs répertoires de travail, et s'ils ont ou non accès à un shell.<br/>
<a href='https://fr.wikipedia.org/wiki/Passwd'>Article sur Wikipedia: https://fr.wikipedia.org/wiki/Passwd</a>



<!--- category: Password --->
<!--- id: john --->
<!--- title: Hash crack: John the ripper --->
<!--- keywords:  --->
## Hash crack: John the ripper

John The ripper permet de vérifier si un hash correspond à un mot de passe présent dans une liste.<br/>
<br/>
Enregistrer un ou plusieurs Hash dans le fichier hash.txt 
```
$ echo 'root:$1$1337$WmteYFHyEYyx2MDVXln7Y1' >hash.txt
$ echo 'wordpressuser1:$P$BqV.SQ6OtKhVV7k7h1wqESkMh41buR0' >>hash.txt```

 
Utiliser John the ripper pour casser le mot de passe en se servant sa liste de mots de passe interne: 
```
$ john hash.txt```

 
Utiliser John the ripper pour casser le mot de passe en se servant de la liste Rockyou:  
```
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt```

 
John n'affiche plus les mots de passe qu'il a déjà cassé.<br/>
Pour afficher ces mots de passe:  
```
$ john hash.txt --show ```

 
Il existe plusieurs version de John sur Internet.
Les distributions Kali et Parrot, installent la version John Community Enhanced -jumbo.
Cette distribution est disponible en https://github.com/openwall/john
```
$ sudo snap install john-the-ripper
$ john
John the Ripper 1.9.0-jumbo-1 OMP [linux-gnu 64-bit 64 AVX2 AC]```




<!--- category: Password --->
<!--- id: johnshadow --->
<!--- title: John - /etc/passwd /etc/shadow --->
<!--- keywords:  --->
## John - /etc/passwd /etc/shadow

Bruteforcer /etc/shadows avec John:<br/>
```
$ unshadow /etc/passwd /etc/shadow > hash.txt  
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt 
$ john hash.txt --show 
```




<!--- category: Password --->
<!--- id: johnmysql --->
<!--- title: John - MySQL Hash --->
<!--- keywords:  --->
## John - MySQL Hash

Bruteforcer un hash My SQL avec John:<br/>
```
mysql -u dbuser -p drupaldb 
 show databases; 
 show tables; 
 select name, pass from users; 
 exit 
 -------+---------------------------------------------------------+ 
 | name  | pass                                                    | 
 +-------+---------------------------------------------------------+ 
 |       |                                                         | 
 | admin | $S$DvQI6Y6xxxxxxxxxxxxxxxxxxxxxxxxxEDTCP9nS5.i38jnEKuDR | 
 | Fxxxx | $S$DWGrxefxxxxxxxxxxxxxxxxxxxxxxxxxxxx3QBwC0EkvBQ/9TCGg | 
 | ..... | $S$Drpxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/x/4ukZ.RXi | 
 +-------+---------------------------------------------------------+ 

echo '$S$DWGrxefxxxxxxxxxxxxxxxxxxxxxxxxxxxx3QBwC0EkvBQ/9TCGg'>hash.txt 
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt 
$ john hash.txt --show 
```




<!--- category: Password --->
<!--- id: johnsshrsa --->
<!--- title: John - Password protected SSH RSA Key --->
<!--- keywords:  --->
## John - Password protected SSH RSA Key

Bruteforce a pasword protected id_rsa id (id used for ssh connections):<br/>
<br/>
RSA header:
```
-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: AES-128-CBC,2AF25325A9B318F344B8391AFD767D6D

NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
```

Let check if the password is in the Rockyou list.
```

$ python  /usr/share/john/ssh2john.py id_rsa > id_rsa.hash
$ john --wordlist=/usr/share/wordlists/rockyou.txt id_rsa.hash
$ john hash.txt --show 
```


