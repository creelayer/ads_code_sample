Requirements
language, technologies: PHP with any framework (or without it)<br/>
the code should be posted on github<br/>
3 methods: get list of ads, get one ad, create ad<br/>
field validation (no more than 3 links to a photo, description no more than 1000 characters, title no more than 200 characters)<br/>
Method for getting list of ads<br/>
pagination is required, 10 ads should be present on one page<br/>
you need the ability to sort: by price (ascending / descending) and by date of creation (ascending / descending)<br/>
fields in the response: ad name, link to the main photo (first in the list), price<br/>
Method for getting a specific ad<br/>
required fields in the response: ad name, price, link to the main photo<br/>
optional fields (can be requested by passing the fields parameter): description, links to all photos<br/>
Ad creation method:<br/>
accepts all of the above fields: name, description, several links to photos (the photos themselves do not need to be uploaded anywhere), price<br/>
returns the ID of the created ad and the result code (error or success)<br/>

Complications<br/>
Not required, but the task can be completed with any number of complications<br/>
unit tests written<br/>
containerization - the ability to raise a project using docker-compose up<br/>
caching - to increase the speed of response from the server, caching can be added (Redis / Memcached)<br/>




<h2>DEPLOY:</h2>
git clone....

docker-compose up 

docker exec -it app vendor/bin/yii migrate/up --appconfig=src/configs/console.php --interactive=0



#get list of ads
GET http://localhost:8080/ads?page=1&sort=-price <br>
Accept: application/json
###

#get one ad
GET http://localhost:8080/ads/1 <br>
Accept: application/json
###

#get create ad
POST http://localhost:8080/ads <br>
Accept: application/json <br>
Content-Type: application/json <br>

{
  "title" : "alala",
  "description": "zzz",
  "price": 10,
  "photos": [
    "https://www.iams.com/images/default-source/article-image/article_stomach-issues-in-cats-why-cats-vomit-and-what-to-do_header.jpg",
    "https://cdn.britannica.com/67/197567-131-1645A26E/Scottish-fold-cat-feline.jpg",
    "https://icatcare.org/app/uploads/2019/03/Caring-for-your-cats-ears.png"
  ]
}