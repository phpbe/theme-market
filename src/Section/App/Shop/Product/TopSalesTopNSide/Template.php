<?php

namespace Be\Theme\Market\Section\App\Shop\Product\TopSalesTopNSide;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'west', 'center', 'east'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $products = Be::getService('App.Shop.Product')->getTopSalesTopNProducts($this->config->quantity);
        if (count($products) === 0) {
            return;
        }

        $defaultMoreLink = beUrl('Shop.Product.topSales');
        echo Be::getService('Theme.Market.ShopSection')->makeSideProductsSection($this, 'app-shop-product-top-sales-top-n-side', $products, $defaultMoreLink);
    }

}

