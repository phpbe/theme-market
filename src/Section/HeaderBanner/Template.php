<?php

namespace Be\Theme\Market\Section\HeaderBanner;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['north'];

    private function css()
    {
        echo '<style type="text/css">';

        echo '#' . $this->id . '{';
        echo '}';

        echo '#' . $this->id . ' .header-banner {';
        echo '}';


        echo '#' . $this->id . ' .header-banner a {';
        echo 'display: block;';
        echo 'height: ' . $this->config->height . 'px;';
        echo 'background-image: url(' . $this->config->image . ');';
        echo 'background-position: center;';
        echo 'background-size: cover;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="header-banner">';
        echo '<a href="' . $this->config->link . '">&nbsp;</a>';
        echo '</div>';
    }

}
