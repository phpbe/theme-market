<?php
namespace Be\Theme\Market\Section\Header;

/**
 * @BeConfig("头部主体", ordering="2")
 */
class Config
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("背景颜色",
     *     driver = "FormItemColorPicker"
     * )
     */
    public string $backgroundColor = '#183930';

    /**
     * @BeConfigItem("LOGO",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $logo = '';

    /**
     * @BeConfigItem("LOGO宽度（像素）",
     *     driver="FormItemInputNumberInt"
     * )
     */
    public int $logoWidth = 220;

    /**
     * @BeConfigItem("LOGO宽度（手机端）",
     *     driver="FormItemInputNumberInt"
     * )
     */
    public int $mobileLogoWidth = 140;

    /**
     * @BeConfigItem("联系我们按钮链接",
     *     driver = "FormItemInput"
     * )
     */
    public string $specialOfferText = 'SPECIAL OFFERS';

    /**
     * @BeConfigItem("联系我们按钮链接",
     *     driver = "FormItemInput"
     * )
     */
    public string $specialOfferLink = '#';


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();

        $this->logo = $wwwUrl . '/images/logo-white.png';
    }

}
