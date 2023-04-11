<?php

namespace Be\Theme\Market\Service;

use Be\Be;

class CategoryMenu
{

    /**
     * 获取分类菜单
     *
     * @return \Be\Menu\Driver
     */
    public function getCategoryMenu(): \Be\Menu\Driver
    {
        $path = Be::getRuntime()->getRootPath() . '/data/Runtime/Menu/Category.php';
        if (!file_exists($path)) {
            if (Be::getTable('system_menu')->where('name', 'Category')->count() === 0) {
                $tupleMenu = Be::getTuple('system_menu');
                $tupleMenu->name = 'Category';
                $tupleMenu->label = '商品分灰';
                $tupleMenu->is_system = 0;
                $tupleMenu->create_time = date('Y-m-d H:i:s');
                $tupleMenu->update_time = date('Y-m-d H:i:s');
                $tupleMenu->insert();

                $tableCategory = Be::getTable('shop_category');
                $tableCategory->where('is_delete', 0);
                $tableCategory->where('is_enable', 1);
                $tableCategory->orderBy('ordering', 'ASC');
                $categories = $tableCategory->getObjects();

                if (count($categories) > 0) {
                    $ordering = 1;
                    foreach ($categories as $category) {

                        $tupleMenuItem = Be::getTuple('system_menu_item');
                        $tupleMenuItem->menu_name = 'Category';
                        $tupleMenuItem->parent_id = '';
                        $tupleMenuItem->name = $category->name;
                        $tupleMenuItem->route = 'Shop.Category.products';
                        $tupleMenuItem->params = json_encode(['id' => $category->id]);
                        $tupleMenuItem->url = beUrl('Shop.Category.products', ['id' => $category->id]);
                        $tupleMenuItem->description = '店熵商城：分类：' . $category->name;;
                        $tupleMenuItem->target = '_self';;
                        $tupleMenuItem->is_enable = 1;
                        $tupleMenuItem->ordering = $ordering;
                        $tupleMenuItem->create_time = date('Y-m-d H:i:s');
                        $tupleMenuItem->update_time = date('Y-m-d H:i:s');
                        $tupleMenuItem->save();

                        $ordering++;
                    }
                }
            }
        }

        return \Be\Be::getMenu('Category');
    }


}
