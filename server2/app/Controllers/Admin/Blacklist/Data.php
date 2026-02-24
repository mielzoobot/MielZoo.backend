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

namespace Tirreno\Controllers\Admin\Blacklist;

class Data extends \Tirreno\Controllers\Admin\Base\Data {
    public function getList(int $apiKey): array {
        $model = new \Tirreno\Models\Grid\Blacklist\Grid($apiKey);

        return $model->getAll();
    }

    public function removeItemFromBlacklist(int $itemId, string $type, int $apiKey): void {
        $model = null;

        switch ($type) {
            case 'ip':
                $model = new \Tirreno\Models\Ip();
                break;
            case 'email':
                $model = new \Tirreno\Models\Email();
                break;
            case 'phone':
                $model = new \Tirreno\Models\Phone();
                break;
        }

        if ($model) {
            $model->updateFraudFlag([$itemId], false, $apiKey);
        }
    }

    public function setBlacklistUsersCount(bool $cache, int $apiKey): array {
        $currentOperator = \Tirreno\Utils\Routes::getCurrentRequestOperator();

        if (!$currentOperator) {
            $model = new \Tirreno\Models\ApiKeys();
            $model = $model->getKeyById($apiKey);
            $creator = $model->creator;
            $model = new \Tirreno\Models\Operator();
            $currentOperator = $model->getOperatorById($creator);
        }

        $takeFromCache = $this->canTakeNumberOfBlacklistUsersFromCache($currentOperator);

        $total = $currentOperator->blacklist_users_cnt;
        if (!$cache || !$takeFromCache) {
            $total = (new \Tirreno\Models\Dashboard())->getTotalBlockedUsers(null, $apiKey);

            $data = [
                'id' => $currentOperator->id,
                'blacklist_users_cnt' => $total,
            ];

            $model = new \Tirreno\Models\Operator();
            $model->updateBlacklistUsersCnt($data);
        }

        return ['total' => $total];
    }

    private function canTakeNumberOfBlacklistUsersFromCache(\Tirreno\Models\Operator $currentOperator): bool {
        $interval = \Base::instance()->get('REVIEWED_QUEUE_CNT_CACHE_TIME');

        return !!\Tirreno\Utils\DateRange::inIntervalTillNow($currentOperator->review_queue_updated_at, $interval);
    }
}
