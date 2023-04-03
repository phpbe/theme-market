<?php

namespace Be\Theme\Market\Section\AppCmsLatestProducts;

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
            $products = Be::getService('App.Shop.Product')->getSampleProducts($this->config->quantity);
        }

        $defaultMoreLink = beUrl('Shop.Product.latest');
        echo Be::getService('Theme.Market.ShopSection')->makeProductsSection($this, 'app-shop-latest-products', $products, $defaultMoreLink);
    }

}

