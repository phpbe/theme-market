<?php
namespace Be\Theme\Market\Section\HeaderBanner;

/**
 * @BeConfig("头部横幅广告", ordering="1")
 */
class Config
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("LOGO",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $image = '';

    /**
     * @BeConfigItem("图像高度（像素）",
     *     driver="FormItemInputNumberInt"
     * )
     */
    public int $height = 70;

    /**
     * @BeConfigItem("链接",
     *     driver = "FormItemInput"
     * )
     */
    public string $link = '';


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();
        $this->image = $wwwUrl . '/images/header-banner/default.jpg';
    }

}
