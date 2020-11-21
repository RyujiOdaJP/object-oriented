#!/bin/bash

pushd ./docker
#docker-compose exec --user=laradock workspace bash
#docker-compose exec workspace bash
docker exec -it learning-laravel-tdd_app_1 ash
popd
