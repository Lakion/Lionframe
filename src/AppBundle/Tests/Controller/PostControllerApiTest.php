<?php

namespace Acme\DemoBundle\Tests\Controller;

use Lakion\ApiTestCase\JsonApiTestCase;

class ProductControllerApiTest extends JsonApiTestCase
{
    function testGetPostsListResponse()
    {
        $this->client->request('GET', '/posts/');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'cart/carts_list_response');
    }
}
