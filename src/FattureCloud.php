<?php
namespace Kiboko\FattureCloud;


class FattureCloud
{
    private static $instance = null;
    protected $auth;
    protected $base_url;
    protected $client;
    protected $method = 'POST';

    public function __construct(  )
    {
        $this->auth();
        $this->buildEndpoint();
    }

    /**
     * Get from config the api auth keys
     * @return $this
     */
    protected function auth($auth = null)
    {
        if ($auth)
        {
            $this->auth = $auth;
        }
        else
        {
            $this->auth = [
                'api_uid' => config('fatture-cloud.auth.uid'),
                'api_key' => config('fatture-cloud.auth.key')
            ];
        }


        return self::$this;
    }
    
    protected function buildEndpoint()
    {
        $this->base_url = implode("/", [config('fatture-cloud.base_url'), config('fatture-cloud.api_version')]);
    }

    protected function guzzleClient()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => $this->base_url,
            'headers' => ['content-type' => 'application/json']
        ]);
    }

    public function setRequestMetod($method = null)
    {
        $valid = [
            'PUT', 'POST', 'GET', 'HEAD', 'DELETE', 'OPTIONS'
        ];
        if($method && in_array($method,$valid)) $this->method = $method;
        return $this;
    }

    public function request($endpoint = 'richiesta/info', $data = null) {
        return $this->client->request($this->method, $endpoint, ['json' => array_merge($data, $this->auth) ]);
    }
}