

<!--- category: Encode --->
<!--- id: intro --->
<!--- title: Encode --->
<!--- keywords:  --->
## Encode




<!--- category: Encode --->
<!--- id: EncodeHex --->
<!--- title: Hexadecimal encode/decode --->
<!--- keywords:  --->
## Hexadecimal encode/decode


<div class=''>
	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Texte à encoder</label><br/>
	  <textarea id='hexEncodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onHexEncode()' onChange='onHexEncode()'></textarea>
	  <textarea readonly id='hexEncodeOut' rows = '5' class='col-5' name = 'description' ></textarea>
	</div>
	<script>
    function convertFromHex(hex) {
    var hex = hex.toString();//force conversion
    var str = '';
    for (var i = 0; i < hex.length; i += 2)
        str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
    return str;
    }
    function convertToHex(str) {
        var hex = '';
        for(var i=0;i<str.length;i++) {
            hex += ''+str.charCodeAt(i).toString(16);
        }
        return hex;
    }
	function onHexEncode(){
		document.getElementById('hexEncodeOut').value = convertToHex(document.getElementById('hexEncodeIn').value);
	}
	</script>
</div>
<div class=''>
	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Texte à décoder</label>
	  <textarea id='hexDecodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onHexDecode()' onChange='onHexDecode()'></textarea>
	  <textarea readonly id='hexDecodeOut' rows = '5' class='col-5'  name = 'description'></textarea>
	</div>
	<script>
	function onHexDecode(){
		document.getElementById('hexDecodeOut').value = convertFromHex(document.getElementById('hexDecodeIn').value);
	}
	</script>
</div>



<!--- category: Encode --->
<!--- id: HTTPBase64 --->
<!--- title: Base64 encode/decode --->
<!--- keywords:  --->
## Base64 encode/decode

Base64 encoding is used to transmit data using only displayable characters (letters, numbers, a few signs, etc.)<br/>

<div class=''>
	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to encode</label>
	  <textarea id='base64EncodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onBase64Encode()' onChange='onBase64Encode()'></textarea>
	  <textarea readonly id='base64EncodeOut' rows = '5' class='col-5' name = 'description' ></textarea>
	</div>
	<script>
	function onBase64Encode(){
		document.getElementById('base64EncodeOut').value = window.btoa(document.getElementById('base64EncodeIn').value);
	}
	</script>
</div>
<div class=''>

	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to decode</label>
	  <textarea id='base64DecodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onBase64Decode()' onChange='onBase64Decode()'></textarea>
	  <textarea readonly id='base64DecodeOut' rows = '5' class='col-5' name = 'description'></textarea>
	</div>

	<script>
	function onBase64Decode(){
		document.getElementById('base64DecodeOut').value = window.atob(document.getElementById('base64DecodeIn').value);
	}
	</script>
</div>	



<!--- category: Encode --->
<!--- id: EncodeURL --->
<!--- title: URL/Percent encode/decode --->
<!--- keywords:  --->
## URL/Percent encode/decode

URL/Percent encoding is used to transmit special characters in URL such as quote, spaces...)<br/>

<div class=''>
	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to encode</label>
	  <textarea id='UrlEncodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onUrlEncode()' onChange='onUrlEncode()'></textarea>
	  <textarea readonly id='UrlEncodeOut' rows = '5' class='col-5' name = 'description' ></textarea>
	</div>
	<script>
	function onUrlEncode(){
		document.getElementById('UrlEncodeOut').value = encodeURIComponent(document.getElementById('UrlEncodeIn').value);
	}
	</script>
</div>
<div class=''>

	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to decode</label>
	  <textarea id='UrlDecodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onUrlDecode()' onChange='onUrlDecode()'></textarea>
	  <textarea readonly id='UrlDecodeOut' rows = '5' class='col-5' name = 'description'></textarea>
	</div>

	<script>
	function onUrlDecode(){
		document.getElementById('UrlDecodeOut').value = decodeURIComponent(document.getElementById('UrlDecodeIn').value);
	}
	</script>
</div>	



<!--- category: Encode --->
<!--- id: EncodeROT13 --->
<!--- title: ROT13 encode/decode --->
<!--- keywords:  --->
## ROT13 encode/decode

<br/>

<div class=''>
	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to encode</label>
	  <textarea id='Rot13EncodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onRot13Encode()' onChange='onRot13Encode()'></textarea>
	  <textarea readonly id='Rot13EncodeOut' rows = '5' class='col-5' name = 'description' ></textarea>
	</div>
	<script>
    function rot13(str) {
      var input     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      var output    = 'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm';
      var index     = x => input.indexOf(x);
      var translate = x => index(x) > -1 ? output[index(x)] : x;
      return str.split('').map(translate).join('');
    }
	function onRot13Encode(){
		document.getElementById('Rot13EncodeOut').value = rot13(document.getElementById('Rot13EncodeIn').value);
	}
	</script>
</div>
<div class=''>

	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to decode</label>
	  <textarea id='Rot13DecodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onRot13Decode()' onChange='onRot13Decode()'></textarea>
	  <textarea readonly id='Rot13DecodeOut' rows = '5' class='col-5' name = 'description'></textarea>
	</div>

	<script>
	function onRot13Decode(){
		document.getElementById('Rot13DecodeOut').value = rot13(document.getElementById('Rot13DecodeIn').value);
	}
	</script>
</div>	



<!--- category: Encode --->
<!--- id: EncodeCaesar --->
<!--- title: Caesar encode/decode --->
<!--- keywords:  --->
## Caesar encode/decode

<br/>

<div class=''>
	<div class='form-group text-left row'>
      <label  for='usr' class='col-12'>Shift</label>
      <textarea id='CaesarShift' rows = '1' class='col-1' name = 'description' onKeyUp='onCaesarEncode();onCaesarDecode();' onChange='onCaesarEncode();onCaesarDecode();'></textarea>
	  <label  for='usr' class='col-12'>Text to encode</label>
	  <textarea id='CaesarEncodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onCaesarEncode()' onChange='onCaesarEncode()'></textarea>
	  <textarea readonly id='CaesarEncodeOut' rows = '5' class='col-5' name = 'description' ></textarea>
	</div>
	<script>
    var alphabet = 'abcdefghijklmnopqrstuvwxyz';
    var fullAlphabet = alphabet + alphabet + alphabet;

    function CaesarEncode(cipherText, cipherOffset){
      cipherOffset = (cipherOffset % alphabet.length);
      var cipherFinish = '';

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
		document.getElementById('CaesarEncodeOut').value = CaesarEncode(document.getElementById('CaesarEncodeIn').value, document.getElementById('CaesarShift').value);
	}
	</script>
</div>
<div class=''>

	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to decode</label>
	  <textarea id='CaesarDecodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onCaesarDecode()' onChange='onCaesarDecode()'></textarea>
	  <textarea readonly id='CaesarDecodeOut' rows = '5' class='col-5' name = 'description'></textarea>
	</div>

	<script>
	function onCaesarDecode(){
		document.getElementById('CaesarDecodeOut').value = CaesarEncode(document.getElementById('CaesarDecodeIn').value, - document.getElementById('CaesarShift').value);
	}
	</script>
</div>	



<!--- category: Encode --->
<!--- id: EncodeMorse --->
<!--- title: Morse Code --->
<!--- keywords:  --->
## Morse Code

<br/>

<div class=''>
	<div class='form-group text-left row'>
      <label  for='usr' class='col-12'>Text to encode</label>
	  <textarea id='MorseEncodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onMorseEncode()' onChange='onMorseEncode()'></textarea>
	  <textarea readonly id='MorseEncodeOut' rows = '5' class='col-5' name = 'description' ></textarea>
	</div>
	<script>
    var alphabet_morse = {
        'a': '.-',    'b': '-...',  'c': '-.-.', 'd': '-..',
        'e': '.',     'f': '..-.',  'g': '--.',  'h': '....',
        'i': '..',    'j': '.---',  'k': '-.-',  'l': '.-..',
        'm': '--',    'n': '-.',    'o': '---',  'p': '.--.',
        'q': '--.-',  'r': '.-.',   's': '...',  't': '-',
        'u': '..-',   'v': '...-',  'w': '.--',  'x': '-..-',
        'y': '-.--',  'z': '--..',  
        ' ': '/',     '_': '..--.-',
        '1': '.----', '2': '..---', '3': '...--', '4': '....-', 
        '5': '.....', '6': '-....', '7': '--...', '8': '---..', 
        '9': '----.', '0': '-----', 
    };
    function stringToMorse(txt) {
        var morse = txt.split('')            // Transform the string into an array: ['T', 'h', 'i', 's'...
        .map(function(e){     // Replace each character with a morse letter
            return alphabet_morse[e.toLowerCase()] || ''; // Lowercase only, ignore unknown characters.
        })
        .join(' ')            // Convert the array back to a string.
        /*.replace(/ +/g, ' '); // Replace double spaces that may occur when unknow characters were in the source string.*/
        return morse;
    }
	function onMorseEncode(){
		document.getElementById('MorseEncodeOut').value = stringToMorse(document.getElementById('MorseEncodeIn').value);
	}
	</script>
</div>
<div class=''>

	<div class='form-group text-left row'>
	  <label  for='usr' class='col-12'>Text to decode</label>
	  <textarea id='MorseDecodeIn' rows = '5' class='col-5' name = 'description' onKeyUp='onMorseDecode()' onChange='onMorseDecode()'></textarea>
	  <textarea readonly id='MorseDecodeOut' rows = '5' class='col-5' name = 'description'></textarea>
	</div>

	<script>
    var MORSE_CODE = {'.-': 'a', '-...':'b', '-.-.': 'c', '-..': 'd', '.':'e', '..-.':'f', '--.':'g', '....':'h', '..':'i', '.---':'j', '-.-':'k', '.-..':'l', '--':'m', '-.':'n', '---':'o', '.--.':'p', '--.-':'q', '.-.':'r', '...':'s', '-':'t', '..-':'u', '...-':'v', '.--':'w', '-..-':'x', '-.--':'y', '--..':'z', '.----':'1', '..---':'2', '...--':'3', '....-':'4', '.....':'5', '-....':'6', '--...':'7', '---..':'8', '----.':'9', '-----':'0', '|':' ', '..--.-':'_'};

    var decodeMorse = function(morseCode){
      var words = (morseCode).split('  ');
      var letters = words.map((w) => w.split(' '));
      var decoded = [];

      for(var i = 0; i < letters.length; i++){
        decoded[i] = [];
        for(var x = 0; x < letters[i].length; x++){
            if(MORSE_CODE[letters[i][x]]){
                decoded[i].push( MORSE_CODE[letters[i][x]].toUpperCase() );
            }
        }
      }

      return decoded.map(arr => arr.join('')).join(' ');
    }
	function onMorseDecode(){
		document.getElementById('MorseDecodeOut').value = decodeMorse(document.getElementById('MorseDecodeIn').value);
	}
	</script>
</div>	
 <div>
    Be careful, capital letters are lost during encoding.
    </div>

