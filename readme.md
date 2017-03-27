## Laravel5-Backend - base Laravel5.3

[![Build Status](https://travis-ci.org/qloog/laravel5-backend.svg?branch=master)](https://travis-ci.org/qloog/laravel5-backend)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

此项目主要目的是为了搭建一套常用的基础服务,从而可以专注于其他的业务开发。
Theme已从原来的 [ACE](http://responsiweb.com/themes/preview/ace/1.3.3/) 升级为 [AdminLTE](https://almsaeedstudio.com/themes/AdminLTE/index2.html)
[部分截图](#ScreenShot)

## Requirements

 - A web server: Nginx
 - PHP 5.6.4+ with the following extensions: mbstring, pdo_mysql
 - MySQL
 - Composer
 - NPM
 - CNPM 国内源，可快速安装     [如何安装cnpm](https://npm.taobao.org/)
 - Bower
 - Gulp

## Installation

```shell
git clone https://github.com/qloog/laravel5-backend.git
cd laravel5-backend

// 安装后端依赖组件
composer config -g repo.packagist composer https://packagist.phpcomposer.com    // 使用composer中国镜像
composer install -vvv               // 根据composer.json下载依赖包到vendor目录


// 安装前端依赖组件
cnpm install                        // install bower, gulp, laravel-elixir
bower install -V                    // 安装前端组件
npm run build                       // copy js/css/img 到public下
php artisan vendor:publish --provider='Ender\UEditor\UEditorServiceProvider' //copy ueditor to public

// 创建表及导入测试数据
vim .env                            // 修改为自己的数据库信息
php artisan migrate                 // 生成表结构
php artisan db:seed                 // 填充测试数据

// 开启server
php artisan serve --port 8001       // 运行server
open http://localhost:8001/admin/login  // 用户名: admin@test.com, 密码: 12345678
```


## Features

 - 用户管理(Done)
 - 角色管理(Done)
 - 权限管理(Role-Based Access Control)(Done)
 - 菜单管理
 - 操作管理
 - 日志管理

## Coding Style

 * PHP：遵循[PSR](http://www.php-fig.org/psr/)规范

   - [PSR1](http://www.php-fig.org/psr/psr-1/) Basic Coding Standard
   - [PSR2](http://www.php-fig.org/psr/psr-2/) Coding Style Guide
   - [PSR3](http://www.php-fig.org/psr/psr-3/) Logger Interface
   - [PSR4](http://www.php-fig.org/psr/psr-4/) Autoloading Standard
   - [PSR6](http://www.php-fig.org/psr/psr-6/) Caching Interface
   - [PSR7](http://www.php-fig.org/psr/psr-7/) HTTP Message Interface

## Code check and fix

### PHPCS 检查代码规范

```shell
// 单个文件, 可以快速查看某个文件符合PSR的情况
./vendor/bin/phpcs -p --standard=PSR2 --ignore=vendor  /path/to/file
// 目录
./vendor/bin/phpcs -p --standard=PSR2 --ignore=vendor  /path/to/dir
```

### PHP-CS-FIXER 修复代码

遵循PSR标准的代码格式化工具[php-cs-fixer](http://cs.sensiolabs.org/)。
可通过composer安装：  

```shell
// 安装
composer require friendsofphp/php-cs-fixer
// 修复代码
./vendor/bin/php-cs-fixer fix app/Http/Controllers/Backend/UserController.php --level=psr2
```
使用文档：
 - https://github.com/FriendsOfPHP/PHP-CS-Fixer#usage
 - http://0x1.im/blog/php/php-cs-fixer.html

## Code Document

   按照phpdoc规范写注释，自动生成代码文档 [phpDoc文档](https://www.phpdoc.org/docs/latest/getting-started/your-first-set-of-documentation.html)

## Command

* 执行:  `php artisan make:repository Forum`

结果包含:
```
app/Contracts/Repositories/ForumRepository.php
app/Models/Forum.php
app/Repositories/Eloquent/ForumRepositoryEloquent.php
database/migrations/2016_10_28_121408_create_forums_table.php
```

## Tips

   - 尽量使用依赖注入,尤其在控制器里,具体如Laravel文档中：[依赖注入和控制器](http://laravel-china.org/docs/5.1/controllers), [php依赖注入简介](http://www.dahouduan.com/2015/05/26/php-dependency-injection/)
   - [Laravel 5.1 LTS 中文文档](http://laravel-china.org/docs/5.1/)

参看：[PHP之道](http://laravel-china.github.io/php-the-right-way/)

## ScreenShot

* UI: [AdminLTE](https://almsaeedstudio.com/themes/AdminLTE) (基于Bootstrap)

![登录页面](http://lnmp100.com/static/uploads/2016/10/screenshot-login.jpg)
![角色页面](http://lnmp100.com/static/uploads/2016/10/screenshot-role.jpg)
![添加新闻页面](http://lnmp100.com/static/uploads/2016/10/screenshot-newadd.jpg)
...

## Issue

 - 欢迎发 [issues](https://github.com/qloog/laravel5-backend/issues) 交流讨论
 - QQ交流群：32649336
 
 ## Thanks
 
 - Site
 	- [PHPHub](https://phphub.org/)
 	- [LaraBase](http://laravelbase.com/)
 	- [Laravel.So](http://laravel.so/)
 	- [Laravel 学院](http://laravelacademy.org/)
 - Project
 	- [BootstrapCMS/CMS](https://github.com/BootstrapCMS/CMS)
 	- [yccphp/laravel-5-blog](https://github.com/yccphp/laravel-5-blog)
 	- [yuansir/laravel5-rbac-example](https://github.com/yuansir/laravel5-rbac-example)
 	- [rappasoft/laravel-5-boilerplate](https://github.com/rappasoft/laravel-5-boilerplate)
 - PHP Package
 	- [zizaco/entrust](https://github.com/Zizaco/entrust)
 	- [orangehill/iseed](https://github.com/orangehill/iseed)
 	- [arcanedev/log-viewer](https://packagist.org/packages/arcanedev/log-viewer)
 	- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
 	- [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
 - Javascript Package
  	- [admin-lte](http://github.com/almasaeed2010/AdminLTE)
 	- [sweetalert](https://github.com/t4t5/sweetalert)
 	- [ztree](https://github.com/uibox/ztree)

## License

The laravel5-backend is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
