test:
	phpunit ./tests

git-pull:
	git pull

git-push:
	git push -u

rollback:
	git reset --hard HEAD~1

clear-all:
	php artisan clear-compiled
	php artisan cache:clear
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear

abc:
	$(shell pwd -P)

install:
	docker run -v $(shell pwd -P):/opt -it local/php composer install --dev -vvv
	git submodule update --init --recursive
	chmod 777 -R ./storage/
	docker run -v $(shell pwd -P):/opt -it local/node cnpm install --verbose
	docker run -v $(shell pwd -P):/opt -it local/node bower install --allow-root
	docker run -v $(shell pwd -P):/opt -it local/node gulp

upgrade:
	git pull
	git submodule update --init --recursive
	docker run -v $(shell pwd -P):/opt -it local/php composer update --optimize-autoloader --prefer-dist -vvv
	docker run -v $(shell pwd -P):/opt -it local/node cnpm update --verbose
	docker run -v $(shell pwd -P):/opt -it local/node bower update --allow-root
	docker run -v $(shell pwd -P):/opt -it local/node gulp

update:
	git pull
	git submodule update --init --recursive
	docker run -v $(shell pwd -P):/opt -it local/node gulp
	docker run -v $(shell pwd -P):/opt -it local/php composer --optimize dump-autoload -vvv

up:
	docker-compose -f ~/opt/htdocs/Dockerfiles/docker-compose.yml up -d

php:
	docker-compose -f ~/opt/htdocs/Dockerfiles/docker-compose.yml run php /bin/bash

mysql:
	docker run -v $(shell pwd -P):/opt -it --rm local/mysql sh -c 'exec mysql -h"192.168.99.100" -P"3306" -uroot -p"123456"'
