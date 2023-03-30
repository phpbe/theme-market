<?php

namespace Be\Theme\Market;


class Property extends \Be\Theme\Property
{

    public string $label = 'EV新能源';


    public string $previewImage = 'images/preview.jpg';


    public function __construct() {
        parent::__construct(__FILE__);
    }

}

