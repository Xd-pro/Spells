<?php

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Reset implements Listener {

    public function onJoin(PlayerJoinEvent $event) {
        $event->getPlayer()->setInvisible(false);
    }

}