<?php

namespace app\libs;

use SoapServiceInterface;

/**
 * Class SoapClient
 *
 * @package app\libs
 * @author binzhizhu
 */
class SoapClient implements SoapServiceInterface
{
    /**
     * BASE URL
     * @var
     */
    public $baseUrl;

    /**
     * call soap request
     *
     * @param string $apiName
     * @param array $options
     * @param array $parameters
     * @return array
     * @throws \Exception
     */
    public function handleSoapClientRequest(string $apiName = '', array $options = [], array $parameters = []): array
    {
        $url = "{$this->baseUrl}?wsdl";   // REMOTE API URL

        $options = [];

        $params = [
            'parameters' => $parameters
        ];

        $resp = null;

        try {
            $client = new \SoapClient($url, $options);
//            var_dump($client->__getFunctions());
            $result = $client->__soapCall('GetPackageType', $params); // RETURN XML DATA

            //TRANSFORM XML DATA TO JSON
            $json = json_encode((array)simplexml_load_string($result));
            $resp = json_decode($json, true);

        } catch (\SoapFault $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }

        return $resp;
    }
    
}