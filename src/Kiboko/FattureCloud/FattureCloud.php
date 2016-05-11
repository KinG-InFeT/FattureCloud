<?php
namespace Kiboko\FattureCloud;

use Illuminate\Contracts\Config\Repository as ConfigRepository;
use GuzzleHttp\Psr7;

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
    public function __construct(ConfigRepository $config ){
        $this->config = $config;
        $this->auth();
    }

    /**
     * Get from config the api auth keys
     * @return $this
     */
    protected function auth( $auth = null )
    {
        if ($auth)
        {
            $this->auth = $auth;
        }
        else
        {
            $this->auth = [
                'api_uid' => \Config::get('fatture-cloud.auth.uid'),
                'api_key' => \Config::get('fatture-cloud.auth.key')
            ];
        }

        return $this;
    }

    public function setRequestMetod($method = null)
    {
        $valid = [
            'PUT', 'POST', 'GET', 'HEAD', 'DELETE', 'OPTIONS'
        ];
        if($method && in_array($method,$valid)) $this->method = $method;

        return $this;
    }

    public function doRequest($endpoint = 'richiesta/info', $data = [])
    {
        $response = null;
        $data = ($data) ? $data : [];
        try {
            $params = array_merge($this->auth,$data);
            $url = implode("/", [\Config::get('fatture-cloud.base_url'), \Config::get('fatture-cloud.api_version')]) . '/' . $endpoint;
            $options = array(
                "http" => array(
                    "header"  => "Content-type: text/json\r\n",
                    "method"  => "POST",
                    "content" => json_encode($params)
                ),
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            return $this->parseResponse($result);
        }
        catch(ClientException $clientException) {
            switch ($clientException->getResponse()->getStatusCode()) {
                case '404':
                    return json_encode([
                        'error' => "Endpoint non esistente",
                        'error_code' => "404"
                    ]);
                    break;
            }
        }

        return $this;

    }

    protected function parseResponse($response)
    {
        if($this->isResponseValid($response)) return $response;
        else {
            return json_encode([
                'error' => "Non riesco a leggere la risposta",
                'error_code' => "500"
            ]);
        }
    }

    private function isResponseValid($string)
    {
        json_decode($string,true);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function getAuth( )
    {
        return $this->auth;
    }

    public function getConfig( )
    {
        return $this->config;
    }

    public function getClient( )
    {
        return $this->client;
    }

    public function getMethod( )
    {
        return $this->method;
    }

    /**
     * GENERICHE
     **/

    public function doRichiestaInfo($data = []) {
        return $this->doRequest('richiesta/info', $data);
    }

    public function doInfo($data = []) {
        return $this->doRequest('mail/lista', $data);
    }


    /**
     * ANAGRAFICA - CLIENTI
     **/

    public function doClientiLista($data = []) {
        return $this->doRequest('clienti/lista', $data);
    }

    public function doClientiNuovo($data = []) {
        return $this->doRequest('clienti/nuovo', $data);
    }

    public function doClientiImporta($data = []) {
        return $this->doRequest('clienti/importa', $data);
    }

    public function doClientiModifica($data = []) {
        return $this->doRequest('clienti/modifica', $data);
    }

    public function doClientiElimina($data = []) {
        return $this->doRequest('clienti/elimina', $data);
    }


    /**
     * ANAGRAFICA - FORNITORI
     **/

    public function doFornitoriLista($data = []) {
        return $this->doRequest('fornitori/lista', $data);
    }

    public function doFornitoriNuovo($data = []) {
        return $this->doRequest('fornitori/nuovo', $data);
    }

    public function doFornitoriImporta($data = []) {
        return $this->doRequest('fornitori/importa', $data);
    }

    public function doFornitoriModifica($data = []) {
        return $this->doRequest('fornitori/modifica', $data);
    }

    public function doFornitoriElimina($data = []) {
        return $this->doRequest('fornitori/elimina', $data);
    }


    /**
     * PRODOTTI
     **/

    public function doProdottiLista($data = []) {
        return $this->doRequest('prodotti/lista', $data);
    }

    public function doProdottiNuovo($data = []) {
        return $this->doRequest('prodotti/nuovo', $data);
    }

    public function doProdottiImporta($data = []) {
        return $this->doRequest('prodotti/importa', $data);
    }

    public function doProdottiModifica($data = []) {
        return $this->doRequest('prodotti/modifica', $data);
    }

    public function doProdottiElimina($data = []) {
        return $this->doRequest('prodotti/elimina', $data);
    }


    /**
     * DOCUMENTI EMESSI - FATTURE
     **/

    public function doFattureLista($data = []) {
        return $this->doRequest('fatture/lista', $data);
    }

    public function doFattureDettagli($data = []) {
        return $this->doRequest('fatture/dettagli', $data);
    }

    public function doFattureNuovo($data = []) {
        return $this->doRequest('fatture/nuovo', $data);
    }

    public function doFattureModifica($data = []) {
        return $this->doRequest('fatture/modifica', $data);
    }

    public function doFattureElimina($data = []) {
        return $this->doRequest('fatture/elimina', $data);
    }

    public function doFattureInfo($data = []) {
        return $this->doRequest('fatture/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - PROFORMA
     **/

    public function doProformaLista($data = []) {
        return $this->doRequest('proforma/lista', $data);
    }

    public function doProformaDettagli($data = []) {
        return $this->doRequest('proforma/dettagli', $data);
    }

    public function doProformaNuovo($data = []) {
        return $this->doRequest('proforma/nuovo', $data);
    }

    public function doProformaModifica($data = []) {
        return $this->doRequest('proforma/modifica', $data);
    }

    public function doProformaElimina($data = []) {
        return $this->doRequest('proforma/elimina', $data);
    }

    public function doProformaInfo($data = []) {
        return $this->doRequest('proforma/info', $data);
    }

    /**
     * DOCUMENTI EMESSI - ORDINI
     **/

    public function doOrdiniLista($data = []) {
        return $this->doRequest('ordini/lista', $data);
    }

    public function doOrdiniDettagli($data = []) {
        return $this->doRequest('ordini/dettagli', $data);
    }

    public function doOrdiniNuovo($data = []) {
        return $this->doRequest('ordini/nuovo', $data);
    }

    public function doOrdiniModifica($data = []) {
        return $this->doRequest('ordini/modifica', $data);
    }

    public function doOrdiniElimina($data = []) {
        return $this->doRequest('ordini/elimina', $data);
    }

    public function doOrdiniInfo($data = []) {
        return $this->doRequest('ordini/info', $data);
    }

    /**
     * DOCUMENTI EMESSI - ORDINI
     **/

    public function doPreventiviLista($data = []) {
        return $this->doRequest('preventivi/lista', $data);
    }

    public function doPreventiviDettagli($data = []) {
        return $this->doRequest('preventivi/dettagli', $data);
    }

    public function doPreventiviNuovo($data = []) {
        return $this->doRequest('preventivi/nuovo', $data);
    }

    public function doPreventiviModifica($data = []) {
        return $this->doRequest('preventivi/modifica', $data);
    }

    public function doPreventiviElimina($data = []) {
        return $this->doRequest('preventivi/elimina', $data);
    }

    public function doPreventiviInfo($data = []) {
        return $this->doRequest('preventivi/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - Note Di Credito
     **/

    public function doNdcLista($data = []) {
        return $this->doRequest('ndc/lista', $data);
    }

    public function doNdcDettagli($data = []) {
        return $this->doRequest('ndc/dettagli', $data);
    }

    public function doNdcNuovo($data = []) {
        return $this->doRequest('ndc/nuovo', $data);
    }

    public function doNdcModifica($data = []) {
        return $this->doRequest('ndc/modifica', $data);
    }

    public function doNdcElimina($data = []) {
        return $this->doRequest('ndc/elimina', $data);
    }

    public function doNdcInfo($data = []) {
        return $this->doRequest('ndc/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - RICEVUTE
     **/

    public function doRicevuteLista($data = []) {
        return $this->doRequest('ricevute/lista', $data);
    }

    public function doRicevuteDettagli($data = []) {
        return $this->doRequest('ricevute/dettagli', $data);
    }

    public function doRicevuteNuovo($data = []) {
        return $this->doRequest('ricevute/nuovo', $data);
    }

    public function doRicevuteModifica($data = []) {
        return $this->doRequest('ricevute/modifica', $data);
    }

    public function doRicevuteElimina($data = []) {
        return $this->doRequest('ricevute/elimina', $data);
    }

    public function doRicevuteInfo($data = []) {
        return $this->doRequest('ricevute/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - DDT
     **/

    public function doDdtLista($data = []) {
        return $this->doRequest('ddt/lista', $data);
    }

    public function doDdtDettagli($data = []) {
        return $this->doRequest('ddt/dettagli', $data);
    }

    public function doDdtNuovo($data = []) {
        return $this->doRequest('ddt/nuovo', $data);
    }

    public function doDdtModifica($data = []) {
        return $this->doRequest('ddt/modifica', $data);
    }

    public function doDdtElimina($data = []) {
        return $this->doRequest('ddt/elimina', $data);
    }

    public function doDdtInfo($data = []) {
        return $this->doRequest('ddt/info', $data);
    }

    /**
     * ACQUISTI
     **/

    public function doAcquistiLista($data = []) {
        return $this->doRequest('acquisti/lista', $data);
    }

    public function doAcquistiDettagli($data = []) {
        return $this->doRequest('acquisti/dettagli', $data);
    }

    /**
     * MAIL
     **/

    public function doMailLista($data = []) {
        return $this->doRequest('mail/lista', $data);
    }
}