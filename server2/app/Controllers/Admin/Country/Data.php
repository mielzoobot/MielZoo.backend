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

namespace Tirreno\Controllers\Admin\Country;

class Data extends \Tirreno\Controllers\Admin\Base\Data {
    public function checkIfOperatorHasAccess(int $countryId): bool {
        $apiKey = \Tirreno\Utils\ApiKeys::getCurrentOperatorApiKeyId();
        $model = new \Tirreno\Models\Country();

        return $model->checkAccess($countryId, $apiKey);
    }

    public function getCountryById(int $countryId): array {
        $apiKey = \Tirreno\Utils\ApiKeys::getCurrentOperatorApiKeyId();
        $model = new \Tirreno\Models\Country();

        return $model->getCountryById($countryId, $apiKey);
    }
}
