<?php
   return [
   'store' => [
        'class'  => 'fecshop\services\Store',
        'stores' => [
            // store key：域名去掉http部分，作为key，这个必须这样定义。
            'apphtml5.fecshop.com' => [
                'language'         => 'en_US',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                'languageName'     => 'English',    // 语言简码对应的文字名称，将会出现在语言切换列表中显示。
                'localThemeDir'    => '@apphtml5/theme/terry/theme01', // 设置当前store对应的模板路径。关于多模板的方面的知识，您可以参看fecshop多模板的知识。
                'thirdThemeDir'    => [],  // 第三方模板路径，数组，可以多个路径
                'currency'         => 'USD', // 当前store的默认货币,这个货币简码，必须在货币配置中配置

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
                // 用于sitemap生成中域名。
                'https'            => false,
                // sitemap的路径。
                'sitemapDir' => '@apphtml5/web/sitemap.xml',
            ],
            'apphtml5.fecshop.com/fr' => [
                'language'         => 'fr_FR',
                'languageName'     => 'Fran?ais',
                'localThemeDir'    => '@apphtml5/theme/terry/theme01',
                'thirdThemeDir'    => [],
                'currency'         => 'RMB',
                'mobile'           => [
                    'enable'               => false,
                    'condition'            => ['phone'], // phone 代表手机，tablet代表平板。
                    'redirectDomain'       => 'fecshop.apphtml5.fancyecommerce.com/fr', // 跳转后的url。
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
                'sitemapDir' => '@apphtml5/web/fr/sitemap.xml',
            ],
            'apphtml5.fecshop.es' => [
                'language'         => 'es_ES',
                'languageName'     => 'Espa?ol',
                'localThemeDir'    => '@apphtml5/theme/terry/theme01',
                'thirdThemeDir'    => [],
                'currency'         => 'USD',
                'mobile'           => [
                    'enable'            => false,
                    'condition'         => ['tablet'],
                    'redirectDomain'    => 'fecshop.apphtml5.es.fancyecommerce.com',
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
                'sitemapDir' => '@apphtml5/web/sitemap_es.xml',
            ],
            'apphtml5.fecshop.com/cn' => [
                'language'         => 'zh_CN',
                'languageName'     => '中文',
                'localThemeDir'    => '@apphtml5/theme/terry/theme01',
                'thirdThemeDir'    => [],
                'currency'         => 'CNY',
                'mobile'           => [
                    'enable'            => false,
                    'condition'         => ['phone', 'tablet'],
                    'redirectDomain'    => 'fecshop.apphtml5.fancyecommerce.com/cn',
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
                'sitemapDir' => '@apphtml5/web/cn/sitemap.xml',
            ],
        ],

    ],

];
