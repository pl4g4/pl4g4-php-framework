# pl4g4-php-framework

Small mvc framework for small projects

It's using components from symfony, laravel and twig for templates

## Use

Make sure you follow this instruction to have it working in minutes

* run composer to install dependencies. 

* Modify app/config/database.php if you are going to be using a database

* Modify app/core/databaseSchema.php and run it to generate the schema of your database if you need to, delete it when you are done.

* Go to localhost/home Where home will be the controller name inside controllers, by default goes to home function inside the controller.

* Point to different function localhost/home/*functionname*

* Passing parameters localhost/home/*functionname*/*param*