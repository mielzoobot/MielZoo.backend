<?php

/**
 * tirreno ~ open-source security framework
 * Copyright (c) Tirreno Technologies Sàrl (https://www.tirreno.com)
 *
 * Licensed under GNU Affero General Public License version 3 of the or any later version.
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Tirreno Technologies Sàrl (https://www.tirreno.com)
 * @license       https://opensource.org/licenses/AGPL-3.0 AGPL License
 * @link          https://www.tirreno.com Tirreno(tm)
 */

declare(strict_types=1);

namespace Tirreno\Utils\Assets\Lists;

class Constants extends Base {
    protected static string $extensionFile = 'constants.php';
    protected static string $path = '/assets/dashboard/';

    protected static array $list = [
        'user_details_total_limits' => [
            'ips'           => 7,
            'isps'          => 5,
            'countries'     => 3,
            'user_agents'   => 4,
            'edits'         => 1,
            'events'        => 100,
            'sessions'      => 20,
        ],
    ];
}
