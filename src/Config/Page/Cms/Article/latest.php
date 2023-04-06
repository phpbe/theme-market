<?php

namespace Be\Theme\Market\Config\Page\Cms\Article;


class latest
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
            'name' => 'Theme.Market.AppCmsLatestArticles',
        ],
    ];



}
