<?php
namespace Be\Theme\Market\Section\HeaderToolbar;

/**
 * @BeConfig("头部工具栏", ordering="1")
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
    public string $backgroundColor = '#0D241D';

    /**
     * @BeConfigItem("文本颜色",
     *     driver = "FormItemColorPicker"
     * )
     */
    public string $color = '#d9d9d9';

    /**
     * @BeConfigItem("高度（像素）",
     *     driver="FormItemInputNumberInt"
     * )
     */
    public int $height = 40;

    /**
     * @BeConfigItem("欢迎语",
     *     driver="FormItemInput"
     * )
     */
    public string $welcome = 'Welcome Our Online Store!';


}
