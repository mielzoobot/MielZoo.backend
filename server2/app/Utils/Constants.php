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

class Constants {
    public static function get(string $key): array|string|int {
        $const = __CLASS__ . '::' . $key;
        if (!defined($const)) {
            $message = 'Undefined constant: ' . $key;

            $exception = new \RuntimeException($message);
            throw $exception;
        }

        $value = constant($const);

        $f3 = \Base::instance();
        $f3key = 'EXTRA_' . $key;
        if ($f3->exists($f3key)) {
            $value = is_array($value) ? array_merge($value, $f3->get($f3key)) : $f3->get($f3key);
        }

        return $value;
    }

    // TODO: rewrite context so event amount limit will not be needed
    public const RULE_EVENT_CONTEXT_LIMIT               = 25;
    public const RULE_CHECK_USERS_PASSED_TO_CLIENT      = 25;
    public const RULE_USERS_BATCH_SIZE                  = 3500;
    public const RULE_EMAIL_MAXIMUM_LOCAL_PART_LENGTH   = 17;
    public const RULE_EMAIL_MAXIMUM_DOMAIN_LENGTH       = 22;
    public const RULE_MAXIMUM_NUMBER_OF_404_CODES       = 4;
    public const RULE_MAXIMUM_NUMBER_OF_500_CODES       = 4;
    public const RULE_MAXIMUM_NUMBER_OF_LOGIN_ATTEMPTS  = 3;
    public const RULE_LOGIN_ATTEMPTS_WINDOW             = 8;
    public const RULE_NEW_DEVICE_MAX_AGE_IN_SECONDS     = 60 * 60 * 3;
    public const RULE_REGULAR_OS_NAMES                  = ['Windows', 'Android', 'Mac', 'iOS'];
    public const RULE_REGULAR_BROWSER_NAMES             = [
        'Chrome'            => 90,
        'Chrome Mobile'     => 90,
        'Firefox'           => 78,
        'Opera'             => 70,
        'Safari'            => 13,
        'Mobile Safari'     => 13,
        'Samsung Browser'   => 12,
        'Internet Explorer' => 12,
        'Microsoft Edge'    => 90,
        'Chrome Mobile iOS' => 90,
        'Android Browser'   => 81,
        'Chrome Webview'    => 90,
        'Google Search App' => 90,
        'Yandex Browser'    => 20,
    ];

    public const DEVICE_TYPES   = [
        'bot',
        'desktop',
        'smartphone',
        'tablet',
        'other',
        'unknown',
    ];

    public const LOGBOOK_LIMIT  = 1000;

    public const SECONDS_IN_WEEK    = 60 * 60 * 24 * 7;
    public const SECONDS_IN_DAY     = 60 * 60 * 24;
    public const SECONDS_IN_HOUR    = 60 * 60;
    public const SECONDS_IN_MINUTE  = 60;

    public const NIGHT_RANGE_SECONDS_START  = 0;        // midnight
    public const NIGHT_RANGE_SECONDS_END    = 18000;    // 5 AM

    public const COUNTRY_CODE_NIGERIA       = 160;
    public const COUNTRY_CODE_INDIA         = 104;
    public const COUNTRY_CODE_CHINA         = 47;
    public const COUNTRY_CODE_BRAZIL        = 31;
    public const COUNTRY_CODE_PAKISTAN      = 168;
    public const COUNTRY_CODE_INDONESIA     = 105;
    public const COUNTRY_CODE_VENEZUELA     = 243;
    public const COUNTRY_CODE_SOUTH_AFRICA  = 199;
    public const COUNTRY_CODE_PHILIPPINES   = 175;
    public const COUNTRY_CODE_ROMANIA       = 182;
    public const COUNTRY_CODE_RUSSIA        = 183;
    public const COUNTRY_CODE_AUSTRALIA     = 14;
    public const COUNTRY_CODE_UAE           = 236;
    public const COUNTRY_CODE_JAPAN         = 113;

    public const COUNTRY_CODES_NORTH_AMERICA    = [238, 40];
    public const COUNTRY_CODES_EUROPE           = [77, 2, 15, 22, 35, 57, 60, 61, 62, 71, 78, 85, 88, 102, 108, 111, 122, 128, 129, 136, 155, 177, 178, 182, 195, 196, 203, 215];

    public const EVENT_REQUEST_TYPE_HEAD    = 3;

    public const ACCOUNT_OPERATION_QUEUE_CLEAR_COMPLETED_AFTER_DAYS = 7;
    public const ACCOUNT_OPERATION_QUEUE_AUTO_UNCLOG_AFTER_SEC      = 60 * 30;
    public const ACCOUNT_OPERATION_QUEUE_EXECUTE_TIME_SEC           = 60 * 3;
    public const ACCOUNT_OPERATION_QUEUE_BATCH_SIZE                 = 2500;
    public const NEW_EVENTS_BATCH_SIZE                              = 15000;

    public const USER_LOW_SCORE_INF     = 0;
    public const USER_LOW_SCORE_SUP     = 33;
    public const USER_MEDIUM_SCORE_INF  = 33;
    public const USER_MEDIUM_SCORE_SUP  = 67;
    public const USER_HIGH_SCORE_INF    = 67;

    public const UNAUTHORIZED_USERID    = 'N/A';

    public const ENRICHMENT_IP_IS_BOGON     = 'IP is bogon';
    public const ENRICHMENT_IP_IS_NOT_FOUND = 'Value is not found';

    public const MAIL_FROM_NAME = 'Analytics';
    public const MAIL_HOST      = 'smtp.eu.mailgun.org';
    public const MAIL_SEND_BIN  = '/usr/sbin/sendmail';

    public const PAGE_TITLE_POSTFIX = '| tirreno';

    public const PAGE_VIEW_EVENT_TYPE_ID = 1;
    public const PAGE_EDIT_EVENT_TYPE_ID = 2;
    public const PAGE_DELETE_EVENT_TYPE_ID = 3;
    public const PAGE_SEARCH_EVENT_TYPE_ID = 4;
    public const ACCOUNT_LOGIN_EVENT_TYPE_ID = 5;
    public const ACCOUNT_LOGOUT_EVENT_TYPE_ID = 6;
    public const ACCOUNT_LOGIN_FAIL_EVENT_TYPE_ID = 7;
    public const ACCOUNT_REGISTRATION_EVENT_TYPE_ID = 8;
    public const ACCOUNT_EMAIL_CHANGE_EVENT_TYPE_ID = 9;
    public const ACCOUNT_PASSWORD_CHANGE_EVENT_TYPE_ID = 10;
    public const ACCOUNT_EDIT_EVENT_TYPE_ID = 11;
    public const PAGE_ERROR_EVENT_TYPE_ID = 12;
    public const FIELD_EDIT_EVENT_TYPE_ID = 13;

    public const CHART_MODEL_MAP = [
        'resources'         => \Tirreno\Models\Chart\Resources::class,
        'resource'          => \Tirreno\Models\Chart\Resource::class,
        'users'             => \Tirreno\Models\Chart\Users::class,
        'user'              => \Tirreno\Models\Chart\User::class,
        'isps'              => \Tirreno\Models\Chart\Isps::class,
        'isp'               => \Tirreno\Models\Chart\Isp::class,
        'ips'               => \Tirreno\Models\Chart\Ips::class,
        'ip'                => \Tirreno\Models\Chart\Ip::class,
        'domains'           => \Tirreno\Models\Chart\Domains::class,
        'domain'            => \Tirreno\Models\Chart\Domain::class,
        'userAgents'        => \Tirreno\Models\Chart\UserAgents::class,
        'userAgent'         => \Tirreno\Models\Chart\UserAgent::class,
        'events'            => \Tirreno\Models\Chart\Events::class,
        'emails'            => \Tirreno\Models\Chart\Emails::class,
        'phones'            => \Tirreno\Models\Chart\Phones::class,
        'review-queue'      => \Tirreno\Models\Chart\ReviewQueue::class,
        'country'           => \Tirreno\Models\Chart\Country::class,
        'blacklist'         => \Tirreno\Models\Chart\Blacklist::class,
        'logbook'           => \Tirreno\Models\Chart\Logbook::class,
        'stats'             => \Tirreno\Models\Chart\SessionStat::class,
        'fields'            => \Tirreno\Models\Chart\FieldAuditTrails::class,
        'field'             => \Tirreno\Models\Chart\FieldAuditTrail::class,
    ];

    public const LINE_CHARTS = [
        'ips',
        'users',
        'review-queue',
        'events',
        'phones',
        'emails',
        'resources',
        'userAgents',
        'isps',
        'domains',
        'blacklist',
        'logbook',
        'fields',
    ];

    public const CHART_RESOLUTION = [
        'day'       => 60 * 60 * 24,
        'hour'      => 60 * 60,
        'minute'    => 60,
    ];

    public const TOP_TEN_MODELS_MAP = [
        'mostActiveUsers'           => \Tirreno\Models\TopTen\UsersByEvents::class,
        'mostActiveCountries'       => \Tirreno\Models\TopTen\CountriesByUsers::class,
        'mostActiveUrls'            => \Tirreno\Models\TopTen\ResourcesByUsers::class,
        'ipsWithTheMostUsers'       => \Tirreno\Models\TopTen\IpsByUsers::class,
        'usersWithMostLoginFail'    => \Tirreno\Models\TopTen\UsersByLoginFail::class,
        'usersWithMostIps'          => \Tirreno\Models\TopTen\UsersByIps::class,
    ];

    public const RULES_TOTALS_MODELS = [
        \Tirreno\Models\Phone::class,
        \Tirreno\Models\Ip::class,
        \Tirreno\Models\Session::class,
        \Tirreno\Models\User::class,
    ];

    public const REST_TOTALS_MODELS = [
        'isp'       => \Tirreno\Models\Isp::class,
        'resource'  => \Tirreno\Models\Resource::class,
        'domain'    => \Tirreno\Models\Domain::class,
        'device'    => \Tirreno\Models\Device::class,
        'country'   => \Tirreno\Models\Country::class,
        'field'     => \Tirreno\Models\FieldAudit::class,
    ];

    public const ENRICHING_ATTRIBUTES = [
        'ip'        => \Tirreno\Models\Ip::class,
        'email'     => \Tirreno\Models\Email::class,
        'domain'    => \Tirreno\Models\Domain::class,
        'phone'     => \Tirreno\Models\Phone::class,
        //'ua'        => \Tirreno\Models\Device::class,
    ];

    public const ADMIN_PAGES = [
        'AdminIsps',
        'AdminIsp',
        'AdminUsers',
        'AdminUser',
        'AdminIps',
        'AdminIp',
        'AdminDomains',
        'AdminDomain',
        'AdminCountries',
        'AdminCountry',
        'AdminUserAgents',
        'AdminUserAgent',
        'AdminResources',
        'AdminResource',
        'AdminLogbook',
        'AdminHome',
        'AdminApi',
        'AdminReviewQueue',
        'AdminRules',
        'AdminSettings',
        'AdminWatchlist',
        'AdminBlacklist',
        'AdminManualCheck',
        'AdminEvents',
        'AdminFieldAudits',
        'AdminFieldAudit',
    ];

    public const IP_TYPES = [
        'Blacklisted',
        'Spam list',
        'Localhost',
        'TOR',
        'Starlink',
        'AppleRelay',
        'VPN',
        'Datacenter',
        'Unknown',
        'Residential',
    ];

    public const ALERT_EVENT_TYPES = [
        self::PAGE_DELETE_EVENT_TYPE_ID,
        self::PAGE_ERROR_EVENT_TYPE_ID,
        self::ACCOUNT_LOGIN_FAIL_EVENT_TYPE_ID,
        self::ACCOUNT_EMAIL_CHANGE_EVENT_TYPE_ID,
        self::ACCOUNT_PASSWORD_CHANGE_EVENT_TYPE_ID,
    ];

    public const EDITING_EVENT_TYPES = [
        self::PAGE_EDIT_EVENT_TYPE_ID,
        self::ACCOUNT_REGISTRATION_EVENT_TYPE_ID,
        self::ACCOUNT_EDIT_EVENT_TYPE_ID,
        self::FIELD_EDIT_EVENT_TYPE_ID,
    ];

    public const NORMAL_EVENT_TYPES = [
        self::PAGE_VIEW_EVENT_TYPE_ID,
        self::PAGE_SEARCH_EVENT_TYPE_ID,
        self::ACCOUNT_LOGIN_EVENT_TYPE_ID,
        self::ACCOUNT_LOGOUT_EVENT_TYPE_ID,
    ];

    public const FAILED_LOGBOOK_EVENT_TYPES = [
        'critical_validation_error',
        'critical_error',
        'rate_limit_exceeded',
    ];

    public const ISSUED_LOGBOOK_EVENT_TYPES = [
        'validation_error',
    ];

    public const NORMAL_LOGBOOK_EVENT_TYPES = [
        'success',
    ];

    public const LOGBOOK_ERROR_TYPE_SUCCESS = 0;
    public const LOGBOOK_ERROR_TYPE_VALIDATION_ERROR = 1;
    public const LOGBOOK_ERROR_TYPE_CRITICAL_VALIDATION_ERROR = 2;
    public const LOGBOOK_ERROR_TYPE_CRITICAL_ERROR = 3;
    public const LOGBOOK_ERROR_TYPE_RATE_LIMIT_EXCEEDED = 4;

    public const ENTITY_TYPES = [
        'IP',
        'Email',
        'Phone',
    ];

    public const RISK_SCORE_QUEUE_ACTION_TYPE   = 'calculate_risk_score';
    public const BLACKLIST_QUEUE_ACTION_TYPE    = 'blacklist';
    public const DELETE_USER_QUEUE_ACTION_TYPE  = 'delete';
    public const ENRICHMENT_QUEUE_ACTION_TYPE   = 'enrichment';

    public const WAITING_QUEUE_STATUS_TYPE      = 'waiting';
    public const EXECUTING_QUEUE_STATUS_TYPE    = 'executing';
    public const COMPLETED_QUEUE_STATUS_TYPE    = 'completed';
    public const FAILED_QUEUE_STATUS_TYPE       = 'failed';

    public const DAILY_NOTIFICATION_REMINDER    = 'daily';
    public const WEEKLY_NOTIFICATION_REMINDER   = 'weekly';
    public const NO_NOTIFICATION_REMINDER       = 'off';

    public const NOTIFICATION_REMINDER_TYPES = [
        self::DAILY_NOTIFICATION_REMINDER,
        self::WEEKLY_NOTIFICATION_REMINDER,
        self::NO_NOTIFICATION_REMINDER,
    ];

    public const SINGLE_RESPONSE_TYPE           = 'single';
    public const COLLECTION_RESPONSE_TYPE       = 'collection';

    public const RULE_WEIGHT_POSITIVE   = -20;
    public const RULE_WEIGHT_NONE       = 0;
    public const RULE_WEIGHT_MEDIUM     = 10;
    public const RULE_WEIGHT_HIGH       = 20;
    public const RULE_WEIGHT_EXTREME    = 70;

    public const RULES_PRESETS = [
        'default' => [
            'description'   => 'Default empty rules',
            'main'          => [],
            'additional'    => [],
        ],
        'account_takeover' => [
            'description'   => 'Account takeover',
            'main'          => self::DEFAULT_RULES_ACCOUNT_TAKEOVER,
            'additional'    => [],
        ],
        'credential_stuffing' => [
            'description'   => 'Credential stuffing',
            'main'          => self::DEFAULT_RULES_CREDENTIAL_STUFFING,
            'additional'    => [],
        ],
        'content_spam' => [
            'description'   => 'Content spam',
            'main'          => self::DEFAULT_RULES_CONTENT_SPAM,
            'additional'    => [],
        ],
        'account_registration' => [
            'description'   => 'Account registration',
            'main'          => self::DEFAULT_RULES_ACCOUNT_REGISTRATION,
            'additional'    => [],
        ],
        'fraud_prevention' => [
            'description'   => 'Fraud prevention',
            'main'          => self::DEFAULT_RULES_FRAUD_PREVENTION,
            'additional'    => [],
        ],
        'insider_threat' => [
            'description'   => 'Insider threat',
            'main'          => self::DEFAULT_RULES_INSIDER_THREAT,
            'additional'    => [],
        ],
        'bot_detection' => [
            'description'   => 'Bot detection',
            'main'          => self::DEFAULT_RULES_BOT_DETECTION,
            'additional'    => [],
        ],
        'dormant_account' => [
            'description'   => 'Dormant account',
            'main'          => self::DEFAULT_RULES_DORMANT_ACCOUNT,
            'additional'    => [],
        ],
        'multi_accounting' => [
            'description'   => 'Multi-accounting',
            'main'          => self::DEFAULT_RULES_MULTI_ACCOUNTING,
            'additional'    => [],
        ],
        'promo_abuse' => [
            'description'   => 'Promo abuse',
            'main'          => self::DEFAULT_RULES_PROMO_ABUSE,
            'additional'    => [],
        ],
        'api_protection' => [
            'description'   => 'API protection',
            'main'          => self::DEFAULT_RULES_API_PROTECTION,
            'additional'    => [],
        ],
        'high_risk_regions' => [
            'description'   => 'High-risk regions',
            'main'          => self::DEFAULT_RULES_HIGH_RISK_REGIONS,
            'additional'    => [],
        ],
    ];

    public const DEFAULT_RULES_ACCOUNT_TAKEOVER = [
        // Medium
        'A03'   => self::RULE_WEIGHT_MEDIUM,    // New device and new country
        'A04'   => self::RULE_WEIGHT_MEDIUM,    // New device and new subnet
        'A08'   => self::RULE_WEIGHT_MEDIUM,    // Browser language changed
        'B01'   => self::RULE_WEIGHT_MEDIUM,    // Multiple countries
        'B02'   => self::RULE_WEIGHT_MEDIUM,    // User has changed a password
        'B03'   => self::RULE_WEIGHT_MEDIUM,    // User has changed an email
        'B21'   => self::RULE_WEIGHT_MEDIUM,    // Multiple devices in one session
        'D04'   => self::RULE_WEIGHT_MEDIUM,    // Rare browser device
        'D05'   => self::RULE_WEIGHT_MEDIUM,    // Rare OS device
        'I03'   => self::RULE_WEIGHT_MEDIUM,    // IP appears in spam list
        'I09'   => self::RULE_WEIGHT_MEDIUM,    // Numerous IPs
        // High
        'B04'   => self::RULE_WEIGHT_HIGH,      // Multiple 5xx errors
        'B05'   => self::RULE_WEIGHT_HIGH,      // Multiple 4xx errors
        'B19'   => self::RULE_WEIGHT_HIGH,      // Night time requests
        'B20'   => self::RULE_WEIGHT_HIGH,      // Multiple countries in one session
        'D01'   => self::RULE_WEIGHT_HIGH,      // Device is unknown
        // Extreme
        'A01'   => self::RULE_WEIGHT_EXTREME,   // Multiple login fail
        'A02'   => self::RULE_WEIGHT_EXTREME,   // Login failed on new device
        'A05'   => self::RULE_WEIGHT_EXTREME,   // Password change on new device
        'A06'   => self::RULE_WEIGHT_EXTREME,   // Password change in new country
        'B06'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable URL
        'E19'   => self::RULE_WEIGHT_EXTREME,   // Multiple emails changed
        'I01'   => self::RULE_WEIGHT_EXTREME,   // IP belongs to TOR
        'I04'   => self::RULE_WEIGHT_EXTREME,   // Shared IP
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
    ];

    public const DEFAULT_RULES_CREDENTIAL_STUFFING = [
        // High
        'A01'   => self::RULE_WEIGHT_HIGH,      // Multiple login fail
        'A02'   => self::RULE_WEIGHT_HIGH,      // Login failed on new device
        'B04'   => self::RULE_WEIGHT_HIGH,      // Multiple 5xx errors
        'B05'   => self::RULE_WEIGHT_HIGH,      // Multiple 4xx errors
        'B06'   => self::RULE_WEIGHT_HIGH,      // Potentially vulnerable URL
        'I02'   => self::RULE_WEIGHT_HIGH,      // IP hosting domain
        'I03'   => self::RULE_WEIGHT_HIGH,      // IP appears in spam list
        'I06'   => self::RULE_WEIGHT_HIGH,      // IP belongs to datacenter
        // Extreme
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
    ];

    public const DEFAULT_RULES_CONTENT_SPAM = [
        // High
        'B11'   => self::RULE_WEIGHT_HIGH,      // New account (1 day)
        'B26'   => self::RULE_WEIGHT_HIGH,      // Single event sessions
        'E03'   => self::RULE_WEIGHT_HIGH,      // Suspicious words in email
        'E04'   => self::RULE_WEIGHT_HIGH,      // Numeric email name
        'E21'   => self::RULE_WEIGHT_HIGH,      // No vowels in email
        'I02'   => self::RULE_WEIGHT_HIGH,      // IP hosting domain
        'I03'   => self::RULE_WEIGHT_HIGH,      // IP appears in spam list
        // Extreme
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
        'R02'   => self::RULE_WEIGHT_EXTREME,   // Email in blacklist
    ];

    public const DEFAULT_RULES_ACCOUNT_REGISTRATION = [
        // Positive
        'E23'   => self::RULE_WEIGHT_POSITIVE,  // Educational domain (.edu)
        'E24'   => self::RULE_WEIGHT_POSITIVE,  // Government domain (.gov)
        'E25'   => self::RULE_WEIGHT_POSITIVE,  // Military domain (.mil)
        'E26'   => self::RULE_WEIGHT_POSITIVE,  // iCloud mailbox
        'I08'   => self::RULE_WEIGHT_POSITIVE,  // IP belongs to Starlink
        'I10'   => self::RULE_WEIGHT_POSITIVE,  // Only residential IPs
        // Medium
        'D08'   => self::RULE_WEIGHT_MEDIUM,    // Two or more phone devices
        'D09'   => self::RULE_WEIGHT_MEDIUM,    // Old browser
        'E07'   => self::RULE_WEIGHT_MEDIUM,    // Long email username
        'E08'   => self::RULE_WEIGHT_MEDIUM,    // Long domain name
        'E21'   => self::RULE_WEIGHT_MEDIUM,    // No vowels in email
        'E22'   => self::RULE_WEIGHT_MEDIUM,    // No consonants in email
        'I05'   => self::RULE_WEIGHT_MEDIUM,    // IP belongs to commercial VPN
        'I06'   => self::RULE_WEIGHT_MEDIUM,    // IP belongs to datacenter
        // High
        'B19'   => self::RULE_WEIGHT_HIGH,      // Night time requests
        'B21'   => self::RULE_WEIGHT_HIGH,      // Multiple devices in one session
        'B22'   => self::RULE_WEIGHT_HIGH,      // Multiple IP addresses in one session
        'B23'   => self::RULE_WEIGHT_HIGH,      // User's full name contains space or hyphen
        'D01'   => self::RULE_WEIGHT_HIGH,      // Device is unknown
        'D03'   => self::RULE_WEIGHT_HIGH,      // Device is bot
        'D04'   => self::RULE_WEIGHT_HIGH,      // Rare browser device
        'D07'   => self::RULE_WEIGHT_HIGH,      // Several desktop devices
        'D10'   => self::RULE_WEIGHT_HIGH,      // Potentially vulnerable User-Agent
        'E01'   => self::RULE_WEIGHT_HIGH,      // Invalid email format
        'E03'   => self::RULE_WEIGHT_HIGH,      // Suspicious words in email
        'E04'   => self::RULE_WEIGHT_HIGH,      // Numeric email name
        'E06'   => self::RULE_WEIGHT_HIGH,      // Consecutive digits in email
        'I02'   => self::RULE_WEIGHT_HIGH,      // IP hosting domain
        'I03'   => self::RULE_WEIGHT_HIGH,      // IP appears in spam list
        'I04'   => self::RULE_WEIGHT_HIGH,      // Shared IP
        // Extreme
        'B07'   => self::RULE_WEIGHT_EXTREME,   // User's full name contains digits
        'B18'   => self::RULE_WEIGHT_EXTREME,   // HEAD request
        'I01'   => self::RULE_WEIGHT_EXTREME,   // IP belongs to TOR
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
        'R03'   => self::RULE_WEIGHT_EXTREME,   // Phone in blacklist
    ];

    public const DEFAULT_RULES_FRAUD_PREVENTION = [
        // Positive
        'E23'   => self::RULE_WEIGHT_POSITIVE,  // Educational domain (.edu)
        'E24'   => self::RULE_WEIGHT_POSITIVE,  // Government domain (.gov)
        'E25'   => self::RULE_WEIGHT_POSITIVE,  // Military domain (.mil)
        'E26'   => self::RULE_WEIGHT_POSITIVE,  // iCloud mailbox
        // Medium
        'D07'   => self::RULE_WEIGHT_MEDIUM,    // Several desktop devices
        'D08'   => self::RULE_WEIGHT_MEDIUM,    // Two or more phone devices
        // High
        'B19'   => self::RULE_WEIGHT_HIGH,      // Night time requests
        'B20'   => self::RULE_WEIGHT_HIGH,      // Multiple countries in one session
        'B21'   => self::RULE_WEIGHT_HIGH,      // Multiple devices in one session
        'B22'   => self::RULE_WEIGHT_HIGH,      // Multiple IP addresses in one session
        'E03'   => self::RULE_WEIGHT_HIGH,      // Suspicious words in email
        'E04'   => self::RULE_WEIGHT_HIGH,      // Numeric email name
        'E06'   => self::RULE_WEIGHT_HIGH,      // Consecutive digits in email
        'E07'   => self::RULE_WEIGHT_HIGH,      // Long email username
        'E21'   => self::RULE_WEIGHT_HIGH,      // No vowels in email
        'I02'   => self::RULE_WEIGHT_HIGH,      // IP hosting domain
        'I03'   => self::RULE_WEIGHT_HIGH,      // IP appears in spam list
        'I04'   => self::RULE_WEIGHT_HIGH,      // Shared IP
        'I05'   => self::RULE_WEIGHT_HIGH,      // IP belongs to commercial VPN
        'I06'   => self::RULE_WEIGHT_HIGH,      // IP belongs to datacenter
        'I09'   => self::RULE_WEIGHT_HIGH,      // Numerous IPs
        'P03'   => self::RULE_WEIGHT_HIGH,      // Shared phone number
        // Extreme
        'I01'   => self::RULE_WEIGHT_EXTREME,   // IP belongs to TOR
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
        'R03'   => self::RULE_WEIGHT_EXTREME,   // Phone in blacklist
    ];

    public const DEFAULT_RULES_INSIDER_THREAT = [
        // Extreme
        'B04'   => self::RULE_WEIGHT_EXTREME,   // Multiple 5xx errors
        'B05'   => self::RULE_WEIGHT_EXTREME,   // Multiple 4xx errors
        'B06'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable URL
        'B19'   => self::RULE_WEIGHT_EXTREME,   // Night time requests
        'D10'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable User-Agent
        'I01'   => self::RULE_WEIGHT_EXTREME,   // IP belongs to TOR
    ];

    public const DEFAULT_RULES_BOT_DETECTION = [
        // Positive
        'I10'   => self::RULE_WEIGHT_POSITIVE,  // Only residential IPs
        // Medium
        'D02'   => self::RULE_WEIGHT_MEDIUM,    // Device is Linux
        // High
        'B19'   => self::RULE_WEIGHT_HIGH,      // Night time requests
        'D01'   => self::RULE_WEIGHT_HIGH,      // Device is unknown
        'D04'   => self::RULE_WEIGHT_HIGH,      // Rare browser device
        'D05'   => self::RULE_WEIGHT_HIGH,      // Rare OS device
        'D09'   => self::RULE_WEIGHT_HIGH,      // Old browser
        'I01'   => self::RULE_WEIGHT_HIGH,      // IP belongs to TOR
        'I02'   => self::RULE_WEIGHT_HIGH,      // IP hosting domain
        'I06'   => self::RULE_WEIGHT_HIGH,      // IP belongs to datacenter
        // Extreme
        'B04'   => self::RULE_WEIGHT_EXTREME,   // Multiple 5xx errors
        'B05'   => self::RULE_WEIGHT_EXTREME,   // Multiple 4xx errors
        'B06'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable URL
        'B18'   => self::RULE_WEIGHT_EXTREME,   // HEAD request
        'D03'   => self::RULE_WEIGHT_EXTREME,   // Device is bot
        'D10'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable User-Agent
        'I03'   => self::RULE_WEIGHT_EXTREME,   // IP appears in spam list
    ];

    public const DEFAULT_RULES_DORMANT_ACCOUNT = [
        // Extreme
        'B09'   => self::RULE_WEIGHT_EXTREME,   // Dormant account (90 days)
    ];

    public const DEFAULT_RULES_MULTI_ACCOUNTING = [
        // Medium
        'D07'   => self::RULE_WEIGHT_MEDIUM,    // Several desktop devices
        'D08'   => self::RULE_WEIGHT_MEDIUM,    // Two or more phone devices
        'I09'   => self::RULE_WEIGHT_MEDIUM,    // Numerous IPs
        // High
        'D06'   => self::RULE_WEIGHT_HIGH,      // Multiple devices per user
        'B22'   => self::RULE_WEIGHT_HIGH,      // Multiple IP addresses in one session
        // Extreme
        'I04'   => self::RULE_WEIGHT_EXTREME,   // Shared IP
        'P03'   => self::RULE_WEIGHT_EXTREME,   // Shared phone number
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
        'R02'   => self::RULE_WEIGHT_EXTREME,   // Email in blacklist
        'R03'   => self::RULE_WEIGHT_EXTREME,   // Phone in blacklist
    ];

    public const DEFAULT_RULES_PROMO_ABUSE = [
        // Medium
        'E06'   => self::RULE_WEIGHT_MEDIUM,    // Consecutive digits in email
        // High
        'B12'   => self::RULE_WEIGHT_HIGH,      // New account (1 week)
        'D06'   => self::RULE_WEIGHT_HIGH,      // Multiple devices per user
        'E03'   => self::RULE_WEIGHT_HIGH,      // Suspicious words in email
        'E04'   => self::RULE_WEIGHT_HIGH,      // Numeric email name
        'I02'   => self::RULE_WEIGHT_HIGH,      // IP hosting domain
        'I05'   => self::RULE_WEIGHT_HIGH,      // IP belongs to commercial VPN
        'I06'   => self::RULE_WEIGHT_HIGH,      // IP belongs to datacenter
        // Extreme
        'I04'   => self::RULE_WEIGHT_EXTREME,   // Shared IP
        'P03'   => self::RULE_WEIGHT_EXTREME,   // Shared phone number
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
        'R02'   => self::RULE_WEIGHT_EXTREME,   // Email in blacklist
    ];

    public const DEFAULT_RULES_API_PROTECTION = [
        // Medium
        'B24'   => self::RULE_WEIGHT_MEDIUM,    // Empty referer
        // High
        'D01'   => self::RULE_WEIGHT_HIGH,      // Device is unknown
        // Extreme
        'B04'   => self::RULE_WEIGHT_EXTREME,   // Multiple 5xx errors
        'B05'   => self::RULE_WEIGHT_EXTREME,   // Multiple 4xx errors
        'B06'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable URL
        'B18'   => self::RULE_WEIGHT_EXTREME,   // HEAD request
        'D03'   => self::RULE_WEIGHT_EXTREME,   // Device is bot
        'D10'   => self::RULE_WEIGHT_EXTREME,   // Potentially vulnerable User-Agent
        'I01'   => self::RULE_WEIGHT_EXTREME,   // IP belongs to TOR
        'R01'   => self::RULE_WEIGHT_EXTREME,   // IP in blacklist
    ];

    public const DEFAULT_RULES_HIGH_RISK_REGIONS = [
        // High
        'C01'   => self::RULE_WEIGHT_HIGH,      // Nigeria IP address
        'C03'   => self::RULE_WEIGHT_HIGH,      // China IP address
        'C11'   => self::RULE_WEIGHT_HIGH,      // Russia IP address
    ];
}
