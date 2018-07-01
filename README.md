# 服务器要求

- [PHP](http://php.net/manual/zh/install.php) >= 5.5.9
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension

- [Composer](https://getcomposer.org/)

- [MySQL](https://dev.mysql.com/doc/refman/5.7/en/installing.html)

    - 5.7.8 支持json字段

- [NodeJS](https://nodejs.org/en/) >= 6

# 配置&安装

以下操作均在laravel目录下进行

## 目录权限

如果php-fpm进程和项目不是同一用户权限，storage和bootstrap目录需要写权限

## composer 使用

```sh
# 安装
composer install

# 更新
composer update
```

## env

```sh
# 复制一份环境变量
cp .env.example .env

# 生成应用key
php artisan key:generate
```

### 配置项

* `APP_ENV=local` 在正式环境删除此行

* `APP_DEBUG=true` 在正式环境删除此行

* `APP_URL=http://localhost` 在正式环境修改此行

### 数据库

- DB_DATABASE="数据库名"
- DB_USERNAME="数据库用户名"
- DB_PASSWORD="数据库密码"

### 七牛总共有四个存储区的上传地址[QINIU_UPLOAD_URL](https://developer.qiniu.com/kodo/manual/1671/region-endpoint)


| 存储区域 | 地域简称 | 上传域名 |
|---|---|---|
| 华东 | z0 | 服务器端上传：http(s)://up.qiniup.com             客户端上传： http(s)://upload.qiniup.com |
| 华北 | z1 | 服务器端上传：http(s)://up-z1.qiniup.com          客户端上传：http(s)://upload-z1.qiniup.com |
| 华南 | z2 | 服务器端上传：http(s)://up-z2.qiniup.com          客户端上传：http(s)://upload-z2.qiniup.com |
| 北美 | na0 | 服务器端上传：http(s)://up-na0.qiniup.com        客户端上传：http(s)://upload-na0.qiniup.com |

# 运行

- `php artisan serve ` 或者 `php artisan serve --host=0.0.0.0:8000`

- 访问 {url}:8000/ 到首页

## 运行数据库操作命令

```sh
# 往数据库增加表以及填充数据
php artisan migrate --seed

# 重置数据库表结构以及填充数据
php artisan migrate:refresh --seed
```

## 运行前端开发环境命令

```sh
# 安装
npm i

# 开发模式编译
npm run dev

# 生产模式编译
npm run prod

# 实时编译
npm run watch

# 无刷新实时编译
npm run hot
```

## 定时任务执行（如需要的话）

1. 在服务器上执行命令 `crontab -e`

2. 写入命令 `* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1` 需要将路径替 换到artisan执行目录

## 队列设置（如需要的话）

1. 在root下安装supervisor：`apt install supervisor`

2. 将.supervisor.conf复制到/etc/supervisor/conf.d/下，请先确认文件中配置的项目路径和执行用户组都是对的

3. 在root下执行`supervisorctl update`

4. 检查进程中是否有laravel queue队列进程

