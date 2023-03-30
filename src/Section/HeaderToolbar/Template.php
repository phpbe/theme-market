<?php

namespace Be\Theme\Market\Section\HeaderToolbar;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['north'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('header-toolbar');

        echo '#' . $this->id . '{';
        echo '}';

        echo '#' . $this->id . ' .header-toolbar {';
        echo 'height: ' . $this->config->height . 'px;';
        echo 'line-height: ' . $this->config->height . 'px;';
        if ($this->config->color !== '') {
            echo 'color: ' . $this->config->color . ';';
        }
        echo 'font-size: .9rem;';
        echo '}';

        echo '#' . $this->id . ' .header-toolbar a {';
        echo 'margin-left: 1rem;';
        if ($this->config->color !== '') {
            echo 'color: ' . $this->config->color . ';';
        }
        echo '}';

        if ($this->config->color !== '') {
            echo '#' . $this->id . ' .header-toolbar a:hover {';
            echo 'color: var(--major-color);';
            echo '}';
        }

        echo '#' . $this->id . ' .header-toolbar i {';
        echo 'margin-right: .2rem;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="header-toolbar">';
        echo '<div class="be-container">';
        echo '<div class="be-row">';
        echo '<div class="be-col">';
        echo '</div>';

        echo '<div class="be-col-0 be-lg-col-auto">';
        echo $this->config->welcome;
        echo '</div>';

        echo '<div class="be-col-0 be-lg-col-auto">';
        echo '<a href="'. beUrl('Shop.UserCenter.dashboard') .'"><i class="bi-person-fill"></i> My Account</a>';
        echo '</div>';
        echo '<div class="be-col-0 be-lg-col-auto">';
        echo '<a href="'. beUrl('Shop.UserFavorite.favorites') .'"><i class="bi-suit-heart-fill"></i> My Wishlist</a>';
        echo '</div>';
        echo '<div class="be-col-0 be-lg-col-auto">';
        echo '<a href="'. beUrl('Shop.Cart.index') .'"><i class="bi-cart-check-fill"></i> Checkout</a>';
        echo '</div>';
        echo '<div class="be-col-auto">';
        echo '<a href="'. beUrl('Shop.User.login') .'"><i class="bi-lock-fill"></i> Login</a>';
        echo '</div>';


        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

}
