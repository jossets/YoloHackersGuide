

<!--- category: transfert --->
<!--- id: intro --->
<!--- title: File transferts --->
<!--- keywords:  --->
## File transferts




<!--- category: transfert --->
<!--- id: principe --->
<!--- title: Principle --->
<!--- keywords:  --->
## Principle

As soon as you get your initial foothold on the target server, your next step is to transfert text or binary files. <br/>
You'll probably download some target files and upload some tools such as backdoors or privilege escalation scripts...



<!--- category: transfert --->
<!--- id: base64 --->
<!--- title: Base64 Copy/Paste --->
<!--- keywords:  --->
## Base64 Copy/Paste

Base64 encoding is the simplest way to upload small binary or text files.
```
cat file | base64
printf 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' | base64 -d > file
```

Just prepare the last command on you xterm, it can be many lines long, then copy/paste/exec on you target.



<!--- category: transfert --->
<!--- id: http --->
<!--- title: File transfert with HTTP Server --->
<!--- keywords:  --->
## File transfert with HTTP Server

To transfer a file without worrying about its size, just launch an HTTP server and make a wget, curl
```
python -m SimpleHTTPServer 8000
php -S 0.0.0.0:8000
```

Be carefull, eveyone is able to browse this new server file system.



<!--- category: transfert --->
<!--- id: http --->
<!--- title: Transfert with ssh account --->
<!--- keywords:  --->
## Transfert with ssh account

With an ssh accès, let use scp
```
scp file.txt remote_username@10.10.0.2:/remote/directory
scp -i id_rsa file.txt remote_username@10.10.0.2:/remote/directory
scp -P 2222 file.txt remote_username@10.10.0.2:/remote/directory
scp remote_username@10.10.0.2:/remote/file.txt /local/directory
```


