# YoloHackersGuide


## Markdown syntax

https://www.markdownguide.org/basic-syntax/

- Add 3 spaces at the end of a line for carrier return.


## Modify an entry

Modify file in www_site/articles/


## Add a new chapter

Articles in: www_site/articles/

Add a file in the directory, then add it in articles.php


## Test it 

$ git clone https://github.com/jossets/YoloHackersGuide.git
$ cp env.ori .env
$ docker-compose up 
$ curl http://localhost:8888/



## Launch it with traefik in a Yolo server

$ docker-compose -f docker-compose-with-traefik.yml up
$ curl http://localhost/hackersguide/



## Enjoy

