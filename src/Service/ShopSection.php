<?php

namespace Be\Theme\Market\Service;


use Be\Be;

class ShopSection
{

    /**
     * 生成商品列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $products
     * @param string $defaultMoreLink
     * @return string
     */
    public function makeProductsSection(object $section, string $class, array $products, string $defaultMoreLink = null): string
    {
        $count = count($products);
        if ($count === 0) {
            return '';
        }

        $html = '';
        $html .= '<style type="text/css">';
        $html .= $this->makeProductsSectionPublicCss($section, $class);

        $html .= '#' . $section->id . ' .' . $class . '-title {';
        $html .= 'margin-bottom: 2rem;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-title h3 {';
        $html .= 'border-bottom: 2px solid #eee;';
        $html .= 'text-align: center;';
        $html .= 'position: relative;';
        $html .= 'padding-bottom: 1rem;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-title h3:before {';
        $html .= 'position: absolute;';
        $html .= 'content: "";';
        $html .= 'left: 50%;';
        $html .= 'bottom: -2px;';
        $html .= 'width: 100px;';
        $html .= 'height: 2px;';
        $html .= 'margin-left: -50px;';
        $html .= 'background-color: var(--major-color);';
        $html .= '}';

        $html .= '</style>';


        $html .= '<div class="' . $class . '">';

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        if ($section->config->title !== '') {
            $html .= '<div class="' . $class . '-title">';
            $html .= '<h3 class="be-h3">' . $section->config->title . '</h3>';
            $html .= '</div>';
        }

        $html .= $this->makeProductsSectionPublicHtml($section, $class, $products);

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }


    /**
     * 生成分页商品列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $result
     * @param string $paginationUrl
     * @return string
     */
    public function makePagedProductsSection(object $section, string $class, array $result, string $paginationUrl = null): string
    {
        if ($result['total'] === 0) {
            return '';
        }

        $html = '';
        $html .= '<style type="text/css">';
        $html .= $this->makeProductsSectionPublicCss($section, $class);
        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        $html .= $this->makeProductsSectionPublicHtml($section, $class, $result['rows']);

        $total = $result['total'];
        $pageSize = $result['pageSize'];
        $pages = ceil($total / $pageSize);
        if ($pages > 1) {
            $page = $result['page'];
            if ($page > $pages) $page = $pages;

            $paginationUrl .= strpos($paginationUrl, '?') === false ? '?' : '&';

            $html .= '<nav class="be-mt-300">';
            $html .= '<ul class="be-pagination" style="justify-content: center;">';
            $html .= '<li>';
            if ($page > 1) {
                $url = $paginationUrl;
                $url .= http_build_query(['page' => ($page - 1)]);
                $html .= '<a href="' . $url . '">Preview</a>';
            } else {
                $html .= '<span>Preview</span>';
            }
            $html .= '</li>';

            $from = null;
            $to = null;
            if ($pages < 9) {
                $from = 1;
                $to = $pages;
            } else {
                $from = $page - 4;
                if ($from < 1) {
                    $from = 1;
                }

                $to = $from + 8;
                if ($to > $pages) {
                    $to = $pages;
                }
            }

            if ($from > 1) {
                $html .= '<li><span>...</span></li>';
            }

            for ($i = $from; $i <= $to; $i++) {
                if ($i == $page) {
                    $html .= '<li class="active">';
                    $html .= '<span>' . $i . '</span>';
                    $html .= '</li>';
                } else {
                    $url = $paginationUrl;
                    $url .= http_build_query(['page' => $i]);
                    $html .= '<li>';
                    $html .= '<a href="' . $url . '">' . $i . '</a>';
                    $html .= '</li>';
                }
            }

            if ($to < $pages) {
                $html .= '<li><span>...</span></li>';
            }

            $html .= '<li>';
            if ($page < $pages) {
                $url = $paginationUrl;
                $url .= http_build_query(['page' => ($page + 1)]);
                $html .= '<a href="' . $url . '">Next</a>';
            } else {
                $html .= '<span>Next</span>';
            }
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</nav>';
        }

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }


    /**
     * 生成商品列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $products
     * @param string $defaultMoreLink
     * @return string
     */
    public function makeSideProductsSection(object $section, string $class, array $products, string $defaultMoreLink = null): string
    {
        $html = '';
        $html .= '<style type="text/css">';
        $html .= $section->getCssBackgroundColor($class);
        $html .= $section->getCssPadding($class);
        $html .= $section->getCssMargin($class);


        $html .= '#' . $section->id . ' .' . $class . '-title {';
        $html .= 'background-color: var(--font-color-9);';
        $html .= 'padding: 1rem;';
        $html .= 'font-size: 1.25rem;';
        $html .= 'font-weight: bold;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-body {';
        $html .= 'border: 1px solid var(--font-color-9);';
        $html .= 'padding: 1rem;';
        $html .= '}';

        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        if ($section->config->title !== '') {
            $html .= '<div class="' . $class . '-title">';
            $html .= $section->config->title;
            $html .= '</div>';
        }

        $html .= '<div class="' . $class . '-body">';

        $isMobile = \Be\Be::getRequest()->isMobile();
        foreach ($products as $product) {
            $html .= '<div class="be-py-20">';
            $html .= '<a class="be-d-block be-t-ellipsis" href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '" title="' . $product->title . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $product->title;
            $html .= '</a>';
            $html .= '</div>';
        }

        $html .= '</div>';

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }



    private function makeProductsSectionPublicCss(object $section, string $class)
    {
        $css = $section->getCssBackgroundColor($class);
        $css .= $section->getCssPadding($class);
        $css .= $section->getCssMargin($class);

        $css .= '#' . $section->id . ' .' . $class . '-products {';
        $css .= 'display: flex;';
        $css .= 'flex-wrap: wrap;';
        //$css .= 'overflow: hidden;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product {';
        $css .= 'flex: 0 1 auto;';
        //$css .= 'overflow: hidden;';
        $css .= 'min-width:0;';
        $css .= '}';

        // ------------------------------------------------------------------------------------------------------------- 手机端
        $css .= '@media (max-width: 320px) {';
        $css .= '#' . $section->id . ' .' . $class . '-products {';
        $css .= 'margin-bottom: -' . $section->config->spacingMobile . ';';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product {';
        $css .= 'width: 100%;';
        $css .= 'margin-bottom: ' . $section->config->spacingMobile . ';';
        $css .= '}';
        $css .= '}';

        $css .= '@media (min-width: 320px) {';

        $css .= '#' . $section->id . ' .' . $class . '-products {';
        $css .= 'margin-left: calc(-' . $section->config->spacingMobile . ' / 2);';
        $css .= 'margin-right: calc(-' . $section->config->spacingMobile . ' / 2);';
        $css .= 'margin-bottom: -' . $section->config->spacingMobile . ';';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product {';
        $css .= 'width: 50%;';
        $css .= 'padding-left: calc(' . $section->config->spacingMobile . ' / 2);';
        $css .= 'padding-right: calc(' . $section->config->spacingMobile . ' / 2);';
        $css .= 'margin-bottom: ' . $section->config->spacingMobile . ';';
        $css .= '}';

        $css .= '}';
        // ============================================================================================================= 手机端


        // ------------------------------------------------------------------------------------------------------------- 平析端
        $css .= '@media (min-width: 768px) {';

        $css .= '#' . $section->id . ' .' . $class . '-products {';
        $css .= 'margin-left: calc(-' . $section->config->spacingTablet . ' / 2);';
        $css .= 'margin-right: calc(-' . $section->config->spacingTablet . ' / 2);';
        $css .= 'margin-bottom: -' . $section->config->spacingTablet . ';';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product {';
        $css .= 'width: 33.33333333%;';
        $css .= 'padding-left: calc(' . $section->config->spacingTablet . ' / 2);';
        $css .= 'padding-right: calc(' . $section->config->spacingTablet . ' / 2);';
        $css .= 'margin-bottom: ' . $section->config->spacingTablet . ';';
        $css .= '}';

        $css .= '}';
        // ============================================================================================================= 平析端




        // ------------------------------------------------------------------------------------------------------------- 电脑端
        $cols = 5;
        if (isset($section->config->cols)) {
            $cols = $section->config->cols;
        }

        if ($cols >= 4) {
            $css .= '@media (min-width: 992px) {';

            $css .= '#' . $section->id . ' .' . $class . '-products {';
            $css .= 'margin-left: calc(-' . $section->config->spacingDesktop . ' / 2);';
            $css .= 'margin-right: calc(-' . $section->config->spacingDesktop . ' / 2);';
            $css .= 'margin-bottom: -' . $section->config->spacingDesktop . ';';
            $css .= '}';

            $css .= '#' . $section->id . ' .' . $class . '-product {';
            $css .= 'width: 25%;';
            $css .= 'padding-left: calc(' . $section->config->spacingDesktop . ' / 2);';
            $css .= 'padding-right: calc(' . $section->config->spacingDesktop . ' / 2);';
            $css .= 'margin-bottom: ' . $section->config->spacingDesktop . ';';
            $css .= '}';

            $css .= '}';
        }


        if ($cols >= 5) {
            $css .= '@media (min-width: 1200px) {';
            $css .= '#' . $section->id . ' .' . $class . '-product {';
            $css .= 'width: 20%;';
            $css .= '}';
            $css .= '}';
        }

        if ($cols >= 6) {
            $css .= '@media (min-width: 1200px) {';
            $css .= '#' . $section->id . ' .' . $class . '-product {';
            $css .= 'width: 16.66666666%;';
            $css .= '}';
            $css .= '}';
        }
        // ============================================================================================================= 电脑端


        $css .= '#' . $section->id . ' .' . $class . '-product:hover {';


        $css .= '}';


        $css .= '#' . $section->id . ' .' . $class . '-product-image {';
        $css .= 'position: relative;';
        $css .= '}';


        $css .= '#' . $section->id . ' .' . $class . '-product-image img {';
        $css .= 'width: 100%;';
        $css .= 'transition: all .3s;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image-actions {';
        $css .= 'position: absolute;';
        $css .= 'top: 50%;';
        $css .= 'left: 0;';
        $css .= 'right: 0;';
        //$css .= 'display: none;';
        $css .= 'margin-top: -1rem;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image-actions a {';
        $css .= 'display: inline-block;';
        $css .= 'background-color: var(--font-color);';
        $css .= 'color: #fff;';
        $css .= 'border-radius: 50%;';
        $css .= 'font-size: 1rem;';
        $css .= 'line-height: 1rem;';
        $css .= 'padding: .5rem;';
        $css .= 'margin: 0 .25rem;';
        //$css .= 'transition: all .3s;';
        $css .= 'transform: translateY(-40px);';
        $css .= 'opacity: 0;';
        $css .= '}';




        $css .= '#' . $section->id . ' .' . $class . '-product-image-actions a:hover {';
        $css .= 'background-color: var(--major-color);';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .' . $class . '-product-image img {';
        $css .= 'opacity: .5;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .' . $class . '-product-image-actions {';
        //$css .= 'display: block;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .' . $class . '-product-image-actions a {';
        $css .= 'transform: translateY(0);';
        $css .= 'opacity: 1;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .be-btn {';
        $css .= 'background-color: var(--major-color);';
        $css .= 'border-color: var(--major-color);';
        $css .= 'color: #fff;';
        $css .= '}';


        return $css;
    }

    private function makeProductsSectionPublicHtml(object $section, string $class, array $products)
    {
        $configStore = Be::getConfig('App.Shop.Store');
        $isMobile = \Be\Be::getRequest()->isMobile();
        $html = '<div class="' . $class . '-products">';
        foreach ($products as $product) {
            $defaultImage = null;
            foreach ($product->images as $image) {
                if ($section->config->hoverEffect == 'toggleImage') {
                    if ($image->is_main) {
                        $defaultImage = $image;
                    }

                    if ($defaultImage) {
                        break;
                    }
                } else {
                    if ($image->is_main) {
                        $defaultImage = $image;
                        break;
                    }
                }
            }

            if (!$defaultImage && count($product->images) > 0) {
                $defaultImage = $product->images[0];
            }

            if (!$defaultImage) {
                $nnImage = Be::getProperty('App.Shop')->getWwwUrl() . '/images/product/no-image.jpg';
                $defaultImage = (object)[
                    'id' => '',
                    'product_id' => $product->id,
                    'url' => $nnImage,
                    'is_main' => 1,
                    'ordering' => 0,
                ];
            }

            $html .= '<div class="' . $class . '-product">';

            $html .= '<div class="be-ta-center ' . $class . '-product-image">';
            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';

            $html .= '<img src="' . $defaultImage->url . '" alt="' . htmlspecialchars($product->name) . '">';

            $html .= '</a>';

            $html .= '<div class="be-ta-center ' . $class . '-product-image-actions">';
            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '" style="transition: all .3s;">';
            $html .= '<i class="bi-suit-heart-fill"></i>';
            $html .= '</a>';

            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '" style="transition: all .4s;">';
            $html .= '<i class="bi-eye-fill"></i>';
            $html .= '</a>';
            $html .= '</div>';

            $html .= '</div>';

            $html .= '<div class="be-mt-100 be-ta-center be-c-major">';
            $averageRating = round($product->rating_avg);
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $averageRating) {
                    $html .= '<i class="bi-star-fill"></i>';
                } else {
                    $html .= '<i class="bi-star"></i>';
                }
            }
            $html .= '</div>';

            $html .= '<div class="be-mt-100 be-ta-center">';
            $html .= '<a class="be-d-block be-t-ellipsis" href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $product->name;
            $html .= '</a>';
            $html .= '</div>';

            $html .= '<div class="be-mt-100 be-ta-center">';

            $html .= '<span class="be-c-red be-fw-bold">' . $configStore->currencySymbol;
            if ($product->price_from === $product->price_to) {
                $html .= $product->price_from;
            } else {
                $html .= $product->price_from . '~' . $product->price_to;;
            }
            $html .= '</span>';

            if ($product->original_price_from > 0 && $product->original_price_from != $product->price_from) {
                $html .= '<span class="be-td-line-through be-ml-50 be-c-font-4">' . $configStore->currencySymbol;
                if ($product->original_price_from === $product->original_price_to) {
                    $html .= $product->original_price_from;
                } else {
                    $html .= $product->original_price_from . '~' . $product->original_price_to;;
                }
                $html .= '</span>';
            }

            $html .= '</div>';

            $html .= '<div class="be-mt-150 be-ta-center">';
            if (count($product->items) > 1) {
                $html .= '<input type="button" class="be-btn be-btn-round" value="Quick Buy" onclick="quickBuy(\'' . $product->id . '\')">';
            } else {
                $productItem = $product->items[0];
                $html .= '<input type="button" class="be-btn be-btn-round" value="Add to Cart" onclick="addToCart(\'' . $product->id . '\', \'' . $productItem->id . '\')">';
            }
            $html .= '</div>';

            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }

}
