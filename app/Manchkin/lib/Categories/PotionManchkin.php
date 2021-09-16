<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class PotionManchkin implements CategoryManchkin {
    public function action() {
        return 'Я зелье!';
    }
}
