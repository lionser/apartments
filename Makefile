configure:
	chmod -R 777 var/cache/
	chmod -R 777 var/log/
	cp .env.dist .env -n

build:
	php bin/console doctrine:database:create -n
	php bin/console assets:install
	php bin/console doctrine:migration:migrate -n

test:
	php vendor/bin/phpcs

deploy: configure build