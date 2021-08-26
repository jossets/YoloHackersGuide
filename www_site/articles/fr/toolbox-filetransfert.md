

<!--- category: transfert --->
<!--- id: intro --->
<!--- title: Transferts de fichiers --->
<!--- keywords:  --->
## Transferts de fichiers




<!--- category: transfert --->
<!--- id: principe --->
<!--- title: Principe --->
<!--- keywords:  --->
## Principe

Dès l'instant ou vous arrivez à éxécuter des commandes sur votre cible, vous avez besoin de transférer des fichiers textes ou binaires. <br/>
Vous allez certainement downloader des fichiers pour les analyser, ou uploader des outils tel des backdoors ou des scripts d'élévation de privilèges.



<!--- category: transfert --->
<!--- id: base64 --->
<!--- title: Copier/Coller en Base64 --->
<!--- keywords:  --->
## Copier/Coller en Base64

Un encodage en base64 permet de faire des copier/coller de fichiers sans se soucier du binaire ou des retours à la ligne
```
cat file | base64
printf 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' | base64 -d > file
```

Préparez la dernière commande dans votre terminal, elle peut être assez longue, puis copiez/collez là dans votre cible.



<!--- category: transfert --->
<!--- id: http --->
<!--- title: Transfert de fichier en lançant un serveur HTTP Server --->
<!--- keywords:  --->
## Transfert de fichier en lançant un serveur HTTP Server

Pour transférer un fichier sans se soucier de sa taille, lancer un serveur HTTP et faire un wget, curl
```
python -m SimpleHTTPServer 8000
php -S 0.0.0.0:8000 
```

Attention, ce nouveau serveur permet à tout le monde de lire l'intégralité de son système de fichier.



<!--- category: transfert --->
<!--- id: http --->
<!--- title: Transfert avec un accès ssh --->
<!--- keywords:  --->
## Transfert avec un accès ssh

Si vous avez un accès ssh
```
scp file.txt remote_username@10.10.0.2:/remote/directory
scp -i id_rsa file.txt remote_username@10.10.0.2:/remote/directory
scp -P 2222 file.txt remote_username@10.10.0.2:/remote/directory
scp remote_username@10.10.0.2:/remote/file.txt /local/directory
```


