

<!--- category: HTTP --->
<!--- id: intro --->
<!--- title: HTTP --->
<!--- keywords:  --->
## HTTP

A web server is running on the target server.<br/>
<br/>
You enter an URL in your browser to specify the page you want to get.<br/>
Your web browser encodes the URL and sends it to the server using the HTTP protocol.<br/>
The server returns a displayable page described in HTML using the HTTP protocol.<br/>
<br/>
HTTP is a rich protocol, able to negotiate options and exchange data.<br/>
In particular, cookies are used to store information between two sessions.<br/>
HTTP request sand responses can be intercepted, modified and resent thanks to an HTTP proxy.
<br/>
https://fr.wikipedia.org/wiki/Hypertext_Transfer_Protocol



<!--- category: HTTP --->
<!--- id: HTTP0.9 --->
<!--- title: HTTP 0.9 --->
<!--- keywords:  --->
## HTTP 0.9

The HTTP protocol is used by web browsers to obtain documents hosted by servers.<br/>
The browser connects to a server via TCP, on port 80 by default.
The minimal request contains a command (here GET), a URL (/hello.txt), an empty line. 
```
GET /hello.txt
 
```

The answer contains the requested file.
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

HTTP protocol version 1.1 is optimized for complex HTML pages transferring, and allows negotiation of language and encoding formats.<br/>
The minimal request contains a command (GET), a url (/hello.txt), the version (HTTP/1.1), the Host field, an empty line.<br/>```
GET /hello.txt HTTP/1.1
Host: 10.10.10.11 80

```


The answer contains a header, composed of many fields (server, date,...), the length of the content (here 13), and the content as text.<br/>
```
HTTP/1.0 200 OK
Server: SimpleHTTP/0.6 Python/2.7.15+
Date: Thu, 26 Dec 2019 17:06:12 GMT
Content-type: text/html; charset=UTF-8
Content-Length: 13
 
Hello world

```


The headers of the answer contains lots of usefull information about the server, its version...<br/>
Here is an Apache server in version 0.8.4 that runs scripts with a php interpreter in version 7.3.13.
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

HTTP response codes
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
<!--- title: Curl and Wget --->
<!--- keywords:  --->
## Curl and Wget

Download a file :
```
$ wget http://localhost:8001/
```

Print the content of the file :
```
$ curl http://localhost:8001/
```

Print the HTTP headers and the content of the file  :
```
$ curl -v http://localhost:8001/
```




<!--- category: HTTP --->
<!--- id: HTTPHeader --->
<!--- title: HTTP Headers --->
<!--- keywords:  --->
## HTTP Headers

HTTP headers are standardized and contain usefull informations.<br/>
- Host: the target of the request.
- Referer: Address of the web page that generated the query.<br/>
- User-Agent: Browser used to log in. <br/>

Custom headers can be freely added. Here 'X-MyHeader: value':
```
GET / HTTP/1.1
Host: localhost:8001
User-Agent: curl/7.58.0
Accept: */*
X-MyHeader: value

```



Add a custom Header with curl : -H 'header: value'
```
$ curl -H 'X-MyHeader: yoloforpresident' http://localhost:8001
```




<!--- category: HTTP --->
<!--- id: HTTPParam --->
<!--- title: HTTP Get: parameters --->
<!--- keywords:  --->
## HTTP Get: parameters

An URI (Universal Resource Locator) specify an internet resource, followed by optional parameters.<br/>
The first parameter is identified by a ?, the following ones by a &.<br/>.
If the parameters contain a ? or a &, they are encoded as %3F and %26. This is called Percent (%) encoding.<br/>.https://fr.wikipedia.org/wiki/Percent-encoding<br/>

Exemple:
```
$ curl 'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true'
```

As unix shell uses the & to launch background tasks, it is imperative to put the URL between quotes '.



<!--- category: HTTP --->
<!--- id: HTTPFormAuthSimple --->
<!--- title: HTTP Authentification Basic --->
<!--- keywords:  --->
## HTTP Authentification Basic

HTTP has basic authentication feature, based on a field containing a username and a password in clear text.<br/>
login:password is base64 encoded then added in the request header.<br/>
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


Basic auth with curl: 
```
$ curl -u login:password http://localhost:8001/hello.txt
```


Base64 encode login:password in shell
```
$ printf 'login:password' | base64
bG9naW46cGFzc3dvcmQ=
```

Base64 decode
```
$ printf 'bG9naW46cGFzc3dvcmQ=' | base64 -d
login:password
```


Bruteforce Basic auth with curl and rockyou password list:
```
for i in `cat rockyou.txt`; do printf \n$i:; curl  -u admin:$i http://12.10.1.11/training-http-auth-simple.php; done
```




<!--- category: HTTP --->
<!--- id: HTTPFormPost --->
<!--- title: FORM: POST method --->
<!--- keywords:  --->
## FORM: POST method

Web pages send Form fields either using GET method in the URL parameters, or POST method in the request body.<br/>
<br/>
Parameter of GET requests are saved in logs files, and have limited length.<br/>
Parameter of POST requests do not appear in the logs, and are not limited in length. It is thus possible to upload large files.<br/>
These parameters are encoded with 'Percent encoding'.<br/>
Example:
```
POST /login.php HTTP/1.1
Host: 10.10.1.11
Content-Type: application/x-wwww-form-urlencoded
Content-Length: 24

login=James&password=007
```

Post a form with curl:
```
$ curl -X POST -F 'username=admin' -F 'password=megapassword'  http://localhost:8001/
```




<!--- category: HTTP --->
<!--- id: HTTPFormPostHTML --->
<!--- title: FORM: Identify Form fields in HTML pages --->
<!--- keywords:  --->
## FORM: Identify Form fields in HTML pages

Forms are HTML base objects, enclosed by &lt;form> and &lt;/form> tags.<br/>
&lt;input name='xxx'>: Text input fields<br/> 
&lt;form action='xxx': URL to send the Form to. If empty send to the current URL.<br/>
Exemple:
```
&lt;form action=&quot;/action_page.php&quot;&gt; 
  First name: &lt;input type=&quot;text&quot; name=&quot;firstname&quot; value=&quot;Mickey&quot;&gt
  Last name:  &lt;input type=&quot;text&quot; name=&quot;lastname&quot; value=&quot;Mouse&quot;&gt;
  &lt;input type=&quot;submit&quot; value=&quot;Submit&quot;&gt; 
&lt;/form&gt; 
```


Post a Form thanks curl:
```
$ curl -X POST -F 'firstname=Mickey' -F 'lastname=Mouse'  http://12.10.1.11/action_page.php
```




<!--- category: HTTP --->
<!--- id: HTTPFormGet --->
<!--- title: FORM: Get method --->
<!--- keywords:  --->
## FORM: Get method

HTML Forms most often use the POST method, sometime also the GET method is used.<br/>
Paramètres are sent as request URI arguments.<br/>
When using curl in shell, dont forget to use quotes '<br/>
Exemple:
```
$ curl 'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true'
```




<!--- category: HTTP --->
<!--- id: HTTPFormPostJSon --->
<!--- title: FORM: JSON format --->
<!--- keywords:  --->
## FORM: JSON format

It's common to procces form fields values in JavaScript before sending them to the server.<br/>
JavaScript natively makes use of JSon format to exchange structured datas.<br/>
Exemple: {key1:value1, key2:value2}.<br/>
The Content-Type header is then set to json: Content-Type: application/json<br/>

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


Curl:
```
$ curl --header &quot;Content-Type: application/json&quot; -X POST --data  '{&quot;key1&quot;:&quot;value1&quot;, &quot;key2&quot;:&quot;value2&quot;}' http://10.10.1.11/
```




<!--- category: HTTP --->
<!--- id: HTTPFormPostFile --->
<!--- title: FILE: Upload --->
<!--- keywords:  --->
## FILE: Upload

Forms are often used to register, login, and upload files.<br/>
Lots of sanity checks can be done in JavaScript in the browser before the upload or on the server after the upload.<br/>
Filename and file extension, are often checked, sometime even the file header is chekced to verify wether it's an image or a php file.<br/>
A full chapter is dedicated to file upload and filter bypass.<br/>
<br/>
A File field can be identified by the following HTML code 
```
&lt;input type=file name=fileToUpload>:
```

Curl command
```
curl -X POST -F 'fileToUpload=@./picture.jpg' http://10.10.1.11/upload
```




<!--- category: HTTP --->
<!--- id: HTTPFormCookies --->
<!--- title: Curl: Store and modify cookies --->
<!--- keywords:  --->
## Curl: Store and modify cookies

Cookies are used to store data on the browser, that will be reused at the next session.<br/>
They can contain everything: choices of language, colors, and sometimes password...<br/>
<br/>
Read cookies in the server response and store them in a cookie jar.
```
$ curl  -c cookies.txt http://10.10.1.11/cookies.php
```


Send a stored cookie, and update its value with the response
```
$ curl -b cookies.txt -c cookies.txt http://10.10.1.11/cookies.php
```


Send a manually crafted cookie
```
$ curl -b 'code=1447' http://10.10.1.11/cookies.php
```


