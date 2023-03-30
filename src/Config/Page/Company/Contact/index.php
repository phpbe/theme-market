<?php

namespace Be\Theme\Market\Config\Page\Company\Contact;

use Be\Be;

class index
{

    public array $northSections = [
        [
            'name' => 'Theme.Market.Header',
        ],
        [
            'name' => 'Theme.Market.HeaderTitle',
        ],
    ];


    public int $middle = 1;

    public array $middleSections = [
        [
            'name' => 'Theme.Market.AppCompanyContact',
        ],
        [
            'name' => 'Theme.Market.Banner',
        ],
        [
            'name' => 'Theme.Market.AppCompanyContactMap',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Contact us';

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
    public string $metaKeywords = 'Our Team';

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
            'backgroundImage' => $wwwUrl . '/images/header-title/bg-5.jpg',
            'paddingMobile' => '8rem 0 6rem 0',
            'paddingTablet' => '10rem 0 8rem 0',
            'paddingDesktop' => '12rem 0 10rem 0',
            'marginMobile' => '0',
            'marginTablet' => '0',
            'marginDesktop' => '0',
        ];
    }

}
