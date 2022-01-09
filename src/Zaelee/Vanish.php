<?php

namespace Zaelee;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Vanish extends PluginBase implements Listener
{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§aPlugin On Vanish !");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch($command->getName()){
            case "vanish":
                if($sender instanceof Player)
                {
                   if($sender->hasPermission("vanish.use"))
                   {
                       $sender->setGamemode(GameMode::SPECTATOR());
                       $sender->sendMessage("§4!!! §rVanish On");
                       $sender->sendTip("You are in vanish !");
                   }else{
                       $sender->sendMessage("§cUnkown command. Please use /help for a list of commands.");
                   }
                }
                break;
            case "unvanish":
                if($sender instanceof Player) {
                    if ($sender->hasPermission("vanish.use")) {
                        $sender->setGamemode(GameMode::CREATIVE());
                        $sender->sendMessage("§4!!! §rVanish OFF");
                    } else {
                        $sender->sendMessage("§cUnkown command. Please use /help for a list of commands.");
                    }
                }
                break;
        }
        return true;
    }
}