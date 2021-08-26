

<!--- category: Forensic --->
<!--- id: intro --->
<!--- title: Forensic --->
<!--- keywords:  --->
## Forensic




<!--- category: Forensic --->
<!--- id: zip --->
<!--- title: Encrypted Zip --->
<!--- keywords:  --->
## Encrypted Zip

Brute force an encrypted zip with a list of passwords
````
fcrackzip -u -v -D -p rockyou.txt secret.zip
````



<!--- category: Forensic --->
<!--- id: mdb --->
<!--- title: Mdb - Microsoft Access Database --->
<!--- keywords:  --->
## Mdb - Microsoft Access Database

Check file format:
````
$ file backup.mdb
backup.mdb: Microsoft Access Database
````
If needed,install tools:
````
apt-get install mdbtools
````
List tables, then dump.
````
mdb-tables backup.mdb 
mdb-export backup.mdp  users passwd
````



<!--- category: Forensic --->
<!--- id: pst --->
<!--- title: Pst - Outlook email file --->
<!--- keywords:  --->
## Pst - Outlook email file

Check file format:
````
$ file mails.pst
mails.pst: Microsoft Outlook email folder
````
If needed,install tools:
````
apt-get install pst-utils
````
Extract mailboxes, then read them.
````
readpst mails.pst 
cat mails.mbox
````

