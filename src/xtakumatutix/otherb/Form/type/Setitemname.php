<?php

namespace xtakumatutix\otherb\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\otherb\Form\type\Repair;
use xtakumatutix\otherb\Form\type\Setitemname;

Class Anvil implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        switch ($data) {
        $item = $player->getInventory()->getItemInHand();
            case 0:
            if ($item instanceof TieredTool && $item instanceof Bow && $item instanceof Armor) {
                if ($item->getDamage() < 1) {
                    $player->sendForm(new Repair($item));
                }
            }
            break;

            case 1:
            $player->sendForm(new Setitemname($item));
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '金床',
            'content' => '金床のメニューです！',
            'buttons' => [
                [
                    'text' => 'アイテムを修復する'
                ],
                [
                    'text' => 'アイテムの名前を変える'
                ]
            ],
        ];
    }
}