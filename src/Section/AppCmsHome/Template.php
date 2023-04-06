<?php

namespace Be\Theme\Market\Section\AppCmsHome;

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
            'isPushHome' => 1,
            'orderBy' => ['is_on_top', 'publish_time'],
            'orderByDir' => ['desc', 'desc'],
            'page' => $page,
        ];

        if ($this->config->pageSize > 0) {
            $params['pageSize'] = $this->config->pageSize;
        }

        $result = Be::getService('App.Cms.Article')->search('', $params);

        echo Be::getService('Theme.Market.CmsSection')->makePagedArticlesSection($this, 'app-cms-home', $result);
    }

}

