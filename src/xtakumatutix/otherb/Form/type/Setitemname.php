<?php

namespace xtakumatutix\otherb\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;

Class Setitemname implements Form
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
        if(EconomyAPI::getInstance()->myMoney($player->getName()) > 15000){
            $player->getInventory()->removeItem($this->item);
            $this->item->setCustomName($data[0]);
            $player->getInventory()->addItem($this->item);
            EconomyAPI::getInstance()->reduceMoney($player, 15000);
            $player->sendMessage(' §a>> §fアイテム名を「'.$data[0].'」にしました');
        }else{
            $player->sendMessage(' §c>> §fお金が足りません');
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => 'アイテム名変更',
            'content' => [
                [
                    'type' => 'input',
                    'text' => "費用は15000KGです\n文字数などに制限はありませんが、悪用は遠慮ください。"
                ]
            ]
        ];
    }
}