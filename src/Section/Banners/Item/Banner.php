<?php
namespace Be\Theme\Market\Section\Banners\Item;

/**
 * @BeConfig("横幅", icon="el-icon-picture")
 */
class Banner
{
    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("图像",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $image = '';

    /**
     * @BeConfigItem("链接",
     *     driver="FormItemInput")
     */
    public string $link = '';

}
