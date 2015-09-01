<?php

namespace JYG\RevestimientosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
    public function testProductos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/productos');
    }

    public function testGaleria()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/galeria');
    }

    public function testContacto()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacto');
    }

    public function testAyuda()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ayuda');
    }

    public function testMision()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mision');
    }

    public function testVision()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/vision');
    }

}
