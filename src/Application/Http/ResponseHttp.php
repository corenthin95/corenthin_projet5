<?php

namespace App\Application\Http;

use GuzzleHttp\Psr7\PumpStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamInterface;

class ResponseHttp implements ResponseHttpInterface
{
    protected string $datas;

    protected int $statusCode;

    protected array $additionnalHeaders;
    
    public function __construct(string $datas, int $statusCode = 200, array $additionnalHeaders = [])
    {
        $this->datas = $datas;
        $this->statusCode = $statusCode;
        $this->additionnalHeaders = $additionnalHeaders;
    }

    public function send()
    {
        $response = new Response(
            $this->statusCode,
            array_merge(
                ['Content-Type' => 'text/html'],
                $this->additionnalHeaders
            ),
            $this->datas
        );
        return $response->getBody();
    }
}