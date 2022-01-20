<?php

namespace LemoniqPvP\Spells\events;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;

class Damage implements Listener {

    public function onDamage(EntityDamageEvent $event)
    {
        if ($event->getCause() === EntityDamageEvent::CAUSE_ENTITY_EXPLOSION) {
            $event->setBaseDamage(5);
        }
    }

}