<?php

namespace JYG\RevestimientosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GaleriaControllerTest extends WebTestCase
{
    public function testNuevaimagen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/NuevaImagenGaleria');
    }

    public function testEditarimagen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/EditarImagenGaleria');
    }

    public function testEliminarimagen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/EliminarImagenGaleria');
    }

    public function testMostrargaleria()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/MostrarGaleria');
    }

}
