<?php

namespace Be\Theme\Market\Section\App\Cms\Article\Latest;

/**
 * @BeConfig("CMS-最新文章列表", icon="bi-star", ordering="20201")
 */
class Config
{
    /**
     * @BeConfigItem("最新",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("背景颜色",
     *     driver = "FormItemColorPicker"
     * )
     */
    public string $backgroundColor = '';

    /**
     * @BeConfigItem("分页太小?",,
     *     description = "分页为0时取系统配置",
     *     driver = "FormItemSlider",
     *     ui="return [':min' => 0, ':max' => 100];"
     * )
     */
    public int $pageSize = 10;

    /**
     * @BeConfigItem("内边距 （手机端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingMobile = '0';

    /**
     * @BeConfigItem("内边距 （平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingTablet = '0';

    /**
     * @BeConfigItem("内边距 （电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingDesktop = '0';

    /**
     * @BeConfigItem("外边距 （手机端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginMobile = '0';

    /**
     * @BeConfigItem("外边距 （平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginTablet = '0';

    /**
     * @BeConfigItem("外边距 （电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginDesktop = '0';

}
