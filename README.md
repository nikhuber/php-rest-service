# Service Template Project

**Beware: work in progress**

This is a project you can use as a template to create and run a new service written in PHP.

## Project Initialization

1. Execute the init-script in the root folder and pass it the service name, e.g. `./initProject.sh ticketshop`
2. Adjust the .env file in the project root to your needs
3. Adjust the .env file in your app path (e.g., `./ticketshop`) 
4. Build the Docker images `docker-compose build`
5. Launch the service `docker-compose up -d`
    
After that, you should be able to access the service API at `http://localhost:8080/api`

## Implementation

- Define entities
- Create schema: `docker-compose exec php php bin/console doctrine:schema:create`

## Tips:

The following commands might help you resolving issues.
    
    docker-compose exec php php bin/console cache:clear
    docker-compose exec php php bin/console debug:router
