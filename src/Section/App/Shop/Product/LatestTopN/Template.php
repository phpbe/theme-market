<?php

namespace Be\Theme\Market\Section\App\Shop\Product\LatestTopN;

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

        $products = Be::getService('App.Shop.Product')->getLatestProducts($this->config->quantity);
        if (count($products) === 0) {
            return;
        }

        $defaultMoreLink = beUrl('Shop.Product.latest');
        echo Be::getService('Theme.Market.ShopSection')->makeProductsSection($this, 'app-shop-product-latest-top-n', $products, $defaultMoreLink);
    }

}

