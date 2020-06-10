<?php

namespace xtakumatutix\otherb;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\block\Block;
use xtakumatutix\otherb\Form\Bed;
use xtakumatutix\otherb\Form\Anvil;

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
        switch ($blockid){
            case 116:
                $event->setCancelled();
                $player->sendPopup("現在エンチャントは使用できません");
                break;

            case 26:
                $event->setCancelled();
                $player->sendForm(new Bed());
                break;

            case 145:
                $event->setCancelled();
                $player->sendForm(new Anvil());
                break;
        }
    }
}