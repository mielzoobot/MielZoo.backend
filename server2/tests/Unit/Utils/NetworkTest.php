<?php

declare(strict_types=1);

namespace Tests\Unit\Utils;

use Tirreno\Utils\Network;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for Tirreno\Utils\Network.
 *
 * Covered (unit-testable without refactor):
 * - Network::safeFileGetContents() (returns content for non-network streams; returns null+[] on warnings/exceptions)
 *
 * Not covered (recommended to refactor first):
 * - Network::sendApiRequest() (depends on VersionControl/Variables/Base config + calls proceedRequest())
 * - Network::proceedRequest() (hard dependency on curl/stream I/O, JSON decode, timeouts; triggers real network)
 *
 * @todo Refactor:
 * - extract side-effecting collaborators behind interfaces:
 *   HttpClientInterface (request method returning code/body/headers/error),
 *   UserAgentProviderInterface (Base/VersionControl),
 *   ApiBaseUrlProviderInterface (Variables).
 * - after that, sendApiRequest() and proceedRequest() become deterministic and properly unit-testable.
 */
final class NetworkTest extends TestCase {
    protected function tearDown(): void {
        /**
         * Network::safeFileGetContents() installs a custom error handler.
         * On some paths (exception branch) it may return before restore_error_handler().
         * To keep the test process isolated, we attempt to restore once per test.
         */
        @restore_error_handler();

        parent::tearDown();
    }

    public function testSafeFileGetContentsReturnsContentForDataStreamWithoutOptions(): void {
        $path = 'data://text/plain,Hello%20World';

        $result = Network::safeFileGetContents($path, null);

        $this->assertIsArray($result);

        $content = $result['content'];
        $headers = $result['headers'];

        $this->assertSame('Hello World', $content);
        $this->assertSame([], $headers);
    }

    public function testSafeFileGetContentsReturnsNullAndEmptyHeadersOnMissingFileWarning(): void {
        /**
         * file_get_contents() on a missing file raises a warning.
         * Network::safeFileGetContents() installs ErrorHandler::exceptionErrorHandler,
         * so the warning becomes an exception and should be caught.
         */
        $path = 'file:///this/path/does/not/exist_' . bin2hex(random_bytes(8));

        $result = Network::safeFileGetContents($path, null);

        $this->assertIsArray($result);

        $content = $result['content'];
        $headers = $result['headers'];

        $this->assertNull($content);
        $this->assertSame([], $headers);
    }

    public function testSafeFileGetContentsAcceptsOptionsAndStillReturnsContentForDataStream(): void {
        $path = 'data://text/plain,OK';

        $options = [
            'http' => [
                'method' => 'GET',
                'header' => "X-Test: 1\r\n",
                'timeout' => 1,
            ],
        ];

        $result = Network::safeFileGetContents($path, $options);

        $content = $result['content'];
        $headers = $result['headers'];

        $this->assertSame('OK', $content);
        $this->assertSame([], $headers);
    }
}
