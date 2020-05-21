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

namespace therealkizu\microbattles;

use Exception;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;
use therealkizu\microbattles\utils\Utils;

/**
 * Class MicroBattles
 * @package therealkizu\microbattles
 */
class MicroBattles extends PluginBase {

    /** @var string $prefix */
    public $prefix = C::BOLD . C::AQUA . "M" . C::GREEN . "B" . C::DARK_GRAY . "» ";

    /** @var bool|mixed $arenas */
    public $arenas;

    /** @var Utils $utils */
    public $utils;

    public function onLoad() {
       @mkdir($this->getDataFolder());
       $this->saveDefaultConfig();
       $this->saveResource("config.yml");
    }

    public function onEnable() {
        $this->getLogger()->info("MicroBattles enabled by TheRealKizu");

        $this->loadEconomy();

        $this->utils = new Utils($this);
        $this->utils->isSpoon();
    }

    private function loadArenas() {
        try {
            $conf = new Config($this->getDataFolder() . "arenas.yml", Config::YAML);
            $this->arenas = $conf->get("arenas");

            foreach ($this->arenas as $levelName) {
                $this->getServer()->loadLevel($levelName);
            }

        } catch (Exception $exception) {
            $this->getLogger()->error("There was an error while loading arenas!");
        }
    }

    private function loadEconomy() {
        try {
            $conf = new Config($this->getDataFolder() . "config.yml", Config::YAML);
            $ecoSettings = $conf->get("economy", "enabled");

            var_dump($ecoSettings["enabled"]);

            if ($ecoSettings["enabled"] === true) {
                //TODO: Finish Code.
            }

        } catch (Exception $exception) {
            $this->getLogger()->error("There was an error while enabling economy! Would you mind checking your config?");
        }
    }

}