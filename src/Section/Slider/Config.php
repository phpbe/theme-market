<?php
namespace Be\Theme\Market\Section\Slider;


/**
 * @BeConfig("轮播图", icon="el-icon-video-play", ordering="3")
 */
class Config
{
    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("宽度",
     *     description="位于middle时有效",
     *     driver="FormItemSelect",
     *     keyValues = "return ['default' => '默认', 'fullWidth' => '全屏'];"
     * )
     */
    public string $width = 'default';

    /**
     * @BeConfigItem("切换效果",
     *     driver = "FormItemSelect",
     *     keyValues = "return ['slide' => '位移', 'fade' => '淡入淡出', 'cube' => '方块', 'coverflow' => '3D流', 'flip' => '3D翻转', 'cards' => '卡片式', 'creative' => '创意性'];"
     * )
     */
    public string $effect = 'slide';

    /**
     * @BeConfigItem("自动播放",
     *     driver = "FormItemSwitch")
     */
    public int $autoplay = 1;

    /**
     * @BeConfigItem("自动播放间隔（毫秒）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.autoplay === 1']];")
     */
    public int $delay = 5000;

    /**
     * @BeConfigItem("自动播放速度（毫秒）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.autoplay === 1']];")
     */
    public int $speed = 1000;

    /**
     * @BeConfigItem("循环",
     *     driver = "FormItemSwitch")
     */
    public int $loop = 1;

    /**
     * @BeConfigItem("显示分页器",
     *     driver = "FormItemSwitch")
     */
    public int $pagination = 1;

    /**
     * @BeConfigItem("显示前进后退按钮",
     *     driver = "FormItemSwitch")
     */
    public int $navigation = 1;

    /**
     * @BeConfigItem("前进后退按钮大小（像素）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.navigation === 1']];")
     */
    public int $navigationSize = 25;

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
    public string $marginMobile = '1rem 0 0 0';

    /**
     * @BeConfigItem("外边距 （平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginTablet = '2rem 0 0 0';

    /**
     * @BeConfigItem("外边距 （电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginDesktop = '3rem 0 0 0';

    /**
     * @BeConfigItem("子项",
     *     driver = "FormItemsMixedConfigs",
     *     items = "return [
     *          \Be\Theme\Market\Section\Slider\Item\Image::class,
     *          \Be\Theme\Market\Section\Slider\Item\ImageWithTextOverlay::class,
     *          \Be\Theme\Market\Section\Slider\Item\Video::class,
     *     ]"
     * )
     */
    public array $items = [];


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();
        $this->items = [
            [
                'name' => 'Image',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/slider/1.jpg',
                ],
            ],
            [
                'name' => 'Image',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/slider/2.jpg',
                ],
            ],
            [
                'name' => 'Image',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/slider/3.jpg',
                ],
            ],
        ];

    }

}
