Fecshop Docker 文件结构
=============



`./app`: 这里是代码文件，fecshop的代码文件放到这里（打开后发现里面没有文件，这是因为fecshop的文件是需要composer安装后才会有的，因此，严格按照下面的操作步骤执行就好）,在后面又有安装步骤，进入php容器后，使用composer安装fecshop后，文件就在 ./app/fecshop文件下面

`./db`: 这里是环境部分-数据库部分

`./db/mongodb`: 这里是mongodb数据库的部分

`./db/mongodb/data`: 这里是数据库的数据存放的部分，也就是数据库的库表部分数据。

`./db/mongodb/example_db`: fecshop的mongodb示例数据

`./db/mongodb/etc/mongod.conf`: Mongodb数据库的配置文件


`./db/mongodb/logs`: Mongodb的logs部分


`./db/mysql`: mysql数据库

`./db/mysql/data`: mysql 数据库表数据存放的位置

`./db/mysql/example_db`: fecshop的mysql示例数据

`./db/mysql/conf.d`: mysql 配置文件

`./db/redis`: redis数据库

`./db/redis/data`: redis数据库的存储部分

`./db/redis/etc/redis.conf`: redis数据库的配置部分

`./db/redis/etc/redis-password`: redis数据库的密码文件

`./db/xunsearch`: xunsearch搜索引擎部分

`./db/xunsearch/data`: xunsearch搜索引擎的数据存储部分

`./example_data`: fecshop的示例数据部分


`./services`: 服务软件部分，譬如php nginx等

`./services/php`: php部分

`./services/php/docker/Dockerfile`: php镜像构建的dockerfile文件

`./services/php/etc/php7.1.13.ini`: php的配置文件

`./services/web`: nginx部分

`./services/web/nginx/conf`: nginx的配置部分

`./services/web/nginx/conf/conf.d/default.conf`：nginx 网站 server 部分的配置文件

`./services/web/nginx/logs`: nginx的log日志文件部分

`./docker-compose.yml`: docker compose配置文件


