<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class ClassManchkin implements CategoryManchkin {
    public function action() {
        return 'Я карточка класса!';
    }
}
