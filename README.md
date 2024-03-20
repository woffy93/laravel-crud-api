## Rest CRUD Laravel api

A simple Laravel CRUD api that models a book storage system (or library) using "Pest" for testing

###Endpoints
**GET**`/api/book` to get a paginated list of books

**GET**`/api/book/{bookId}` to get a specific book

**POST**`/api/book` body:
`{
'name': <string>,
'author': <string>,
'description': <string>
}`
to create/store a book

**PUT**`/api/book` body:
`{
'name': <string>,
'author': <string>,
'description': <string>
}`
to update a book

**DELETE**`/api/book/{bookId}` to delete/remove book

## Installation and running
The app is dockerized, it requires docker and composer to run.
To have the app running use the following commands:

`docker compose build` To build the docker image

`docker compose up -d crudapi` To build and run the app that will be served on localhost:8000

`docker compose exec crudapi php artisan test` To run tests

`docker compose exec crudapi php artisan migrate` To run migrations




## License

Software licensed under the [MIT license](https://opensource.org/licenses/MIT).
