<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    /**
     * @dataProvider providerRouteProvider
     */
    public function testProviderRoutes($route, $content)
    {
        $client = static::createClient();

        $crawler = $client->request('GET', $route);

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertContains($content, $crawler->filter('a')->text());
    }

    public function providerRouteProvider()
    {
        return [
            ['/login/facebook','https://www.facebook.com/v2.0/dialog/oauth?'],
            ['/login/google', 'https://accounts.google.com/o/oauth2/auth?'],
        ];
    }

    /**
     * @dataProvider baseRouteProvider
     */
    public function testBaseRoutes($route)
    {
        $client = static::createClient();
        $client->request('GET', $route);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function baseRouteProvider()
    {
        return [
            ['/login'],
            ['/register/'],
            ['/resetting/request'],
        ];
    }
}
