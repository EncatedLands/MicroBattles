<?php

/**
 *  Copyright 2020 TheRealKizu
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

declare(strict_types=1);

namespace therealkizu\microbattles\commands;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use therealkizu\microbattles\MicroBattles;

class MicroBattlesCommand extends PluginCommand {

    /** @var MicroBattles $plugin */
    private $plugin;

    public function __construct(MicroBattles $plugin) {
        parent::__construct("microbattles", $plugin);

        $this->plugin = $plugin;
        $this->setDescription("MicroBattles command");
        $this->setAliases(["mb"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if (!$sender->hasPermission("mb.cmd.setup")) {
            return false;
        }

        //TODO: Finish this
        return true;
    }

}