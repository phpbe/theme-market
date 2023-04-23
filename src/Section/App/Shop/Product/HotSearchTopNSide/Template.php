<?php

namespace Be\Theme\Market\Section\App\Shop\Product\HotSearchTopNSide;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['west', 'east'];
    
    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $products = Be::getService('App.Shop.Product')->getHotSearchTopNProducts($this->config->quantity);
        if (count($products) === 0) {
            return;
        }

        $defaultMoreLink = beUrl('Shop.Product.hotSearch');
        echo Be::getService('Theme.Market.ShopSection')->makeSideProductsSection($this, 'app-shop-product-hot-search-top-n-side', $products, $defaultMoreLink);
    }

}

