<?php

namespace Be\Theme\Market\Section\AppCmsSideSearchForm;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'west', 'center', 'east'];


    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-cms-side-search-form');
        echo $this->getCssPadding('app-cms-side-search-form');
        echo $this->getCssMargin('app-cms-side-search-form');

        echo '#' . $this->id . ' .app-cms-side-search-form-title {';
        echo 'background-color: var(--font-color-9);';
        echo 'padding: 1rem;';
        echo 'font-size: 1.25rem;';
        echo 'font-weight: bold;';
        echo '}';


        echo '#' . $this->id . ' .app-cms-side-search-form-body {';
        echo 'border: 1px solid var(--font-color-9);';
        echo 'padding: 1rem;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();


        echo '<div class="app-cms-side-search-form">';

        if ($this->config->title !== '') {
            echo '<div class="app-cms-side-search-form-title">';
            echo $this->config->title;
            echo '</div>';
        }

        echo '<div class="app-cms-side-search-form-body">';
        ?>
        <form action="<?php echo beUrl('Cms.Article.search'); ?>" method="get">
            <div class="be-row">
                <div class="be-col"><input type="text" name="keyword" class="be-input" placeholder="<?php echo beLang('App.Cms', 'ARTICLE.ENTRY_SEARCH_KEYWORDS'); ?>"></div>
                <div class="be-col-auto"><input type="submit" class="be-btn be-btn-major be-lh-175" value="<?php echo beLang('App.Cms', 'ARTICLE.SEARCH'); ?>"></div>
            </div>
        </form>
        <?php

        if ($this->config->keywords > 0) {
            $topKeywords = Be::getService('App.Cms.Article')->getTopSearchKeywords($this->config->keywords);
            if (count($topKeywords) > 0) {
                echo '<div class="be-mt-100 be-lh-175">' . beLang('App.Cms', 'ARTICLE.TOP_SEARCH') . ': ';
                foreach ($topKeywords as $topKeyword) {
                    echo '<a href="'. beUrl('Cms.Article.search', ['keyword' => $topKeyword]) .'">' . $topKeyword . '</a> &nbsp;';
                }
                echo '</div>';
            }
        }
        echo '</div>';

        echo '</div>';
    }
}
