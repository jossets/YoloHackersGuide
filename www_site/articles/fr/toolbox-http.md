

<!--- category: HTTP --->
<!--- id: intro --->
<!--- title: HTTP --->
<!--- keywords:  --->
## HTTP

Un serveur web tourne sur le serveur cible.<br/>
<br/>
Vous écrivez une URL dans votre navigateur pour spécifier la page que vous voulez obtenir.<br/>
Votre navigateur web encode l'URL et l'envoie au serveur en utilisant le protocole HTTP.<br/>
Le serveur renvoye une page affichable décrite en HTML grace au protocole HTTP.<br/>
<br/>
HTTP est un protocole riche qui permet de négocier des options et échanger des données.<br/>
Notamment des cookies sont utilisés pour garder des informations entre deux sessions.<br/>
Pour les lires et les modifiers, nous utilisons un proxy HTTP.<br/>
<br/>
https://fr.wikipedia.org/wiki/Hypertext_Transfer_Protocol



<!--- category: HTTP --->
<!--- id: HTTP0.9 --->
<!--- title: HTTP 0.9 --->
<!--- keywords:  --->
## HTTP 0.9

Le protocole HTTP est utilisé par les navigateurs web pour obtenir des documents hébergés par les serveurs.<br/>
Le navigateur se connecte en TCP à un serveur, sur le port 80 par défaut.<br/>
La requête minimale contient une commande (ici GET), une URL (/hello.txt), une ligne vide. 
```
GET /hello.txt
 
```

La réponse contient directement le fichier.
```
Hello world
```


```
$ printf 'GET /hello.txt \n\r\n' | nc localhost 8001
```




<!--- category: HTTP --->
<!--- id: HTTP1.1 --->
<!--- title: HTTP 1.1 --->
<!--- keywords:  --->
## HTTP 1.1

La version 1.1 du protocole HTTP est optimisée pour transférer des pages HTML complexes, et permet de négocier la langue et les formats d'encodages.<br/>
La requête minimale contient une commande (GET), une url (/hello.txt), la version (HTTP/1.1), le champ Host, une ligne vide.<br/>
```
GET /hello.txt HTTP/1.1
Host: 10.10.10.11 80

```


La réponse contient une entête composée de nombreux champs (server, date,...), la longueur du contenu (13), et le contenu sous forme de texte.<br/>
```
HTTP/1.0 200 OK
Server: SimpleHTTP/0.6 Python/2.7.15+
Date: Thu, 26 Dec 2019 17:06:12 GMT
Content-type: text/html; charset=UTF-8
Content-Length: 13
 
Hello world

```


Les headers de la réponse sont des mines d'information sur le serveur, sa version...<br/>
Ici un serveur Apache en version 0.8.4 qui éxécute des scripts avec un interpréteur php en version 7.3.13.
```
HTTP/1.1 200 OK
Server: Apache/0.8.4
Content-Type: text/html; charset=UTF-8
Transfer-Encoding: chunked
Connection: keep-alive
X-Powered-By: PHP/7.3.13
```


```
$ printf 'GET / HTTP/1.1\r\nHost: localhost 8001\r\n\r\n' | nc localhost 8001
```




<!--- category: HTTP --->
<!--- id: HTTPCodes --->
<!--- title: HTTP Codes --->
<!--- keywords:  --->
## HTTP Codes

Code de réponse HTTP
```
    1xx informational response – the request was received, continuing process
    2xx successful – the request was successfully received, understood, and accepted
		200 OK
    3xx redirection – further action needs to be taken in order to complete the request
		301 Moved Permanently => Redirection
		304 Not Modified
    4xx client error – the request contains bad syntax or cannot be fulfilled
		400 Bad request
		401 Unauthorized
		403 Forbidden
		404 Not found
    5xx server error – the server failed to fulfil an apparently valid request
		500 Internal Server Error
		502 Bad Gateway - The server was acting as a gateway or proxy and received an invalid response from the upstream server
		503 Service Unavailable - The server cannot handle the request (because it is overloaded or down for maintenance)
		504 Gateway Timeout - The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.
	https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
```




<!--- category: HTTP --->
<!--- id: HTTPCurlWget --->
<!--- title: Curl et Wget --->
<!--- keywords:  --->
## Curl et Wget

Télécharger un fichier :
```
$ wget http://localhost:8001/
```

Afficher le contenu de la réponse :
```
$ curl http://localhost:8001/
```

Afficher les headers, la requête et le contenu de la réponse :
```
$ curl -v http://localhost:8001/
```




<!--- category: HTTP --->
<!--- id: HTTPHeader --->
<!--- title: HTTP: Entêtes --->
<!--- keywords:  --->
## HTTP: Entêtes

Les headers HTTP sont standardisés et sont riches en information.<br/>
- Host: Précise le site web destinataire de la requète.<br/>
- Referer: Adresse de la page web qui a généré la requète.<br/>
- User-Agent: Navigateur utilisé pour se connecter.

Il est possible d'ajouter des headers personnels, tel 'X-MyHeader: value'
```
GET / HTTP/1.1
Host: localhost:8001
User-Agent: curl/7.58.0
Accept: */*
X-MyHeader: value

```



Pour ajouter un header avec curl : -H 'header: valeur'
```
$ curl -H 'X-MyHeader: value' http://localhost:8001
```




<!--- category: HTTP --->
<!--- id: HTTPParam --->
<!--- title: HTTP Get: les paramètres --->
<!--- keywords:  --->
## HTTP Get: les paramètres

L'URI permet de précider une ressource, et d'ajouter des paramètres.<br/>
Le premier paramètre est identifié par un ?, les suivants par un &.<br/>
Si les paramètres contiennent des ? ou des &, ils sont encodés sous la forme %3F et %26. On parle de Percent (%) encoding.<br/>
https://fr.wikipedia.org/wiki/Percent-encoding<br/>

Exemple:
```
$ curl 'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true'
```

Le shell unix utilisant le & pour lancer des taches en arrière plan, il est impératif de mettre l'URL entre '.



<!--- category: HTTP --->
<!--- id: HTTPFormAuthSimple --->
<!--- title: HTTP Authentification Basic --->
<!--- keywords:  --->
## HTTP Authentification Basic

HTTP dispose d'une fonctionnalité d'authentification basique. Il est possible ajouter un champ contenant un identifiant et un mot de passe en clair.<br/>
Ces informations sont mise sous la forme login:password, puis encodées en base64, et ajoutées dans l'entête de la requête:<br/>
Authorization: Basic bG9naW46cGFzc3dvcmQ=<br/>
<br/>
Exemple:
```
GET /hello.txt HTTP/1.1
Host: localhost:8001
Authorization: Basic bG9naW46cGFzc3dvcmQ=
User-Agent: curl/7.58.0
Accept: */*

```


Pour envoyer une requête avec des informations d'authentification avec curl: 
```
$ curl -u login:password http://localhost:8001/hello.txt
```


Pour encoder un login:password dans le terminal
```
$ printf 'login:password' | base64
bG9naW46cGFzc3dvcmQ=
```

Pour décoder du base64 dans le terminal
```
$ printf 'bG9naW46cGFzc3dvcmQ=' | base64 -d
login:password
```


Pour tester une liste de mots de passe:
```
for i in `cat rockyou.txt`; do printf \n$i:; curl  -u admin:$i http://12.10.1.11/training-http-auth-simple.php; done
```




<!--- category: HTTP --->
<!--- id: HTTPFormPost --->
<!--- title: FORM: méthode Post --->
<!--- keywords:  --->
## FORM: méthode Post

Quand une page web comporte un formulaire, elle peut envoyer le contenu des champs avec la méthode GET dans les paramètres de l'URL, ou avec la méthode POST dans le corps de la requète.<br/>
<br/>
Les valeurs en paramètres du GET apparaissent dans les logs, et sont limités en longueur.<br/>
Les valeurs en paramètres du POST n'apparaissent pas dans les logs, et ne sont pas limités en longueur. Il est ainsi possible d'uploader de gros fichiers.<br/>
Ces paramètres sont encodés avec le format 'Percent encoding'.<br/>
Exemple:
```
POST /login.php HTTP/1.1
Host: 10.10.1.11
Content-Type: application/x-www-form-urlencoded
Content-Length: 24

login=James&password=007
```


Poster un formulaire avec curl:
```
$ curl -X POST -F 'username=admin' -F 'password=megapassword'  http://localhost:8001/
```




<!--- category: HTTP --->
<!--- id: HTTPFormPostHTML --->
<!--- title: FORM: Trouver les champs du formulaire dans le code HTML --->
<!--- keywords:  --->
## FORM: Trouver les champs du formulaire dans le code HTML

Les formulaires sont des objets HTML de base, définis par les balises &lt;form> et &lt;/form><br/>
&lt;input name='xxx'>: Nom des champs de type texte. <br/> 
&lt;form action='xxx': URL a laquelle sera envoyé le formulaire. Si le champ est vide, le formulaire est envoyé à la URL.<br/>
Exemple:
```
&lt;form action=&quot;/action_page.php&quot;&gt; 
  First name: &lt;input type=&quot;text&quot; name=&quot;firstname&quot; value=&quot;Mickey&quot;&gt
  Last name:  &lt;input type=&quot;text&quot; name=&quot;lastname&quot; value=&quot;Mouse&quot;&gt;
  &lt;input type=&quot;submit&quot; value=&quot;Submit&quot;&gt; 
&lt;/form&gt; 
```


Poster un formulaire avec curl:
```
$ curl -X POST -F 'firstname=Mickey' -F 'lastname=Mouse'  http://12.10.1.11/action_page.php
```




<!--- category: HTTP --->
<!--- id: HTTPFormGet --->
<!--- title: FORM: méthode Get --->
<!--- keywords:  --->
## FORM: méthode Get

Les pages web comportant des formulaires utilisent généralement la commande POST, mais elles peuvent aussi utiliser une commande GET.<br/>
Dans ce cas, la valeur des paramètres sont directement passés comme argument dans la requète.<br/>
Ne pas oublier de mettre l'url entre 'cotes'<br/>
Exemple:
```
$ curl 'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true'
```




<!--- category: HTTP --->
<!--- id: HTTPFormPostJSon --->
<!--- title: FORM: données au format JSON --->
<!--- keywords:  --->
## FORM: données au format JSON

Dans les formulaires élaborés, les données sont validées en Java Script avant d'être envoyées, au bon format au serveur.<br/>
JavaScript utilise nativement le format JSON pour envoyer des structures de données structurées.<br/>
Exemple: {key1:value1, key2:value2}.<br/>
Dans ce cas, l'entête Content-Type précise le type de données: Content-Type: application/json<br/>

Exemple:
```
POST / HTTP/1.1
Host: localhost:8001
User-Agent: curl/7.58.0
Accept: */*
Content-Type: application/json
Content-Length: 34

{&quot;key1&quot;:&quot;value1&quot;, &quot;key2&quot;:&quot;value2&quot;}
```


Curl :
```
$ curl --header &quot;Content-Type: application/json&quot; -X POST --data  '{&quot;key1&quot;:&quot;value1&quot;, &quot;key2&quot;:&quot;value2&quot;}' http://10.10.1.11/
```




<!--- category: HTTP --->
<!--- id: HTTPFormPostFile --->
<!--- title: FILE: Upload --->
<!--- keywords:  --->
## FILE: Upload

Les formulaires sont généralement utilisés pour s'enregister, se connecter ou d'uploader des fichiers.<br/>
Des contrôles sur les fichiers uploadés peuvent être fait en javascript sur le client, ou sur le serveur.<br/>
On vérifie souvent la taille, le nom, l'extension du fichier, et parfois son header.<br/>
Un chapitre entier du guide est dédié à l'upload de nos shells.<br/>
<br/>
Un champ de type Fichier est caractérisé par le code HTML 
```
&lt;input type=file name=fileToUpload>:
```

Commande curl
```
curl -X POST -F 'fileToUpload=@./picture.jpg' http://10.10.1.11/upload
```




<!--- category: HTTP --->
<!--- id: HTTPFormCookies --->
<!--- title: Curl: Sauver et modifier des cookies --->
<!--- keywords:  --->
## Curl: Sauver et modifier des cookies

Les cookies servent à stocker des valeurs sur le navigateur qui seront reutilisées entre deux sessions.<br/>
Ils peuvent contenir des choix de langue, couleurs, et parfois d'authentification...<br/>
<br/>
Lire les cookies envoyés par le serveur et les stocker dans un cookie jar.
```
$ curl  -c cookies.txt http://10.10.1.11/cookies.php
```


Envoyer un cookie sauvegardé, et sauver la nouvelle valeur
```
$ curl -b cookies.txt -c cookies.txt http://10.10.1.11/cookies.php
```


Envoyer un cookie manuellement
```
$ curl -b 'code=1447' http://10.10.1.11/cookies.php
```


