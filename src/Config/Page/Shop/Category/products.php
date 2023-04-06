<?php

namespace Be\Theme\Market\Config\Page\Shop\Category;


class products
{

    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Market.AppShopSideCategories',
        ],
        [
            'name' => 'Theme.Market.AppShopSideTopSalesProducts',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.AppShopCategoryPagedProducts',
        ],
    ];



}
