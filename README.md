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

1、新建php文件：`./app/my.fecshop.com/index.php`  ，文件里面添加代码： `<?php  echo phpinfo();  ?>`

2、打开nginx配置文件：`./services/web/nginx/conf/conf.d/default.conf`

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
./init

```

如果上面composer 安装太慢，可以使用 [composer 中国镜像](http://www.fancyecommerce.com/2017/04/19/composer-%E9%BB%98%E8%AE%A4%E5%9C%B0%E5%9D%80%E6%94%B9%E4%B8%BA%E4%B8%AD%E5%9B%BD%E9%95%9C%E5%83%8F%E5%9C%B0%E5%9D%80%EF%BC%8C%E4%BB%A5%E5%8F%8A%E4%B8%AD%E5%9B%BD%E9%95%9C%E5%83%8F%E5%9C%B0%E5%9D%80/)


3.2 百度云盘完整版

> 通过百度网盘安装(不建议),如果因为墙无法使用composer，可以访问百度云盘，
> 下载地址为：http://pan.baidu.com/s/1hs1iC2C 下载日期最新的压缩包即可

如果您使用的是百度云盘完整版，
那么将文件解压到宿主机 `./app/` 下面即可，将文件夹的名字改成`fecshop`
，完成后  `./app/fecshop` 就是fecshop系统包的根目录



3.3 下面配置fecshop


















