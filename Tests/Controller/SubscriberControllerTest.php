<?php

namespace Hermes\Bundle\HermesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SubscriberControllerTest extends WebTestCase
{
    public function testAddPut()
    {
        $client = static::createClient();
        $crawler = $client->request('PUT', '/subscriber/add.json');
    }
}
