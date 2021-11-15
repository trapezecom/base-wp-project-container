# Wordpress local and external development repo

Dependencies
- [Docker](https://docs.docker.com/engine/install/)
- [ngrok](https://ngrok.com)

Local development using https

First time setup using a local database:
- Clone this repo
- [Download ngrok](https://ngrok.com/download) and terminal start ngrok `./ngrok http 80`
- Get [ngrok auth token](https://dashboard.ngrok.com/signup) and run `./ngrok authtoken <your_auth_token>`
- Edit these files before running any Docker commands:
	- Dockerfile: Ensure line 1 has necessary version of Wordpress eg: FROM wordpress:5.8.2
	- .env: Change line 1: PROJECTNAME={PROJECTNAME}
	  eg: PROJECTNAME=village-builders
	- public/wp-config-localonly.php: Change line 49: 
	  eg: define( 'DB_NAME', 'wordpress-{PROJECTNAME}');
- Run `docker-compose -f docker-compose-setup-onetime.yml up`
- Open phpmyadmin at http://localhost:8080 u:wordpress p:wordpress and upload the latest DB from the DB directory
- Ctrl-C to shutdown setup

Subsequent runs:
- After runnning the above docker-compose command for the first time, every time thereafter:
	- Run (local to the working Docker container directory): `./start-local.sh`
- Wait for containers to initialise then:
	- Open WP site by browsing to a url listed in the output of 'start-local.sh' e.g.'https://d59a-208-110-108-43.ngrok.io' 
	- For phpmyadmin use http://localhost:8080
- Change the default browser opened by the start up process by modifying line 39 of start-local.sh (currently it points to the default path for Safari on a Mac) 

Database and files:
NOTE: The staging environment is the single source of truth. Developing locally should only be for styling and general content configuration that can be easily ported to the staging server.
- TO SORT OUT: Process to enable transference of data and files. Eg: Updraft or All-in-one Migration, etc.

To deploy project back to staging:
- Clone the theme directly into the public/wp-content/themes directory and work from there.
- Commit your changes to the main/master branch of the origin repo
- Until a valid CI/CD pipeline is developed ftp your changes to the staging environment.
