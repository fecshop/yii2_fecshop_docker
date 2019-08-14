Fecshop 全称为Fancy ECommerce Shop，是基于php Yii2框架之上开发的一款优秀的开源电商系统， Fecshop支持多语言，多货币，架构上支持pc，手机web，手机app，和erp对接等入口，您可以免费快速的定制和部署属于您的电商系统。

Fecshop Github地址: https://github.com/fancyecommerce/yii2_fecshop

Fecshop Docker
=============


1.Fecshop-1.x版本的Docker安装参看：[Fecshop-1.x版本Docker安装教程](README-1.md)

2.fecshop-2.x版本，默认不需要redis，mongodb，xunsearch，如果您确定后面不会使用到这些扩展，
可以在`docker-compose.yml`中将配置删除即可

3.如果您是本地windows，你可以使用wamp配置fecshop，参看文档：
[Fecmall-2.x windows WAMP环境安装 - 手把手系列](http://www.fecmall.com/doc/fecshop-guide/develop/cn-2.0/guide-fecshop-2-about-wamp-install.html)


网络问题说明
------------

> docker-compose.yml，默认使用的是国外的源，如果您是国内的服务器，可能会遇到某些包被墙
，您可以按照下面的方法，使用阿里云的源，适合国内的用户下载安装docker环境

如果您在docker环境构建的过程中，出现因为网速问题，导致的安装失败，可以将 `docker-compose.yml.aliyun` 内容覆盖 `docker-compose.yml` ,全部使用阿里云
的镜像（镜像是由fecshop上传的）。






目录结构介绍
---------

[目录结构介绍](README-FILE.md)


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
mkdir -p /www/web
cd /www/web
git clone https://github.com/fecshop/yii2_fecshop_docker.git
```

1.进入上面下载完成后的文件夹 yii2_fecshop_docker，打开 `docker-compose.yml`

1.1更改mysql的密码：
```
- MYSQL_ROOT_PASSWORD=fecshopxfd3ffaads123456
```

1.2更改redis的密码：（如果您不需要redis，那么这个部分忽略）

```
打开文件：`./db/redis/etc/redis-password`,更改里面的redis密码即可。
```

mysql和redis的密码要记住，后面配置要用到。


2.构建：

启动docker

```
service docker start
```

> 第一次构建需要下载环境，时间会比较长，除了下载docker中心的镜像，还要构建镜像
> 看网速，如果用阿里云，15分钟差不多完成，使用下面的命令构建环境

```
chmod 755 /usr/local/bin/docker-compose
docker-compose build
```

### 网络问题解决

> docker-compose.yml，默认使用的是国外的源，如果您是国内的服务器，可能会遇到某些包被墙
，您可以按照下面的方法，使用阿里云的源，适合国内的用户下载安装docker环境

如果您在构建的过程中，出现因为网速问题，导致的安装失败，可以将 `docker-compose.yml.aliyun` 内容覆盖 `docker-compose.yml` ,全部使用阿里云
的镜像（镜像是由fecshop上传的）。

曾经有人遇到过这个问题，估计是网络问题：http://www.fecshop.com/topic/641


完成后，运行：

```
docker-compose up  // 按下ctrl+c退出停止。
```

后台运行：（守护进程的方式）

```
docker-compose up -d
```

查看compose启动的各个容器的状态：

```
docker-compose ps
```

进入某个容器,譬如php：

```
docker-compose exec php bash
```

退出某个容器

```
exit
```


停止 docker compose启动的容器：

```
docker-compose stop
```

到这里我们的环境就安装好了，也讲述了一些docker compose常用的命令，
下面我们测试一下我们的环境


### 启动docker ，下载安装fecshop


> 对于docker ，一定要切记，docker不是虚拟机！docker不是虚拟机！docker不是虚拟机！
> 每一个服务，对应一个docker 容器，譬如mysql
> 一个容器，php一个容器，redis一个容器，mongdob一个容器，
> 每一个容器的数据和配置文件都是在宿主主机上面，通过`volumes`
> 挂载到容器的相应文件夹中，（我们在`./docker-compose.yml`
> 配置文件中的`volumes`做了映射）
>
> 因此，对于docker 容器，里面涉及到存储的部分，都应该通过
> 挂载的方式映射到宿主机上面，而不是在容器里面。

`宿主机`: 就是您的linux主机

`容器主机`：就是docker容器虚拟的主机。


1、启动:

进入yii2_fecshop_docker目录，执行：

`docker-compose up -d`



2、composer 安装fecshop

我们通过命令进入到php的容器：

```
docker-compose exec php  bash
cd /www/web
```

如果您是国内的主机，可以切换composer源为阿里云源

```
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```


**最新的fecshop版本参看**：https://github.com/fecshop/yii2_fecshop/releases
，
将`2.1.6` 替换成相应的fecshop版本。

```

composer create-project fancyecommerce/fecshop-app-advanced fecshop 2.1.6
```

**一定要将 2.1.6 替换成最新的版本！！**  **一定要将 2.1.6 替换成最新的版本！！**

**一定要将 2.1.6 替换成最新的版本！！**  **一定要将 2.1.6 替换成最新的版本！！**



如果你是第一次使用github，会提示需要token，参看这里获取Token：http://www.fecshop.com/topic/412

下载的时候，如果你是第一次使用github，这个地方会卡住，提示你填写github的token，获取github token 参看帖子：http://www.fecshop.com/topic/412

```
Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+b3817f538307+2018-06-12+1503
to retrieve a token. It will be stored in "/root/.composer/auth.json" for future use by Composer.
Token (hidden):
```


3.百度云盘完整版

> 通过百度网盘安装(不建议),如果因为墙无法使用composer，可以访问百度云盘，
> 下载地址为：http://pan.baidu.com/s/1hs1iC2C 下载日期最新的压缩包即可

如果您使用的是百度云盘完整版，
那么将文件解压到宿主机 `./app/` 下面即可，将文件夹的名字改成`fecshop`
，完成后  `./app/fecshop` 就是fecshop系统包的根目录




### init初始化


进入fecshop根目录，执行`init`

```
./init
```

选择develop模式，也就是命令行填写 `0`  `yes` 即可

[fecmall init 执行的log详细](README-INIT.md)



执行完后，通过composer加载的文件就完成了。


完成后，使用`exit`退出php的docker容器

这样，我们部署完成了docker，并且下载了fecshop，并进行了初始化


### 配置fecshop


1、配置域名

> 如果您是本地windows，你可以使用wamp配置fecshop，参看文档：
> [Fecmall-2.x windows WAMP环境安装 - 手把手系列](http://www.fecmall.com/doc/fecshop-guide/develop/cn-2.0/guide-fecshop-2-about-wamp-install.html)
>
> 如果您是服务器使用docker，那么使用实用域名即可，做一下解析


如果您没有域名，是本机，那么需要添加域名hosts映射（也就是用ip映射的方式弄假域名）

windows配置文件：打开C:\Windows\System32\drivers\etc\hosts，添加如下代码,如果是其他IP，将 127.0.0.1 替换成其他IP即可。

linux： 打开 /etc/hosts 添加。

```
127.0.0.1       my.fecshoptest.com 
127.0.0.1       appfront.fecshoptest.com
127.0.0.1       appadmin.fecshoptest.com
127.0.0.1       img.fecshoptest.com
127.0.0.1       apphtml5.fecshoptest.com
127.0.0.1       appserver.fecshoptest.com
127.0.0.1       appapi.fecshoptest.com
```

nginx的配置文件为`./services/web/nginx/conf/conf.d/default.conf`

如果您使用自定义域名，将其配置域名替换即可



2.初始化数据库

2.1mysql数据库配置：

宿主主机下打开配置文件  ./app/fecshop/common/config/main-local.php

将`数据库名称`和`数据库密码`改成yml文件中配置的值。（这个是在docker-compose.yml文件中配置的mysql值）

2.2Yii2 migrate方式导入表结构。

在docker的根目录下执行如下命名，进入php容器

```
docker-compose exec php bash
cd /www/web/fecshop
```
mysql表结构初始化安装

```
./yii migrate --interactive=0 --migrationPath=@fecshop/migrations/mysqldb
```

`exit`，退出容器,回到宿主主机


2.3安装mysql数据库的测试数据

在根目录(docker-compose.yml文件所在目录)下执行，进入mysql的容器

```
docker-compose exec mysql bash
```

执行`mysql -uroot -p` 进入mysql

```
use fecshop;
source /var/example_db_2.x/fecshop.sql
exit
```

`exit`，退出容器,回到宿主主机


3.复制测试图片到fecmall下（在宿主主机中执行）

```
cd ./fecshop-2.x-example-data
\cp -rf ./appimage ../app/fecshop/
```

4.访问后台：

也就是上面配置的域名：appadmin.fecshoptest.com

初始账户密码： admin admin123

右上角切换成中文语言。

剩下的配置，都是在后台操作完成，docker和普通的安装都是一致的，这个部分的配置，
你可以参看文档：http://www.fecmall.com/doc/fecshop-guide/develop/cn-2.0/guide-fecshop-2-about-hand-install.html#3
的第三部分。


### 配置开机启动

1.centos7下面开机启动docker

```
systemctl enable docker
```

2.开机启动docker-compose

`vim /etc/rc.d/rc.local` , 新行，添加下面的命令行

```
/usr/local/bin/docker-compose -f /www/web/yii2_fecshop_docker/docker-compose.yml up -d
```

注意，要将`/www/web/yii2_fecshop_docker` 替换成您自己的地址。

### 安装VUE部分

> VUE的数据提供部分是上面的appserver入口提供的api，因此，需要上面的配置完成后，才可以配置下面的vue部分

在宿主主机中操作：

1.进入 `yii2_fecshop_docker/app `, 也就是将 vue_fecshop_appserver 下载到`yii2_fecshop_docker/app/ `下面

参看文档：https://github.com/fecshop/vue_fecshop_appserver
，进行下载，安装环境


2.上面的文档操作过程中，到第6步完成后，执行

```
npm run build
```

就可以访问：http://vue.fecshop.com
了，因为nginx默认已经配置了这个域名，可以直接访问。

OK,fecshop docker compose的安装过程完成了。



### 使用phpmyadmin访问 mysql


```
cd ./app
wget https://files.phpmyadmin.net/phpMyAdmin/4.7.7/phpMyAdmin-4.7.7-all-languages.zip
unzip phpMyAdmin-4.7.7-all-languages.zip
mv phpMyAdmin-4.7.7-all-languages  phpmyadmin
cd phpmyadmin/
vim libraries/config.default.php
//打开文件后，大约117行处，将
$cfg['Servers'][$i]['host'] = 'localhost';
改成
$cfg['Servers'][$i]['host'] = 'mysql';
保存退出即可
```

访问：my.fecshop.com 即可，mysql的密码就是docker-compose.yml文件中创建mysql容器的密码。

> 对于 my.fecshop.com，nginx下的配置文件已经配置好,nginx配置文件为：
`/services/web/nginx/conf/conf.d/default.conf`

OK，是不是so easy？ 不光妈妈，就连爸爸也不担心我繁琐的配置fecshop的环境，^-^,,



其他部分资料
-------------

> 和安装无法的


### GUI访问数据库

1.mongodb的访问

推荐使用RoboMongo，下载地址为：https://robomongo.org/download
，支持使用ssh方式访问mongodb

默认的方式是无法连接的，我们需要搭建一个ssh的容器，通过这个容器连接mongodb

1.1 本部分参考的教程为：[Dockerize an SSH service](https://docs.docker.com/engine/examples/running_ssh_service/#build-an-eg_sshd-image)

1.2 打开文件：./services/ssh/docker/Dockerfile , 找到配置行：`RUN echo 'root:setyoupasss22XXXcreencast' | chpasswd`
,将`setyoupasss22XXXcreencast` 改成您自己的root密码，切记，这里一定要修改，！！！这里一定要修改，！！！
这里一定要修改，！！！

1.3 打开根目录的 `docker-compose.yml`, 在配置的services中加入：

```
ssh1:
    build:
      context: ./services/ssh/docker/
    networks:
      - code-network
    ports:
      - "2222:22"
```


加入后的配置示例如下：

**下面只是给一个例子参考，切勿复制下面的文件覆盖你的docker-compose.yml**

**下面只是给一个例子参考，切勿复制下面的文件覆盖你的docker-compose.yml**

**下面只是给一个例子参考，切勿复制下面的文件覆盖你的docker-compose.yml**

```
version: "2"
services:
  web:
    image: nginx
    ports:
      - "80:80"
    restart: always
    volumes:
      - ./app:/www/web
      - ./services/web/nginx/conf:/etc/nginx
      - ./services/web/nginx/logs:/www/web_logs
    networks:
        - code-network
    depends_on:
      - php
  ...  // 省略
  redis:
    image: redis
    restart: always
    ports:
      - "6379:6379"
    environment:
        REDIS_PASS_FILE: /run/secrets/redis-password
    command: [
      "bash", "-c",
      '
       docker-entrypoint.sh
       --requirepass "$$(cat $$REDIS_PASS_FILE)"
      '
    ]
    volumes:
      - ./db/redis/etc/redis.conf:/usr/local/etc/redis/redis.conf
      - ./db/redis/data:/data
      - ./db/redis/etc/redis-password:/run/secrets/redis-password
    networks:
      - code-network
  mongodb:
    image: mongo:3.7
    restart: always
    environment:
      - MONGO_DATA_DIR=/data/db
      - MONGO_LOG_DIR=/data/logs
    volumes:
      - ./db/mongodb/data:/data/db
      - ./db/mongodb/example_db:/data/example_db
      - ./db/mongodb/logs:/data/logs
    networks:
      - code-network
  ssh1:
    build:
      context: ./services/ssh/docker/
    networks:
      - code-network
    ports:
      - "2222:22"
networks:
  code-network:
    driver: bridge
```
1.4设置mongodb容器， mongod.conf配置文件里面的ip访问，允许ssh1容器访问mongodb

打开文件`db/mongodb/etc/mongod.conf`，将29行`bindIp: php`,改成 `bindIp: php,ssh1`，保存

重启docker-compose


1.5下载robomongo，打开mongodb connects窗口。然后点击create，在弹出的窗口中有connection，ssh 和其他的tab块

![](333.png)

1.5.1 connection中填写： type：`redirect connection`，name：`fecshop`，Addredd：`mongodb` : `27017`

1.5.2 点击SSH，勾选Use SSH tunnel，然后进行如下填写：


ssh address ： `您的主机IP`：`2222`

ssh User Name : `root`

ssh Auth Method: 选择`password`方式

User Password：填写上面1.2部分，在文件./services/ssh/docker/Dockerfile
中填写的`密码`

点击save ，然后进行连接即可



---------------------------------------------------------------------------
帮助：

> 在使用docker的时候有很多东西的安装可能不习惯， 下面有一些帮助文章

1.如何配置https，Docker容器环境中用Let's Encrypt部署HTTPS

详细： http://www.fecshop.com/topic/1249

2.docker-compose 计划任务cron，执行某个容器里面的shell脚本或者二进制可执行文件

详细： http://www.fecshop.com/topic/1296


---------------------------------------------------------------------------

QA:

1.安装的时候，在构建php的时候报错，怎么办？

答：您可以将文件 	docker-compose.yml.aliyun 的内容复制到  	docker-compose.yml 中，然后执行下面的命名构建

```
docker-compose build --no-cache
```
docker-compose.yml.aliyun中添加了做好了的php镜像，地址放到了阿里云docker镜像中心，国内建议使用该文件

docker-compose.yml.php.hub： php镜像放到了hub.docker.com ，国外服务器使用该地址





2.fecshop的代码是基于composer安装的，可能安装过程中拉取fecshop依赖的库包存在网络问题，您可以
使用`百度云盘完整版`, 下面有使用的说明

曾经有人遇到过这个问题，估计是网络问题：http://www.fecshop.com/topic/641
