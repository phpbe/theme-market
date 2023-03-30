<?php

namespace Be\Theme\Market\Section\Slider;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('slider');
        echo $this->getCssMargin('slider');

        if ($this->config->pagination) {
            echo '.swiper-pagination .swiper-pagination-bullet {';
            echo 'width: 12px;';
            echo 'height: 12px;';
            echo 'margin: 0 20px;';
            echo 'border-radius: 10px;';
            echo 'background-color: #fff;';
            echo 'opacity: 1;';
            echo 'transition: all .3s;';
            echo '}';

            echo '.swiper-pagination .swiper-pagination-bullet-active {';
            echo 'width: 30px;';
            echo 'background-color: var(--major-color);';
            echo 'opacity: 1;';
            echo '}';
        }


        if ($this->config->navigation) {
            echo '.swiper-button-prev, ';
            echo '.swiper-button-next {';
            echo 'color: #fff;';
            echo 'width: ' . ($this->config->navigationSize / 44 * 27) . 'px;';
            echo 'height: ' . $this->config->navigationSize . 'px;';
            echo 'margin-top: -' . ($this->config->navigationSize / 2) . 'px;';
            echo 'opacity: .1;';
            echo 'transition: opacity 0.3s ease;';
            echo '}';

            echo '.swiper-container:hover .swiper-button-prev, ';
            echo '.swiper-container:hover .swiper-button-next {';
            echo 'opacity: 1;';
            echo '}';

            echo '.swiper-button-prev:after, ';
            echo '.swiper-button-next:after {';
            echo 'font-size: ' . $this->config->navigationSize . ';';
            echo '}';
        }

        echo '.slider-image {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo 'height: calc(75vh - 80px);';
        echo 'background-position: center;';
        echo 'background-size: cover;';
        echo '}';

        echo '.slider-video video {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo 'height: calc(75vh - 80px);';
        echo 'object-fit: cover;';
        echo '}';


        echo '.slider-image-with-text-overlay-container {';
        echo 'position: relative;';
        echo 'overflow: hidden;';
        echo '}';

        echo '.slider-image-with-text-overlay-content-container {';
        echo 'position: absolute;';
        echo 'padding-left: 0.75rem;';
        echo 'padding-right: 0.75rem;';
        echo 'width: 100%;';
        echo 'z-index; 2;';
        echo 'top: 0;';
        echo 'bottom: 0;';
        echo '}';
        echo '@media (max-width: 768px) {';
        echo '.slider-image-with-text-overlay-content-container {';
        echo '}';
        echo '}';
        echo '@media (min-width: 768px) {';
        echo '.slider-image-with-text-overlay-content-container {';
        echo 'max-width: 720px;';
        echo 'left: calc((100% - 720px) / 2);';
        echo '}';
        echo '}';
        echo '@media (min-width: 992px) {';
        echo '.slider-image-with-text-overlay-content-container {';
        echo 'max-width: 960px;';
        echo 'left: calc((100% - 960px) / 2);';
        echo '}';
        echo '}';
        echo '@media (min-width: 1200px) {';
        echo '.slider-image-with-text-overlay-content-container {';
        echo 'max-width: 1140px;';
        echo 'left: calc((100% - 1140px) / 2);';
        echo '}';
        echo '}';
        echo '@media (min-width: 1400px) {';
        echo '.slider-image-with-text-overlay-content-container {';
        echo 'max-width: 1320px;';
        echo 'left: calc((100% - 1320px) / 2);';
        echo '}';
        echo '}';

        echo '.slider-image-with-text-overlay-content {';
        echo 'position: absolute;';
        echo '}';

        echo '.slider-image-with-text-overlay-title {';
        echo 'text-align: center;';
        echo 'margin-bottom: 10px;';
        echo 'font-family: "Rajdhani";';
        echo '}';

        echo '.slider-image-with-text-overlay-description {';
        echo 'text-align: center;';
        echo 'margin-bottom: 35px;';
        echo '}';

        echo '.slider-image-with-text-overlay-button {';
        echo 'text-align: center;';
        echo '}';

        echo '.slider-image-with-text-overlay-button .be-btn {';
        echo 'background-color: transparent;';
        echo 'font-family: "Rajdhani";';
        echo '}';

        echo '.slider-image-with-text-overlay-button .be-btn:hover {';
        echo 'color: #333 !important;';
        echo '}';


        // 电脑端
        echo '@media (max-width: 768px) {';

        echo '.slider-image,';
        echo '.slider-video video {';
        echo 'height: 500px;';
        echo 'max-height: calc(75vh - 80px);';
        echo '}';

        echo '}';

        echo '</style>';
    }

    public function display()
    {
        if ($this->config->enable) {
            $count = 0;
            foreach ($this->config->items as $item) {
                if ($item['config']->enable) {
                    $count++;
                }
            }

            if ($count === 0) {
                return;
            }

            $this->css();

            echo '<div class="slider">';
            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '<div class="be-container">';
            }

            echo '<div class="swiper">';

            echo '<div class="swiper-wrapper">';
            foreach ($this->config->items as $item) {
                $itemConfig = $item['config'];
                if ($itemConfig->enable) {
                    echo '<div class="swiper-slide">';
                    switch ($item['name']) {
                        case 'Image':
                            echo '<div class="slider-image" style="background-image: url('.$itemConfig->image.')">';
                            echo '</div>';
                            break;
                        case 'ImageWithTextOverlay':

                            echo '<div class="slider-image-with-text-overlay">';
                            echo '<div class="slider-image-with-text-overlay-container">';

                            echo '<div class="slider-image-with-text-overlay-image">';
                            if (!$itemConfig->image) {
                                echo '<div class="no-image">1200X400px+</div>';
                            } else {
                                echo '<img src="' . $itemConfig->image . '">';
                            }
                            echo '</div>';
                            echo '<div class="slider-image-with-text-overlay-image-mobile">';
                            if (!$itemConfig->imageMobile) {
                                echo '<div class="no-image">720X400px+</div>';
                            } else {
                                echo '<img src="' . $itemConfig->imageMobile . '">';
                            }
                            echo '</div>';

                            echo '<div class="slider-image-with-text-overlay-content-container">';
                            echo '<div class="slider-image-with-text-overlay-content" style="';
                            echo 'width: ' . $itemConfig->contentWidth . 'px;';
                            if ($itemConfig->contentPosition === 'custom') {
                                if ($itemConfig->contentPositionLeft >= 0) {
                                    echo 'left: ' . $itemConfig->contentPositionLeft . 'px;';
                                }
                                if ($itemConfig->contentPositionRight >= 0) {
                                    echo 'right: ' . $itemConfig->contentPositionRight . 'px;';
                                }
                                if ($itemConfig->contentPositionTop >= 0) {
                                    echo 'top: ' . $itemConfig->contentPositionTop . 'px;';
                                }
                                if ($itemConfig->contentPositionBottom >= 0) {
                                    echo 'bottom: ' . $itemConfig->contentPositionBottom . 'px;';
                                }
                            } else {
                                echo 'top: 50%;';
                                echo 'transform: translateY(-50%);';
                                if ($itemConfig->contentPosition === 'left') {
                                    echo 'left: 5%;';
                                } elseif ($itemConfig->contentPosition === 'center') {
                                    echo 'left: 50%;';
                                    echo 'transform: translateX(-50%);';
                                } elseif ($itemConfig->contentPosition === 'right') {
                                    echo 'right: 5%;';
                                }
                            }
                            echo '">';
                            echo '<h2 class="slider-image-with-text-overlay-title" style="color: ' . $itemConfig->contentTitleColor . ';font-size: ' . $itemConfig->contentTitleFontSize . 'px;">' . $itemConfig->contentTitle . '</h2>';
                            echo '<div class="slider-image-with-text-overlay-description" style="color: ' . $itemConfig->contentDescriptionColor . ';font-size: ' . $itemConfig->contentDescriptionFontSize . 'px;">' . $itemConfig->contentDescription . '</div>';
                            echo '<div class="slider-image-with-text-overlay-button">';
                            echo '<a href="' . $itemConfig->contentButtonLink . '" class="be-btn be-btn-large" style="color: ' . $itemConfig->contentButtonColor . ';border-color: ' . $itemConfig->contentButtonColor . ';" onMouseOver="this.style.backgroundColor=\'' . $itemConfig->contentButtonColor . '\'" onMouseOut="this.style.backgroundColor=\'transparent\'">' . $itemConfig->contentButton . '</a>';
                            echo '</div>';

                            echo '</div>';
                            echo '</div>';

                            echo '</div>';
                            echo '</div>';

                            break;
                        case 'Video':
                            echo '<div class="slider-video">';
                            echo '<video loop="loop" autoplay="autoplay" muted="muted">';
                            echo '<source src="' . $itemConfig->video . '" type="video/mp4">';
                            echo '</video>';
                            echo '</div>';
                            break;
                    }
                    echo '</div>';
                }
            }
            echo '</div>';

            if ($this->config->pagination && $count > 1) {
                echo '<div class="swiper-pagination"></div>';
            }

            if ($this->config->navigation && $count > 1) {
                echo '<div class="swiper-button-prev"></div>';
                echo '<div class="swiper-button-next"></div>';
            }

            echo '</div>';

            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '</div>';
            }
            echo '</div>';

            $key = 'Theme:Market:swiper';
            if (!Be::hasContext($key)) {
                $wwwUrl = Be::getProperty('Theme.Market')->getWwwUrl();
                echo '<link rel="stylesheet" href="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.css">';
                echo '<script src="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.js"></script>';
            }

            echo '<script>';
            echo '$(".header").addClass("header-float");';

            echo 'new Swiper(".slider .swiper", {';

            echo 'effect: \'' . $this->config->effect . '\',';

            if ($count > 1) {
                if ($this->config->loop) {
                    echo 'loop: true,';
                }

                if ($this->config->autoplay) {
                    echo 'autoplay: true,';
                    echo 'delay: ' . $this->config->delay . ',';
                    echo 'speed: ' . $this->config->speed . ',';
                }

                if ($this->config->pagination) {
                    echo 'pagination: {el: \'.swiper-pagination\', clickable :true},';
                }

                if ($this->config->navigation) {
                    echo 'navigation: {nextEl: \'.swiper-button-next\', prevEl: \'.swiper-button-prev\'},';
                }
                echo 'grabCursor : true';
            } else {
                echo 'enabled:false';
            }
            echo '});';
            echo '</script>';
        }
    }
}
