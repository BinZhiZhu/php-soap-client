<?php

/**
 * Interface SoapServiceInterface
 */
interface SoapServiceInterface
{
    /**
     * call soap request
     *
     * @param string $apiName
     * @param array $options
     * @param array $parameters
     * @return array
     */
    public function handleSoapClientRequest(string $apiName = '', array $options = [],array $parameters = []): array;
}