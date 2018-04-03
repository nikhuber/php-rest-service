#!/usr/bin/env bash

echo "Please enter a name for your service, e.g. offer-service"
read serviceName

echo "### Installting symfony skeleton"
docker run --rm -v $(pwd):/app composer create-project symfony/skeleton  ${serviceName}

echo "### Installting api-platform"
docker run --rm -v $(pwd)/${serviceName}:/app composer composer req api

echo "### Perparing configuration"
cp .env.dist .env
sed -i'' -e s/SERVICE_ROOT_PATH=\./SERVICE_ROOT_PATH=\.\\/"${serviceName}"/g .env