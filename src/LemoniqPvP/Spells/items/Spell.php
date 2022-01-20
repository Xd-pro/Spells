<?php

namespace LemoniqPvP\Spells\items;

use pocketmine\item\Item;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemUseResult;
use pocketmine\item\ProjectileItem;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;

abstract class Spell extends Item {

    public string $description;

    public function __construct(ItemIdentifier $identifier, string $name = "Unknown")
    {
        parent::__construct($identifier, $name);
        $this->setCustomName($this->name);
        $this->setLore([TextFormat::RESET.TextFormat::GRAY . $this->description, "", TextFormat::BLUE . "Right click to use"]);
    }

}