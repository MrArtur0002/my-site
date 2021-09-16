<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class ClothesManchkin implements CategoryManchkin {
    public function action() {
        return 'Я одежда!';
    }
}
