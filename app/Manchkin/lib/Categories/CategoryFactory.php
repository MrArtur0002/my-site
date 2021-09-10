<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\MonsterManchkin;

const MONSTER_CATEGORY = 1;
const RACE_CATEGORY = 2;
const CLASS_CATEGORY = 3;
const CLOTHES_CATEGORY = 4;
const CURSE_CATEGORY = 5;


interface CategoryManchkin
{
    public function action();
}

class CategoryFactory {
    function getCategory(int $categoryId)  {
        switch ($categoryId) {
            case MONSTER_CATEGORY:
                return new MonsterManchkin();
            break;

            default:
                return 0;
            break;
        }
    }
}
