<?php

namespace Be\Theme\Market\Section\Header;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['north'];


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $categoryMenu = Be::getMenu('Category');
        $categoryMenuTree = $categoryMenu->getTree();

        $beUrl = beUrl();

        $this->css();

        echo '<div class="header">';
        echo '<div class="be-container">';


        echo '<div class="be-py-200">';
        echo '<div class="be-row">';

        echo '<div class="be-col-24 be-md-col-0">';

        echo '<div class="be-row">';
        echo '<div class="be-col-auto">';
        echo '<div class="header-toggle-menu">';

        echo '<a href="javascript:void(0);" onclick="return DrawerMenu.toggle();">';
        echo '<i class="header-toggle-menu-icon"></i>';
        echo '</a>';

        echo '</div>';
        echo '</div>';
        echo '<div class="be-col be-ta-center">';
        echo '<a href="' . $beUrl . '" class="header-logo"><img src="' . $this->config->logo . '" alt=""></a>';
        echo '</div>';
        echo '<div class="be-col-auto">';
        echo '<div class="header-toggle-cart be-mt-50">';

        echo '<a href="javascript:void(0);" onclick="return DrawerCart.toggle();">';
        echo '<i class="bi-cart4"></i>';
        echo '<span class="header-cart-counter">0</span>';
        echo '</a>';

        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '<div class="be-col-0 be-md-col-auto">';
        echo '<a href="' . $beUrl . '" class="header-logo"><img src="' . $this->config->logo . '" alt=""></a>';
        echo '</div>';

        echo '<div class="be-col-24 be-md-col">';

        // ------------------------------------------------------------------------------------------------------------- 搜索框
        echo '<div class="be-row be-mt-50">';
        echo '<div class="be-col-0 be-md-col-2 be-lg-col-4">';
        echo '</div>';
        echo '<div class="be-col-24 be-md-col-20 be-lg-col-16">';
        echo '<form class="header-form" method="get" action="' . beUrl('Shop.Product.search') . '">';
        echo '<div class="be-row">';
        echo '<div class="be-col-0 be-lg-col-auto">';

        $categoryId = \Be\Be::getRequest()->get('category_id', '');
        echo '<select name="category_id" class="be-select">';
        echo '<option value="">All Categories</option>';
        foreach ($categoryMenuTree as $item) {
            $hasSubItem = false;
            if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                $hasSubItem = true;
            }

            if (($item->route === 'Shop.Category.products' && isset($item->params['id']))) {
                echo '<option value="' . $item->params['id'] . '"';
                if ($categoryId === $item->params['id']) {
                    echo ' selected';
                }
                echo '>' . $item->label . '</option>';
            } else {
                echo '<option value="" disabled>' . $item->label . '</option>';
            }

            if ($hasSubItem) {
                foreach ($item->subItems as $subItem) {
                    if (($subItem->route === 'Shop.Category.products' && isset($subItem->params['id']))) {
                        echo '<option value="' . $subItem->params['id'] . '">|__ ' . $subItem->label . '</option>';
                    } else {
                        echo '<option value="" disabled>|__ ' . $subItem->label . '</option>';
                    }
                }
            }
        }

        echo '</select>';
        echo '</div>';
        echo '<div class="be-col">';

        $keywords = \Be\Be::getRequest()->get('keywords', '');
        $keywords = urldecode($keywords);
        echo '<input type="text" class="be-input" name="keywords" value="' . $keywords . '">';
        echo '</div>';
        echo '<div class="be-col-auto">';
        echo '<button type="submit" class="be-btn be-lh-175"><i class="bi-search"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '<div class="be-col-0 be-md-col-2 be-lg-col-4">';
        echo '</div>';
        echo '</div>';
        // ============================================================================================================= 搜索框


        echo '</div>';


        echo '<div class="be-col-0 be-md-col-auto">';
        echo '<div class="header-toggle-cart be-mt-50">';

        echo '<a href="javascript:void(0);" onclick="return DrawerCart.toggle();">';
        echo '<i class="bi-cart4"></i>';
        echo '<span class="header-cart-counter">0</span>';
        echo '</a>';

        echo '</div>';
        echo '</div>';

        echo '</div>'; // be-row
        echo '</div>';


        echo '<div class="be-d-none be-md-d-block">';
        echo '<div class="be-row">';
        echo '<div class="be-col-auto">';


        echo '<div class="header-all-categories-menu">';

        echo '<div class="be-row header-all-categories">';
        echo '<div class="be-col-auto"><i class="bi-list-ul be-ml-100"></i></div>';
        echo '<div class="be-col"><span class="be-px-50">ALL CATEGORIES</span></div>';
        echo '<div class="be-col-auto"><i class="bi-caret-down-fill be-mr-100"></i></div>';
        echo '</div>';

        echo '<ul class="header-all-categories-ul">';
        foreach ($categoryMenuTree as $item) {
            $hasSubItem = false;
            if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                $hasSubItem = true;
            }

            $url = 'javascript:void(0);';
            if ($item->route) {
                if ($item->params) {
                    $url = beUrl($item->route, $item->params);
                } else {
                    $url = beUrl($item->route);
                }
            } else {
                if ($item->url) {
                    if ($item->url === '/') {
                        $url = $beUrl;
                    } else {
                        $url = $item->url;
                    }
                }
            }

            echo '<li><a href="' . $url . '"><i class="bi-record-fill"></i><span>' . $item->label . '</span></a></li>';
        }

        echo '</ul>';
        echo '</div>';


        echo '</div>';
        echo '<div class="be-col">';
        echo '<div class="header-menu">';
        echo '<ul class="header-menu-lv1-ul">';
        $menu = \Be\Be::getMenu('North');
        $menuTree = $menu->getTree();
        $menuActiveId = $menu->getActiveId();
        foreach ($menuTree as $item) {
            $hasSubItem = false;
            if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                $hasSubItem = true;
            }

            echo '<li class="header-menu-lv1-li';
            if ($item->active === 1) {
                echo ' header-menu-lv1-li-active';
            }
            echo '">';

            $url = 'javascript:void(0);';
            if ($item->route) {
                if ($item->params) {
                    $url = beUrl($item->route, $item->params);
                } else {
                    $url = beUrl($item->route);
                }
            } else {
                if ($item->url) {
                    if ($item->url === '/') {
                        $url = $beUrl;
                    } else {
                        $url = $item->url;
                    }
                }
            }

            echo '<a class="header-menu-lv1-a" href="' . $url . '"';
            if ($item->target === '_blank') {
                echo ' target="_blank"';
            }
            echo '>' . $item->label;
            if ($hasSubItem) {
                echo ' <i class="bi-chevron-down"></i>';
            }
            echo '</a>';


            if ($hasSubItem) {
                echo '<ul class="header-menu-lv2-ul">';
                foreach ($item->subItems as $subItem) {
                    echo '<li class="header-menu-lv2-li';
                    if (isset($subItem->active) && $subItem->active) {
                        echo ' header-menu-lv2-li-active';
                    }
                    echo '">';

                    $url = 'javascript:void(0);';
                    if ($subItem->route) {
                        if ($subItem->params) {
                            $url = beUrl($subItem->route, $subItem->params);
                        } else {
                            $url = beUrl($subItem->route);
                        }
                    } else {
                        if ($subItem->url) {
                            if ($subItem->url === '/') {
                                $url = $beUrl;
                            } else {
                                $url = $subItem->url;
                            }
                        }
                    }

                    echo '<a class="header-menu-lv2-a" href="' . $url . '"';
                    if ($subItem->target === '_blank') {
                        echo ' target="_blank"';
                    }
                    echo '>' . $subItem->label . '</a>';

                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>'; // header-menu

        echo '</div>';

        if ($this->config->specialOfferText !== '') {
            echo '<div class="be-col-auto">';
            echo '<a href="' . $this->config->specialOfferLink . '" class="be-btn be-btn-red be-btn-round be-btn-sm">';
            echo '<i class="bi-gift"></i>';
            echo '<span class="be-pl-50">' . $this->config->specialOfferText . '</span>';
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';


        echo '</div>';
        echo '</div>';

        ?>

        <div id="drawer-menu" class="drawer">
            <div class="drawer-fixed-header">
                <div class="drawer-header">
                    <div class="drawer-title">Navigation</div>
                    <button type="button" class="drawer-close" onclick="DrawerMenu.hide();"></button>
                </div>
            </div>
            <ul class="drawer-menu-lv1">
                <?php
                $menu = \Be\Be::getMenu('North');
                $menuTree = $menu->getTree();
                foreach ($menuTree as $item) {
                    $hasSubItem = false;
                    if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                        $hasSubItem = true;
                    }

                    if ($hasSubItem) {
                        echo '<li class="drawer-menu-lv1-item-with-dropdown">';
                    } else {
                        echo '<li class="drawer-menu-lv1-item">';
                    }

                    $url = 'javascript:void(0);';
                    if ($item->route) {
                        $url = beUrl($item->route, $item->params);
                    } else {
                        if ($item->url) {
                            $url = $item->url;
                        }
                    }
                    echo '<a href="'.$url.'"';
                    if ($item->target === '_blank') {
                        echo ' target="_blank"';
                    }
                    echo '>' . $item->label . '</a>';

                    if ($hasSubItem) {
                        echo '<div class="drawer-menu-lv1-dropdown">';
                        echo '<div class="drawer-menu-lv1-dropdown-title">';
                        echo $item->label;
                        echo '</div>';
                        echo '<ul class="drawer-menu-lv2">';
                        foreach ($item->subItems as $subItem) {
                            $url = 'javascript:void(0);';
                            if ($subItem->route) {
                                $url = beUrl($subItem->route, $subItem->params);
                            } else {
                                if ($subItem->url) {
                                    $url = $subItem->url;
                                }
                            }
                            echo '<li class="drawer-menu-lv2-item"><a href="'.$url.'"';
                            if ($subItem->target === '_blank') {
                                echo ' target="_blank"';
                            }
                            echo '>' . $subItem->label . '</a></li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    }

                    echo '</li>';
                }
                ?>
            </ul>
        </div>

        <?php
        $my = \Be\Be::getUser();
        ?>
        <div id="drawer-user" class="drawer">
            <div class="drawer-fixed-header">
                <div class="drawer-header">
                    <div class="drawer-title"><?php echo $my->isGuest() ? 'Login' : 'Dashboard'; ?></div>
                    <button type="button" class="drawer-close" onclick="DrawerUser.hide();"></button>
                </div>
            </div>

            <div class="drawer-body">
                <?php
                if ($my->isGuest()) {
                    ?>
                    <div class="be-p-50 be-fs-80 be-mb-100">
                        If you are already registered, please log in.
                    </div>

                    <form id="drawer-user-form" class="be-mb-100">
                        <div class="be-floating round-be-floating be-mx-10 be-mb-100">
                            <input type="text" name="email" id="drawer-user-email" class="be-input" placeholder="Email Address" />
                            <label class="be-floating-label" for="drawer-user-email">Email Address</label>
                        </div>

                        <div class="be-floating round-be-floating be-mx-10 be-mb-100">
                            <input type="password" name="password" id="drawer-user-password" class="be-input" placeholder="Password" />
                            <label class="be-floating-label" for="drawer-user-password">Password</label>
                        </div>

                        <input type="submit" class="be-btn be-btn-major be-btn-lg be-btn-round be-w-100" value="Login">
                    </form>

                    <div class="be-mb-100 be-ta-center">
                        <a href="<?php echo beUrl('Shop.User.forgotPassword'); ?>" class="link-hover">Forgot your password?</a>
                    </div>

                    <div class="be-p-50 be-fs-80 be-mb-100">
                        Create your account and enjoy a new shopping experience.
                    </div>

                    <div>
                        <a href="<?php echo beUrl('Shop.User.register'); ?>" class="be-btn be-btn-outline be-btn-lg be-btn-round be-w-100">Create An Account</a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="be-d-flex">
                        <div class="be-flex-0">
                            <img src="<?php echo $my->avatar; ?>" alt="<?php echo $my->first_name . ' ' . $my->last_name; ?>" style="width: 75px; max-height: 75px;">
                        </div>

                        <div class="be-flex-1 be-pl-100">
                            <div class="be-mt-50 be-fs-125 be-fw-bold">
                                <?php echo $my->first_name . ' ' . $my->last_name; ?>
                            </div>
                            <div class="be-mt-50">
                                <?php echo $my->email; ?>
                            </div>
                        </div>
                    </div>

                    <div class="be-mt-100">
                        <ul class="drawer-user-nav">
                            <?php
                            $links = [
                                'Shop.Order.orders' => 'My Orders',
                                'Shop.UserFavorite.favorites' => 'Wish List',
                                'Shop.UserAddress.addresses' => 'Address Book',
                                'Shop.UserCenter.setting' => 'Setting',
                            ];
                            foreach ($links as $key => $val) {
                                echo '<li><a class="link-hover" href="' . beUrl($key) . '">'. $val . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="be-mt-200">
                        <a href="<?php echo beUrl('Shop.User.logout'); ?>" class="be-btn be-btn-round be-w-100">Log Out</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php if (!isset($this->hideHeaderCart) || !$this->hideHeaderCart) { ?>
        <div id="drawer-cart" class="drawer">
            <form action="<?php echo beUrl('Shop.Cart.checkout'); ?>" method="post">
                <div class="drawer-fixed-header">
                    <div class="drawer-header">
                        <div class="drawer-title">Your Cart</div>
                        <button type="button" class="drawer-close" onclick="DrawerCart.hide();"></button>
                    </div>
                </div>

                <div class="drawer-body">
                    <div id="drawer-cart-products">
                        <div class="drawer-cart-empty">Your shopping cart is empty.</div>
                    </div>
                </div>

                <div class="drawer-fixed-footer">
                    <div class="be-row">
                        <div class="be-col">Discount</div>
                        <div class="be-col-auto" id="drawer-cart-discount">$0.00</div>
                    </div>
                    <div class="be-row be-mt-100">
                        <div class="be-col">Total</div>
                        <div class="be-col-auto" id="drawer-cart-total">$0.00</div>
                    </div>

                    <div class="be-row be-mt-100">
                        <div class="be-col-24 be-md-col">
                            <input type="submit" class="be-w-100 be-btn be-btn-major be-btn-round" value="Check Out" onclick="DrawerCart.checkout(this);" >
                        </div>
                        <div class="be-col-24 be-md-col-auto"><div class="be-pl-100 be-mt-100"></div></div>
                        <div class="be-col-24 be-md-col">
                            <a href="<?php echo beUrl('Shop.Cart.index'); ?>" class="be-w-100 be-btn be-btn-outline be-btn-round">View Cart</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        }

        $this->js();
    }

    private function css()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();
        echo '<link rel="stylesheet" href="' . $wwwUrl . '/css/header/drawer.css" />';
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('header');

        echo '#' . $this->id . ' .header {';
        echo 'position: relative;';
        echo 'z-index: 10;';
        echo '}';


        // ------------------------------------------------------------------------------------------------------------- LOGO
        echo '#' . $this->id . ' .header-logo  {';
        echo 'display: inline-block;';
        echo '}';

        echo '#' . $this->id . ' .header-logo img {';
        echo 'vertical-align: middle;';
        echo 'width: ' . $this->config->mobileLogoWidth . 'px;';
        echo '}';

        // 电脑端
        echo '@media (min-width: 768px) {';
        echo '#' . $this->id . ' .header-logo img {';
        echo 'width: ' . $this->config->logoWidth . 'px;';
        echo '}';
        echo '}';
        // ============================================================================================================= LOGO


        // ------------------------------------------------------------------------------------------------------------- 搜索表单
        echo '#' . $this->id . ' .header-form {';
        echo '}';

        echo '#' . $this->id . ' .header-form .be-select {';
        echo 'border: 0;';
        echo 'border-top-right-radius: 0;';
        echo 'border-bottom-right-radius: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-form .be-input {';
        echo 'border: 0;';
        echo 'border-radius: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-form .be-btn {';
        echo 'border: 0;';
        echo 'border-top-left-radius: 0;';
        echo 'border-bottom-left-radius: 0;';
        echo '}';
        // ============================================================================================================= 搜索表单


        // ------------------------------------------------------------------------------------------------------------- 分类菜单
        echo '#' . $this->id . ' .header-all-categories-menu {';
        echo 'width: 250px;';
        echo 'position: relative;';
        echo '}';


        echo '#' . $this->id . ' .header-all-categories {';
        echo 'height: 3rem;';
        echo 'line-height: 3rem;';
        echo 'background-color: #131313;';
        echo 'color: #fff;';
        echo 'border-radius: .25rem;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul {';
        echo 'box-shadow: 0 1px 2px 2px #efefef;';
        echo 'position: absolute;';
        echo 'top: 3rem;';
        echo 'min-width: 250px;';
        echo 'background-color: #fff;';
        echo 'opacity: 0;';
        echo 'transition: all 0.5s ease;';
        echo 'transform-origin: 0 0;';
        echo 'transform: rotateX(-90deg);';
        echo 'padding: .25rem 0 !important;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-menu:hover .header-all-categories-ul {';
        echo 'opacity: 1;';
        echo 'transform: rotateX(0);';
        echo 'padding: 0;';
        echo 'margin: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul li {';
        echo 'list-style: none;';
        echo 'padding: 0 1.5rem;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul a {';
        echo 'display: block;';
        echo 'color: var(--font-color);';
        echo 'padding: 1rem 0;';
        echo 'line-height: 1;';
        echo 'border-bottom: #eee 1px solid;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul a span {';
        echo 'padding-left: 5px;';
        echo 'transition: all 0.3s ease;';
        echo '}';

        echo '#' . $this->id . ' .header-all-categories-ul a:hover span {';
        echo 'color: var(--major-color);';
        echo 'padding-left: 15px;';
        echo '}';
        // ============================================================================================================= 分类菜单


        // ------------------------------------------------------------------------------------------------------------- 菜单
        echo '#' . $this->id . ' .header-menu {';
        echo 'margin-left: 2rem;';
        echo '}';

        echo '#' . $this->id . ' .header-menu ul {';
        echo 'padding: 0;';
        echo 'margin: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-menu li {';
        echo 'list-style: none;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-ul {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-li {';
        echo 'display: inline-block;';
        echo 'padding: 0;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-a {';
        echo 'height: 3rem;';
        echo 'line-height: 3rem;';
        echo 'padding: 0 1rem;';
        echo 'color: #fff;';
        echo 'font-weight: 700;';
        echo '}';


        echo '#' . $this->id . ' .header-menu-lv1-li-active .header-menu-lv1-a,';
        echo '#' . $this->id . ' .header-menu-lv1-a:hover {';
        echo 'color: var(--major-color);';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-ul {';
        echo 'box-shadow: 0 0 5px #999;';
        echo 'position: absolute;';
        echo 'top: 3rem;';
        echo 'min-width: 180px;';
        echo 'background-color: #fff;';
        echo 'opacity: 0;';
        echo 'transition: all 0.5s ease;';
        echo 'transform-origin: 0 0;';
        echo 'transform: rotateX(-90deg);';
        echo 'padding: .25rem 0 !important;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv1-li:hover .header-menu-lv2-ul {';
        echo 'opacity: 1;';
        echo 'transform: rotateX(0)';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-li {';
        echo 'padding: 0 1.5rem;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-a {';
        echo 'display: block;';
        echo 'color: var(--font-color);';
        echo 'padding: 1rem 0;';
        echo 'line-height: 1;';
        echo 'border-bottom: #eee 1px solid;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-menu-lv2-li-active header-menu-lv2-a, ';
        echo '#' . $this->id . ' .header-menu-lv2-a:hover {';
        echo 'color: var(--major-color);';
        echo '}';
        // ============================================================================================================= 菜单


        // ------------------------------------------------------------------------------------------------------------- 手机商 菜单按钮
        echo '#' . $this->id . ' .header-toggle-menu {';
        echo 'display: block;';
        echo 'height: 5rem;';
        echo 'line-height: 5rem;';
        echo 'color: #fff;';
        echo 'cursor: pointer;';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-menu-icon,';
        echo '#' . $this->id . ' .header-toggle-menu-icon:before,';
        echo '#' . $this->id . ' .header-toggle-menu-icon:after {';
        echo 'display: inline-block;';
        echo 'width: 28px;';
        echo 'height: 2px;';
        echo 'background-color: #fff;';
        echo 'transition: all 0.3s ease;';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-menu-icon {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-menu-icon:before,';
        echo '#' . $this->id . ' .header-toggle-menu-icon:after {';
        echo 'position: absolute;';
        echo 'left: 0;';
        echo 'content: \'\';';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-menu-icon:before {';
        echo 'top: -8px;';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-menu-icon:after {';
        echo 'top: 8px;';
        echo '}';

        echo '.js-open-drawer-menu #' . $this->id . ' .header-toggle-menu-icon {';
        echo 'background-color: transparent;';
        echo '}';

        echo '.js-open-drawer-menu #' . $this->id . ' .header-toggle-menu-icon:before {';
        echo 'top: 0;';
        echo 'transform: rotate3d(0, 0, 1, 45deg);';
        echo '}';

        echo '.js-open-drawer-menu #' . $this->id . ' .header-toggle-menu-icon:after {';
        echo 'top: 0;';
        echo 'transform: rotate3d(0, 0, 1, -45deg);';
        echo '}';
        // ============================================================================================================= 手机商 菜单按钮


        echo '#' . $this->id . ' .header-toggle-cart {';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-cart a {';
        echo 'position: relative;';
        echo 'display: inline-block;';
        echo 'font-size: 2rem;';
        echo 'color: #fff;';
        echo '}';

        echo '#' . $this->id . ' .header-toggle-cart .header-cart-counter {';
        echo 'position: absolute;';
        echo 'top: -10px;';
        echo 'right: -10px;';
        echo 'min-width: 20px;';
        echo 'height: 20px;';
        echo 'line-height: 20px;';
        echo 'border-radius: 50%;';
        echo 'font-size: 12px;';
        echo 'background-color: var(--color-red);';
        echo 'color: #fff;';
        echo 'text-align: center;';
        echo '}';

        echo '</style>';
    }


    private function js()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();
        $configStore = \Be\Be::getConfig('App.Shop.Store');

        echo '<script type="text/javascript" src="' . $wwwUrl . '/js/header/drawer-menu.js"></script>';

        echo '<script>';
        echo 'const DRAWER_USER_LOGIN_CHECK_URL = "' . beUrl('Shop.User.loginCheck') . '";';
        echo 'const DRAWER_USER_DASHBOARD_URL = ' . beUrl('Shop.UserCenter.dashboard') . ';';
        echo '</script>';
        echo '<script type="text/javascript" src="' . $wwwUrl . '/js/header/drawer-user.js"></script>';

        echo '<script>';
        echo 'const DRAWER_CART_LOAD_URL = ' . beUrl('Shop.Cart.getProducts') . ';';
        echo 'const DRAWER_CART_ADD_URL = "'.beUrl('Shop.Cart.add').'";';
        echo 'const DRAWER_CART_REMOVE_URL = "'.beUrl('Shop.Cart.remove').'";';
        echo 'const DRAWER_CART_CHANGE_URL = "'.beUrl('Shop.Cart.change').'";';
        echo 'const DRAWER_CART_CURRENCY = "' . $configStore->currency . '";';
        echo 'const DRAWER_CART_CURRENCY_SYMBOL = "' . $configStore->currencySymbol . '";';
        echo '</script>';
        echo '<script type="text/javascript" src="' . $wwwUrl . '/js/header/drawer-cart.js"></script>';
    }



}
