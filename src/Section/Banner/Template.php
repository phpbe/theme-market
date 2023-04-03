<?php

namespace Be\Theme\Market\Section\Banner;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['*'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('banner');
        echo $this->getCssMargin('banner');

        echo '#' . $this->id . '{';
        echo '}';

        echo '#' . $this->id . ' .banner {';
        echo '}';


        echo '#' . $this->id . ' .banner a {';
        echo 'display: block;';
        echo 'height: ' . $this->config->height . 'px;';
        echo 'background-image: url(' . $this->config->image . ');';
        echo 'background-position: center;';
        echo 'background-size: cover;';
        echo '}';

        if ($this->config->swing === 1) {
            echo '#' . $this->id . ' .banner a:hover {';
            echo 'animation: swingBanner 1s ease-in-out 1;';
            echo '}';
        }

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="banner">';

        if (in_array($this->position, ['north', 'middle', 'south']) && $this->config->width === 'default') {
            echo '<div class="be-container">';
        }

        echo '<a href="' . $this->config->link . '">&nbsp;</a>';

        if (in_array($this->position, ['north', 'middle', 'south']) && $this->config->width === 'default') {
            echo '</div>';
        }

        echo '</div>';
    }

}
