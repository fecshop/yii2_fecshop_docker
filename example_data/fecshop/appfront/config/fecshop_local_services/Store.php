<?php
   return [
   'store' => [
        'class'  => 'fecshop\services\Store',
        'stores' => [
            // store key：域名去掉http部分，作为key，这个必须这样定义。
            'appfront.fecshop.com' => [
                'language'         => 'en_US',        // 语言简码需要在@common/config/fecshop_local_services/FecshopLang.php 中定义。
                'languageName'     => 'English',    // 语言简码对应的文字名称，将会出现在语言切换列表中显示。
                'localThemeDir'    => '@appfront/theme/terry/theme01', // 设置当前store对应的模板路径。关于多模板的方面的知识，您可以参看fecshop多模板的知识。
                'thirdThemeDir'    => [],  // 第三方模板路径，数组，可以多个路径
                'currency'         => 'USD', // 当前store的默认货币,这个货币简码，必须在货币配置中配置
                /*
                 * 当设备满足什么条件的时候，进行跳转。
                 * 这种方式不怎么高效，最好的方式是在nginx中配置。
                 */
                'mobile'        => [
                    'enable'            => false,
                    'condition'         => ['phone', 'tablet'], // phone 代表手机，tablet代表平板，当都填写，代表手机和平板都会进行跳转
                    'redirectDomain'    => 'fecshop.apphtml5.fancyecommerce.com',    // 如果是移动设备访问进行域名跳转，这里填写的值为store key
                    'https'             => false,  // 手机端url是否支持https,如果支持，设置https为true，如果不支持，设置为false
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
                // 用于sitemap生成中域名。
                'https'            => true,
                // sitemap的路径。
                'sitemapDir' => '@appfront/web/sitemap.xml',
            ],
            'appfront.fecshop.com/fr' => [
                'language'         => 'fr_FR',
                'languageName'     => 'Fran?ais',
                'localThemeDir'    => '@appfront/theme/terry/theme01',
                'thirdThemeDir'    => [],
                'currency'         => 'RMB',
                'mobile'           => [
                    'enable'               => false,
                    'condition'            => ['phone'], // phone 代表手机，tablet代表平板。
                    'redirectDomain'       => 'fecshop.apphtml5.fancyecommerce.com/fr', // 跳转后的url。
                    'https'             => false,  // 手机端url是否支持https,如果支持，设置https为true，如果不支持，设置为false
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
                'sitemapDir' => '@appfront/web/fr/sitemap.xml',
            ],
            'appfront.fecshop.es' => [
                'language'         => 'es_ES',
                'languageName'     => 'Espa?ol',
                'localThemeDir'    => '@appfront/theme/terry/theme01',
                'thirdThemeDir'    => [],
                'currency'         => 'USD',
                'mobile'           => [
                    'enable'            => false,
                    'condition'         => ['tablet'],
                    'redirectDomain'    => 'fecshop.apphtml5.es.fancyecommerce.com',
                    'https'             => false,  // 手机端url是否支持https,如果支持，设置https为true，如果不支持，设置为false
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
                'sitemapDir' => '@appfront/web/sitemap_es.xml',
            ],
            'appfront.fecshop.com/cn' => [
                'language'         => 'zh_CN',
                'languageName'     => '中文',
                'localThemeDir'    => '@appfront/theme/terry/theme01',
                'thirdThemeDir'    => [],
                'currency'         => 'CNY',
                'mobile'           => [
                    'enable'            => false,
                    'condition'         => ['phone', 'tablet'],
                    'redirectDomain'    => 'fecshop.apphtml5.fancyecommerce.com/cn',
                    'https'             => false,  // 手机端url是否支持https,如果支持，设置https为true，如果不支持，设置为false
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
                'sitemapDir' => '@appfront/web/cn/sitemap.xml',
            ],
        ],

    ],

];
