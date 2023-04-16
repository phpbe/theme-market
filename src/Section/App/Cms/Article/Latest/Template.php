<?php

namespace Be\Theme\Market\Section\App\Cms\Article\Latest;

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

        $request = Be::getRequest();

        $page = $request->get('page', 1);
        $params = [
            'orderBy' => 'publish_time',
            'orderByDir' => 'desc',
            'page' => $page,
        ];

        if ($this->config->pageSize > 0) {
            $params['pageSize'] = $this->config->pageSize;
        }

        $result = Be::getService('App.Cms.Article')->search('', $params);

        echo Be::getService('Theme.Market.CmsSection')->makePagedArticlesSection($this, 'app-cms-article-latest', $result);
    }

}

