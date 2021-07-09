# GearheadMarketplace-Frontend
 
How to set-up a local dev environment: 

Get a AMP for whatever system you're using and follow the steps for integrating this into phpStorm: 

https://www.jetbrains.com/help/phpstorm/installing-an-amp-package.html

Recommended IDE: phpStorm

Current DB type is PostgreSQL so if you're making a local one, use that. 

Before you start your AMP server, point the root dir to the dir of the PHP app. 

On a MAC:

The dir on a MAC is something like: Users ▹ userName ▹ PhpstormProjects ▹ GearheadMarketplace-Frontend

On Windows:

Make sure the Apache service is installed (make sure XAMPP is ran in Admin mode)

Click on Config on the Apache line then httpd.conf:

Look for these two line (default pointer on the root of your project):

DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">

You need to change them to the directory of your project for the Apache service to know what to load. 

Example: 
DocumentRoot "C:\Users\USERNAME\Documents\GitHub\GearheadMarketplace-Frontend"
<Directory "C:\Users\USERNAME\Documents\GitHub\GearheadMarketplace-Frontend">

Start your AMP server and that completes your local dev env

Unrelated but if you are interested in the deployment part: 

We'll use Heroku to deploy the main branches of the PHP app and FastAPI

FastAPI: https://medium.com/fastapi-tutorials/deploying-fastapi-to-heroku-cd00bdcf3be4

PHP: https://devcenter.heroku.com/articles/deploying-php 
