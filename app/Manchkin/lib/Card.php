<?php
namespace App\Manchkin\Lib;
use App\Manchkin\Lib\Categories;
use App\Card as CardModel;

class Card
{
    private $category;
    private $card_info;

    public function __construct($id_card) {
        $this->card_info = CardModel::where('id', $id_card)->first();
    }

    public function getParams() {
        return $this->card_info->title;
    }
}
