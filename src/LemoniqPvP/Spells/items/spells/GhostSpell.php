<?php

namespace LemoniqPvP\Spells\items\spells;

use LemoniqPvP\Spells\items\Spell;
use LemoniqPvP\Spells\Main;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\item\ItemUseResult;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\TaskScheduler;

class GhostSpell extends Spell {

    public string $description = "Become a ghost for 5 seconds! \nGrants total invisibility, speed 3 and jump boost 3.";

    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult
    {
        $player->getEffects()->add(new EffectInstance(VanillaEffects::SPEED(), 100, 2, false));
        $player->getEffects()->add(new EffectInstance(VanillaEffects::JUMP_BOOST(), 100, 2, false));
        $player->setInvisible();
        
        Main::$instance->getScheduler()->scheduleDelayedTask(new ClosureTask(function() use ($player) {
            $player->setInvisible(false);
        }), 100);
        $this->pop();
        return ItemUseResult::SUCCESS();
    }

}