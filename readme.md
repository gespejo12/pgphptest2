PGPHP TEST 2
=================================

Setup
-------

1. In terminal run composer install
2. Create .env file and copy .env.example file
3. Change database credentials
4. In terminal run php artisan key:generate
5. Run php artisan migrate
6. Run php artisan db:seed

POST/Create Comment
-------------------
1. Via Terminal:
	-Run php artisan post:comment, add double quotation if comment has space e.g `php artisan post:comment 1 "test comment"`
2. Via Postman
	-Form Field
		-Add the following in body
			1. id
			2. password
			3. comment
	-Raw/Json
		-Add the following in body
			`{
			  "id": "1",
			  "password": "720DF6C2482218518FA20FDC52D4DED7ECC043AB",
			  "comment": "comment postman 2"
			}`

Routes
-------------------
1. GET:	/user/{user_id} - show user
2. POST: /user/{user_id} - Add user comment	 

