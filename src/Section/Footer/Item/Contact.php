<?php
namespace Be\Theme\Market\Section\Footer\Item;

/**
 * @BeConfig("联系我们", icon="el-icon-fa fa-edit")
 */
class Contact
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
    public string $logo = '';

    /**
     * @BeConfigItem("地址",
     *     driver="FormItemInput"
     * )
     */
    public string $address = 'Shenzhen, Guangdong, China';

    /**
     * @BeConfigItem("邮箱",
     *     driver="FormItemInput"
     * )
     */
    public string $email = 'support@domain.com';

    /**
     * @BeConfigItem("电话",
     *     driver="FormItemInput"
     * )
     */
    public string $phone = '(+86)1234-123456';

    /**
     * @BeConfigItem("工作时间",
     *     driver="FormItemInput"
     * )
     */
    public string $workingHours = 'Mon - Sun / 9:00AM';


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();

        $this->logo = $wwwUrl . '/images/logo-orange.png';
    }
}
