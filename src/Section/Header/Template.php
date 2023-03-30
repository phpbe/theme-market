<?php

namespace Be\Theme\Market\Section\Header;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['north'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('header');

        echo '#' . $this->id . ' .header {';
        echo 'position: relative;';
        echo 'z-index: 10;';
        echo '}';


        // ------------------------------------------------------------------------------------------------------------- LOGO
        echo '#' . $this->id . ' .header-logo  {';
        echo 'display: inline-block;';
        echo '}';

        echo '#' . $this->id . ' .header-logo img {';
        echo 'vertical-align: middle;';
        echo 'width: ' . $this->config->mobileLogoWidth . 'px;';
        echo '}';

        // 电脑端
        echo '@media (min-width: 768px) {';
        echo '#' . $this->id . ' .header-logo img {';
        echo 'width: ' . $this->config->logoWidth . 'px;';
        echo '}';
        echo '}';
        // ============================================================================================================= LOGO


        // ------------------------------------------------------------------------------------------------------------- 搜索表单
        echo '#' . $this->id . ' .header-form {';
        echo '}';

        echo '#' . $this->id . ' .header-form .be-select {';
        echo 'border: 0;';
        echo 'border-top-right-radius: 0;';
        echo 'border-bottom-right-radius: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-form .be-input {';
        echo 'border: 0;';
        echo 'border-radius: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-form .be-btn {';
        echo 'border: 0;';
        echo 'border-top-left-radius: 0;';
        echo 'border-bottom-left-radius: 0;';
        echo '}';
        // ============================================================================================================= 搜索表单


        // ------------------------------------------------------------------------------------------------------------- 分类菜单
        echo '#' . $this->id . ' .header-all-categories-menu {';
        echo 'width: 250px;';
        echo 'position: relative;';
        echo '}';


        echo '#' . $this->id . ' .header-all-categories {';
        echo 'height: 3rem;';
        echo 'line-height: 3rem;';
        echo 'background-color: #131313;';
        echo 'color: #fff;';
        echo 'border-radius: .25rem;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul {';
        echo 'box-shadow: 0 1px 2px 2px #efefef;';
        echo 'position: absolute;';
        echo 'top: 3rem;';
        echo 'min-width: 250px;';
        echo 'background-color: #fff;';
        echo 'opacity: 0;';
        echo 'transition: all 0.5s ease;';
        echo 'transform-origin: 0 0;';
        echo 'transform: rotateX(-90deg);';
        echo 'padding: .25rem 0 !important;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-menu:hover .header-all-categories-ul {';
        echo 'opacity: 1;';
        echo 'transform: rotateX(0);';
        echo 'padding: 0;';
        echo 'margin: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul li {';
        echo 'list-style: none;';
        echo 'padding: 0 1.5rem;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul a {';
        echo 'display: block;';
        echo 'color: var(--font-color);';
        echo 'padding: 1rem 0;';
        echo 'line-height: 1;';
        echo 'border-bottom: #eee 1px solid;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul a span {';
        echo 'padding-left: 5px;';
        echo 'transition: all 0.3s ease;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul a:hover span {';
        echo 'color: var(--major-color);';
        echo 'padding-left: 15px;';
        echo '}';
        // ============================================================================================================= 分类菜单


        // ------------------------------------------------------------------------------------------------------------- 菜单
        echo '#' . $this->id . ' .header-menu {';
        echo 'margin-left: 2rem;';
        echo '}';

        echo '#' . $this->id . ' .header-menu ul {';
        echo 'padding: 0;';
        echo 'margin: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-menu li {';
        echo 'list-style: none;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-ul {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-li {';
        echo 'display: inline-block;';
        echo 'padding: 0;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-a {';
        echo 'height: 3rem;';
        echo 'line-height: 3rem;';
        echo 'padding: 0 1rem;';
        echo 'color: #fff;';
        echo 'font-weight: 700;';
        echo '}';


        echo '#' . $this->id . ' .header-menu-lv1-li-active .header-menu-lv1-a,';
        echo '#' . $this->id . ' .header-menu-lv1-a:hover {';
        echo 'color: var(--major-color);';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-ul {';
        echo 'box-shadow: 0 0 5px #999;';
        echo 'position: absolute;';
        echo 'top: 3rem;';
        echo 'min-width: 180px;';
        echo 'background-color: #fff;';
        echo 'opacity: 0;';
        echo 'transition: all 0.5s ease;';
        echo 'transform-origin: 0 0;';
        echo 'transform: rotateX(-90deg);';
        echo 'padding: .25rem 0 !important;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-li:hover .header-menu-lv2-ul {';
        echo 'opacity: 1;';
        echo 'transform: rotateX(0)';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-li {';
        echo 'padding: 0 1.5rem;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-a {';
        echo 'display: block;';
        echo 'color: var(--font-color);';
        echo 'padding: 1rem 0;';
        echo 'line-height: 1;';
        echo 'border-bottom: #eee 1px solid;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-li-active header-menu-lv2-a, ';
        echo '#' . $this->id . ' .header-menu-lv2-a:hover {';
        echo 'color: var(--major-color);';
        echo '}';
        // ============================================================================================================= 菜单


        // ------------------------------------------------------------------------------------------------------------- 手机商 菜单按钮
        echo '.header-toggle {';
        echo 'display: block;';
        echo 'height: 5rem;';
        echo 'line-height: 5rem;';
        echo 'color: #fff;';
        echo 'cursor: pointer;';
        echo '}';

        echo '.header-toggle-icon,';
        echo '.header-toggle-icon:before,';
        echo '.header-toggle-icon:after {';
        echo 'display: inline-block;';
        echo 'width: 28px;';
        echo 'height: 2px;';
        echo 'background-color: #fff;';
        echo 'transition: all 0.3s ease;';
        echo '}';

        echo '.header-toggle-icon {';
        echo 'position: relative;';
        echo '}';

        echo '.header-toggle-icon:before,';
        echo '.header-toggle-icon:after {';
        echo 'position: absolute;';
        echo 'left: 0;';
        echo 'content: \'\';';
        echo '}';

        echo '.header-toggle-icon:before {';
        echo 'top: -8px;';
        echo '}';

        echo '.header-toggle-icon:after {';
        echo 'top: 8px;';
        echo '}';

        echo '.js-open-drawer-menu .header-toggle-icon {';
        echo 'background-color: transparent;';
        echo '}';

        echo '.js-open-drawer-menu .header-toggle-icon:before {';
        echo 'top: 0;';
        echo 'transform: rotate3d(0, 0, 1, 45deg);';
        echo '}';

        echo '.js-open-drawer-menu .header-toggle-icon:after {';
        echo 'top: 0;';
        echo 'transform: rotate3d(0, 0, 1, -45deg);';
        echo '}';
        // ============================================================================================================= 手机商 菜单按钮


        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $categories = Be::getService('App.Shop.Category')->getCategories();

        $beUrl = beUrl();

        $this->css();

        echo '<div class="header">';
        echo '<div class="be-container">';


        echo '<div class="be-py-200">';
        echo '<div class="be-row">';

        echo '<div class="be-col-24 be-md-col-0">';

        echo '<div class="be-row">';
        echo '<div class="be-col-auto">';
        echo '<div class="header-toggle" onclick="toggleDrawerMenu();">';
        echo '<i class="header-toggle-icon"></i>';
        echo '</div>';
        echo '</div>';
        echo '<div class="be-col be-ta-center">';
        echo '<a href="' . $beUrl . '" class="header-logo"><img src="' . $this->config->logo . '" alt=""></a>';
        echo '</div>';
        echo '<div class="be-col-auto">';
        echo '<div class="cart-toggle be-fs-200 be-c-fff be-mt-50" onclick="toggleDrawerMenu();">';
        echo '<i class="bi-cart4"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '<div class="be-col-0 be-md-col-auto">';
        echo '<a href="' . $beUrl . '" class="header-logo"><img src="' . $this->config->logo . '" alt=""></a>';
        echo '</div>';

        echo '<div class="be-col-24 be-md-col">';

        // ------------------------------------------------------------------------------------------------------------- 搜索框
        echo '<div class="be-row be-mt-50">';
        echo '<div class="be-col-0 be-md-col-2 be-lg-col-4">';
        echo '</div>';
        echo '<div class="be-col-24 be-md-col-20 be-lg-col-16">';
        echo '<form class="header-form" method="get" action="' . beUrl('Shop.Product.search') . '">';
        echo '<div class="be-row">';
        echo '<div class="be-col-0 be-lg-col-auto">';
        echo '<select name="category_id" class="be-select">';
        foreach ($categories as $category) {
            echo '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
        echo '</select>';
        echo '</div>';
        echo '<div class="be-col">';
        echo '<input type="text" class="be-input" name="keywords" value="' . Be::getRequest()->get('keywords', '') . '">';
        echo '</div>';
        echo '<div class="be-col-auto">';
        echo '<button type="submit" class="be-btn be-lh-175"><i class="bi-search"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '<div class="be-col-0 be-md-col-2 be-lg-col-4">';
        echo '</div>';
        echo '</div>';
        // ============================================================================================================= 搜索框


        echo '</div>';


        echo '<div class="be-col-0 be-md-col-auto">';
        echo '<div class="cart-toggle be-fs-200 be-c-fff be-mt-50" onclick="toggleDrawerMenu();">';
        echo '<i class="bi-cart4"></i>';
        echo '</div>';
        echo '</div>';

        echo '</div>'; // be-row
        echo '</div>';


        echo '<div class="be-d-none be-md-d-block">';
        echo '<div class="be-row">';
        echo '<div class="be-col-auto">';


        echo '<div class="header-all-categories-menu">';

        echo '<div class="be-row header-all-categories">';
        echo '<div class="be-col-auto"><i class="bi-list-ul be-ml-100"></i></div>';
        echo '<div class="be-col"><span class="be-px-50">ALL CATEGORIES</span></div>';
        echo '<div class="be-col-auto"><i class="bi-caret-down-fill be-mr-100"></i></div>';
        echo '</div>';

        echo '<ul class="header-all-categories-ul">';
        foreach ($categories as $category) {
            echo '<li><a href="' . beUrl('Shop.Category.products', ['id' => $category->id]) . '"><i class="bi-record-fill"></i><span>' . $category->name . '</span></a></li>';
        }
        echo '</ul>';
        echo '</div>';


        echo '</div>';
        echo '<div class="be-col">';
        echo '<div class="header-menu">';
        echo '<ul class="header-menu-lv1-ul">';
        $menu = \Be\Be::getMenu('North');
        $menuTree = $menu->getTree();
        $menuActiveId = $menu->getActiveId();
        foreach ($menuTree as $item) {
            $hasSubItem = false;
            if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                $hasSubItem = true;
            }

            echo '<li class="header-menu-lv1-li';
            if ($item->active === 1) {
                echo ' header-menu-lv1-li-active';
            }
            echo '">';

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

            echo '<a class="header-menu-lv1-a" href="' . $url . '"';
            if ($item->target === '_blank') {
                echo ' target="_blank"';
            }
            echo '>' . $item->label;
            if ($hasSubItem) {
                echo ' <i class="bi-chevron-down"></i>';
            }
            echo '</a>';


            if ($hasSubItem) {
                echo '<ul class="header-menu-lv2-ul">';
                foreach ($item->subItems as $subItem) {
                    echo '<li class="header-menu-lv2-li';
                    if (isset($subItem->active) && $subItem->active) {
                        echo ' header-menu-lv2-li-active';
                    }
                    echo '">';

                    $url = 'javascript:void(0);';
                    if ($subItem->route) {
                        if ($subItem->params) {
                            $url = beUrl($subItem->route, $subItem->params);
                        } else {
                            $url = beUrl($subItem->route);
                        }
                    } else {
                        if ($subItem->url) {
                            if ($subItem->url === '/') {
                                $url = $beUrl;
                            } else {
                                $url = $subItem->url;
                            }
                        }
                    }

                    echo '<a class="header-menu-lv2-a" href="' . $url . '"';
                    if ($subItem->target === '_blank') {
                        echo ' target="_blank"';
                    }
                    echo '>' . $subItem->label . '</a>';

                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>'; // header-menu

        echo '</div>';

        if ($this->config->specialOfferText !== '') {
            echo '<div class="be-col-auto">';
            echo '<a href="' . $this->config->specialOfferLink . '" class="be-btn be-btn-red be-btn-round be-btn-sm">';
            echo '<i class="bi-gift"></i>';
            echo '<span class="be-pl-50">' . $this->config->specialOfferText . '</span>';
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';


        echo '</div>';
        echo '</div>';
    }

}
