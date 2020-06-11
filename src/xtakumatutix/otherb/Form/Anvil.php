<?php

namespace xtakumatutix\otherb\Form;

use pocketmine\form\Form;
use pocketmine\Player;

Class Anvil implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
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