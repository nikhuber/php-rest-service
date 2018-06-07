# Example RESTful Web Service in PHP

This is a project you can use as a template to create and run a new service written in PHP.

To execute the sample service, perform the following steps:
1. Clone the project
2. Copy the `.env.dist` files (project root and `/ticketshop`) to `.env` and adjust them
3. Build the docker containers: `docker-compose build`
4. Create the schema: `docker-compose exec php bin/console doctrine:schema:create`
5. Run the service: `docker-compose up -d` 

If you want to create your own API web service, after cloning the project, to the following:

* execute the init-script in the root folder and pass it the service name, e.g. `./initProject.sh ticketshop`. 
* Don't forget to check and adjust your env-files.
* Declare your entities and implement your business logic
    
Now you should be able to access the service API at `http://localhost:8080/api`

## Custom Namespace

Maybe you want to use an individual namespace like `Rx\Tickets` for your classes instead of the default namespace `App`. 
If you decide to use your own namespace, its name should conform to the [PSR-4 specification](https://www.php-fig.org/psr/psr-4/). 
In this example, we use the following settings:

| Fully Qualified Class Name          | Namespace Prefix   | Base Directory           | Resulting File Path
| ----------------------------------- |--------------------|--------------------------|-------------------------------------------
| \Rx\Tickets\Domain\Model\Ticket     | Rx\Tickets         | ./src/rx/tickets/        | ./src/rx/tickets/Domain/Model/Ticket.php

To achieve this, perform the following steps. **Note**: the base path is your app directory, e.g. `ticketshop/` not your project root!
1. Add your new base directory to the autoloader configuration in the `composer.json` in the root directory:

        "autoload": {
           "psr-4": {
               "Rx\\Tickets\\": "src/rx/tickets/"
           }
        }
2. Update the autoloader `docker run --rm -v "$(pwd)":/app composer dump-autoload`
3. Adjust your `./config/services.yaml`. Replace `App`with your namespace prefix, e.g. `Rx\Ticket` and point to the correct paths. 
   See [services.yaml](./ticketshop/config/services.yaml) for examples.
4. Adjust the path(s) in `./config/packages/api_platform.yaml` and `./config/routes/annotations.yaml`
5. Adjust paths and prefixes in `./config/packages/doctrine.yaml`. See [doctrine.yaml](ticketshop/config/packages/doctrine.yaml) for examples.

Now, move all classes under `/src` to your new base directory, e.g. `/src/rx/tickets`. 
Don't forget to adjust all namespaces and usages or other references in your source code.


# Tips

The following commands might help you to resolve issues:
    
    docker-compose exec php bin/console cache:clear
    docker-compose exec php bin/console debug:router

During implementation, I faced the following issues with the frameworks:

- API Platform needs at least one [GET operation per resource](https://github.com/api-platform/core/issues/640) to generate route identifiers. 
- When declaring entities and DTOs in different classes, you might want to bypass the [automatic retrieval of entities](https://api-platform.com/docs/core/operations/) (`_api_receive`).
