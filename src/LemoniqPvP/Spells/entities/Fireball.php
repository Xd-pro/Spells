<?php

namespace LemoniqPvP\Spells\entities;

use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\projectile\Projectile;
use pocketmine\entity\projectile\Throwable;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\world\Explosion;

class Fireball extends Projectile {

    protected $drag = 0;
    protected $gravity = 0;

    public static function getNetworkTypeId(): string
    {
        return EntityIds::FIREBALL;
    }

    public function getInitialSizeInfo(): EntitySizeInfo {
        return new EntitySizeInfo(2, 2);
    }

    protected function onHit(ProjectileHitEvent $event): void
    {
        $explosion = new Explosion($this->getLocation(), 2, $this);
        $explosion->explodeA();
        $explosion->explodeB();
        $this->flagForDespawn();
    }

}