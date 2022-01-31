init: docker-down-clear app-clear docker-pull docker-pull docker-build docker-up app-init

test: app-test

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

app-init: app-key-generate app-composer-install app-wait-db app-migrations app-seeders app-admin-lte-install app-passport-install

app-admin-lte-install:
	docker-compose run --rm app-php-cli php artisan adminlte:install --no-interaction

app-passport-install:
	docker-compose run --rm app-php-cli php artisan passport:install --force

app-clear:
	docker run --rm -v ${PWD}/app:/app --workdir=/app alpine rm -f .ready

app-composer-install:
	docker-compose run --rm app-php-cli composer install

app-wait-db:
	until docker-compose exec -T app-postgres pg_isready --timeout=0 --dbname=app ; do sleep 1 ; done

app-migrations:
	docker-compose run --rm app-php-cli php artisan migrate --no-interaction

app-key-generate:
	docker-compose run --rm app-php-cli php artisan key:generate

app-seeders:
	docker-compose run --rm app-php-cli php artisan db:seed --no-interaction
