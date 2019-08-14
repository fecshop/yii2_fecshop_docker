其他部分资料
===========


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