up:
	./docker-up.sh -l

dev_up:
	./docker-up.sh -d

stg_up:
	./docker-up.sh -s

prod_up:
	./docker-up.sh -p

stop:
	./docker-stop.sh

ps:
	docker ps

work:
	./workspace-bash.sh

redis:
	docker exec -it igs-enudge-laradock_redis_1 "redis-cli"

migrate:
	docker exec igs-enudge-laradock_workspace_1 php artisan migrate

test:
	docker exec igs-enudge-laradock_workspace_1 ./vendor/bin/phpunit

open_minio:
	open http://localhost:9000
