<?php

namespace Be\Theme\Market\Config\Page\Cms\Article;

use Be\Be;

class detail
{

    public int $west = 0;
    public int $center = 66;
    public int $east = 34;

    public array $northSections = [
        [
            'name' => 'Theme.Market.Header',
        ],
        [
            'name' => 'Theme.Market.AppCmsArticleDetailHeader',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.AppCmsArticleDetail',
        ],
    ];

    public array $eastSections = [
        [
            'name' => 'Theme.Market.AppCmsLatest',
        ],
        [
            'name' => 'Theme.Market.AppCmsTags',
        ],
    ];

    public function __construct()
    {
        $northMenu = Be::getMenu('North');
        $menuActiveId = null;
        foreach ($northMenu->getItems() as $item) {
            if (substr($item->route, 0, 11) === 'Cms.Article') {
                $menuActiveId = $item->id;
                break;
            }
        }

        if ($menuActiveId !== null) {
            $northMenu->setActiveId($menuActiveId);
        }
    }

}
