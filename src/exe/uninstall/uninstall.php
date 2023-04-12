<?php
try {
    \Be\Be::getTable('system_menu_item')->where('menu_name', 'Category')->delete();
    \Be\Be::getTable('system_menu')->where('name', 'Category')->delete();
} catch (\Throwable $t) {
}

$path = \Be\Be::getRuntime()->getRootPath() . '/data/Runtime/Menu/Category.php';
if (file_exists($path)) {
    @unlink($path);
}
