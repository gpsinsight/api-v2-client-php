<?php

namespace GpsInsight\Api\V2;

use GuzzleHttp\Command\Result as GuzzleResult;

/**
 * Represents the result of an API call.
 */
class Result extends GuzzleResult
{
    const STATUS_OK = 'OK';
    const STATUS_ERROR = 'ERROR';

    /** @var array The data in the head of the result, including the status. */
    protected $head;

    /** @var array The errors data (only when there are errors). */
    protected $errors;

    /**
     * Create a representation of the result.
     *
     * @param array $data Parsed result data.
     */
    public function __construct(array $data = [])
    {
        $body = isset($data['data']) ? $data['data'] : [];
        $body = is_string($body) ? ['message' => $body] : $body;

        parent::__construct($body);
        $this->head = isset($data['head']) ? $data['head'] : [];
        $this->errors = isset($data['errors']) ? $data['errors'] : [];
    }

    /**
     * Get the head data of the result.
     *
     * @return array
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Get the main data of the result.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the error data of the result.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Check if the result status is OK.
     *
     * @return bool
     */
    public function isOk()
    {
        return isset($this->head['status']) && $this->head['status'] === self::STATUS_OK;
    }

    /**
     * Get the entire result's data.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'head' => $this->head,
            'data' => $this->data,
            'errors' => $this->errors,
        ];
    }

    /**
     * Returns the result data for var_dump().
     *
     * @return array
     */
    public function __debugInfo()
    {
        return $this->toArray();
    }
}
