<?php

namespace Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class IntegrationTest extends TestCase
{
    public function testApiIsResponding()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://brasilapi.com.br/api/feriados/v1/2024');

        $this->assertEquals(200, $response->getStatusCode());

        $responseData = json_decode($response->getBody(), true);

        $this->assertIsArray($responseData);
    }
}
