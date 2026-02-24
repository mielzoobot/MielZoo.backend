<?php

declare(strict_types=1);

namespace Tests\Support\Utils\Assets;

use Tirreno\Assets\Rule;

/**
 * Minimal concrete Rule for unit testing:
 * - prepareParams maps raw => prepared
 * - condition checks prepared == expected
 */
final class PreparedEqualsRule extends Rule {
    public function __construct(array $params, private int $expectedPrepared) {
        $ruleBuilder = null;
        parent::__construct($ruleBuilder, $params);
    }

    protected function defineCondition() {
        // Uses Ruler DSL variable accessor: $this->rb['prepared'].
        // Equality is expected to be provided as equalTo(), consistent with other DSL methods. :contentReference[oaicite:1]{index=1}
        $condition = $this->rb['prepared']->equalTo($this->expectedPrepared);
        return $condition;
    }

    protected function prepareParams(array $params): array {
        $value = $params['raw'] ?? null;

        $prepared = [
            'prepared' => $value,
        ];

        return $prepared;
    }
}
