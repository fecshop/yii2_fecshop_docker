<?php
   return [
   'store' => [
        'class'  => 'fecshop\services\Store',
        'stores' => [
            // store key：域名去掉http部分，作为key，这个必须这样定义。
            'appserver.fecshop.com' => [
                'language'         => 'en_US',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                'languageName'     => 'English',    // 语言简码对应的文字名称，将会出现在语言切换列表中显示。
                'currency'         => 'USD', // 当前store的默认货币,这个货币简码，必须在货币配置中配置
                
                // 用于sitemap生成中域名。
                'https'            => false,
                
                'serverLangs'   => [
                    
                    [
                        'code'             => 'fr',
                        'language'         => 'fr_FR',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                        'languageName'     => 'Fran?ais',
                    ],
                    [
                        'code'             => 'en',
                        'language'         => 'en_US',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                        'languageName'     => 'English',
                    ],
                    [
                        'code'             => 'es',
                        'language'         => 'es_ES',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                        'languageName'     => 'Espa?ol',
                    ],
                    [
                        'code'             => 'zh',
                        'language'         => 'zh_CN',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                        'languageName'     => '中文',
                    ],
                ],
                
                // 第三方账号登录配置
                'thirdLogin' => [
                    // facebook账号登录
                    'facebook' => [       //fb api配置 ，fb可以一个app设置pc和手机web两个域名
                        'facebook_app_id'     => '108618299786621',
                        'facebook_app_secret' => '420b56da4f4664a4d1065a1d31e5ec73',
                    ],
                    // google账号登录
                    'google' => [       //谷歌api visit https://code.google.com/apis/console to generate your google api
                        'CLIENT_ID'      => '380372364773-qdj1seag9bh2n0pgrhcv2r5uoc58ltp3.apps.googleusercontent.com',
                        'CLIENT_SECRET'  => 'ei8RaoCDoAlIeh1nHYm0rrwO',
                    ],
                ],
                
            ],
            
        ],

    ],

];
