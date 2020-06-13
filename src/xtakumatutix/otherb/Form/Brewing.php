<?php

namespace xtakumatutix\otherb\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\block\Block;

Class Brewing implements Form
{
    public function __construct($x, $y, $z, $level)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->level = $level;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        switch ($data) {
            case 0:
                $block0 = Block::get(117, 0);
                $this->level->setBlock(new Vector3($this->x, $this->y, $this->z), $block0);
                $player->sendMessage(' §a>> §f調合台の瓶の数を「無」にしました');
                break;
            case 1:
                $block1 = Block::get(117, 1);
                $this->level->setBlock(new Vector3($this->x, $this->y, $this->z), $block1);
                $player->sendMessage(' §a>> §f調合台の瓶の数を「1個」にしました');
                break;
            case 2:
                $block2 = Block::get(117, 3);
                $this->level->setBlock(new Vector3($this->x, $this->y, $this->z), $block2);
                $player->sendMessage(' §a>> §f調合台の瓶の数を「2個」にしました');
                break;
            case 3:
                $block3 = Block::get(117, 7);
                $this->level->setBlock(new Vector3($this->x, $this->y, $this->z), $block3);
                $player->sendMessage(' §a>> §f調合台の瓶の数を「3個」にしました');
                break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '調合',
            'content' => '調合のブロック',
            'buttons' => [
                [
                    'text' => '無'
                ],
                [
                    'text' => '瓶1個'
                ],
                [
                    'text' => '瓶2個'
                ],
                [
                    'text' => '瓶3個'
                ]
            ],
        ];
    }
}