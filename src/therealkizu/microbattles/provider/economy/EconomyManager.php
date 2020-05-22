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

use therealkizu\microbattles\MicroBattles;

/**
 * Class EconomyManager
 * @package therealkizu\microbattles\provider\economy
 */
class EconomyManager {

    /** @var MicroBattles $plugin */
    public $plugin;

    /** @var string $ecoProvider */
    private $ecoProvider;

    /** @var EconomyProvider $provider */
    public $provider;

    /**
     * EconomyManager constructor.
     * @param MicroBattles $plugin
     * @param string $ecoProvider
     */
    public function __construct(MicroBattles $plugin, string $ecoProvider) {
        $this->plugin = $plugin;
        $this->ecoProvider = $ecoProvider;
    }

    public function checkProvider() {
        if (is_null($this->ecoProvider)) return;

        switch (strtolower($this->ecoProvider)) {
            case "economyapi":
                $this->provider = new EconomyAPIProvider($this);
                break;
            default:
                $this->provider = null;
                break;
        }
    }

}