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

namespace Tirreno\Controllers\Admin\IP;

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

    public function checkIfOperatorHasAccess(int $ipId, int $apiKey): bool {
        return (new \Tirreno\Models\Ip())->checkAccess($ipId, $apiKey);
    }

    public function getIpDetails(int $ipId, int $apiKey): array {
        $result = $this->getFullIpInfoById($ipId, $apiKey);

        return [
            'full_country'      => $result['full_country'],
            'country_id'        => $result['country_id'],
            'country_iso'       => $result['country_iso'],
            'asn'               => $result['asn'],
            'blocklist'         => $result['blocklist'],
            'fraud_detected'    => $result['fraud_detected'],
            'data_center'       => $result['data_center'],
            'vpn'               => $result['vpn'],
            'tor'               => $result['tor'],
            'relay'             => $result['relay'],
            'starlink'          => $result['starlink'],
            'ispid'             => $result['ispid'],
        ];
    }

    public function getFullIpInfoById(int $ipId, int $apiKey): array {
        $model = new \Tirreno\Models\Ip();
        $result = $model->getFullIpInfoById($ipId, $apiKey);
        $result['lastseen'] = \Tirreno\Utils\ElapsedDate::short($result['lastseen']);

        return $result;
    }

    public function isEnrichable(int $apiKey): bool {
        return (new \Tirreno\Models\ApiKeys())->attributeIsEnrichable('ip', $apiKey);
    }
}
