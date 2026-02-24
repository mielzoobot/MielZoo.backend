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

namespace Tirreno\Controllers\Admin\Domain;

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

    public function checkIfOperatorHasAccess(int $domainId, int $apiKey): bool {
        return (new \Tirreno\Models\Domain())->checkAccess($domainId, $apiKey);
    }

    public function getDomainDetails(int $domainId, int $apiKey): array {
        $result = (new \Tirreno\Models\Domain())->getFullDomainInfoById($domainId, $apiKey);

        $tsColumns = ['lastseen'];
        \Tirreno\Utils\Timezones::localizeTimestampsForActiveOperator($tsColumns, $result);

        return $result;
    }

    public function isEnrichable(int $apiKey): bool {
        return (new \Tirreno\Models\ApiKeys())->attributeIsEnrichable('domain', $apiKey);
    }
}
