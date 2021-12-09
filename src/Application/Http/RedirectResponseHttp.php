<?php 

namespace App\Application\Http;

use GuzzleHttp\Psr7\PumpStream;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamInterface;

class RedirectResponseHttp implements ResponseHttpInterface
{
    protected string $uriToRedirect;

    public function __construct(string $uriToRedirect)
    {
        $this->uriToRedirect = $uriToRedirect;
    }

    public function send()
    {
        header('Location: '.$this->uriToRedirect);
    }
}