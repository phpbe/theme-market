<?php

namespace Be\Theme\Market\Section\Footer;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['south'];

    public function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('footer');

        echo '#' . $this->id . ' .footer {';
        echo '}';

        echo '#' . $this->id . ' .footer a {';
        echo 'color: var(--font-color);';
        echo '}';

        echo '#' . $this->id . ' .footer a:hover{';
        echo 'color: var(--major-color);';
        echo '}';

        echo '#' . $this->id . ' .footer-item {';
        echo 'margin-top: 2rem;';
        echo '}';

        // 电脑端
        echo '@media (min-width: 1200px) {';
        echo '#' . $this->id . ' .footer-items {';
        echo 'display: flex;';
        echo 'justify-content: space-between;';
        echo '}';

        $cols = 0;
        if (isset($this->config->items) && is_array($this->config->items) && count($this->config->items) > 0) {
            foreach ($this->config->items as $item) {
                $itemConfig = $item['config'];
                if (!$itemConfig->enable) {
                    continue;
                }

                switch ($item['name']) {
                    case 'Menu':
                        $cols += $itemConfig->quantity;
                        break;
                    default:
                        $cols++;
                        break;
                }
            }
        }
        echo '#' . $this->id . ' .footer-item {';
        echo 'width: calc((100% - 4rem) / ' . $cols . ');';
        echo '}';
        echo '}';

        echo '#' . $this->id . ' .footer-item-title {';
        echo 'font-size: 1.5rem;';
        echo 'position: relative;';
        echo 'margin: 0;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-title::after {';
        echo 'display: block;';
        echo 'background-color: var(--major-color);';
        echo 'content: \'\';';
        echo 'position: absolute;';
        echo 'width: 60px;';
        echo 'height: 2px;';
        echo 'left: 0;';
        echo 'bottom: -12px;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-description {';
        echo 'color: #ACB1B4;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-logo {';
        echo '}';

        echo '#' . $this->id . ' .footer-item-logo img {';
        echo 'max-width: 180px;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-menu a {';
        //echo 'color: #fff;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-menu a:hover {';
        echo 'color: var(--major-color);';
        echo '}';

        echo '#' . $this->id . ' .footer-item-menu-item {';
        echo 'margin-top: 1rem';
        echo '}';



        echo '#' . $this->id . ' .footer-item-social-icons .be-btn {';
        echo 'padding: .375rem .75rem;';
        echo 'color: #fff;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-social-icons .be-btn {';
        echo 'padding: .375rem .75rem;';
        echo 'color: #fff;';
        echo 'margin-right: 1rem;';
        echo '}';

        echo '#' . $this->id . ' .footer-item-social-icons .be-btn:hover {';
        echo 'background-color: #fff;';
        echo 'color: var(--major-color);';
        echo 'transform: scale(1.1);';
        echo '}';

        echo '#' . $this->id . ' .footer-copyright {';
        echo 'padding: 1rem 0;';
        echo 'margin-top: 3rem;';
        echo 'text-align: right;';
        echo 'border-top: #ddd 1px solid;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="footer">';
        echo '<div class="be-container">';

        echo '<div class="footer-items">';
        $this->items();
        echo '</div>';

        echo '<div class="footer-copyright">' .$this->config->copyright . '</div>';

        echo '</div>';
        echo '</div>';
    }


    private function items()
    {
        if (isset($this->config->items) && is_array($this->config->items) && count($this->config->items) > 0) {
            foreach ($this->config->items as $item) {
                $itemConfig = $item['config'];
                if (!$itemConfig->enable) {
                    continue;
                }

                switch ($item['name']) {

                    case 'Contact':
                        echo '<div class="footer-item">';

                        echo '<div class="footer-item-logo">';
                        echo '<img src="' . $itemConfig->logo . '">';
                        echo '</div>';

                        if ($itemConfig->description !== '') {
                            echo '<div class="be-mt-200 footer-item-description">' . $itemConfig->description . '</div>';
                        }

                        echo '<div class="be-mt-150">';
                        if ($itemConfig->address !== '') {
                            echo '<div class="be-row be-mt-100">';
                            echo '<div class="be-col-auto be-c-major"><i class="bi-geo-alt-fill"></i></div>';
                            echo '<div class="be-col"><div class="be-pl-50">' . $itemConfig->address . '</div></div>';
                            echo '</div>';
                        }

                        if ($itemConfig->email !== '') {
                            echo '<div class="be-row be-mt-100">';
                            echo '<div class="be-col-auto be-c-major"><i class="bi-envelope-fill"></i></div>';
                            echo '<div class="be-col"><div class="be-pl-50">' . $itemConfig->email . '</div></div>';
                            echo '</div>';
                        }

                        if ($itemConfig->phone !== '') {
                            echo '<div class="be-row be-mt-100">';
                            echo '<div class="be-col-auto be-c-major"><i class="bi-telephone-fill"></i></div>';
                            echo '<div class="be-col"><div class="be-pl-50">' . $itemConfig->phone . '</div></div>';
                            echo '</div>';
                        }

                        if ($itemConfig->workingHours !== '') {
                            echo '<div class="be-row be-mt-100">';
                            echo '<div class="be-col-auto be-c-major"><i class="bi-clock-fill"></i></div>';
                            echo '<div class="be-col"><div class="be-pl-50">' . $itemConfig->workingHours . '</div></div>';
                            echo '</div>';
                        }


                        echo '</div>';

                        echo '</div>';
                        break;
                    case 'Menu':
                        $menu = \Be\Be::getMenu('South');
                        $menuTree = $menu->getTree();

                        $i = 0;
                        foreach ($menuTree as $menuItem) {
                            if (!isset($menuItem->subItems) || !is_array($menuItem->subItems) || count($menuItem->subItems) === 0) {
                                continue;
                            }

                            echo '<div class="footer-item">';

                            echo '<h3 class="footer-item-title">' . $menuItem->label . '</h3>';

                            echo '<div class="be-mt-200">';
                            echo '<div class="footer-item-menu">';
                            foreach ($menuItem->subItems as $subMenuItem) {
                                $url = 'javascript:void(0);';
                                if ($subMenuItem->route) {
                                    $url = beUrl($subMenuItem->route, $subMenuItem->params);
                                } else {
                                    if ($subMenuItem->url) {
                                        $url = $subMenuItem->url;
                                    }
                                }

                                echo '<div class="footer-item-menu-item"><a href="' . $url . '"';
                                if ($subMenuItem->target === '_blank') {
                                    echo ' target="_blank"';
                                }
                                echo '>' . $subMenuItem->label . '</a></div>';
                            }
                            echo '</div>';
                            echo '</div>';

                            echo '</div>';

                            $i++;
                            if ($i >= $itemConfig->quantity) {
                                break;
                            }
                        }
                        break;

                    case 'Subscribe':
                        echo '<div class="footer-item">';

                        echo '<h3 class="footer-item-title">' . $itemConfig->title . '</h3>';

                        echo '<div class="be-row be-mt-200">';
                        echo '<div class="be-col"><input type="text" class="be-input be-lh-125" placeholder="Your e-mail address"></div>';
                        echo '<div class="be-col-auto"><div class="be-pl-50"><input type="button" class="be-btn be-btn-major" value="Send"></div></div>';
                        echo '</div>';

                        if ($itemConfig->description !== '') {
                            echo '<div class="be-mt-100 footer-item-description">' . $itemConfig->description . '</div>';
                        }

                        echo '<div class="footer-item-social-icons be-mt-150">';
                        if ($itemConfig->socialFacebook !== '') {
                            echo '<a class="be-btn be-btn-major" href="https://www.facebook.com/' . $itemConfig->socialFacebook . '/" target="_blank">';
                            echo '<i class="bi-facebook"></i>';
                            echo '</a>';
                        }

                        if ($itemConfig->socialTwitter !== '') {
                            echo '<a class="be-btn be-btn-major" href="https://twitter.com/' . $itemConfig->socialTwitter . '/" target="_blank">';
                            echo '<i class="bi-twitter"></i>';
                            echo '</a>';
                        }

                        if ($itemConfig->socialInstagram !== '') {
                            echo '<a class="be-btn be-btn-major" href="https://www.instagram.com/' . $itemConfig->socialInstagram . '/" target="_blank">';
                            echo '<i class="bi-instagram"></i>';
                            echo '</a>';
                        }

                        if ($itemConfig->socialLinkedin !== '') {
                            echo '<a class="be-btn be-btn-major" href="https://www.linkedin.com/' . $itemConfig->socialLinkedin . '/" target="_blank">';
                            echo '<i class="bi-linkedin"></i>';
                            echo '</a>';
                        }

                        echo '</div>';

                        echo '</div>';
                        break;
                    case 'RichText':
                        echo '<div class="footer-item">';

                        echo '<h3 class="footer-item-title">' . $itemConfig->title . '</h3>';
                        echo '<div class="be-mt-300">' . $itemConfig->content . '</div>';

                        echo '</div>';
                        break;

                }
            }
        }
    }

}
