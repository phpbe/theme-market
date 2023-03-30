<?php

namespace Be\Theme\Market\Config\Page\Company\Team;

use Be\Be;

class index
{

    public int $middle = 1;

    public array $middleSections = [
        [
            'name' => 'Theme.Market.Team',
        ],
        [
            'name' => 'Theme.Market.Banner',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Our Team';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = 'There are people who can’t start their day without having a freshly brewed cup of coffee and we understand them.';

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

        $this->middleSections[1]['config'] = [
            'enable' => 1,
            'backgroundColor' => '#FFF8F1',
            'backgroundImage' => $wwwUrl . '/images/join-us-bg.png',
            'title' => 'Want to join our team?',
            'description' => 'There are people who can’t start their day without having a freshly brewed cup of coffee and we understand them.',
            'buttonText' => 'JOIN NOW',
            'buttonUrl' => '#',
            'paddingMobile' => '4rem',
            'paddingTablet' => '5rem',
            'paddingDesktop' => '6rem',
            'marginMobile' => '0 0 6rem 0',
            'marginTablet' => '0 0 6rem 0',
            'marginDesktop' => '0 0 6rem 0',
        ];
    }

}
