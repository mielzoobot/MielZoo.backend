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

namespace Tirreno\Controllers\Admin\Phones;

class Data extends \Tirreno\Controllers\Admin\Base\Data {
    public function getList(int $apiKey): array {
        $result = [];
        $model = new \Tirreno\Models\Grid\Phones\Grid($apiKey);

        $map = [
            'userId' => 'getPhonesByUserId',
        ];

        $result = $this->idMapIterate($map, $model, null);

        $ids = array_column($result['data'], 'id');
        if ($ids) {
            $model = new \Tirreno\Models\Phone();
            $model->updateTotalsByEntityIds($ids, $apiKey);
            $result['data'] = $model->refreshTotals($result['data'], $apiKey);
        }

        return $result;
    }

    public function getPhoneDetails(int $id, int $apiKey): array {
        $details = (new \Tirreno\Models\Phone())->getPhoneDetails($id, $apiKey);
        $details['enrichable'] = $this->isEnrichable($apiKey);

        $tsColumns = ['created', 'lastseen'];
        \Tirreno\Utils\Timezones::localizeTimestampsForActiveOperator($tsColumns, $details);

        return $details;
    }

    private function isEnrichable(int $apiKey): bool {
        return (new \Tirreno\Models\ApiKeys())->attributeIsEnrichable('phone', $apiKey);
    }
}
