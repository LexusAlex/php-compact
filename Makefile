linter: lint cs
static: psalm php-stan

build:
	docker-compose build
pull:
	docker-compose pull
build-pull:
	docker-compose build --pull
up-build:
	docker-compose up --build -d
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
lint:
	docker-compose run --rm php-cli composer phplint
cs:
	docker-compose run --rm php-cli composer cs-check
cs-fix:
	docker-compose run --rm php-cli composer cs-fixed
psalm:
	docker-compose run --rm php-cli composer psalm
php-stan:
	docker-compose run --rm php-cli composer phpstan
frontend-install:
	docker-compose run --rm node-cli yarn install
frontend-build:
	docker-compose run --rm node-cli yarn build
