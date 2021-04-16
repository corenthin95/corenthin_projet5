<?php

namespace App\Controllers\Application\Http;

use GuzzleHttp\Psr7\PumpStream;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamInterface;

interface ResponseHttpInterface
{
    public function send();
}