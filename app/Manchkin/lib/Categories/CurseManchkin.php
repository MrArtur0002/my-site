<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class CurseManchkin implements CategoryManchkin {
    public function action() {
        return 'Я проклятье!';
    }
}
