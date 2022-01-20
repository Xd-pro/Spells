<?php

namespace LemoniqPvP\Spells\items\spells;

use LemoniqPvP\Spells\items\Spell;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\item\ItemUseResult;
use pocketmine\utils\TextFormat;

class HealSpell extends Spell {

    public string $description = "Heals 4 hearts.";

    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult
    {
        if ($player->getHealth() == $player->getMaxHealth()) {
            $player->sendMessage(TextFormat::RED . "Your health is already full!");
            return ItemUseResult::FAIL();
        }
        $player->setHealth($player->getHealth() + 8);
        $this->pop();
        return ItemUseResult::SUCCESS();
    }

}