<?php

namespace Be\Theme\Market\Section\App\Shop\Product\Search;

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

        $keywords = $request->get('keywords');
        $keywords = urldecode($keywords);

        $orderBy = $request->get('order_by', 'common');
        $orderByDir = $request->get('order_by_dir', 'desc');
        $page = $request->get('page', 1);
        if ($page > $this->config->maxPages) {
            $page = $this->config->maxPages;
        }
        $params = [
            'orderBy' => $orderBy,
            'orderByDir' => $orderByDir,
            'page' => $page,
        ];

        if ($this->config->pageSize > 0) {
            $params['pageSize'] = $this->config->pageSize;
        }

        $categoryId = $request->get('category_id', '');
        if ($categoryId) {
            $params['categoryId'] = $categoryId;
        }

        $result = Be::getService('App.Shop.Product')->search($keywords, $params);

        echo Be::getService('Theme.Market.ShopSection')->makePagedProductsSection($this, 'app-shop-search', $result);

    }

}

