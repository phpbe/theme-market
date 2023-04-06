<?php

namespace Be\Theme\Market\Config\Page\Cms\Home;


class index
{

    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Market.AppCmsSideSearchForm',
        ],
        [
            'name' => 'Theme.Market.AppCmsSideCategories',
        ],
        [
            'name' => 'Theme.Market.AppCmsSideTopTags',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.AppCmsHome',
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

}
