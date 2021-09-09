<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class MonsterManchkin implements CategoryManchkin {
    public function action() {
        return 'Я монстр!';
    }
}
