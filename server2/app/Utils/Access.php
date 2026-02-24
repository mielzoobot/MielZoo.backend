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

namespace Tirreno\Utils;

class Access {
    public static function cleanHost(): void {
        $f3 = \Base::instance();

        $host = \Tirreno\Utils\Variables::getHostWithProtocol();
        $host = strtolower(parse_url($host, PHP_URL_HOST));

        $f3->set('HOST', $host);

        return;
    }

    public static function CSRFTokenValid(array $params, \Base $f3): int|false {
        $token = $params['token'] ?? null;
        $csrf = $f3->get('SESSION.csrf');

        if (!isset($token) || $token === '' || !isset($csrf) || $csrf === '' || $token !== $csrf) {
            return \Tirreno\Utils\ErrorCodes::CSRF_ATTACK_DETECTED;
        }

        return false;
    }

    public static function checkApiKeyAccess(int $keyId, int $operatorId): bool {
        $model = new \Tirreno\Models\ApiKeys();
        $model->getByKeyAndOperatorId($keyId, $operatorId);

        if (!$model->loaded()) {
            $coOwnerModel = new \Tirreno\Models\ApiKeyCoOwner();
            $coOwnerModel->getCoOwnership($operatorId);

            if (!$coOwnerModel->loaded()) {
                return false;
            }
        }

        return true;
    }

    public static function checkCurrentOperatorApiKeyAccess(int $keyId): bool {
        $operatorId = self::getCurrentOperatorId();

        return $operatorId && self::checkApiKeyAccess($keyId, $operatorId);
    }

    public static function getCurrentOperatorId(): ?int {
        return \Tirreno\Utils\Routes::getCurrentRequestOperator()?->id;
    }

    public static function getCurrentOperatorApiKeyId(): ?int {
        $operatorId = self::getCurrentOperatorId();

        if (!$operatorId) {
            return null;
        }

        $model = new \Tirreno\Models\ApiKeys();
        $key = $model->getKey($operatorId);

        if (!$key) { // Check if operator is co-owner of another API key when it has no own API key.
            $coOwnerModel = new \Tirreno\Models\ApiKeyCoOwner();
            $coOwnerModel->getCoOwnership($operatorId);

            if ($coOwnerModel->loaded()) {
                $key = $model->getKeyById($coOwnerModel->api);
            }
        }

        return $key ? $key->id : null;
    }
}
