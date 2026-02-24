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

namespace Tirreno\Controllers\Pages;

class ForgotPassword extends Base {
    public $page = 'ForgotPassword';

    public function getPageParams(): array {
        if (!\Tirreno\Utils\Variables::getForgotPasswordAllowed()) {
            return [];
        }

        $pageParams = [
            'HTML_FILE' => 'forgotPassword.html',
        ];

        if ($this->isPostRequest()) {
            $params = $this->extractRequestParams(['token', 'email']);
            $errorCode = \Tirreno\Utils\Validators::validateForgotPassword($params);

            if (!$errorCode) {
                $email = \Tirreno\Utils\Conversion::getStringRequestParam('email');
                $operatorModel = new \Tirreno\Models\Operator();
                $operatorModel->getActivatedByEmail($email);

                if ($operatorModel->loaded()) {
                    // Create forgot password record.
                    $forgotPasswordModel = new \Tirreno\Models\ForgotPassword();
                    $forgotPasswordModel->add($operatorModel->id);

                    // Send forgot password email.
                    $this->sendPasswordRenewEmail($operatorModel, $forgotPasswordModel);
                }

                // Random sleep between 0.5 and 1 second to prevent timing attacks.
                usleep(rand(500000, 1000000));

                // Always report back that the email was sent.
                $pageParams['SUCCESS_CODE'] = \Tirreno\Utils\ErrorCodes::RENEW_KEY_CREATED;
            }

            $pageParams['VALUES'] = $params;
            $pageParams['ERROR_CODE'] = $errorCode;
        }

        return parent::applyPageParams($pageParams);
    }

    private function sendPasswordRenewEmail(\Tirreno\Models\Operator $operatorModel, \Tirreno\Models\ForgotPassword $forgotPasswordModel): void {
        $url = \Tirreno\Utils\Variables::getHostWithProtocolAndBase();

        $toName = $operatorModel->firstname;
        $toAddress = $operatorModel->email;
        $renewKey = $forgotPasswordModel->renew_key;

        $subject = $this->f3->get('ForgotPassowrd_renew_password_subject');
        $message = $this->f3->get('ForgotPassowrd_renew_password_body');

        $renewUrl = sprintf('%s/password-recovering/%s', $url, $renewKey);
        $message = sprintf($message, $renewUrl);

        \Tirreno\Utils\Mailer::send($toName, $toAddress, $subject, $message);
    }
}
