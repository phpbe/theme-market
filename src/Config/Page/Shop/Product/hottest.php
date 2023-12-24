<?php

namespace Be\Theme\Market\Config\Page\Shop\Product;

/**
 * @BeConfig("热门商品")
 */
class hottest
{

    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Market.App.Shop.Category.MenuSide',
        ],
        [
            'name' => 'Theme.Market.App.Shop.Product.TopSalesTopNSide',
        ],
        [
            'name' => 'Theme.Market.App.Shop.Product.GuessYouLikeTopNSide',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.PageTitle',
        ],
        [
            'name' => 'Theme.Market.App.Shop.Product.Hottest',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Hottest Products';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = 'Hottest Products';

    /**
     * @BeConfigItem("Meta关键词",
     *     description="填写页面内容的关键词，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaKeywords = 'Hottest Products';

    /**
     * @BeConfigItem("页面标题",
     *     description="展示在页面内容中的标题，一般与HEAD头标题一致，两者相同时可不填写此项",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';


}
