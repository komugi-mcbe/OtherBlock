<?php

namespace xtakumatutix\otherb;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\block\Block;
use xtakumatutix\otherb\Form\Bed;
use xtakumatutix\otherb\Form\Anvil;
use xtakumatutix\otherb\Form\Brewing;

class EventListener implements Listener 
{
    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onTap(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $blockid = $event->getBlock()->getId();
        switch ($blockid) {
            case 116:
                $event->setCancelled();
                $player->sendPopup('§c現在エンチャントは使用できません');
                break;

            case 26:
                $event->setCancelled();
                $player->sendPopup('§bスニークしてタップすると、ベッドメニューを開きます');
                if ($player->isSneaking() === true) {
                    $player->sendForm(new Bed());
                }
                break;

            case 145:
                $event->setCancelled();
                $player->sendPopup('§bスニークしてタップすると、金床メニューを開きます');
                if ($player->isSneaking() === true) {
                    $player->sendForm(new Anvil());
                }
                break;

            case 117:
                $event->setCancelled();
                $player->sendPopup('§bスニークしてタップすると、調合台メニューを開きます');
                if ($player->isSneaking() === true) {
                    $block = $event->getBlock();
                    $x = $block->getFloorX();
                    $y = $block->getFloorY();
                    $z = $block->getFloorZ();
                    $level = $block->getLevel();
                    $player->sendForm(new Brewing($x, $y, $z, $level));
                }
                break;
        }
    }
}