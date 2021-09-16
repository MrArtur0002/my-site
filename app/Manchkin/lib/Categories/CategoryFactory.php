<?php
namespace App\Manchkin\Lib\Categories;
use App\Manchkin\Lib\Categories\MonsterManchkin;

const MONSTER_CATEGORY = 1; // Тип монстр
const RACE_CATEGORY = 2; // Тип раса
const CLASS_CATEGORY = 3; // Тип класс
const CLOTHES_CATEGORY = 4; // Тип одежда
const CURSE_CATEGORY = 5; // Тип проклятие
const POTION_CATEGORY = 6; // Тип зелье
const IVENT_CATEGORY = 7; // Тип событие (вытянуть 2 карты или какое-то особое)
const IMPROVEMENT_CATEGORY = 8; // Улучшение
const ASSISTANT_CATEGORY = 9; // Помощники


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

            case RACE_CATEGORY:
                return new RaceManchkin();
            break;

            case CLASS_CATEGORY:
                return new ClassManchkin();
            break;

            case CLOTHES_CATEGORY:
                return new ClothesManchkin();
            break;

            case CURSE_CATEGORY:
                return new CurseManchkin();
            break;

            case POTION_CATEGORY:
                return new PotionManchkin();
            break;

            case IVENT_CATEGORY:
                return new IventManchkin();
            break;

            case IMPROVEMENT_CATEGORY:
                return new ImprovementManchkin();
            break;

            case ASSISTANT_CATEGORY:
                return new AssistantManchkin();
            break;

            default:
                return 0;
            break;
        }
    }
}
