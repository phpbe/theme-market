<?php

namespace Be\Theme\Market\Section\Banners;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['*'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('banners');
        echo $this->getCssMargin('banners');
        echo $this->getCssSpacing('banners-items', 'banners-item', '100%', '50%', '50%');

        echo '#' . $this->id . ' .banners-item a {';
        echo 'display: block;';
        echo '}';

        if ($this->config->swing === 1) {
            echo '#' . $this->id . ' .banners-item a:hover {';
            echo 'animation: swingBanner 1s ease-in-out 1;';
            echo '}';
        }

        echo '#' . $this->id . ' .banners-item img {';
        echo 'width: 100%;';
        echo '}';
        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="banners">';
        if (in_array($this->position, ['north', 'middle', 'south']) && $this->config->width === 'default') {
            echo '<div class="be-container">';
        }

        echo '<div class="banners-items">';

        foreach ($this->config->items as $item) {
            $itemConfig = $item['config'];
            if ($itemConfig->enable) {
                echo '<div class="banners-item">';
                switch ($item['name']) {
                    case 'Banner':
                        echo '<a href="' . $itemConfig->link . '">';
                        echo '<img src="' . $itemConfig->image . '">';
                        echo '</a>';
                        break;
                }
                echo '</div>';
            }
        }

        echo '</div>';

        if (in_array($this->position, ['north', 'middle', 'south']) && $this->config->width === 'default') {
            echo '</div>';
        }
        echo '</div>';
    }

}
