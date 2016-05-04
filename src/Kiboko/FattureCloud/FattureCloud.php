<?php
namespace Kiboko\FattureCloud;

use Illuminate\Contracts\Config\Repository as ConfigRepository;

class FattureCloud
{
    protected $auth;
    protected $base_url;
    protected $client;
    protected $method = 'POST';

    /**
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * @param \Illuminate\Contracts\Config\Repository $config
     */
    public function __construct(ConfigRepository $config){
        $this->config = $config;
        $this->auth();
        $this->buildEndpoint();
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
                'api_uid' => $this->config->get('fatture-cloud.auth.uid'),
                'api_key' => $this->config->get('fatture-cloud.auth.key')
            ];
        }
    }
    
    protected function buildEndpoint()
    {
        $this->base_url = implode("/", [$this->config->get('fatture-cloud.base_url'), $this->config->get('fatture-cloud.api_version')]);
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
    }

    public function request($endpoint = 'richiesta/info', $data = null) {
        return $this->client->request($this->method, $endpoint, ['json' => array_merge($data, $this->auth) ]);
    }
}