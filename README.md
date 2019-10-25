# php-soap-client

webservice for PHP 

check ur php.ini extension:

extension=php_soap.dll  -- enabled

# USAGE

```
        $obj = new SoapClient();
        $obj->baseUrl = 'https://google.com';
        $apiName = 'getMyName';
        $options = [];
        $params = [
            'Username'=>'admin',
            'Password'=>'root'
        ];
        $result = $obj->handleSoapClientRequest($apiName,$options,$params);

        print_r($result);
```

# License

MIT