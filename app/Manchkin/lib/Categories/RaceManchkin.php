<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class RaceManchkin implements CategoryManchkin {
    public function action() {
        return 'Я раса!';
    }
}
