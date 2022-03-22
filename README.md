## Transactions

###Follow this steps for the initial setup:
- Clone the project.
- CD into the application's directory.
- Run composer install.
- Create an env  file from .env.example.
- Open your .env file and change the database values with your own credentials.
- Run php artisan key:generate.
- Run php artisan db:seed.
- Run php artisan serve.

###Using POSTMAN
- Go to http://localhost:8000/api/transactions?source=csv  for listing transactions fetched from csv source
- Go to http://localhost:8000/api/transactions?source=db   for listing transactions fetched from database
- (change the source type if you want to see various failed validation messages)

####Run php artisan test for running all the available unit tests.

####Run docker-compose up if you want to run the app from a docker container.
