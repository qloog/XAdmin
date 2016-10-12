test:
	phpunit ./tests

# ./vendor/bin/phpcs -h 查看帮助
# ./vendor/bin/phpcs -p --standard=PSR2 --ignore=vendor 目录或文件名
# wiki: https://github.com/squizlabs/PHP_CodeSniffer/wiki
phpcs:
    ./vendor/bin/phpcs -p --standard=PSR2 --ignore=vendor .

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