<?php

namespace Be\Theme\Market\Section\AppCmsSideCategories;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'west', 'center', 'east'];


    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-cms-side-categories');
        echo $this->getCssPadding('app-cms-side-categories');
        echo $this->getCssMargin('app-cms-side-categories');

        echo '#' . $this->id . ' .app-cms-side-categories-title {';
        echo 'background-color: var(--font-color-9);';
        echo 'padding: 1rem;';
        echo 'font-size: 1.25rem;';
        echo 'font-weight: bold;';
        echo '}';

        echo '#' . $this->id . ' .app-cms-side-categories ul {';
        echo 'border: 1px solid var(--font-color-9);';
        echo 'margin: 0;';
        echo 'padding: 0;';
        echo '}';

        echo '#' . $this->id . ' .app-cms-side-categories li {';
        echo 'list-style: none;';
        echo 'border-bottom: 1px solid var(--font-color-9);';
        echo '}';

        echo '#' . $this->id . ' .app-cms-side-categories li:last-child {';
        echo 'border-bottom: none;';
        echo '}';

        echo '#' . $this->id . ' .app-cms-side-categories a {';
        echo 'display: block;';
        echo 'padding: 1rem;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $categories = Be::getService('App.Cms.Category')->getCategories($this->config->quantity);
        if (count($categories) === 0) {
            return;
        }

        $this->css();

        echo '<div class="app-cms-side-categories">';

        if ($this->config->title !== '') {
            echo '<div class="app-cms-side-categories-title">';
            echo $this->config->title;
            echo '</div>';
        }

        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>';
            echo '<a href="'. beUrl('Cms.Category.articles', ['id' => $category->id]) .'">' . $category->name . '</a>';
            echo '</li>';
        }
        echo '</ul>';

        echo '</div>';
    }
}
