<?php

namespace Be\Theme\Market;


class Property extends \Be\Theme\Property
{

    public string $label = '集市';


    public string $previewImage = 'images/preview.jpg';


    public function __construct() {
        parent::__construct(__FILE__);
    }

}

