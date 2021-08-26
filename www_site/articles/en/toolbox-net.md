

<!--- category: Network --->
<!--- id: intro --->
<!--- title: Network --->
<!--- keywords:  --->
## Network

You just connected to a new network. 
 
Get the IP address the router just gave you. 
Scan the network to identify all active hosts IPs. 
Then scan each host to list open ports and determine which services are running on it.
When possible read services banners and identify the version number of the services.
Look for possible known exploits for service/version pairs.



<!--- category: Network --->
<!--- id: ip --->
<!--- title: IP : Internet Protocol --->
<!--- keywords:  --->
## IP : Internet Protocol

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

<a href='https://en.wikipedia.org/wiki/IP_address'>Wikipedia: https://en.wikipedia.org/wiki/IP_address</a>



<!--- category: Network --->
<!--- id: NetIpAddr --->
<!--- title: Know your IP adress thanks to 'ip addr' --->
<!--- keywords:  --->
## Know your IP adress thanks to 'ip addr'

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
<!--- title: Know your IP adress thanks to 'ifconfig' --->
<!--- keywords:  --->
## Know your IP adress thanks to 'ifconfig'

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


