<?php

declare(strict_types=1);

namespace LemoniqPvP\Spells;

use LemoniqPvP\Spells\items\spells\JumpSpell;
use LemoniqPvP\Spells\entities\Fireball;
use LemoniqPvP\Spells\events\Damage;
use LemoniqPvP\Spells\items\spells\FireballSpell;
use LemoniqPvP\Spells\items\spells\GhostSpell;
use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemIds;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\world\World;

class Main extends PluginBase{

    public static self $instance;

    public function onEnable(): void {
        self::$instance = $this;
        $this->getServer()->getPluginManager()->registerEvents(new Damage(), $this);

        EntityFactory::getInstance()->register(Fireball::class, function(World $world, CompoundTag $nbt) : Fireball{
			return new Fireball(EntityDataHelper::parseLocation($nbt, $world), null, $nbt);
		}, ['Fireball', 'minecraft:fiireball'], EntityLegacyIds::FIREBALL);
        ItemFactory::getInstance()->register(new FireballSpell(new ItemIdentifier(ItemIds::ENCHANTED_BOOK, 0), TextFormat::GOLD . "Fireball spell" . TextFormat::RESET));
        ItemFactory::getInstance()->register(new JumpSpell(new ItemIdentifier(ItemIds::ENCHANTED_BOOK, 1), TextFormat::GREEN . "Jump spell" . TextFormat::RESET));
        ItemFactory::getInstance()->register(new GhostSpell(new ItemIdentifier(ItemIds::ENCHANTED_BOOK, 2), TextFormat::DARK_PURPLE . "Ghost spell" . TextFormat::RESET));
    }

}
