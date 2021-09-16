<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class IventManchkin implements CategoryManchkin {
    public function action() {
        return 'Я ивент!';
    }
}
