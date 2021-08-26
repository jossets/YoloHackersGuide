

<!--- category: HackersGuide --->
<!--- id: intro --->
<!--- title: Hacker's Guide --->
<!--- keywords:  --->
## Hacker's Guide




<!--- category: HackersGuide --->
<!--- id: Guide --->
<!--- title: Intro --->
<!--- keywords:  --->
## Intro
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

