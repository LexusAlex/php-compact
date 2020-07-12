docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans