<?php

namespace Be\Theme\Market\Section\App\Shop\Category\MenuSide;

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

        $this->css();

        echo '<div class="app-shop-category-menu-side">';

        if ($this->config->title !== '') {
            echo '<div class="app-shop-category-menu-side-title">';
            echo $this->config->title;
            echo '</div>';
        }

        echo '<ul>';
        $beUrl = beUrl();
        $categoryMenu = Be::getMenu('Category');
        $categoryMenuTree = $categoryMenu->getTree();
        foreach ($categoryMenuTree as $item) {
            $url = 'javascript:void(0);';
            if ($item->route) {
                if ($item->params) {
                    $url = beUrl($item->route, $item->params);
                } else {
                    $url = beUrl($item->route);
                }
            } else {
                if ($item->url) {
                    if ($item->url === '/') {
                        $url = $beUrl;
                    } else {
                        $url = $item->url;
                    }
                }
            }

            echo '<li><a href="' . $url . '">' . $item->label . '</a></li>';
        }
        echo '</ul>';

        echo '</div>';
    }

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-shop-category-menu-side');
        echo $this->getCssPadding('app-shop-category-menu-side');
        echo $this->getCssMargin('app-shop-category-menu-side');

        echo '#' . $this->id . ' .app-shop-category-menu-side-title {';
        echo 'background-color: var(--font-color-9);';
        echo 'padding: 1rem;';
        echo 'font-size: 1.25rem;';
        echo 'font-weight: bold;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-menu-side ul {';
        echo 'border: 1px solid var(--font-color-9);';
        echo 'margin: 0;';
        echo 'padding: 0;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-menu-side li {';
        echo 'list-style: none;';
        echo 'border-bottom: 1px solid var(--font-color-9);';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-menu-side li:last-child {';
        echo 'border-bottom: none;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-menu-side a {';
        echo 'display: block;';
        echo 'padding: 1rem;';
        echo '}';

        echo '</style>';
    }


}

