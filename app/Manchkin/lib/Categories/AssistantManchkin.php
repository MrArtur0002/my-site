<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class AssistantManchkin implements CategoryManchkin {
    public function action() {
        return 'Я помощник!';
    }
}
