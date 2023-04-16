<?php

namespace Be\Theme\Market\Config\Page\Cms\Article;

use Be\Be;

class detail
{


    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Market.App.Cms.Article.SearchFormSide',
        ],
        [
            'name' => 'Theme.Market.App.Cms.Category.TopNSide',
        ],
        [
            'name' => 'Theme.Market.App.Cms.Article.TagsTopNSide',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.App.Cms.Article.Detail',
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
