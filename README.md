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

## Custom Namepsace

Maybe you want to use an individual namespace like `Rx\Tickets` for your classes instead of the default namespace `App`. 
If you decide to use your own namespace, its name should conform to the [PSR-4 specification](https://www.php-fig.org/psr/psr-4/). 
In this example, we use the following settings:

| Fully Qualified Class Name    | Namespace Prefix   | Base Directory           | Resulting File Path
| ----------------------------- |--------------------|--------------------------|-------------------------------------------
| \Rx\Tickets\Entity\Ticket     | Rx\Tickets         | ./src/rx/tickets/        | ./src/rx/tickets/Entity/Ticket.php

To achieve this, perform the following steps. **Note**: the base path is your app directory, e.g. `ticketshop/` not your project root!
1. Add your new base directory to the autoloader configuration in the `composer.json` in the root directory:

        "autoload": {
           "psr-4": {
               "Rx\\Tickets\\": "src/rx/tickets/"
           }
        }
2. Update the autoloader `docker run --rm -v $(pwd):/app composer dump-autoload`
3. Adjust your `./config/services.yaml`. Replace `App`with your namepsace prefix, e.g. `Rx\Ticket` and point to the correct paths. 
   See [services.yaml](./ticketshop/config/services.yaml) for examples.
4. Adjust the path(s) in `./config/packages/api_platform.yaml` and `./config/routes/annotations.yaml`
5. Adjust paths and prefixes in `./config/packages/doctrine.yaml`. See [doctrine.yaml](ticketshop/config/packages/doctrine.yaml) for examples.

Now, move all classes under `/src` to your new base directory, e.g. `/src/rx/tickets`. 
Don't forget to adjust all namespaces and usages or other references in your source code.

## Implementation

- Define entities
- Create schema: `docker-compose exec php bin/console doctrine:schema:create`

- Optional: install AutoMapper: `docker run --rm -v $(pwd):/app composer composer require mark-gerarts/automapper-plus-bundle`

## Tips:

The following commands might help you resolving issues.
    
    docker-compose exec php bin/console cache:clear
    docker-compose exec php bin/console debug:router
    
# Hints:
- At least one GET operation per resource https://github.com/api-platform/core/issues/640
- disable default entity retrieval for DTOs
