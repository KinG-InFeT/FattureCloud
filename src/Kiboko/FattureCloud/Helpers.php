<?php
namespace Kiboko\FattureCloud;

Trait Helpers
{
    /**
     * GENERICHE
     **/

    public function doRichiestaInfo($data = []) {
        return self::doRequest('richiesta/info', $data);
    }

    public function doInfo($data = []) {
        return self::doRequest('mail/lista', $data);
    }


    /**
     * ANAGRAFICA - CLIENTI
     **/

    public function doClientiLista($data = []) {
        return self::doRequest('clienti/lista', $data);
    }

    public function doClientiNuovo($data = []) {
        return self::doRequest('clienti/nuovo', $data);
    }

    public function doClientiImporta($data = []) {
        return self::doRequest('clienti/importa', $data);
    }

    public function doClientiModifica($data = []) {
        return self::doRequest('clienti/modifica', $data);
    }

    public function doClientiElimina($data = []) {
        return self::doRequest('clienti/elimina', $data);
    }


    /**
     * ANAGRAFICA - FORNITORI
     **/

    public function doFornitoriLista($data = []) {
        return self::doRequest('fornitori/lista', $data);
    }

    public function doFornitoriNuovo($data = []) {
        return self::doRequest('fornitori/nuovo', $data);
    }

    public function doFornitoriImporta($data = []) {
        return self::doRequest('fornitori/importa', $data);
    }

    public function doFornitoriModifica($data = []) {
        return self::doRequest('fornitori/modifica', $data);
    }

    public function doFornitoriElimina($data = []) {
        return self::doRequest('fornitori/elimina', $data);
    }


    /**
     * PRODOTTI
     **/

    public function doProdottiLista($data = []) {
        return self::doRequest('prodotti/lista', $data);
    }

    public function doProdottiNuovo($data = []) {
        return self::doRequest('prodotti/nuovo', $data);
    }

    public function doProdottiImporta($data = []) {
        return self::doRequest('prodotti/importa', $data);
    }

    public function doProdottiModifica($data = []) {
        return self::doRequest('prodotti/modifica', $data);
    }

    public function doProdottiElimina($data = []) {
        return self::doRequest('prodotti/elimina', $data);
    }


    /**
     * DOCUMENTI EMESSI - FATTURE
     **/

    public function doFattureLista($data = []) {
        return self::doRequest('fatture/lista', $data);
    }

    public function doFattureDettagli($data = []) {
        return self::doRequest('fatture/dettagli', $data);
    }

    public function doFattureNuovo($data = []) {
        return self::doRequest('fatture/nuovo', $data);
    }

    public function doFattureModifica($data = []) {
        return self::doRequest('fatture/modifica', $data);
    }

    public function doFattureElimina($data = []) {
        return self::doRequest('fatture/elimina', $data);
    }

    public function doFattureInfo($data = []) {
        return self::doRequest('fatture/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - PROFORMA
     **/

    public function doProformaLista($data = []) {
        return self::doRequest('proforma/lista', $data);
    }

    public function doProformaDettagli($data = []) {
        return self::doRequest('proforma/dettagli', $data);
    }

    public function doProformaNuovo($data = []) {
        return self::doRequest('proforma/nuovo', $data);
    }

    public function doProformaModifica($data = []) {
        return self::doRequest('proforma/modifica', $data);
    }

    public function doProformaElimina($data = []) {
        return self::doRequest('proforma/elimina', $data);
    }

    public function doProformaInfo($data = []) {
        return self::doRequest('proforma/info', $data);
    }

    /**
     * DOCUMENTI EMESSI - ORDINI
     **/

    public function doOrdiniLista($data = []) {
        return self::doRequest('ordini/lista', $data);
    }

    public function doOrdiniDettagli($data = []) {
        return self::doRequest('ordini/dettagli', $data);
    }

    public function doOrdiniNuovo($data = []) {
        return self::doRequest('ordini/nuovo', $data);
    }

    public function doOrdiniModifica($data = []) {
        return self::doRequest('ordini/modifica', $data);
    }

    public function doOrdiniElimina($data = []) {
        return self::doRequest('ordini/elimina', $data);
    }

    public function doOrdiniInfo($data = []) {
        return self::doRequest('ordini/info', $data);
    }

    /**
     * DOCUMENTI EMESSI - ORDINI
     **/

    public function doPreventiviLista($data = []) {
        return self::doRequest('preventivi/lista', $data);
    }

    public function doPreventiviDettagli($data = []) {
        return self::doRequest('preventivi/dettagli', $data);
    }

    public function doPreventiviNuovo($data = []) {
        return self::doRequest('preventivi/nuovo', $data);
    }

    public function doPreventiviModifica($data = []) {
        return self::doRequest('preventivi/modifica', $data);
    }

    public function doPreventiviElimina($data = []) {
        return self::doRequest('preventivi/elimina', $data);
    }

    public function doPreventiviInfo($data = []) {
        return self::doRequest('preventivi/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - Note Di Credito
     **/

    public function doNdcLista($data = []) {
        return self::doRequest('ndc/lista', $data);
    }

    public function doNdcDettagli($data = []) {
        return self::doRequest('ndc/dettagli', $data);
    }

    public function doNdcNuovo($data = []) {
        return self::doRequest('ndc/nuovo', $data);
    }

    public function doNdcModifica($data = []) {
        return self::doRequest('ndc/modifica', $data);
    }

    public function doNdcElimina($data = []) {
        return self::doRequest('ndc/elimina', $data);
    }

    public function doNdcInfo($data = []) {
        return self::doRequest('ndc/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - RICEVUTE
     **/

    public function doRicevuteLista($data = []) {
        return self::doRequest('ricevute/lista', $data);
    }

    public function doRicevuteDettagli($data = []) {
        return self::doRequest('ricevute/dettagli', $data);
    }

    public function doRicevuteNuovo($data = []) {
        return self::doRequest('ricevute/nuovo', $data);
    }

    public function doRicevuteModifica($data = []) {
        return self::doRequest('ricevute/modifica', $data);
    }

    public function doRicevuteElimina($data = []) {
        return self::doRequest('ricevute/elimina', $data);
    }

    public function doRicevuteInfo($data = []) {
        return self::doRequest('ricevute/info', $data);
    }


    /**
     * DOCUMENTI EMESSI - DDT
     **/

    public function doDdtLista($data = []) {
        return self::doRequest('ddt/lista', $data);
    }

    public function doDdtDettagli($data = []) {
        return self::doRequest('ddt/dettagli', $data);
    }

    public function doDdtNuovo($data = []) {
        return self::doRequest('ddt/nuovo', $data);
    }

    public function doDdtModifica($data = []) {
        return self::doRequest('ddt/modifica', $data);
    }

    public function doDdtElimina($data = []) {
        return self::doRequest('ddt/elimina', $data);
    }

    public function doDdtInfo($data = []) {
        return self::doRequest('ddt/info', $data);
    }

    /**
     * ACQUISTI
     **/

    public function doAcquistiLista($data = []) {
        return self::doRequest('acquisti/lista', $data);
    }

    public function doAcquistiDettagli($data = []) {
        return self::doRequest('acquisti/dettagli', $data);
    }

    /**
     * MAIL
     **/

    public function doMailLista($data = []) {
        return self::doRequest('mail/lista', $data);
    }
}