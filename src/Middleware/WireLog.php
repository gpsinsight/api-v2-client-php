<?php

namespace GpsInsight\Api\V2\Middleware;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

/**
 * Simple PSR Logger implementation used for HTTP wire logging.
 *
 * @internal
 */
class WireLog implements LoggerInterface
{
    use LoggerTrait;

    const MIDDLEWARE_NAME = 'wire_log';

    /** @var resource Stream resource that wire log is written to. */
    private $stream;

    /**
     * Constructs a wire log that outputs to the specified stream.
     *
     * @param resource $stream Stream for outputting logs.
     */
    public function __construct($stream)
    {
        if (!is_resource($stream)) {
            throw new \InvalidArgumentException(
                'You must provide a stream resource for the WireLog.'
            );
        }

        $this->stream = $stream;
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        fwrite($this->stream, "\n{$message}\n");
    }

    /**
     * Returns a wire log message format for the Guzzle MessageFormatter.
     *
     * @return string
     */
    public static function getFormat()
    {
        return str_repeat('>', 80) . "\n{request}\n" . str_repeat('=', 80)
            . "\n{response}\n" . str_repeat('<', 80) . "\n";
    }
}
