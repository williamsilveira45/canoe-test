
# Canoe Test
#### Considerations
This project was done in Laravel, Docker, Node, Kafka and Mysql, the main focus of the project was to show my knowledge and how it could be applied to the test, however there are several ways to do the same thing, it all depends on the objective.

So I tried to show a little bit of everything I know, I formatted the project as if it were a large project where it would be separated into modules that could be worked on by different teams, at the same time I tried to make the project clean and easy to read.

As I mentioned before, this test is not focused on performance but on making it easy to maintain. I used DTOs, Repositories, Actions, leaving the Controller only for I/O.

The process in NODE is only used to consume KAFKA messages triggered by LARAVEL events, it makes a post against LARAVEL to register a duplicate Fund, in a real world the NODE would be a MICROSERVICE and would perform the registration function in the database. data, without having to return the request.

As I mentioned, I used Docker in the test, in a real environment I believe that Kubernets would be better, but I have already left webservice (nginx), database (mysql), kafka and php fpm in separate containers, I thought about the possibility of implementing the test with PHP Swoole + Laravel Octane would be adding unnecessary complexity just for testing, but it is a good feature for production.

NOTE: There is a filed called database.png where you can check the ER.

# How to run
`docker-compose up -d`

Wait a few seconds until every container starts probably, it will run the migrations and seeds, composer install, etc.
