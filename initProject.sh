#!/usr/bin/env bash

if [ -z "$1" ]
  then
    echo "Please provide a name for your service, e.g. ./initProject.sh offer-service"
    exit
fi

serviceName=$1

echo "### Installing symfony skeleton"
docker run --rm -v $(pwd):/app composer create-project symfony/skeleton ${serviceName}

echo "### Installing api-platform"
docker run --rm -v $(pwd)/${serviceName}:/app composer composer require api-platform/api-pack

echo "### Installing AutoMapper"
docker run --rm -v $(pwd)/${serviceName}:/app composer composer require mark-gerarts/automapper-plus-bundle

echo "### Preparing configuration"
cp .env.dist .env
sed -i'' -e s/SERVICE_ROOT_PATH=\./SERVICE_ROOT_PATH=\.\\/"${serviceName}"/g .env
