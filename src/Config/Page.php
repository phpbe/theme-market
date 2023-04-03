<?php
namespace Be\Theme\Market\Config;

class Page
{

    public int $north = 1;

    public int $middle = 0;

    public int $west = 0;

    public int $center = 75;

    public int $east = 25;

    public int $south = 1;

    public array $northSections = [
        [
            'name' => 'Theme.Market.Banner',
        ],
        [
            'name' => 'Theme.Market.HeaderToolbar',
        ],
        [
            'name' => 'Theme.Market.Header',
        ],
    ];

    public array $middleSections = [
        [
            'name' => 'Theme.System.PageTitle',
        ],
        [
            'name' => 'Theme.System.PageContent',
        ],
    ];

    public array $westSections = [

    ];

    public array $centerSections = [
        [
            'name' => 'Theme.System.PageTitle',
        ],
        [
            'name' => 'Theme.System.PageContent',
        ],
    ];

    public array $eastSections = [

    ];

    public array $southSections = [
        [
            'name' => 'Theme.Market.Footer',
        ],
    ];

    // 五方位间的间距
    public string $spacingMobile = '1.5rem';
    public string $spacingTablet = '1.75rem';
    public string $spacingDesktop = '2rem';



    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Market')->getWwwUrl();

        $this->northSections[0]['config'] = (object)[
            'enable' => 1,
            'width' => 'fullWidth',
            'image' => $wwwUrl . '/images/banner/1.jpg',
            'height' => 70,
            'link' => '#',
            'swing' => 0,
            'paddingMobile' => '0',
            'paddingTablet' => '0',
            'paddingDesktop' => '0',
            'marginMobile' => '0',
            'marginTablet' => '0',
            'marginDesktop' => '0',
        ];

    }

}
