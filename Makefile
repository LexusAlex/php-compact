build:
	docker-compose build
pull:
	docker-compose pull
build-pull:
	docker-compose build --pull
up:
	docker-compose up -d
down:
	docker-compose down --remove-orphans
restart:
	docker-compose restart
down-clear:
	docker-compose down -v --remove-orphans
remove-all-system:
	docker system prune -a
test:
	docker-compose run --rm php-cli composer test
