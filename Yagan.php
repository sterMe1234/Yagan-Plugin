<?php

/**
 * @name Yagan
 * @api 3.10.0
 * @version 1.0.0
 * @author me
 * @main src\src
 */

namespace src;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\command\PluginCommand;

class src extends PluginBase implements Listener {
    public function onEnable() {
        $this->registerCommand("야간투시"," 야간투시를 부여받습니다.");
        $this->registerCommand("야투"," 야간투시를 부여받습니다.");
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command == "야간투시" || $command == "야투"){
            $sender->addEffect ( new EffectInstance(Effect::getEffect(16), 9999 * 5, 0, false));
        $sender->sendMessage("§l§b||§f 야간투시가 부여되었습니다.");
        }
        return true;
    }
    public function onItem(PlayerItemHeldEvent $event) {
        $item = $event->getItem();
        $player = $event->getPlayer();
        if ($item->getId() == 50){
            $player->addEffect ( new EffectInstance(Effect::getEffect(16), 9999 * 5, 0, false));
            $player->sendMessage("§l§b||§f 야간투시가 부여되었습니다.");
        }
    }

    public function registerCommand ($command, $description)
    {

        $c = new PluginCommand ($command, $this);
        $c->setDescription ($description);

        $this->getServer()->getCommandMap()->register ($command, $c);

    }
}