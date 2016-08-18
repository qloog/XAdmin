## Awesome-Backend - base Laravel5.1(LTS)

[![Build Status](https://travis-ci.org/qloog/laravel5-backend.svg?branch=master)](https://travis-ci.org/qloog/laravel5-backend)

此项目主要目的是为了搭建一套基本常用的后台系统，减少重复劳动。从而可以专注于自己业务的开发。
theme 基于[ACE](http://responsiweb.com/themes/preview/ace/1.3.3/) (基于Bootstrap)开发，[部分截图](#v011-截图)

## Requirements

 - A web server: Nginx
 - PHP 5.6.4+ with the following extensions: mbstring, pdo_mysql
 - MySQL
 - Composer

## Installation

```shell
git clone https://github.com/qloog/laravel5-backend.git
cd awesome-backend
composer install -vvv   //根据composer.json下载vendor包目录
npm install //安装node依赖组件
php artisan migrate //生成表结构
php artisan db:seed //填充测试数据
php artisan serve   //运行server
open http://localhost:8000/admin/login  //用户名: admin@test.com, 密码: 12345678
```

## Command

* 生成User model: `php artisan make:model Models/User`
* 生成User Repository: `php artisan make:repository User`

## Features

 - 用户登录
    * [x] 后台登录
    * [x] 增加验证码

 - 用户权限管理 RBAC (Role-Based Access Control)
   * [x] 用户管理：新建、修改用户；
   * [x] 角色管理：角色查看，角色分配权限；
   * [x] 权限管理：权限查看、修改，增删（待增加）

 - 新闻管理
   * [x] 新闻列表
   * [x] 添加新闻
       - [x] 增加 Ueditor
       - [x] 补齐表单字段及验证处理
   * [x] 分类管理： 支持无限分类
   * [ ] 标签管理

 - 单页管理
  * [x] 分类管理
  * [ ] 内容管理   待完善

 - 相册管理
  * [ ] 相册列表

 - 活动管理
  * [ ] 活动列表
  * [ ] 添加活动

 - 评论管理
  * [ ] 评论列表
  * [ ] 评论审核：先发后审、先审后发

## 开发规范

 * PHP：遵循[PSR](http://www.php-fig.org/psr/)规范

   - [PSR1](http://www.php-fig.org/psr/psr-1/) Basic Coding Standard
   - [PSR2](http://www.php-fig.org/psr/psr-2/) Coding Style Guide
   - [PSR3](http://www.php-fig.org/psr/psr-3/) Logger Interface
   - [PSR4](http://www.php-fig.org/psr/psr-4/) Autoloading Standard
   - [PSR6](http://www.php-fig.org/psr/psr-6/) Caching Interface
   - [PSR7](http://www.php-fig.org/psr/psr-7/) HTTP Message Interface


遵循PSR标准的代码格式化工具[php-cs-fixer](http://cs.sensiolabs.org/)。
可通过composer安装：`composer require fabpot/php-cs-fixer`

## 代码文档

   按照phpdoc规范写注释，自动生成代码文档 [phpDoc文档](https://www.phpdoc.org/docs/latest/getting-started/your-first-set-of-documentation.html)


## 二次开发提示

   - 尽量使用依赖注入,尤其在控制器里,具体如Laravel文档中：[依赖注入和控制器](http://laravel-china.org/docs/5.1/controllers), [php依赖注入简介](http://www.dahouduan.com/2015/05/26/php-dependency-injection/)
   - [Laravel 5.1 LTS 中文文档](http://laravel-china.org/docs/5.1/)

参看：[PHP之道](http://laravel-china.github.io/php-the-right-way/)


## 上线部署

   可通过[Walle](https://walle-web.io/) 工具来部署


## v0.1.1 截图

* UI: [ACE](http://responsiweb.com/themes/preview/ace/1.3.3/) (基于Bootstrap)

![登录页面](http://www.lnmp100.com/static/uploads/2016/01/login-page_500.jpeg)
![用户页面](http://www.lnmp100.com/static/uploads/2016/01/user-page_1000.jpeg)
![角色页面](http://www.lnmp100.com/static/uploads/2016/01/role-page_1000.jpeg)


## issue

 - 欢迎发 [issues](https://github.com/qloog/laravel5-backend/issues) 交流讨论
 - QQ交流群：32649336

## License

The awesome-backend is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
