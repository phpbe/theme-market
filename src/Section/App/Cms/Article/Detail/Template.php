<?php

namespace Be\Theme\Market\Section\App\Cms\Article\Detail;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    public array $routes = ['Cms.Article.detail', 'Cms.Article.preview'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        echo '<style type="text/css">';
        echo $this->getCssPadding('app-cms-article-detail');
        echo $this->getCssMargin('app-cms-article-detail');

        echo '#' . $this->id . ' .app-cms-article-detail img {';
        echo 'max-width: 100%;';
        echo '}';

        echo '</style>';

        echo '<div class="app-cms-article-detail">';
        if ($this->position === 'middle' && $this->config->width === 'default') {
            echo '<div class="be-container">';
        }


        $noImage = \Be\Be::getProperty('App.Cms')->getWwwUrl() . '/images/article/no-image.jpg';
        echo '<img src="';
        if ($this->page->article->image === '') {
            echo $noImage;
        } else {
            echo $this->page->article->image;
        }
        echo '" alt="';
        echo $this->page->article->title;
        echo '">';


        echo '<h1 class="be-mt-100 be-h2">';
        echo $this->page->article->title;
        echo '</h1>';

        ?>
        <div class="be-mt-100 be-c-font-6">
            <span class="be-ml-100"><?php echo beLang('App.Cms', 'ARTICLE.PUBLISH_TIME') . ': '. date(beLang('App.Cms', 'ARTICLE.PUBLISH_TIME_YYYY_MM_DD'), strtotime($this->page->article->publish_time)); ?></span>
            <span class="be-ml-100"><?php echo beLang('App.Cms', 'ARTICLE.HITS') . ': '. $this->page->article->hits; ?></span>
        </div>


        <div class="be-mt-200 be-lh-200 be-fs-110">
            <?php
            $hasImg = strpos($this->page->article->description, '<img ');
            if ($hasImg !== false) {
                preg_match_all("/<img.*?src=\"(.*?)\".*?[\/]?>/", $this->page->article->description, $matches);
                $i = 0;
                foreach ($matches[0] as $image) {

                    $src = $matches[1][$i];

                    $alt = '';
                    if (preg_match("/alt=\"(.*?)\"/", $image, $match)) {
                        $alt = $match[1];
                    }

                    $replace = '<a href="'.$src.'" data-lightbox="article-images" data-title="'.$alt.'">' . $image . '</a>';

                    $this->page->article->description = str_replace($image, $replace, $this->page->article->description);
                    $i++;
                }
            }

            echo $this->page->article->description;
            ?>
        </div>

        <div class="be-mt-200 be-bt-eee be-pt-50">
            <?php
            foreach ($this->page->article->tags as $tag) {
                ?>
                <a class="be-mt-50 be-mr-50 be-btn be-btn-major be-btn-sm" href="<?php echo beUrl('Cms.Article.tag', ['tag'=> $tag]); ?>" title="<?php echo $tag; ?>">
                    #<?php echo $tag; ?>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
        if ($this->position === 'middle' && $this->config->width === 'default') {
            echo '</div>';
        }
        echo '</div>';

        $wwwUrl = \Be\Be::getProperty('App.Cms')->getWwwUrl();

        if (strpos($this->page->article->description, '<img ') !== false) {
            ?>
            <link rel="stylesheet" href="<?php echo $wwwUrl; ?>/lib/lightbox/2.11.3/css/lightbox.min.css">
            <script src="<?php echo $wwwUrl; ?>/lib/lightbox/2.11.3/js/lightbox.min.js"></script>
            <script>
                lightbox.option({
                    albumLabel: "%1 / %2"
                })
            </script>
            <?php
        }
    }

}

