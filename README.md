sanctum
create Laravel project
cd into directory
install laravel sanctum composer require laravel/sanctum
setup database name and configure it
use traits to send user response and everything. it allows you to save your time if you have to do one thing and again and again . you can use traits to save to your time.

define traits for error and succeful response in traits folder httpResponse.php file

setup postman

define routes for login logout and register and return simple string to check postman is working

create task model and controller to check user access that only

define route for task also

write code to register user

make sure you have useHasApiToken in your specific model you targeting

write code to log in user with token generation

aleways separate your public and protected route by commentinig on top of route.
You can group your routes by middleware also.

write some factories models and routes for your code

create resource and deal with resource to return json response to user and inm odel just put your query

you can use one function to check authroized user instead of writing again and again in code. i missed it for now

why to use resource? need to find on

update using route model binding,delete it also using route model binding
