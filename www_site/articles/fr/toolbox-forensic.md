

<!--- category: Forensic --->
<!--- id: intro --->
<!--- title: Forensic --->
<!--- keywords:  --->
## Forensic




<!--- category: Forensic --->
<!--- id: zip --->
<!--- title: Zip chiffré --->
<!--- keywords:  --->
## Zip chiffré

Cracker un zip chiffré avec une liste de mots de passe   
````
fcrackzip -u -v -D -p rockyou.txt secret.zip
````



<!--- category: Forensic --->
<!--- id: mdb --->
<!--- title: Mdb - Microsoft Access Database --->
<!--- keywords:  --->
## Mdb - Microsoft Access Database

Vérification du format du fichier:
````
$ file backup.mdb
backup.mdb: Microsoft Access Database
````
Si besoin, installer les outils:
````
apt-get install mdbtools
````
Lister les tables, et les dumper.
````
mdb-tables backup.mdb 
mdb-export backup.mdp  users passwd
````



<!--- category: Forensic --->
<!--- id: pst --->
<!--- title: Pst - Outlook email file --->
<!--- keywords:  --->
## Pst - Outlook email file

Vérification du format du fichier:
````
$ file mails.pst
mails.pst: Microsoft Outlook email folder
````
Si besoin, installer les outils:
````
apt-get install pst-utils
````
Extraire les boites mails, et les lire.
````
readpst mails.pst 
cat mails.mbox
````

