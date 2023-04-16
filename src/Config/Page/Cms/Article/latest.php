<?php

namespace Be\Theme\Market\Config\Page\Cms\Article;


class latest
{

    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Market.App.Cms.Article.SearchFormSide',
        ],
        [
            'name' => 'Theme.Market.App.Cms.Category.TopNSide',
        ],
        [
            'name' => 'Theme.Market.App.Cms.Article.TagsTopNSide',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.App.Cms.Articles.Latest',
        ],
    ];



}
