
# Canoe Test
#### Considerations
This project was done in Laravel, Docker, Node, Kafka and Mysql, the main focus of the project was to show my knowledge and how it could be applied to the test, however there are several ways to do the same thing, it all depends on the objective.

So I tried to show a little bit of everything I know, I formatted the project as if it were a large project where it would be separated into modules that could be worked on by different teams, at the same time I tried to make the project clean and easy to read.

As I mentioned before, this test is not focused on performance but on making it easy to maintain. I used DTOs, Repositories, Actions, leaving the Controller only for I/O.

The process in NODE is only used to consume KAFKA messages triggered by LARAVEL events, it makes a post against LARAVEL to register a duplicate Fund, in a real world the NODE would be a MICROSERVICE and would perform the registration function in the database. data, without having to return the request.

As I mentioned, I used Docker in the test, in a real environment I believe that Kubernets would be better, but I have already left webservice (nginx), database (mysql), kafka and php fpm in separate containers, I thought about the possibility of implementing the test with PHP Swoole + Laravel Octane would be adding unnecessary complexity just for testing, but it is a good feature for production.

# How to run
`docker-compose up -d`

Wait a few seconds until every container starts probably (30 secs), it will run the migrations and seeds.

# End points
### Get Fund Lists
```javascript
curl --location 'localhost/api/funds' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json'
```

### Update Fund
```javascript
curl --location --request PUT 'localhost/api/funds/9a4cf455-6906-4e87-95d0-fefcf05f1cc4' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--data '{
    "name": "New name",
    "start_year": 1991,
    "manager_id": "9a4cf455-9b46-47a9-94a4-954119e8006d",
    "aliases": ["Alias 1", "Alias 2"]
}'
```

### Create Fund
```javascript
curl --location 'localhost/api/funds' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--data '{
    "name": "New name 2",
    "start_year": 1991,
    "manager_id": "9a4d0e1d-321f-4ec8-89e2-23392951fe64",
    "aliases": ["Alias 1", "Alias 2"]
}'
```

### Delete Fund
```javascript
curl --location --request DELETE 'localhost/api/funds/9a4d1126-251f-48b6-8e66-62f22e69e378' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json'
```

### Duplicates List
```javascript
curl --location 'localhost/api/funds/duplicates' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json'
```
