<?php

namespace LemoniqPvP\Spells\items;

use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\item\ItemUseResult;
use pocketmine\entity\Location;
use pocketmine\entity\projectile\Projectile;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\world\sound\ThrowSound;

abstract class ThrowableSpell extends Spell {

    public function getThrowForce() : float {
        return 1;
    }

	abstract protected function createEntity(Location $location, Player $thrower) : Projectile;

	public function onClickAir(Player $player, Vector3 $directionVector) : ItemUseResult{
		$location = $player->getLocation();

		$projectile = $this->createEntity(Location::fromObject($player->getEyePos(), $player->getWorld(), $location->yaw, $location->pitch), $player);
		$projectile->setMotion($directionVector->multiply($this->getThrowForce()));

		$projectileEv = new ProjectileLaunchEvent($projectile);
		$projectileEv->call();
		if($projectileEv->isCancelled()){
			$projectile->flagForDespawn();
			return ItemUseResult::FAIL();
		}

		$projectile->spawnToAll();

		$location->getWorld()->addSound($location, new ThrowSound());

		$this->pop();

		return ItemUseResult::SUCCESS();
	}

}