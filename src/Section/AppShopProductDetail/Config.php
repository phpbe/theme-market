<?php
namespace Be\Theme\Market\Section\AppShopProductDetail;

/**
 * @BeConfig("店熵商城-商品详情",  icon="el-icon-s-data")
 */
class Config
{

    /**
     * @BeConfigItem("是否显示描述", driver = "FormItemSwitch")
     */
    public int $showDescription = 1;

    /**
     * @BeConfigItem("描述标题", driver = "FormItemInput")
     */
    public string $descriptionTitle = 'Description';

    /**
     * @BeConfigItem("是否显示评论", driver = "FormItemSwitch")
     */
    public int $showReviews = 1;

    /**
     * @BeConfigItem("评论标题", driver = "FormItemInput")
     */
    public string $reviewTitle = 'Customer reviews';

    /**
     * @BeConfigItem("评论分页大小", driver = "FormItemInputNumberInt")
     */
    public int $reviewPageSize = 10;

    /**
     * @BeConfigItem("宽度",
     *     description="位于middle时有效",
     *     driver="FormItemSelect",
     *     keyValues = "return ['default' => '默认', 'fullWidth' => '全屏'];"
     * )
     */
    public string $width = 'default';

    /**
     * @BeConfigItem("背景颜色",
     *     driver="FormItemColorPicker"
     * )
     */
    public string $backgroundColor = '#FFFFFF';

    /**
     * @BeConfigItem("内边距（手机端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingMobile = '0';

    /**
     * @BeConfigItem("内边距（平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingTablet = '0';

    /**
     * @BeConfigItem("内边距（电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingDesktop = '0';

    /**
     * @BeConfigItem("间距（手机端）",
     *     driver = "FormItemInput"
     * )
     */
    public string $spacingMobile = '1.5rem';

    /**
     * @BeConfigItem("间距（平板端）",
     *     driver = "FormItemInput"
     * )
     */
    public string $spacingTablet = '1.75rem';

    /**
     * @BeConfigItem("间距（电脑端）",
     *     driver = "FormItemInput"
     * )
     */
    public string $spacingDesktop = '2rem';

}
