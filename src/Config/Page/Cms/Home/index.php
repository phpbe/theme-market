<?php

namespace Be\Theme\Market\Config\Page\Cms\Home;

use Be\Be;

class index
{

    public int $west = 0;
    public int $center = 66;
    public int $east = 34;

    public array $northSections = [
        [
            'name' => 'Theme.Market.Header',
        ],
        [
            'name' => 'Theme.Market.HeaderTitle',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.AppCmsArticles',
        ],
    ];

    public array $eastSections = [
        [
            'name' => 'Theme.Market.AppCmsSearch',
        ],
        [
            'name' => 'Theme.Market.AppCmsLatest',
        ],
        [
            'name' => 'Theme.Market.AppCmsTags',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Our Blog';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = 'Our Blog';

    /**
     * @BeConfigItem("Meta关键词",
     *     description="填写页面内容的关键词，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaKeywords = 'Our Blog';

    /**
     * @BeConfigItem("页面标题",
     *     description="展示在页面内容中的标题，一般与HEAD头标题一致，两者相同时可不填写此项",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';


    public function __construct()
    {
        $wwwUrl = Be::getProperty('Theme.Market')->getWwwUrl();

        $this->northSections[1]['config'] = (object)[
            'enable' => 1,
            'backgroundColor' => '#02121E',
            'backgroundImage' => $wwwUrl . '/images/header-title/bg-4.jpg',
            'paddingMobile' => '8rem 0 6rem 0',
            'paddingTablet' => '10rem 0 8rem 0',
            'paddingDesktop' => '12rem 0 10rem 0',
            'marginMobile' => '0',
            'marginTablet' => '0',
            'marginDesktop' => '0',
        ];
    }

}
