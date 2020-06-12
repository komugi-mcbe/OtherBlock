<?php

namespace xtakumatutix\otherb\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;

Class Repair implements Form
{
    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        if ($data === true) {
            if(EconomyAPI::getInstance()->myMoney($player->getName()) > 24999){
                $player->getInventory()->removeItem($this->item);
                $this->item->setDamage(0);
                $player->getInventory()->addItem($this->item);
                EconomyAPI::getInstance()->reduceMoney($player, 35000);
                $player->sendMessage(' §a>> §f修理しました！！');
            }else{
                $player->sendMessage(' §c>> §fお金が足りません');
            }
        }else if($data === false){
            $player->sendMessage(' §a>> §fキャンセルしました');
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'modal',
            'title' => '確認',
            'content' => "修理しますか？\n費用は、35000KGです",
            'button1' => 'はい',
            'button2' => 'いいえ',
            ];
    }
}