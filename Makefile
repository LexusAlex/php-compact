lint-static : linter static
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
composer-install:
	docker-compose run --rm php-cli composer install
composer-update:
	docker-compose run --rm php-cli composer update
frontend-install:
	docker-compose run --rm frontend-node-cli yarn install
frontend-build:
	docker-compose run --rm frontend-node-cli yarn build
frontend-clear:
	docker run --rm -v ${PWD}/frontend:/php-compact -w /php-compact alpine sh -c 'rm -rf build'
frontend-test:
	docker-compose run --rm frontend-node-cli yarn test
