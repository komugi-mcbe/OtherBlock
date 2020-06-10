<?php

namespace xtakumatutix\otherb\Form;

use pocketmine\form\Form;
use pocketmine\Player;

Class Bed implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        if ($data === true) {
            $amount = $player->getMaxHealth();
            $player->sendMessage('§a >> §f回復しました！！');
            $player->setHealth($amount);
        }else if($data === false){
            $player->sendMessage('§a >> §f時には～♪寝ることも大切、大切にしなきゃいけないんじゃないの～♪');
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'modal',
            'title' => 'ベッド',
            'content' => '寝て回復しますか？',
            'button1' => '( ˘ω˘)ｽﾔｧ',
            'button2' => '起きておく',
            ];
    }
}