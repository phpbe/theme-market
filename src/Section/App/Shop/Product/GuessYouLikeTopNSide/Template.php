<?php

namespace Be\Theme\Market\Section\App\Shop\Product\GuessYouLikeTopNSide;

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

        $products = Be::getService('App.Shop.Product')->getGuessYouLikeTopNProducts($this->config->quantity);
        if (count($products) === 0) {
            return;
        }

        $defaultMoreLink = beUrl('Shop.Product.guessYouLike');
        echo Be::getService('Theme.Market.ShopSection')->makeSideProductsSection($this, 'app-shop-product-guess-you-like-top-n-side', $products, $defaultMoreLink);
    }

}

