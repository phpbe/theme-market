<?php

namespace Be\App\Shop\Config\Page\Product;

class detail
{

    public int $west = 0;
    public int $center = 100;
    public int $east = 0;

    public array $centerSections = [
        [
            'name' => 'Theme.Market.AppShopProductDetailSummary',
        ],
        [
            'name' => 'Theme.Market.AppShopProductDetailDescription',
        ],
        [
            'name' => 'Theme.Market.AppShopProductDetailReviews',
        ],
    ];

}
