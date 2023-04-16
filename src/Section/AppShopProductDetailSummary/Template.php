<?php

namespace Be\Theme\Market\Section\AppShopProductDetailSummary;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    public array $routes = ['Shop.Product.detail'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        $isMobile = Be::getRequest()->isMobile();

        echo '<div class="product-detail-summary">';
        if ($this->position === 'middle') {
            echo '<div class="be-container">';
        }

        echo '<div class="be-row">';
        echo '<div class="be-col-24 be-md-col-8">';

        // ------------------------------------------------------------------------------------------------------------- 左侧图像区
        echo '<div class="app-shop-product-detail-summary-images">';
        echo '<div class="be-row" style="height: 100%;">';
        echo '<div class="be-col-0 be-sm-col-auto">';


        echo '<div class="swiper-small">';
        echo '<div class="swiper">';
        echo '<div class="swiper-wrapper">';
        $i = 0;
        foreach ($this->page->product->images as $image) {
            echo '<div class="swiper-slide" data-index="' . $i . '"><img src="' . $image->url . '" alt=""></div>';
            $i++;
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="swiper-button-prev"></div>';
        echo '<div class="swiper-button-next"></div>';
        echo '</div>'; // swiper-small


        echo '</div>';
        echo '<div class="be-col-0 be-sm-col-auto"><div class="be-pl-100"></div></div>';
        echo '<div class="be-col-24 be-sm-col" style="min-width: 0;">';


        echo '<div class="swiper-large">';
        echo '<div class="swiper">';
        echo '<div class="swiper-wrapper">';
        foreach ($this->page->product->images as $image) {
            echo '<div class="swiper-slide">';
            echo '<img src="' . $image->url . '"';
            if (!$isMobile) {
                echo ' class="cloudzoom" data-cloudzoom="tintColor:\'#f7f7f7\', zoomSizeMode:\'image\', zoomImage:\'' . $image->url . '\'"';
            }
            echo '>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>'; // swiper-large

        echo '</div>';
        echo '</div>';
        echo '</div>';
        // ============================================================================================================= 左侧图像区

        echo '</div>';
        echo '<div class="be-col-24 be-md-col-16">';


        // ------------------------------------------------------------------------------------------------------------- 右侧摘要
        echo '<div class="be-row" style="height: 100%;">';
        echo '<div class="be-col-24 be-md-col-auto"><div class="be-pl-200 be-mt-200"></div></div>';
        echo '<div class="be-col-24 be-md-col">';

        $this->summaryRight();

        echo '</div>';
        echo '<div class="be-col-24 be-md-col-auto"><div class="be-pl-200 be-mt-200"></div></div>';
        echo '<div class="be-col-24 be-md-col-auto">';

        $product = $this->page->product;
        echo '<div class="app-shop-product-detail-summary-form">';

        echo '<form action="' . beUrl('Shop.Cart.checkout', ['from' => 'buy_now']) . '" method="post">';

        echo '<input type="hidden" name="product_id" value="' . $product->id . '">';
        echo '<input type="hidden" name="product_item_id" value="" id="product-detail-summary-item-id">';

        echo '<div>';
        $configStore = Be::getConfig('App.Shop.Store');
        echo '<span class="be-fw-bold">' . $configStore->currency . ': </span>';

        if ($product->original_price_to !== '0.00') {
            if ($product->original_price_from !== $product->price_from || $product->original_price_to !== $product->price_to) {
                echo '<span class="be-td-line-through be-ml-50" id="product-detail-summary-original-price-range">' . $configStore->currencySymbol;
                if ($product->original_price_from === $product->original_price_to) {
                    echo $product->original_price_from;
                } else {
                    echo $product->original_price_from . '~' . $product->original_price_to;;
                }
                echo '</span>';
            }
        }

        echo '<span class="be-fw-bold be-ml-50" id="product-detail-summary-price-range">' . $configStore->currencySymbol;
        if ($product->price_from === $product->price_to) {
            echo $product->price_from;
        } else {
            echo $product->price_from . '~' . $product->price_to;
        }

        echo '</span>';
        echo '</div>';


        echo '<label class="be-d-block be-mt-200 be-fw-bold" for="quantity">Quantity: </label>';
        echo '<div class="be-mt-50">';
        echo '<select class="be-select" onchange="changeQuantity(0);">';
        for ($i = 1; $i <= 30; $i++) {
            echo '<option value="' . $i . '">' . $i . '</option>';
        }
        echo '</select>';
        echo '</div>';

        echo '<div class="be-mt-200">';
        echo '<input type="button" class="be-btn be-btn-round be-w-100 be-btn-major add-to-cart" id="product-detail-summary-add-to-cart" value="Add to Cart">';
        echo '</div>';
        echo '<div class="be-mt-100">';
        echo '<input type="button" class="be-btn be-btn-round be-w-100 be-btn-orange buy-now" id="product-detail-summary-buy-now" value="Buy Now">';
        echo '</div>';


        echo '</form>';
        echo '</div>'; // app-shop-product-detail-summary-form


        echo '</div>';
        echo '</div>';
        // ============================================================================================================= 右侧摘要

        echo '</div>'; // be-col-24 be-md-col-16
        echo '</div>'; // be-row

        if ($this->position === 'middle') echo '</div>';
        echo '</div>';

        $key = 'App:Shop:swiper';
        if (!Be::hasContext($key)) {
            $wwwUrl = Be::getProperty('App.Shop')->getWwwUrl();
            echo '<link rel="stylesheet" href="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.css">';
            echo '<script src="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.js"></script>';
        }

        $this->js();
    }


    private function summaryRight()
    {
        $product = $this->page->product;
        $configStore = Be::getConfig('App.Shop.Store');

        echo '<div class="be-mt-100">';
        echo '<h4 class="be-h4 be-lh-200">' . $product->name . '</h4>';
        echo '</div>';


        echo '<div class="be-mt-100 be-c-major">';
        $averageRating = round($product->rating_avg);
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $averageRating) {
                echo '<i class="bi-star-fill"></i>';
            } else {
                echo '<i class="bi-star"></i>';
            }
        }
        echo '<span class="be-pl-100">' . $product->rating_avg . '</span>';
        echo '</div>';


        echo '<div class="be-mt-100 be-bt-eee be-pt-100">';

        echo '<span class="be-fw-bold">' . $configStore->currency . ': </span>';

        if ($product->original_price_to !== '0.00') {
            if ($product->original_price_from !== $product->price_from || $product->original_price_to !== $product->price_to) {
                echo '<span class="be-td-line-through be-ml-50" id="product-detail-summary-original-price-range">' . $configStore->currencySymbol;
                if ($product->original_price_from === $product->original_price_to) {
                    echo $product->original_price_from;
                } else {
                    echo $product->original_price_from . '~' . $product->original_price_to;;
                }
                echo '</span>';
            }
        }

        echo '<span class="be-fw-bold be-ml-50" id="product-detail-summary-price-range">' . $configStore->currencySymbol;
        if ($product->price_from === $product->price_to) {
            echo $product->price_from;
        } else {
            echo $product->price_from . '~' . $product->price_to;
        }

        echo '</span>';
        echo '</div>';

        if (count($product->promotion_templates) > 0) {
            foreach ($product->promotion_templates as $promotion_template) {
                echo $promotion_template;
            }
        }

        if ($product->relate_id !== '') {
            echo '<div class="be-mt-100 be-bt-eee be-pt-100">';
            echo '<span class="be-fw-bold">' . $product->relate->name . ':</span>';
            echo '<span class="be-pl-50">' . $product->relate->value . '</span>';
            echo '</div>';

            echo '<div class="be-row be-mt-100">';
            foreach ($product->relate->items as $relateItem) {
                echo '<div class="be-col-auto be-pr-100">';

                echo '<a class="style-icon-link style-icon-link-' . $product->relate->icon_type;
                if ($relateItem->self) {
                    echo ' style-icon-link-current" href="javascript:void(0);"';
                } else {
                    echo '" href="' . $relateItem->url . '"';
                }
                echo ' title="' . $relateItem->value . '">';

                if ($product->relate->icon_type === 'text') {
                    echo '<span class="style-icon style-icon-text">';
                    echo $relateItem->value;
                    echo '</span>';
                } elseif ($product->relate->icon_type === 'image') {
                    echo '<span class="style-icon style-icon-image">';
                    echo '<img src="' . $relateItem->icon_image . '" alt="' . $relateItem->value . '">';
                    echo '</span>';
                } else {
                    echo '<span class="style-icon style-icon-color" style="background-color:' . $relateItem->icon_color . '"></span>';
                }

                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        }

        // 多款式
        if ($product->style === 2) {
            if (isset($product->styles) && is_array($product->styles) && count($product->styles) > 0) {
                foreach ($product->styles as $style) {
                    echo '<div class="be-mt-100 be-bt-eee be-pt-100">';
                    echo '<span class="be-fw-bold">' . $style->name . ':</span>';
                    echo '<span class="be-pl-50" id="product-detail-summary-style-value-' . $style->id . '"></span>';
                    echo '</div>';

                    echo '<div class="be-row be-mt-100" id="product-detail-summary-style-' . $style->id . '">';
                    /*
                    foreach ($style->values as $styleValueIndex => $styleValue) {
                        echo '<div class="be-col-auto be-pr-100">';
                        echo '<a class="style-icon-link style-icon-link-text" href="javascript:void(0);" onclick="toggleStyle(this, \'' . $style->id . '\',' . $styleValueIndex . ')" title="' . $styleValue . '">';
                        echo '<span class="style-icon style-icon-text">';
                        echo $styleValue;
                        echo '</span>';
                        echo '</a>';
                        echo '</div>';
                    }
                    */
                    foreach ($style->items as $styleItemIndex => $styleItem) {
                        echo '<div class="be-col-auto be-pr-100">';


                        echo '<a class="style-icon-link style-icon-link-' . $style->icon_type . '" href="javascript:void(0);" onclick="toggleStyle(this, \'' . $style->id . '\',' . $styleItemIndex . ')" title="' . $styleItem->value . '">';

                        if ($style->icon_type === 'text') {
                            echo '<span class="style-icon style-icon-text">';
                            echo $styleItem->value;
                            echo '</span>';
                        } elseif ($style->icon_type === 'image') {
                            echo '<span class="style-icon style-icon-image">';
                            echo '<img src="' . $styleItem->icon_image . '" alt="' . $styleItem->value . '">';
                            echo '</span>';
                        } else {
                            echo '<span class="style-icon style-icon-color" style="background-color:' . $styleItem->icon_color . '"></span>';
                        }
                        echo '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }
        }

        if (isset($product->summary) && $product->summary) {
            echo '<div class="be-mt-100 be-bt-eee be-pt-100">';
            echo $product->summary;
            echo '</div>';
        }
    }


    private function css()
    {
        $isMobile = Be::getRequest()->isMobile();
        $wwwUrl = Be::getProperty('App.Shop')->getWwwUrl();

        if (!$isMobile) {
            echo '<link href="' . $wwwUrl . '/lib/cloudzoom/cloudzoom.css" type="text/css" rel="stylesheet" />';
            echo '<script type="text/javascript" src="' . $wwwUrl . '/lib/cloudzoom/cloudzoom.js"></script>';
        }

        echo '<style type="text/css">';

        echo $this->getCssBackgroundColor('product-detail-summary');
        echo $this->getCssPadding('product-detail-summary');

        echo '#' . $this->id . ' .swiper-slide {';
        $configProduct = Be::getConfig('App.Shop.Product');
        echo 'aspect-ratio: ' . $configProduct->imageAspectRatio . ';';
        echo '}';

        echo '#' . $this->id . ' .swiper-slide:after {';
        echo 'position: absolute;';
        echo 'content: \'\';';
        echo 'left: 0;';
        echo 'top: 0;';
        echo 'width: 100%;';
        echo 'height: 100%;';
        echo 'background: #000;';
        echo 'opacity: .03;';
        echo 'pointer-events: none;';
        echo '}';


        echo '#' . $this->id . ' .swiper-slide img {';
        echo 'display: block;';
        echo 'position: absolute;';
        echo 'left: 0;';
        echo 'right: 0;';
        echo 'top: 0;';
        echo 'bottom: 0;';
        echo 'margin: auto;';
        echo 'max-width: 100%;';
        echo 'max-height: 100%;';
        echo 'transition: all .3s;';
        echo '}';

        echo '#' . $this->id . ' .swiper-small {';
        echo 'padding: 20px 0;';
        echo 'position:relative;';
        echo '--swiper-navigation-size: 20px;';
        echo '}';

        echo '#' . $this->id . ' .swiper-small .swiper-slide {';
        echo 'width:40px;';
        echo 'height:64px !important;';
        echo '}';

        echo '#' . $this->id . ' .swiper-small .swiper-slide-thumb-active {';
        echo 'border: var(--major-color) 1px solid;';
        echo '}';

        echo '#' . $this->id . ' .swiper-small .swiper-button-prev, ';
        echo '#' . $this->id . ' .swiper-small .swiper-button-next {';
        echo 'color: var(--major-color);';
        echo '}';

        echo '#' . $this->id . ' .swiper-small .swiper-button-prev {';
        echo 'left: 13px;';
        echo 'top: 0;';
        echo 'bottom: auto;';
        echo 'transform: rotate(90deg);';
        echo '}';

        echo '#' . $this->id . ' .swiper-small .swiper-button-next {';
        echo 'left: 13px;';
        echo 'top: auto;';
        echo 'bottom: 0;';
        echo 'transform: rotate(90deg);';
        echo '}';

        echo '#' . $this->id . ' .swiper-large .swiper-slide {';
        echo 'max-height:80vh;';
        echo '}';

        echo '.cloudzoom-zoom {';
        echo 'background-color: #fff;';
        echo '}';

        echo '.cloudzoom-lens {';
        echo 'border: 1px solid var(--font-color-8);';
        echo '}';

        echo '#' . $this->id . ' .app-shop-product-detail-summary-images {';
        echo 'position: sticky;';
        echo 'top: 0;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-product-detail-summary-form {';
        echo 'position: sticky;';
        echo 'top: 0;';
        echo 'border: 1px solid var(--font-color-8);';
        echo 'padding: 1.5rem;';
        echo '}';


        // ------------------------------------------------------------------------------------------------------------- 多款式
        echo '.style-icon-link {';
        echo 'display: inline-block;';
        echo 'border: var(--font-color-4) 1px solid;';
        echo '}';


        echo '.style-icon-link-image,';
        echo '.style-icon-link-color {';
        echo 'width: 40px;';
        echo 'height: 40px;';
        echo 'text-align: center;';
        echo 'overflow: hidden;';
        echo '}';

        echo '.style-icon-link-current {';
        echo 'border: var(--major-color) 1px solid !important;';
        echo '}';

        echo '.style-icon-link-disable {';
        echo 'border: #eee 1px solid !important;';
        echo 'cursor: not-allowed !important;';
        echo '}';

        echo '.style-icon {';
        echo 'display: inline-block;';
        echo 'border: #fff 2px solid;';
        echo '}';

        echo '.style-icon-text {';
        echo 'border-radius: .1rem;';
        echo 'padding: 0.25rem 0.75rem;';
        echo '}';

        echo '.style-icon-image, .style-icon-color {';
        echo 'border-radius: .1rem;';
        echo 'width: 100%;';
        echo 'height: 100%;';
        echo 'text-align: center;';
        echo 'overflow: hidden;';
        echo '}';

        echo '.style-icon-image img {';
        echo 'max-width: 100%;';
        echo '}';

        echo '.style-icon-link-current .style-icon-text {';
        echo 'border-color: var(--major-color) !important;';
        echo 'background-color: var(--major-color-9) !important;';
        echo '}';

        echo '.style-icon-link-disable .style-icon-text {';
        echo 'background-color: var(--font-color-4) !important;';
        echo '}';
        // ============================================================================================================= 多款式

        echo '</style>';
    }


    private function js()
    {
        $isMobile = Be::getRequest()->isMobile();
        ?>
        <script>
            <?php
            echo 'let isMobile = ' . ($isMobile ? 'true' : 'false') . ';';

            echo 'let product = ' . json_encode($this->page->product) . ';';
            $productItemId = '';
            if ($this->page->product->style === 1) {
                $productItemId = $this->page->product->items[0]->id;
            }
            echo 'let productItemId = "' . $productItemId . '";';

            echo 'let addToCartUrl = "' . beUrl('Shop.Cart.Add') . '";';

            echo 'var swiperSmall = new Swiper("#' . $this->id . ' .swiper-small .swiper", {';
            echo 'direction: "vertical",';
            echo 'navigation: {';
            echo 'nextEl: ".swiper-button-next",';
            echo 'prevEl: ".swiper-button-prev"';
            echo '},';

            echo 'spaceBetween: 20,';
            echo 'slidesPerView: 3,';

            echo 'breakpoints: {';
            echo '768: {';
            echo 'slidesPerView: 4';
            echo '},';
            echo '1680: {';
            echo 'slidesPerView: 5';
            echo '}';
            echo '}';

            echo '});';

            echo 'var swiperlarge = new Swiper("#' . $this->id . ' .swiper-large .swiper", {';
            echo 'thumbs: {';
            echo 'swiper: swiperSmall';
            echo '}';
            echo '});';

            // 处理点击过于频繁时失效
            echo '$(".swiper-small .swiper-slide").hover(function(){';
            echo 'swiperlarge.slideTo($(this).data("index"));';
            echo '});';

            if (!$isMobile) {
                echo 'CloudZoom.quickStart();';
            }
            ?>

            let filterStyle = [];
            let swiperImagesType = 'product';

            function toggleStyle(e, styleId, styleValueIndex) {
                let $e = $(e);
                if ($e.hasClass("style-icon-link-disable")) {
                    if ($e.hasClass("style-icon-link-current")) {
                        $e.removeClass("style-icon-link-current")
                        filterStyle[styleId] = -1;
                    }
                } else {
                    if (!filterStyle.hasOwnProperty(styleId)) {
                        filterStyle[styleId] = -1;
                    }

                    if (filterStyle[styleId] === styleValueIndex) {
                        filterStyle[styleId] = -1;
                    } else {
                        filterStyle[styleId] = styleValueIndex
                    }
                }

                updateStyles();
            }

            function updateStyles() {
                let filterStyleValueIndex;

                // 更新多款式的UI样式
                for (let filterStyleId in filterStyle) {
                    filterStyleValueIndex = filterStyle[filterStyleId];
                    $("#product-detail-summary-style-" + filterStyleId + " .style-icon-link").removeClass("style-icon-link-current");
                    if (filterStyleValueIndex !== -1) {
                        for (let style of product.styles) {
                            if (style.id === filterStyleId) {
                                $("#product-detail-summary-style-value-" + filterStyleId).html(style.items[filterStyleValueIndex].value);
                                break;
                            }
                        }
                        $("#product-detail-summary-style-" + filterStyleId + " .style-icon-link").eq(filterStyleValueIndex).addClass("style-icon-link-current");
                    } else {
                        $("#product-detail-summary-style-value-" + filterStyleId).html("");
                    }
                }

                // 获取匹配上的产品子项列表
                let matchedItems = [];
                let match = true;
                let currentStyle;
                let currentStyleName;
                let currentStyleValue;
                for (let item of product.items) {
                    match = true;

                    for (let filterStyleId in filterStyle) {
                        filterStyleValueIndex = filterStyle[filterStyleId];
                        if (filterStyleValueIndex !== -1) {
                            currentStyle = false;
                            for (let style of product.styles) {
                                if (style.id === filterStyleId) {
                                    currentStyle = style;
                                    break;
                                }
                            }

                            if (currentStyle) {
                                currentStyleName = currentStyle.name;
                                currentStyleValue = currentStyle.items[filterStyleValueIndex].value;
                                for (let x of item.style_json) {
                                    if (x.name === currentStyleName) {
                                        if (x.value !== currentStyleValue) {
                                            match = false;
                                            break;
                                        }
                                    }
                                }
                            } else {
                                match = false;
                            }
                        }
                    }

                    if (match) {
                        matchedItems.push(item);
                    }
                }

                //console.log(matchedItems);

                // 跟据匹配上的子项列表，更新款式
                if (matchedItems.length === 1) {
                    productItemId = matchedItems[0].id;
                } else {
                    productItemId = "";
                }
                $("#product-detail-summary-item-id").val(productItemId);

                let originalPriceRange = "";
                let priceRange = "";
                let originalPrice;
                let price;

                // ----------------------------------------------------------------------------------------------------------------- 价格范围
                if (matchedItems.length === 1) {
                    originalPrice = matchedItems[0].original_price;
                    price = matchedItems[0].price;
                    if (originalPrice !== "0.00" && originalPrice !== price) {
                        originalPriceRange = originalPrice;
                    }
                    priceRange = price;
                } else if (matchedItems.length > 0) {
                    let originalPriceFrom = -1;
                    let originalPriceTo = -1;
                    let priceFrom = -1;
                    let priceTo = -1;
                    for (let item of matchedItems) {
                        originalPrice = Math.round(Number(item.original_price) * 100);
                        if (originalPriceFrom === -1) {
                            originalPriceFrom = originalPrice;
                        }
                        if (originalPriceTo === -1) {
                            originalPriceTo = originalPrice;
                        }
                        if (originalPrice < originalPriceFrom) {
                            originalPriceFrom = originalPrice;
                        }
                        if (originalPrice > originalPriceTo) {
                            originalPriceTo = originalPrice;
                        }

                        price = Math.round(Number(item.price) * 100);
                        if (priceFrom === -1) {
                            priceFrom = price;
                        }
                        if (priceTo === -1) {
                            priceTo = price;
                        }
                        if (price < priceFrom) {
                            priceFrom = price;
                        }
                        if (price > priceTo) {
                            priceTo = price;
                        }
                    }

                    if (originalPriceTo > 0) {
                        if (originalPriceFrom !== priceFrom || originalPriceTo !== priceTo) {
                            if (originalPriceFrom === originalPriceTo) {
                                originalPriceRange = (originalPriceFrom / 100).toFixed(2);
                            } else {
                                originalPriceRange = (originalPriceFrom / 100).toFixed(2) + "~" + (originalPriceTo / 100).toFixed(2);
                            }
                        }
                    }

                    if (priceFrom === priceTo) {
                        priceRange = (priceFrom / 100).toFixed(2);
                    } else {
                        priceRange = (priceFrom / 100).toFixed(2) + "~" + (priceTo / 100).toFixed(2);
                    }
                }
                let $originalPrice = $("#product-detail-summary-original-price-range");
                if (originalPriceRange) {
                    $originalPrice.html("$" + originalPriceRange).show();
                } else {
                    $originalPrice.html("").hide();
                }
                $("#product-detail-summary-price-range").html("$" + priceRange);
                // ================================================================================================================= 价格范围

                // 购买，加入购物车按钮是否禁用
                if (matchedItems.length === 1) {
                    $("#product-detail-summary-buy-now").prop("disabled", false);
                    $("#product-detail-summary-add-to-cart").prop("disabled", false);
                } else {
                    $("#product-detail-summary-buy-now").prop("disabled", true);
                    $("#product-detail-summary-add-to-cart").prop("disabled", true);
                }

                // ----------------------------------------------------------------------------------------------------------------- 更新款式按钮是否可点击
                let available;
                let styleValue;
                let styleMatchedItems;
                for (let style of product.styles) {
                    for (let styleValueIndex in style.items) {

                        // 获取排除当前款式时，匹配上的产品子项列表
                        styleMatchedItems = [];
                        match = true;
                        for (let item of product.items) {
                            match = true;

                            for (let filterStyleId in filterStyle) {

                                // 排除当前款式时
                                if (filterStyleId === style.id) {
                                    continue;
                                }

                                filterStyleValueIndex = filterStyle[filterStyleId];
                                if (filterStyleValueIndex !== -1) {
                                    currentStyle = false;
                                    for (let style of product.styles) {
                                        if (style.id === filterStyleId) {
                                            currentStyle = style;
                                            break;
                                        }
                                    }

                                    if (currentStyle) {
                                        currentStyleName = currentStyle.name;
                                        currentStyleValue = currentStyle.items[filterStyleValueIndex].value;
                                        for (let x of item.style_json) {
                                            if (x.name === currentStyleName) {
                                                if (x.value !== currentStyleValue) {
                                                    match = false;
                                                    break;
                                                }
                                            }
                                        }
                                    } else {
                                        match = false;
                                    }
                                }
                            }

                            if (match) {
                                styleMatchedItems.push(item);
                            }
                        }

                        styleValue = style.items[styleValueIndex].value;
                        available = false;
                        if (styleMatchedItems.length > 0) {
                            for (let item of styleMatchedItems) {
                                for (let x of item.style_json) {
                                    if (x.name === style.name && x.value === styleValue) {
                                        available = true;
                                        break;
                                    }
                                }

                                if (available) {
                                    break;
                                }
                            }
                        }

                        let $e = $("#product-detail-summary-style-" + style.id + " .style-icon-link").eq(styleValueIndex);
                        if (available) {
                            if ($e.hasClass("style-icon-link-disable")) {
                                $e.removeClass("style-icon-link-disable");
                            }
                        } else {
                            $e.addClass("style-icon-link-disable");
                        }
                    }
                }
                // ================================================================================================================= 更新款式按钮是否可点击


                // ----------------------------------------------------------------------------------------------------------------- 更新轮播图
                let newSwiperImagesType = 'product';
                let swiperImages = product.images;
                if (matchedItems.length === 1) {
                    let matchedItem = matchedItems[0];
                    if (matchedItem.images.length > 0) {
                        newSwiperImagesType = 'product-item:' + matchedItem.id;
                        swiperImages = matchedItem.images;
                    }
                }

                if (newSwiperImagesType !== swiperImagesType) {
                    swiperImagesType = newSwiperImagesType;

                    swiperSmall.removeAllSlides();
                    swiperlarge.removeAllSlides();

                    let swiperImage;
                    for (let i in swiperImages) {
                        swiperImage = swiperImages[i];
                        swiperSmall.appendSlide('<div class="swiper-slide" data-index="' + i + '"><img src="' + swiperImage.url + '" alt=""></div>');
                        if (isMobile) {
                            swiperlarge.appendSlide('<div class="swiper-slide"><img src="' + swiperImage.url + '" alt=""></div>');
                        } else {
                            swiperlarge.appendSlide('<div class="swiper-slide"><img src="' + swiperImage.url + '" alt="" class="cloudzoom" data-cloudzoom="tintColor:\'#999\', zoomSizeMode:\'image\', zoomImage:\'' + swiperImage.url + '\'"></div>');
                        }
                    }

                    if (!isMobile) {
                        CloudZoom.quickStart();
                    }

                    $(".swiper-small .swiper-slide").hover(function () {
                        swiperlarge.slideTo($(this).data("index"));
                    });
                }
                // ================================================================================================================= 更新轮播图
            }

            $(document).ready(function () {

                updateStyles();

                $("#product-detail-summary-buy-now").click(function () {
                    $(this).closest("form").submit();
                });

                $("#product-detail-summary-add-to-cart").click(function () {
                    let quantity = $("#product-detail-summary-quantity").val();
                    if (isNaN(quantity)) {
                        quantity = 1;
                    }
                    quantity = parseInt(quantity);
                    if (quantity < 0) quantity = 1;

                    $.ajax({
                        url: addToCartUrl,
                        data: {
                            "product_id": product.id,
                            "product_item_id": productItemId,
                            "quantity": quantity
                        },
                        type: "POST",
                        success: function (json) {
                            if (json.success) {
                                DrawerCart.load();
                                DrawerCart.show();
                            }
                        },
                        error: function () {
                            alert("System Error!");
                        }
                    });

                });
            });

            function changeQuantity(n) {
                let $e = $("#product-detail-summary-quantity");
                let quantity = $e.val();
                if (isNaN(quantity)) {
                    quantity = 1;
                } else {
                    quantity = Number(quantity);
                }
                quantity += n;
                quantity = parseInt(quantity);
                if (quantity < 1) quantity = 1;
                $e.val(quantity);
            }

            function addToCart() {

            }
        </script>
        <?php
    }

}

