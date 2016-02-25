## Laravel5-Backend

基于Laravel5.1(LTS) 开发  

此项目主要目的是为了搭建一套基本常用的后台系统，减少重复劳动。从而可以专注于自己业务的开发。
> 当前版本：基于[ACE](http://responsiweb.com/themes/preview/ace/1.3.3/) (基于Bootstrap)开发，参见分支：[v0.1.0](#v010-截图) 

### 下一版本：

后台UI会基于[React](http://facebook.github.io/react/) + [Antd](http://ant.design) + [webpack](http://webpack.github.io/docs/) 来开发, 与0.1.0版本最大的区别是 UI的升级和后续开发模式的不同。
抛弃了老套的嵌套模板的方式，使用React组件化+webpack工程化的方式来开发。

## 使用说明

* clone目录结构到本地： git clone https://github.com/qloog/laravel5-backend.git
* 根据composer.json下载vendor包目录：composer install
* 安装node依赖组件：npm install
* 生成表结构: php artisan migrate
* 访问后台地址：http://local.app/admin/login

## 常用命令

* 生成Repository: php artisan make:repository Role

## 功能列表

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
       - [x] 增加Ueditor
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

## 技术栈

 * node
 * npm 
 * react
 * webpack
 * [Antd](http://ant.design)
 * composer
 * [Laravel5.1 LTS](https://github.com/laravel/laravel)

## 开发规范

 * PHP：遵循[PSR](http://www.php-fig.org/psr/)规范
 
   - [PSR1](http://www.php-fig.org/psr/psr-1/) Basic Coding Standard
   - [PSR2](http://www.php-fig.org/psr/psr-2/) Coding Style Guide
   - [PSR3](http://www.php-fig.org/psr/psr-3/) Logger Interface
   - [PSR4](http://www.php-fig.org/psr/psr-4/) Autoloading Standard
   - [PSR6](http://www.php-fig.org/psr/psr-6/) Caching Interface
   - [PSR7](http://www.php-fig.org/psr/psr-7/) HTTP Message Interface
 
 * JS： 遵循 CommonJS, ES5/[ES6](http://es6.ruanyifeng.com/)(ES2015), 可参考：
 
   - [JavaScript Style Guide](https://github.com/airbnb/javascript)  airbnb/javascript
 
## v0.1.0 截图

* UI: [ACE](http://responsiweb.com/themes/preview/ace/1.3.3/) (基于Bootstrap)

![登录页面](http://www.lnmp100.com/static/uploads/2016/01/login-page.png)
![用户页面](http://www.lnmp100.com/static/uploads/2016/01/user-page.png)
![角色页面](http://www.lnmp100.com/static/uploads/2016/01/role-page.png)

## License

The Laravel5-backend is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
