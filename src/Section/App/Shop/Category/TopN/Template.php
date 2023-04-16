<?php

namespace Be\Theme\Market\Section\App\Shop\Category\TopN;

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

        $categories = Be::getService('App.Shop.Category')->getCategories($this->config->quantity);
        if (count($categories) === 0) {
            return;
        }

        $this->css();

        echo '<div class="app-shop-category-top-n">';
        if ($this->position === 'middle' && $this->config->width === 'default') {
            echo '<div class="be-container">';
        }

        if ($this->config->title !== '') {
            echo '<div class="app-shop-category-top-n-title">';
            echo '<h3 class="be-h3">' . $this->config->title . '</h3>';
            echo '</div>';
        }


        $isMobile = \Be\Be::getRequest()->isMobile();

        echo '<div class="app-shop-category-top-n-items">';
        foreach ($categories as $category) {

            if ($category->image === '') {
                $category->image = Be::getProperty('App.Shop')->getWwwUrl() . '/images/category/no-image.jpg';
            }

            echo '<div class="app-shop-category-top-n-item">';

            echo '<div class="be-ta-center app-shop-category-top-n-item-image">';
            echo '<a href="' . beUrl('Shop.Category.products', ['id' => $category->id]) . '"';
            if (!$isMobile) {
                echo ' target="_blank"';
            }
            echo '>';

            echo '<img src="' . $category->image . '" alt="' . htmlspecialchars($category->name) . '">';

            echo '</a>';
            echo '</div>';


            echo '<div class="be-mt-100 be-ta-center">';
            echo '<a class="be-d-block be-t-ellipsis" href="' . beUrl('Shop.Category.products', ['id' => $category->id]) . '"';
            if (!$isMobile) {
                echo ' target="_blank"';
            }
            echo '>';
            echo $category->name;
            echo '</a>';
            echo '</div>';


            echo '</div>';
        }
        echo '</div>';

        if ($this->position === 'middle' && $this->config->width === 'default') {
            echo '</div>';
        }
        echo '</div>';
    }

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-shop-category-top-n');
        echo $this->getCssPadding('app-shop-category-top-n');
        echo $this->getCssMargin('app-shop-category-top-n');

        echo '#' . $this->id . '{';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n {';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-title {';
        echo 'margin-bottom: 2rem;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-title h3 {';
        echo 'border-bottom: 2px solid #eee;';
        echo 'text-align: center;';
        echo 'position: relative;';
        echo 'padding-bottom: 1rem;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-title h3:before {';
        echo 'position: absolute;';
        echo 'content: "";';
        echo 'left: 50%;';
        echo 'bottom: -2px;';
        echo 'width: 100px;';
        echo 'height: 2px;';
        echo 'margin-left: -50px;';
        echo 'background-color: var(--major-color);';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-items {';
        echo 'display: flex;';
        echo 'flex-wrap: wrap;';
        //echo 'overflow: hidden;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item {';
        echo 'flex: 0 1 auto;';
        //echo 'overflow: hidden;';
        echo 'min-width:0;';
        echo '}';

        // ------------------------------------------------------------------------------------------------------------- 手机端
        echo '@media (max-width: 320px) {';
        echo '#' . $this->id . ' .app-shop-category-top-n-items {';
        echo 'margin-bottom: -' . $this->config->spacingMobile . ';';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item {';
        echo 'width: 100%;';
        echo 'margin-bottom: ' . $this->config->spacingMobile . ';';
        echo '}';
        echo '}';

        echo '@media (min-width: 320px) {';

        echo '#' . $this->id . ' .app-shop-category-top-n-items {';
        echo 'margin-left: calc(-' . $this->config->spacingMobile . ' / 2);';
        echo 'margin-right: calc(-' . $this->config->spacingMobile . ' / 2);';
        echo 'margin-bottom: -' . $this->config->spacingMobile . ';';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item {';
        echo 'width: 50%;';
        echo 'padding-left: calc(' . $this->config->spacingMobile . ' / 2);';
        echo 'padding-right: calc(' . $this->config->spacingMobile . ' / 2);';
        echo 'margin-bottom: ' . $this->config->spacingMobile . ';';
        echo '}';

        echo '}';
        // ============================================================================================================= 手机端


        // ------------------------------------------------------------------------------------------------------------- 平析端
        echo '@media (min-width: 768px) {';

        echo '#' . $this->id . ' .app-shop-category-top-n-items {';
        echo 'margin-left: calc(-' . $this->config->spacingTablet . ' / 2);';
        echo 'margin-right: calc(-' . $this->config->spacingTablet . ' / 2);';
        echo 'margin-bottom: -' . $this->config->spacingTablet . ';';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item {';
        echo 'width: 33.3333333%;';
        echo 'padding-left: calc(' . $this->config->spacingTablet . ' / 2);';
        echo 'padding-right: calc(' . $this->config->spacingTablet . ' / 2);';
        echo 'margin-bottom: ' . $this->config->spacingTablet . ';';
        echo '}';

        echo '}';
        // ============================================================================================================= 平析端


        // ------------------------------------------------------------------------------------------------------------- 电脑端
        echo '@media (min-width: 992px) {';

        echo '#' . $this->id . ' .app-shop-category-top-n-items {';
        echo 'margin-left: calc(-' . $this->config->spacingDesktop . ' / 2);';
        echo 'margin-right: calc(-' . $this->config->spacingDesktop . ' / 2);';
        echo 'margin-bottom: -' . $this->config->spacingDesktop . ';';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item {';
        echo 'width: 25%;';
        echo 'padding-left: calc(' . $this->config->spacingDesktop . ' / 2);';
        echo 'padding-right: calc(' . $this->config->spacingDesktop . ' / 2);';
        echo 'margin-bottom: ' . $this->config->spacingDesktop . ';';
        echo '}';

        echo '}';
        // ============================================================================================================= 电脑端


        echo '#' . $this->id . ' .app-shop-category-top-n-item-image a {';
        echo 'display: block;';
        echo 'overflow:hidden;';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-item-image img {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo 'transition: all .3s;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item-image img:hover  {';
        echo 'transform: scale(1.05);';
        echo '}';

        echo '</style>';
    }


}

