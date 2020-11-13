#!/bin/bash

pushd ./laradock
#docker-compose exec --user=laradock workspace bash
docker-compose exec workspace bash
popd
