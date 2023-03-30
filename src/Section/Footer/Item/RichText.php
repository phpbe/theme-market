<?php
namespace Be\Theme\Market\Section\Footer\Item;

/**
 * @BeConfig("富文本", icon="el-icon-fa fa-edit")
 */
class RichText
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("标题",
     *     driver="FormItemInput"
     * )
     */
    public string $title = '';

    /**
     * @BeConfigItem("内容",
     *     driver="FormItemTinymce"
     * )
     */
    public string $description = '';


}
