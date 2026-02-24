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

namespace Tirreno\Controllers\Admin\UserAgent;

class Data extends \Tirreno\Controllers\Admin\Base\Data {
    public function proceedPostRequest(): array {
        return match (\Tirreno\Utils\Conversion::getStringRequestParam('cmd')) {
            'reenrichment' => $this->enrichEntity(),
            default => []
        };
    }

    public function enrichEntity(): array {
        $dataController = new \Tirreno\Controllers\Admin\Enrichment\Data();
        $apiKey = \Tirreno\Utils\ApiKeys::getCurrentOperatorApiKeyId();
        $enrichmentKey = \Tirreno\Utils\ApiKeys::getCurrentOperatorEnrichmentKeyString();

        $type       = \Tirreno\Utils\Conversion::getStringRequestParam('type');
        $search     = \Tirreno\Utils\Conversion::getStringRequestParam('search', true);
        $entityId   = \Tirreno\Utils\Conversion::getIntRequestParam('entityId', true);

        return $dataController->enrichEntity($type, $search, $entityId, $apiKey, $enrichmentKey);
    }

    public function checkIfOperatorHasAccess(int $userAgentId, int $apiKey): bool {
        return (new \Tirreno\Models\UserAgent())->checkAccess($userAgentId, $apiKey);
    }

    public function getUserAgentDetails(int $userAgentId, int $apiKey): array {
        return (new \Tirreno\Models\UserAgent())->getFullUserAgentInfoById($userAgentId, $apiKey);
    }

    public function isEnrichable(int $apiKey): bool {
        return (new \Tirreno\Models\ApiKeys())->attributeIsEnrichable('ua', $apiKey);
    }
}
