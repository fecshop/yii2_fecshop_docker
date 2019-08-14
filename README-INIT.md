fecmall init 执行的log详细
===============

```
root@21b9518c220b:/www/web/fecshop# ./init
bash: ./init: Permission denied
root@21b9518c220b:/www/web/fecshop# chmod 755 ./init
root@21b9518c220b:/www/web/fecshop# ./init
Yii Application Initialization Tool v1.0

Which environment do you want the application to be initialized in?

  [0] Development
  [1] Production

  Your choice [0-1, or "q" to quit] 0

  Initialize the application under 'Development' environment? [yes|no] yes

  Start initialization ...

   generate yii
   generate apphtml5/merge_config.php
   generate apphtml5/web/cn/index.php
   generate apphtml5/web/cn/sitemap.xml
   generate apphtml5/web/cn/robots.txt
   generate apphtml5/web/fr/index.php
   generate apphtml5/web/fr/sitemap.xml
   generate apphtml5/web/fr/robots.txt
   generate apphtml5/web/sitemap_es.xml
   generate apphtml5/web/index.php
   generate apphtml5/web/sitemap.xml
   generate apphtml5/web/index-test.php
   generate apphtml5/web/index-merge-config.php
   generate apphtml5/web/robots.txt
   generate apphtml5/config/main-local.php
   generate apphtml5/config/params-local.php
   generate appapi/merge_config.php
   generate appapi/web/index.php
   generate appapi/web/index-test.php
   generate appapi/web/index-merge-config.php
   generate appapi/config/main-local.php
   generate appapi/config/params-local.php
   generate console/config/main-local.php
   generate console/config/params-local.php
   generate appadmin/web/index.php
   generate appadmin/web/index-test.php
   generate appadmin/config/main-local.php
   generate appadmin/config/params-local.php
   generate appfront/merge_config.php
   generate appfront/web/cn/index.php
   generate appfront/web/cn/sitemap.xml
   generate appfront/web/cn/robots.txt
   generate appfront/web/fr/index.php
   generate appfront/web/fr/sitemap.xml
   generate appfront/web/fr/robots.txt
   generate appfront/web/sitemap_es.xml
   generate appfront/web/index.php
   generate appfront/web/sitemap.xml
   generate appfront/web/index-test.php
   generate appfront/web/index-merge-config.php
   generate appfront/web/robots.txt
   generate appfront/config/main-local.php
   generate appfront/config/params-local.php
   generate appserver/merge_config.php
   generate appserver/web/index.php
   generate appserver/web/index-test.php
   generate appserver/web/index-merge-config.php
   generate appserver/config/main-local.php
   generate appserver/config/params-local.php
   generate tests/codeception/config/config-local.php
   generate common/config/main-local.php
   generate common/config/params-local.php
   generate cookie validation key in appadmin/config/main-local.php
   generate cookie validation key in appapi/config/main-local.php
   generate cookie validation key in appfront/config/main-local.php
   generate cookie validation key in apphtml5/config/main-local.php
   generate cookie validation key in appserver/config/main-local.php
      chmod 0777 appadmin/runtime
      chmod 0777 appadmin/web/assets
      chmod 0777 appapi/runtime
      chmod 0777 appapi/web/assets
      chmod 0777 appfront/runtime
      chmod 0777 appfront/web/assets
      chmod 0777 appfront/web/cn/assets
      chmod 0777 appfront/web/fr/assets
      chmod 0777 appfront/web/sitemap.xml
      chmod 0777 appfront/web/sitemap_es.xml
      chmod 0777 appfront/web/fr/sitemap.xml
      chmod 0777 appfront/web/cn/sitemap.xml
      chmod 0777 apphtml5/runtime
      chmod 0777 apphtml5/web/assets
      chmod 0777 apphtml5/web/sitemap.xml
      chmod 0777 apphtml5/web/sitemap_es.xml
      chmod 0777 apphtml5/web/fr/sitemap.xml
      chmod 0777 apphtml5/web/cn/sitemap.xml
      chmod 0777 appserver/runtime
      chmod 0777 appserver/web/assets
      chmod 0777 appimage/common/media/catalog/product
      chmod 0755 yii
      chmod 0755 tests/codeception/bin/yii

  ... initialization completed.

root@21b9518c220b:/www/web/fecshop#
```