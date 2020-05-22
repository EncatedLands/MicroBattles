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

namespace therealkizu\microbattles\provider\economy;

use Exception;
use onebone\economyapi\EconomyAPI;
use pocketmine\Player;

/**
 * Class EconomyAPIProvider
 * @package therealkizu\microbattles\provider\economy
 */
class EconomyAPIProvider implements EconomyProvider {

    /** @var EconomyManager $plugin */
    private $plugin;

    /** @var EconomyAPI $ecoAPI */
    private $ecoAPI;

    public function __construct(EconomyManager $plugin) {
        $this->plugin = $plugin;

        try {
            $this->ecoAPI = EconomyAPI::getInstance();
        } catch (Exception $exception) {
            error:
            $plugin->plugin->getServer()->getLogger()->error("An error occured while loading EconomyAPI Provider!");
        }

        $plugin->plugin->getServer()->getLogger()->info("EconomyAPI Provider loaded!");

    }

    /**
     * @param Player $player
     * @param float|int $money
     */
    public function setMoney(Player $player, $money) {
        $this->ecoAPI->setMoney($player, $money);
    }

    /**
     * @param Player $player
     * @param float|int $money
     */
    public function getMoney(Player $player, $money) {
        $this->ecoAPI->myMoney($player->getName());
    }
}