<?php

namespace Be\Theme\Market\Config\Page\System\Home;

class index
{

    public int $middle = 1;

    public array $middleSections = [
        [
            'name' => 'Theme.Market.Slider',
        ],
        [
            'name' => 'Theme.Market.Banner',
        ],
        [
            'name' => 'Theme.Market.AppShopTopSalesProducts',
        ],
        [
            'name' => 'Theme.Market.AppShopCategories',
        ],
        [
            'name' => 'Theme.Market.Banners',
        ],
        [
            'name' => 'Theme.Market.AppShopLatestProducts',
        ],
        [
            'name' => 'Theme.Market.Banner',
        ],
        [
            'name' => 'Theme.Market.AppCmsLatestArticles',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Home';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = '';

    /**
     * @BeConfigItem("Meta关键词",
     *     description="填写页面内容的关键词，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaKeywords = '';

    /**
     * @BeConfigItem("页面标题",
     *     description="展示在页面内容中的标题，一般与HEAD头标题一致，两者相同时可不填写此项",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();

        $this->middleSections[1]['config'] = (object)[
            'enable' => 1,
            'width' => 'default',
            'image' => $wwwUrl . '/images/banner/2.jpg',
            'height' => 100,
            'link' => '#',
            'swing' => 1,
            'paddingMobile' => '0',
            'paddingTablet' => '0',
            'paddingDesktop' => '0',
            'marginMobile' => '1rem 0 0 0',
            'marginTablet' => '2rem 0 0 0',
            'marginDesktop' => '3rem 0 0 0',
        ];

        $this->middleSections[4]['config'] = (object)[
            'enable' => 1,
            'width' => 'default',
            'link' => '#',
            'swing' => 1,
            'paddingMobile' => '0',
            'paddingTablet' => '0',
            'paddingDesktop' => '0',
            'marginMobile' => '1rem 0 0 0',
            'marginTablet' => '2rem 0 0 0',
            'marginDesktop' => '3rem 0 0 0',
            'spacingMobile' => '1rem',
            'spacingTablet' => '1.5rem',
            'spacingDesktop' => '2rem',
            'items' => [
                [
                    'name' => 'Banner',
                    'config' =>  (object)[
                        'enable' => 1,
                        'image' => $wwwUrl . '/images/banners/1-1.jpg',
                        'link' => '#',
                    ],
                ],
                [
                    'name' => 'Banner',
                    'config' =>  (object)[
                        'enable' => 1,
                        'image' => $wwwUrl . '/images/banners/1-2.jpg',
                        'link' => '#',
                    ],
                ],
            ],
        ];


        $this->middleSections[6]['config'] = (object)[
            'enable' => 1,
            'width' => 'default',
            'image' => $wwwUrl . '/images/banner/3.jpg',
            'height' => 160,
            'link' => '#',
            'swing' => 1,
            'paddingMobile' => '0',
            'paddingTablet' => '0',
            'paddingDesktop' => '0',
            'marginMobile' => '1rem 0 0 0',
            'marginTablet' => '2rem 0 0 0',
            'marginDesktop' => '3rem 0 0 0',
        ];

    }

}
