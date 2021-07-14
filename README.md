# GearheadMarketplace-Frontend
 
How to set-up a local dev environment: 

Recommended IDE: phpStorm: https://www.jetbrains.com/phpstorm/download/

When getting the AMP server app make sure you get PHP 8+ versions. 

Get a AMP for whatever system you're using and follow the steps for integrating this into phpStorm: https://www.jetbrains.com/help/phpstorm/installing-an-amp-package.html

(Optional) Current DB type is PostgreSQL so if you're making a local one, use that. 

Before you start your AMP server, point the root dir to the dir of the PHP app. 

On a MAC:

The dir on a MAC is something like: Users ▹ userName ▹ PhpstormProjects ▹ GearheadMarketplace-Frontend

On Windows:

Make sure the Apache service is installed (make sure XAMPP is ran in Admin mode). If there's an 'X' it means it's not installed. Click on the 'X' to install so it turns into a check mark. 

Click on Config on the Apache line then httpd.conf:

Look for these two line (default pointer on the root of your project):

DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">

You need to change them to the directory of your project for the Apache service to know what to load. 

Example: 
DocumentRoot "C:\Users\USERNAME\Documents\GitHub\GearheadMarketplace-Frontend"
<Directory "C:\Users\USERNAME\Documents\GitHub\GearheadMarketplace-Frontend">

Start your AMP server and that completes your local dev env. Happy coding! 

Unrelated but if you are interested in the deployment part: 

We'll use Heroku to deploy the main branches of the PHP app and FastAPI

FastAPI: https://medium.com/fastapi-tutorials/deploying-fastapi-to-heroku-cd00bdcf3be4

PHP: https://devcenter.heroku.com/articles/deploying-php 
