<?php

namespace LemoniqPvP\Spells\items\spells;

use LemoniqPvP\Spells\entities\Fireball;
use LemoniqPvP\Spells\items\ThrowableSpell;
use pocketmine\entity\Location;
use pocketmine\player\Player;
use pocketmine\entity\projectile\Projectile;
use pocketmine\utils\TextFormat;

class FireballSpell extends ThrowableSpell {

    public string $description = "Shoot a fireball at your opponent!";

    protected function createEntity(Location $location, Player $thrower): Projectile
    {
        return new Fireball($location, $thrower);
    }

}