<?php

namespace App\Controllers\Application\Http;

use GuzzleHttp\Psr7\PumpStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamInterface;

class ResponseHttpObject implements ResponseHttpInterface
{
    protected string $data;

    protected int $statusCode;

    protected array $additionalHeaders;

    public function __construct(
        string $datas,
        int $statusCode = 200,
        array $additionalHeaders = []
    ){
        $this->datas = $datas;
        $this->statusCode = $statusCode;
        $this->additionalHeaders = $additionalHeaders;
        
    }
    public function send(): PumpStream|Stream|StreamInterface|null
    {
        $response = new Response(
            $this->statusCode,
            array_merge(
                ['Content-Type' => 'text/html'],
                $this->additionalHeaders
            ),
            $this->datas
        );

        return $response->getBody();
    }
}