<?php

namespace Be\Theme\Market\Section\App\Shop\Category\Products;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $request = Be::getRequest();
        $response = Be::getResponse();

        $page = $request->get('page', 1);
        if ($page > $this->config->maxPages) {
            $page = $this->config->maxPages;
        }
        $params = [
            'categoryId' => $this->page->categoryId,
            'orderBy' => 'publish_time',
            'orderByDir' => 'desc',
            'page' => $page,
        ];

        if ($this->config->pageSize > 0) {
            $params['pageSize'] = $this->config->pageSize;
        }

        $result = Be::getService('App.Shop.Product')->search('', $params);

        echo Be::getService('Theme.Market.ShopSection')->makePagedProductsSection($this, 'app-shop-category-products', $result);

    }

}

