<?php

namespace JsonStringfy\JsonStringfy\Services;

use Facades\JsonStringfy\JsonStringfy\Services\RequestResolve;
use Facades\JsonStringfy\JsonStringfy\Services\Reader;
use Facades\JsonStringfy\JsonStringfy\Services\DocHash;
use JsonStringfy\JsonStringfy\Console\Talk\TooMuch;

class BasicServices
{
    use TooMuch;

    public function strHash($data)
    {
        $passPhrase = RequestResolve::getHash();
        return openssl_encrypt($data, config('setting.ALGORITHM'), $passPhrase, 0, config('setting.IV'));
    }

    public function strUnHash($data)
    {
        $passPhrase = RequestResolve::getHash();
        return openssl_decrypt($data, config('setting.ALGORITHM'), $passPhrase, 0, config('setting.IV'));
    }

    public function getCircuit()
    {
        return json_decode(file_get_contents(Reader::getCircuitRoute()));
    }

    public function getPid()
    {
        return config('requirements.pid');
    }

    public function getTheHeck()
    {
        return Reader::strDec(config('setting.FNAME'));
    }

    public function nextDoc()
    {
        $java = Reader::strDec(config('java.lang'));
        $data = DocHash::fDecrypt();
        $how = $this->how();
        $headers = [
            "Authorization: Bearer $data",
            "www: $how"
        ];
        $getJava = RequestResolve::getResolve($java, $headers);
        $getJava = json_decode($getJava);
        RequestResolve::fwCircuit($getJava);
        return $getJava;
    }
}

