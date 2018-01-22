Fecshop Docker
=============


> 用于快速的，使用docker搭建fecshop的环境，方便快速部署，通过docker compopse
> 通过下载镜像，自己构建镜像，把fecshop需要的各个软件以及扩展都安装好，您
> 可以根据下面的说明操作



目录结构介绍
---------


`./app`: 这里是代码文件，fecshop的代码文件放到这里

`./db`: 这里是环境部分-数据库部分

`./db/mongodb`: 这里是mongodb数据库的部分 

`./db/mongodb/data`: 这里是数据库的数据存放的部分，也就是数据库的库表部分数据。 


`./db/mongodb/etc/mongod.conf`: Mongodb数据库的配置文件 


`./db/mongodb/logs`: Mongodb的logs部分 


`./db/mysql`: mysql数据库

`./db/mysql/data`: mysql 数据库表数据存放的位置

`./db/mysql/conf.d`: mysql 配置文件
 
`./services`: 服务软件部分，譬如php nginx等

`./services/php`: php部分

`./services/php/docker/Dockerfile`: php镜像构建的dockerfile文件

`./services/php/etc/php7.1.13.ini`: php的配置文件

`./services/web`: nginx部分

`./services/web/nginx/conf`: nginx的配置部分

`./services/web/nginx/conf/conf.d/default.conf`：nginx 网站 server 部分的配置文件

`./services/web/nginx/logs`: nginx的log日志文件部分

`./docker-compose.yml`: docker compose配置文件




安装docker和docker compose
-------------------------

linux内核需要大约3.1.0 ,下面是centos 7 下面部署的过程：


1、安装docker

```
sudo curl -sSL https://get.daocloud.io/docker | sh
```

2、安装 docker compose，资料：[install-compose](https://docs.docker.com/compose/install/#install-compose)

```
sudo curl -L https://github.com/docker/compose/releases/download/1.18.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
```



### docker compose 安装部署环境

下载当前库文件，通过`git clone`下载：

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

### docker compose 测试环境

1、新建php文件：`./app/www.test.com/index.php`  ，文件里面添加代码： `<?php  echo phpinfo();  ?>`

2、打开nginx配置文件：`./services/web/nginx/conf/conf.d/default.conf`

添加配置，将`www.test.com`改成你自己的地址

```
server {
    listen     80  ;
    server_name www.test.com;
    root  /www/web/www.test.com;
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

3 启动 docker-compose up

就可以看到输出的phpinfo的信息了。

### 安装fecshop

> 对于docker ，一定要切记，docker不是虚拟机！docker不是虚拟机！docker不是虚拟机！


`宿主机`: 就是您的linux主机

`容器主机`：就是docker容器虚拟的主机。

每一个服务，对应一个docker 容器，譬如mysql
一个容器，php一个容器，redis一个容器，mongdob一个容器，
每一个容器的数据和配置文件都是在宿主主机上面，通过`volumes`
挂载到容器的相应文件夹中，（我们在`./docker-compose.yml`
配置文件中的`volumes`做了映射）

因此，对于docker 容器，里面涉及到存储的部分，都应该通过
挂载的方式映射到宿主机上面，而不是在容器里面。

3.1 composer 安装fecshop

`docker compose up -d` 操作完成后,
我们通过命令进入到php的容器：

```
docker-compose exec php  bash
// 进入成功后，在php容器中执行：
cd /www/web
// 将`1.3.0.3` 替换成相应的fecshop版本。下面提示需要token，参看这里获取Token：http://www.fecshop.com/topic/412
composer create-project fancyecommerce/fecshop-app-advanced  fecshop 1.3.0.3
cd fecshop   

```

3.1.2 yii2_mongodb扩展bug的处理

另开一个xshell窗口，在宿主主机  ./app/fecshop中打开composer.json，在require中加入
`"yiisoft/yii2-mongodb": "dev-master"`, 如下：

```
"require": {
        "php": ">=5.4.0",
        "yiisoft/yii2-mongodb": "dev-master",  // 将前面的这个配置加入进去即可。
        
        ...
    },
```

然后执行：

```
composer update
./init
```



其他详细参看文件：[Fecshop 安装](http://www.fecshop.com/doc/fecshop-guide/develop/cn-1.0/guide-fecshop-about-hand-install.html)

3.2 百度云盘完整版

> 通过百度网盘安装(不建议),如果因为墙无法使用composer，可以访问百度云盘，
> 下载地址为：http://pan.baidu.com/s/1hs1iC2C 下载日期最新的压缩包即可

如果您使用的是百度云盘完整版，
那么将文件解压到宿主机 `./app/` 下面即可，将文件夹的名字改成`fecshop`
，完成后  `./app/fecshop` 就是fecshop系统包的根目录

```
cd fecshop   
./init
```

其他详细参看文件：[Fecshop 安装](http://www.fecshop.com/doc/fecshop-guide/develop/cn-1.0/guide-fecshop-about-hand-install.html)



4 下面配置fecshop


详细步骤，详细参考：[Fecshop 初始配置](http://www.fecshop.com/doc/fecshop-guide/develop/cn-1.0/guide-fecshop-about-config.html)

为了更方便的配置，Terry在 `./example_data/` 中已经进行了一些默认配置，
您可以使用默认配置先搭建起来，然后在按照自己的需要进行更改。
下面介绍的是在`./example_data/`里面的各个配置和其他的一些东西，
您可以进入`./example_data/`文件件，
将默认的配置覆盖到fecshop中。

进入`./example_data/`文件，执行：

```
// 复制配置文件，也就是下面的各个store 域名 以及数据库配置
\cp -rf ./fecshop/* ../app/fecshop/
```

将 ./example_img_and_db_data/mysql_fecshop.sql 导入到mysql的fecshop数据库中



4.1本机（浏览器所在的电脑，也就是您的window本机），添加host(打开C:\Windows\System32\drivers\etc\hosts，添加如下代码,如果是其他IP，将 127.0.0.1 替换成其他IP即可。)

```
127.0.0.1       my.fecshop.com       # mysql的phpmyadmin的域名指向
127.0.0.1       appadmin.fecshop.com # 后台域名指向
127.0.0.1       appfront.fecshop.com # 前台pc端域名指向
127.0.0.1       appfront.fecshop.es  # 前台pc端 es 语言的域名指向
127.0.0.1       apphtml5.fecshop.com # 前台html端的域名指向
127.0.0.1       appapi.fecshop.com   # api端的域名指向
127.0.0.1       appserver.fecshop.com # server端的域名指向
127.0.0.1       img.fecshop.com		#appimage/common   图片的域名指向
127.0.0.1       img2.fecshop.com	#appimage/appadmin 图片的域名指向
127.0.0.1       img3.fecshop.com	#appimage/appfront 图片的域名指向
127.0.0.1       img4.fecshop.com	#appimage/apphtml5 图片的域名指向
127.0.0.1       img5.fecshop.com	#appimage/appserver图片的域名指向
```

4.2、配置数据库部分：common/config/main-local.php


4.3配置图片部分的域名

打开文件：`./app/fecshop/common/config/fecshop_local_services/Image.php`


4.4nginx做路径指向设置

nginx的配置文件为`./services/web/nginx/conf/conf.d/default.conf`
已经配置好域名部分

4.5Store的配置

`./example/fecshop/` 下三个入口的store配置

```
@appfront/config/fecshop_local_services/Store.php 

@apphtml5/config/fecshop_local_services/Store.php 

@appserver/config/fecshop_local_services/Store.php 
```

5.


5.1创建mysql数据库

在根目录下执行，进入mysql的容器

```
docker-compose exec mysql bash
```

执行`mysql -uroot -p` 进入mysql

```
use fecshop;
create database fecshop;
show databases;
```

5.2 Yii2 migratge方式导入表结构。


mysql(导入mysql的表，数据，索引):

```
./yii migrate --interactive=0 --migrationPath=@fecshop/migrations/mysqldb
```

mongodb(导入mongodb的表，数据，索引):

```
./yii mongodb-migrate  --interactive=0 --migrationPath=@fecshop/migrations/mongodb
```

6.测试数据

6.1示例图片解压到fecshop下面,进入example_data文件夹下：

```
unzip -o ./example_img_and_db_data/appimage.zip  -d  ../app/fecshop/
```
6.2安装mongodb数据库的测试数据

在根目录下（github下载完成后的文件夹下）进入mongodb容器

```
docker-compose exec mongodb bash
```

```
mongo mongodb:27017/fecshop --quiet /data/example_db/mongo-fecshop_test-20170419-065157.js
```

执行exit退出容器

6.3安装mysql数据库的测试数据

5.1在根目录下执行，进入mysql的容器

```
docker-compose exec mysql bash
```

执行`mysql -uroot -p` 进入mysql

```
use fecshop;
source /var/example_db/mysql_fecshop.sql
```














