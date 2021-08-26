

<!--- category: Network --->
<!--- id: intro --->
<!--- title: Network --->
<!--- keywords:  --->
## Network

Vous venez de vous connecter à un réseau. 
 
Récupérez l'adresse IP que le routeur à attribué à votre machine. 
Scanner le réseau pour connaitre les adresses IP des serveurs qui y sont connectés. 
Ensuite scannez chaque machine pour déterminer les ports ouverts, et identifier services qui tournent dessus.
Si possible lire les bannières de connection, et en extraire les noms et versions des services.
Vérifier si des failles existent pour cette version des services.



<!--- category: Network --->
<!--- id: ip --->
<!--- title: IP : Internet Protocol --->
<!--- keywords:  --->
## IP : Internet Protocol

Une adresse IP (avec IP pour Internet Protocol) est un identifiant, qui est attribuée, de façon permanente ou provisoire, à chaque machine relié à un réseau informatique (PC, téléphone, smart TV, objet connecté,...). 
 
Les adresses IPv4 (version 4) sont codées sur 32 bits. Elles sont généralement représentées en notation décimale avec quatre nombres compris entre 0 et 255, séparés par des points.
Exemple : 172.16.254.1
   
   
Un serveur possède autant d'adresses que de cartes réseaux. 
Certaines adresses ont une utilisation réservée: 
- 127.0.0.1, appelée <i>loopback</i> désigne notre serveur.
- 0.0.0.0, désigne l'ensemble des adresses IP de notre serveur. 

<br/>
_Sous-réseau_
Les premiers bits de l'adresse IP précisent le numéro du réseau, les suivants le numéro de l'hôte. 
Le nombre de bits du réseau est précisé par le masque de réseau:
- 10.10.10.12/16 => Réseau 10.10.x.x, il y a 65535 machines adressables sur ce réseau.
- 10.10.10.12/24 => Réseau 10.10.10.x, il y a 128 machines adressables sur ce réseau.

Quand nous scannons 10.10.10.1/24, nous testons toutes les adresses de 10.10.10.1 à 10.10.10.255 

<br/>
_192.168.X.X/16, 172.16.0.0/12 et 10.X.X.X/8_

Les adresses 192.168.X.X/16, 172.16.0.0/12 et 10.X.X.X/8 sont réservées pour les réseaux locaux.
Vous ne devez pratiquer de scans et des exploits que sur des machines joignables sur ces plages d'adresses.
   
   

<a href='https://fr.wikipedia.org/wiki/Adresse_IP'>Article sur Wikipedia: https://fr.wikipedia.org/wiki/Adresse_IP</a>



<!--- category: Network --->
<!--- id: NetIpAddr --->
<!--- title: Trouver mon IP avec 'ip addr' --->
<!--- keywords:  --->
## Trouver mon IP avec 'ip addr'

```

$ ip addr

1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000 
   loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00 
   inet 127.0.0.1/8 scope host lo 
   valid_lft forever preferred_lft forever 
73: eth1@if74: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default 
   link/ether 02:42:0a:0a:0a:03 brd ff:ff:ff:ff:ff:ff link-netnsid 0 
   inet <span  style='color:Cyan;'>10.10.10.3/24</span > brd 10.10.10.255 scope global eth1 
   valid_lft forever preferred_lft forever 
```




<!--- category: Network --->
<!--- id: NetIfconfig --->
<!--- title: Trouver mon IP avec 'ifconfig' --->
<!--- keywords:  --->
## Trouver mon IP avec 'ifconfig'

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
   inet <span style='color:Cyan;'>10.10.10.3</span>  netmask <span style='color:Cyan;'>255.255.255.0</span>  broadcast 10.10.10.255
   ether 02:42:0a:0a:0a:03  txqueuelen 0  (Ethernet)
   RX packets 15569  bytes 2618290 (2.4 MiB)
   RX errors 0  dropped 0  overruns 0  frame 0
   TX packets 20985  bytes 1976399 (1.8 MiB)
   TX errors 0  dropped 0 overruns 0  carrier 0  collisions 0
```


