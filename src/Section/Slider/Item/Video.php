<?php
namespace Be\Theme\Market\Section\Slider\Item;

/**
 * @BeConfig("视频", icon="bi-play-circle")
 */
class Video
{
    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("视频文件",
     *     driver="FormItemStorageFile"
     * )
     */
    public string $video = '';


}
