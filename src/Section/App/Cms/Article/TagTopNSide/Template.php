<?php

namespace Be\Theme\Market\Section\App\Cms\Article\TagTopNSide;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['west', 'east'];


    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-cms-article-tag-top-n-side');
        echo $this->getCssPadding('app-cms-article-tag-top-n-side');
        echo $this->getCssMargin('app-cms-article-tag-top-n-side');

        echo '#' . $this->id . ' .app-cms-article-tag-top-n-side-title {';
        echo 'background-color: var(--font-color-9);';
        echo 'padding: 1rem;';
        echo 'font-size: 1.25rem;';
        echo 'font-weight: bold;';
        echo '}';

        echo '#' . $this->id . ' .app-cms-article-tag-top-n-side-body {';
        echo 'border: 1px solid var(--font-color-9);';
        echo 'padding: 1rem;';
        echo 'line-height: 2.5rem;';
        echo '}';

        echo '#' . $this->id . ' .app-cms-article-tag-top-n-side .tag {';
        echo 'color: #fff;';
        echo 'background-color: var(--major-color);';
        echo 'padding: .5rem 1rem;';
        echo 'border-radius: .3rem;';
        echo 'overflow:hidden;';
        echo 'white-space:nowrap;';
        echo 'word-break:keep-all;';
        echo '}';


        echo '#' . $this->id . ' .app-cms-article-tag-top-n-side .tag:hover {';
        echo 'color: #fff;';
        echo 'background-color: var(--major-color2);';
        echo '}';
        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $topTags = Be::getService('App.Cms.Article')->getTopTags($this->config->quantity);
        if (count($topTags) === 0) {
            //return;
        }

        $this->css();

        echo '<div class="app-cms-article-tag-top-n-side">';

        if ($this->config->title !== '') {
            echo '<div class="app-cms-article-tag-top-n-side-title">';
            echo $this->config->title;
            echo '</div>';
        }

        echo '<div class="app-cms-article-tag-top-n-side-body">';
        foreach ($topTags as $topTag) {
            echo '<a class="tag" href="'. beUrl('Cms.Article.tag', ['tag' => $topTag]) .'">' . $topTag . '</a> ';
        }
        echo '</div>';

        echo '</div>';

    }
}

