Fecshop Docker
=============


> 用于快速的，使用docker搭建fecshop的环境，方便快速部署，通过docker compopse
> 通过下载镜像，自己构建镜像，把fecshop需要的各个软件以及扩展都安装好，您
> 可以根据下面的说明操作


目录结构
---------

`./app`: 这里是代码文件，fecshop的代码文件放到这里

`./db`: 这里是环境部分-数据库部分

`./db/mongodb`: 这里是mongodb数据库的部分 

`./db/mongodb/data`: 这里是数据库的数据存放的部分，也就是数据库的库表部分数据。 


`./db/mongodb/etc/mongod.conf`: Mongodb数据库的配置文件 


`./db/mongodb/logs`: Mongodb的logs部分 


`./db/mysql`: mysql数据库

`./db/mysql/data`: mysql 数据库表数据存放的位置

 
`./services`: 服务软件部分，譬如php nginx等

`./services/php`: php部分

`./services/php/docker/Dockerfile`: php镜像构建的dockerfile文件

`./services/php/etc/php7.1.13.ini`: php的配置文件

`./services/web`: nginx部分

`./services/web/nginx/conf`: nginx的配置部分

`./services/web/nginx/conf/conf.d/default.conf`：nginx 网站 server 部分的配置文件

`./services/web/nginx/logs`: nginx的log日志文件部分

`./docker-compose.yml`: docker compose配置文件



### docker compose使用

1、下载安装

下载：

```
git clone https://github.com/fecshop/yii2_fecshop_docker.git
```

构建：

> 第一次构建需要下载环境，时间会比较长，除了下载docker中心的镜像，还要构建镜像
> 看网速，如果用阿里云，15分钟差不多完成。

```
docker-compose build
```

运行：

```
docker-compose up
```

后台运行：

```
docker-compose up -d
```

查看各个部分：

```
docker-compose ps
```

进入某个容器,譬如php：

```
docker-compose exec php bash
```


停止：

```
docker-compose stop
```




到这里我们的环境就安装好了，下面我们测试一下我们的环境


2、添加php 和 nginx 设置

2.1、我们测试的php文件 ./app/my.fecshop.com/index.php 

2.2、打开nginx配置文件

添加配置，将`my.fecshop.com`改成你自己的地址

```
server {
    listen     80  ;
    server_name my.fecshop.com;
    root  /www/web/my.fecshop.com;
    server_tokens off;
    include none.conf;
    index index.php index.html index.htm;
    access_log /www/web_logs/access.log wwwlogs;
    error_log  /www/web_logs/error.log  notice;
    location ~ \.php$ {
        fastcgi_pass   php:9000;
        fastcgi_index  index.php;
        include fcgi.conf;
    }
	
	location /en/ {
        index index.php;
        if (!-e $request_filename){
            rewrite . /en/index.php last;
        }
    }

    location ~ .*\.(gif|jpg|jpeg|png|bmp|swf)$ {
            expires      30d;
    }

    location ~ .*\.(js|css)?$ {
            expires      12h;
    }
    
	location /license/ {
		rewrite ^/(.*)/$ /$1 permanent;
	}

}
```

2.3 启动 docker-compose up

就可以看到输出的phpinfo的信息了。




