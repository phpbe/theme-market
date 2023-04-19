<?php

namespace Be\Theme\Market\Section\App\Shop\Category\SubMenuSide;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $routes = ['Shop.Category.products'];

    public array $positions = ['west', 'east'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $categoryId = \Be\Be::getRequest()->get('id', '');
        if ($categoryId === '') {
            return;
        }

        $menuItem = false;
        $subMenuItems = [];
        $categoryMenu = Be::getMenu('Category');
        $categoryMenuTree = $categoryMenu->getTree();
        foreach ($categoryMenuTree as $item) {
            if (($item->route === 'Shop.Category.products' && isset($item->params['id'])) && $categoryId === $item->params['id']) {
                $menuItem = $item;
                if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                    $subMenuItems = $item->subItems;
                }
                break;
            }
        }

        $this->css();

        echo '<div class="app-shop-category-sub-menu-side">';

        if ($this->config->title === '') {
            $title = $menuItem->label;
        } else {
            $title = $this->config->title;
        }

        echo '<div class="app-shop-category-sub-menu-side-title">';
        echo $title;
        echo '</div>';

        echo '<ul>';
        $beUrl = beUrl();
        foreach ($subMenuItems as $item) {
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
        echo $this->getCssBackgroundColor('app-shop-category-sub-menu-side');
        echo $this->getCssPadding('app-shop-category-sub-menu-side');
        echo $this->getCssMargin('app-shop-category-sub-menu-side');

        echo '#' . $this->id . ' .app-shop-category-sub-menu-side-title {';
        echo 'background-color: var(--font-color-9);';
        echo 'padding: 1rem;';
        echo 'font-size: 1.25rem;';
        echo 'font-weight: bold;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-sub-menu-side ul {';
        echo 'border: 1px solid var(--font-color-9);';
        echo 'margin: 0;';
        echo 'padding: 0;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-sub-menu-side li {';
        echo 'list-style: none;';
        echo 'border-bottom: 1px solid var(--font-color-9);';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-sub-menu-side li:last-child {';
        echo 'border-bottom: none;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-sub-menu-side a {';
        echo 'display: block;';
        echo 'padding: 1rem;';
        echo '}';

        echo '</style>';
    }


}

