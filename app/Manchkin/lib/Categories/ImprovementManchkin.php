<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\CategoryManchkin;


class ImprovementManchkin implements CategoryManchkin {
    public function action() {
        return 'Я улучшение!';
    }
}
