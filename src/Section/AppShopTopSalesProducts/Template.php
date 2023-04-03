<?php

namespace Be\Theme\Market\Section\AppShopTopSalesProducts;

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

        $products = Be::getService('App.Shop.Product')->getTopSalesProducts($this->config->quantity);
        if (count($products) === 0) {
            $products = Be::getService('App.Shop.Product')->getSampleProducts($this->config->quantity);
        }

        $defaultMoreLink = beUrl('Shop.Product.topSales');
        echo Be::getService('Theme.Market.ShopSection')->makeProductsSection($this, 'app-shop-top-sales-products', $products, $defaultMoreLink);
    }

}

