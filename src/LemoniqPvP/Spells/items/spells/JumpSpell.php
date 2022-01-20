<?php

namespace LemoniqPvP\Spells\items\spells;

use LemoniqPvP\Spells\items\Spell;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\item\ItemUseResult;

class JumpSpell extends Spell {

    public string $description = "Leap into the air!";

    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult
    {
        $player->getEffects()->add(new EffectInstance(VanillaEffects::LEVITATION(), 20, 15, false));
        $this->pop();
        return ItemUseResult::SUCCESS();
    }

}