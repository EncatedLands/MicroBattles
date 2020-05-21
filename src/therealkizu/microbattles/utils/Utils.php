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

namespace therealkizu\microbattles\utils;

use therealkizu\microbattles\MicroBattles;

/**
 * Class Utils
 * @package therealkizu\microbattles\utils
 */
class Utils {

    /** @var MicroBattles $plugin */
    private $plugin;

    public function __construct(MicroBattles $plugin) {
        $this->plugin = $plugin;
    }

    /**
     *
     * Check if server is not using PocketMine-MP.
     *
     * @return bool
     */
    public function isSpoon() : bool {
        if ($this->plugin->getServer()->getName() !== "PocketMine-MP") {
            $this->plugin->getLogger()->error("It seems you are not using PocketMine-MP. Disabling plugin...");
            $this->plugin->getServer()->getPluginManager()->disablePlugin($this->plugin);
            return true;
        }

        return false;
    }

}