<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">我们的 Yii 2 小组大作业</h1>
    <br>
</p>

这是我们小组的互联网数据库大作业，我们使用 Yii 2 框架开发了一个团队主页网站。该项目适合快速构建小型应用，并提供了用户登录、注销以及简单的联系页面等基础功能。通过这个项目，我们展示了如何利用 Yii 2 快速开发并实现一些常见的 Web 功能。

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

## 目录结构
-------------------
- `assets/`             包含资源定义
- `commands/`           包含控制台命令
- `config/`             包含应用配置
- `controllers/`        包含 Web 控制器类
- `mail/`               包含邮件视图文件
- `models/`             包含模型类
- `runtime/`            包含运行时生成的文件
- `tests/`              包含各类测试
- `vendor/`             包含第三方依赖包
- `views/`              包含 Web 应用的视图文件
- `web/`                包含入口脚本和 Web 资源

## 部署方式

### 1. 安装依赖

首先，我们需要通过 Composer 安装依赖：

```bash
composer install
```

### 2. 启动本地开发服务器
安装完成后，可以使用 Yii 2 自带的开发服务器在本地运行项目：

bash
Copy code
php yii serve
然后你可以在浏览器中访问以下地址查看应用：

bash
Copy code
http://localhost:8080
配置
数据库配置
请编辑 config/db.php 文件，配置实际的数据库连接。例如：

php
Copy code
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];

## 其他配置
根据项目需求，修改 config/ 目录下的其他文件进行个性化配置。
测试
项目中包含了基本的单元测试和功能测试。你可以使用以下命令运行测试：

```bash
Copy code
vendor/bin/codecept run
```
这将运行所有的单元测试和功能测试。如果你需要运行接受性测试，可以按照以下步骤进行：

将 tests/acceptance.suite.yml.example 重命名为 tests/acceptance.suite.yml。
更新 Composer 依赖：
```bash
Copy code
composer update
```
启动 Selenium 服务，并按照文档要求配置浏览器驱动。
运行接受性测试：
```bash
Copy code
vendor/bin/codecept run acceptance
```
代码覆盖率支持
你可以启用代码覆盖率并生成相关报告：

```bash
Copy code
vendor/bin/codecept run --coverage --coverage-html --coverage-xml
```
代码覆盖率报告将保存在 tests/_output 目录下。

这个项目是我们小组的协作成果，展示了 Yii 2 框架的基本用法，并为 Web 开发提供了一个简洁的入门模板。希望你能通过这个项目快速了解并使用 Yii 2 框架。