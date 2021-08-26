

<!--- category: NetworkDiscovery --->
<!--- id: intro --->
<!--- title: Network Discovery --->
<!--- keywords:  --->
## Network Discovery




<!--- category: NetworkDiscovery --->
<!--- id: dicoverhost --->
<!--- title: Discover Hosts --->
<!--- keywords:  --->
## Discover Hosts

Use nmap to identify live hosts on 10.10.10.4/24 network
```
# nmap 10.10.10.4/24
# nmap 10.10.10.1-255
```




<!--- category: NetworkDiscovery --->
<!--- id: portscanner --->
<!--- title: Port scanner --->
<!--- keywords:  --->
## Port scanner

```
# nmap 10.10.10.4    
# nmap -A  10.10.10.4          : Scan Top 1000 ports et get services versions
# nmap -sV -sC -p- 10.10.10.4  : Scan all 65535 TCP ports
# nmap -sU 10.10.10.4          : Scan UDP ports
    -sV : Attempts to determine the version of the service running on port
    -sC : Scan with default NSE scripts. Considered useful for discovery and safe
    -A  : Enables OS detection, version detection, script scanning, and traceroute
    -p- : Port scan all ports
    -sU : UDP ports (very slow)
    -oN nmap.log : output file
 ```
 
The three scripts can be launch in parallel in three different xterms.



<!--- category: NetworkDiscovery --->
<!--- id: portidentification --->
<!--- title: Ports identification --->
<!--- keywords:  --->
## Ports identification

Despite they can run on any port, services such as ftp, web, or ldap generally use the ports reserved for them.
Port 80 for example is used by web servers for HTTP.
Port 443 is the port for HTTPS.
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

Ftp servers are used to transfer files.  
Once logged in with a login/password, it is possible to move through the directory tree to upload/download files.    
By default, the protocol is optimised for text files. Do not forget to activate the binary mode if necessary.   
A guest or anonymous account allows on certain servers to freely download public documents.   
The login is 'anonymous', the password is conventionally the guest's email.   
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

22 is the ssh port, which allows remote access to a terminal.   
It is possible to connect with a login/password.
```
$ ssh yolo@10.0.0.11
```


It is also possible to log in with a private key file.    
```
$ ssh -i id_rsa yolo@10.0.0.11
```

The private key file should only be read by its owner.     
```
$ chmod 600 id_rsa
```




<!--- category: NetworkDiscovery --->
<!--- id: 80HTTProbots --->
<!--- title: 80: HTTP - Robots.txt --->
<!--- keywords:  --->
## 80: HTTP - Robots.txt

The robots.txt file, when it exists, is stored at the root of a website. 
It contains a list of the resources of the site that are not supposed to be indexed by search engine spiders.<br/>
By convention, robots read robots.txt before indexing a website.<br/>
Its content may therefore be of interest to us.```
http://10.10.10.8/robots.txt
```

Plus d'info : <a href='https://en.wikipedia.org/wiki/Robots_exclusion_standard'>https://en.wikipedia.org/wiki/Robots_exclusion_standard</a>



<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPsrc --->
<!--- title: 80: HTTP - Page source --->
<!--- keywords:  --->
## 80: HTTP - Page source

Developers sometimes leave useful information or even passwords in code comments. These are often urls, or form fields used for testing.<br/><br/>
<div>Comments in the HTML or JS source code of the pagee</div>
```
/* Secret code */
&lt;!--- Secret code ---&gt;
```


<div>Hidden HTML elements</div>
```
&lt;p hidden&gt;Secret code.&lt;/p&gt;
&lt;label style=&apos;display: none&apos;&gt;Secret code.&lt;/label&gt;
```




<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPdirs --->
<!--- title: 80: HTTP - Directory and files bruteforce --->
<!--- keywords:  --->
## 80: HTTP - Directory and files bruteforce

Bruteforcing a website consists in testing the presence of accessible pages, such as /register, /register.php, /admin, /upload, /users/login.txt, /admin/password.sav, ...
For this there are lists of directories and filenames frequently found on web servers.<br/>
<br/>
Once web server langage/framework is known (php, java, cgi / wordpress, joomla, ...), it is possible to use optimized lists, and search only the appropriate extensions.: php, php4, php5, exe, jsp, ...<br/>
It is also possible to search for files with interesting extensions. : cfg, txt, sav, jar, zip, sh, ...

<br/>
Usual web brute force software :
<ul>
<li>dirb: Command line. To be used for a quick check, with its list 'common.txt'.</li>
<li>gobuster: Command line. To be used with the list 'directory-list-2.3-medium.txt' from dirbuster</li>
<li>dirbuster: GUI. With a Gui, but not the best choice.</li>
</ul>

It is crucial to choose the right list of directories/filenames:
<ul>
<li>/usr/share/wordlists/dirb/common.txt: Small well-constructed list</li>
<li>/usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt: Big list. Should covers all CTFs.</li>   
<li>https://github.com/danielmiessler/SecLists : Once comfortable with the two previous lists, it is possible to find more optimized lists at this address.
<li>On Kali and Parrot distributions, the /usr/share/wordlists directory contains links to many lists. Take the time to look at it in detail.</li>
</ul>
<br/>

<h5>Dirb</h5>
Dirb is usually preinstalled on Kali or Parrot. If not:
```
sudo apt-get install -y dirb
```

Run a quick scan with dirb, whith its default 'common.txt' list:
```
dirb http://10.10.10.11
```


Find files with .php file extension:
```
dirb http://10.10.10.11  -X .php
```

<br/>

<h5>Gobuster</h5>
```
https://github.com/OJ/gobuster
```

Download and install in /opt
```
wget https://github.com/OJ/gobuster/releases/download/v3.0.1/gobuster-linux-amd64.7z
sudo apt install p7zip-full
7z x gobuster-linux-amd64.7z
sudo cp gobuster-linux-amd64/gobuster /opt/gobuster
chmod a+x /opt/gobuster
```


Bruteforce http://10.10.10.11, with the list 'directory-list-2.3-medium.txt', and file extensions html,php,txt:
```
/opt/gobuster dir -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -u http://10.10.10.11  -l -x html,php,txt
```


For an HTTPS url, add the command line option 
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
<!--- title: 80: HTTP - HTML Form POST - Authentication brute force --->
<!--- keywords:  --->
## 80: HTTP - HTML Form POST - Authentication brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.11 http-post-form '/admin/login.php:username=^USER^&password=^PASS^:F=Wrong password:H=Cookie\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4' -V
```

Beware if the answer is a 302 Redirect, hydra will not follow and will generate a false positive.


<!--- category: NetworkDiscovery --->
<!--- id: 80HTTPbruteformget --->
<!--- title: 80: HTTP - Form HTTP GET - Brute force --->
<!--- keywords:  --->
## 80: HTTP - Form HTTP GET - Brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.4 http-get-form '/login.php:username=^USER^&password=^PASS^:F=Login failed:H=Cookie\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4' -V
```

Beware if the answer is a 302 Redirect, hydra will not follow and will generate a false positive.


<!--- category: NetworkDiscovery --->
<!--- id: wordpress --->
<!--- title: CMS: Wordpress --->
<!--- keywords:  --->
## CMS: Wordpress

<h5>Wordpress</h5>

URLs format:
```
Posts : /index.php?p=22
        /index.php/2017/04/12/hello-world/
        /index.php/jobs/apply/8/
Login : /wp-login/
        /wp-login.php
Uploaded files : /wp-content/uploads/%year%/%month%/%filename%
```


Config file and database credentials
```
/var/www/html/   
wordpress/wp-config.php
wordpress/htdocs/wp-config.php
```


<h5>Wpscan</h5>
Wpscan knows the structure of a wordpress site and will make brute force to identify the pages, the posts, the users, the theme, the plugins.<br/>
Wordpress flaws are mainly due to non-updated plugins. 
```
wpscan --url http://10.10.10.10/wordpress/ -e
--url : wordpress url
-e : enum pages, posts, users, theme, plugins, ...
```

Login bruteforce
```
wpscan --url http://10.10.10.10/wordpress/  -P rockyou.txt -U admin
```




<!--- category: NetworkDiscovery --->
<!--- id: 110POP3 --->
<!--- title: 110: POP3 --->
<!--- keywords:  --->
## 110: POP3

POP3 protocol is used to get your mails from a distant server.    
If you have the login/password, connect thanks to netcat or telnet
```
$ nc 10.0.12.10 110
```

Once connected, authenticate with login/password 
```
USER XXXXXX
PASS XXXXXX
```

Get the mails list
```
LIST
```

Read mail number 1
```
RETR 1
```

Quit the server.
```
QUIT
```




<!--- category: NetworkDiscovery --->
<!--- id: 110POP3BF --->
<!--- title: 110: POP3 Bruteforce --->
<!--- keywords:  --->
## 110: POP3 Bruteforce

Use hydra to bruteforce POP3 authent.
```
hydra -V -l username -P wordlist.txt 10.0.12.10 pop3
```




<!--- category: NetworkDiscovery --->
<!--- id: 3306MySQL --->
<!--- title: 3306: MySQL --->
<!--- keywords:  --->
## 3306: MySQL

You have found database credentials in config file. Let use mysql client to connect and dump the database.
```
mysql --host=HOST -u USER -p
--host xx : Server IP or name
-u xx     : login
-p        : manually enter the password.
```

List databases.<br/>
```
show databases; 
```

Ignore internal databases and choose the application database.<br/>
The database 'information_schema' contains internal information of mysql or mariadb. It can generally be ignored.<br/>
Select the aplication database, list tables, then dump interresting tables such as 'users'.
```
use DATABASE;
show tables;     
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
printf KnockKnockKnock | nc -u -q1 localhost 1337
```

Envoyer une série de paquets contenant le message KnockKnockKnock sur les port UDP 1337 4444 6666
```
for i in 1337 4444 6666; do printf Knock | nc -u -q1 localhost $i; done
```


