<?php

namespace AppBundle\Tests\Controller;

use Lakion\ApiTestCase\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class PostControllerApiTest extends JsonApiTestCase
{
    function testGetPostsListResponse()
    {
        $this->loadFixturesFromFile('posts.yml');

        $this->client->request('GET', '/posts/');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/index_response');
    }

    function testCreatePostResponse()
    {
        $data =
<<<EOT
        {
            "title": "Easy API testing with ApiTestCase",
            "author": "Łukasz A. Chruściel"
        }
EOT;
        $this->client->request('POST', '/posts/', [], [], [
            'CONTENT_TYPE' => 'application/json',
        ], $data);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/create_response', Response::HTTP_CREATED);
    }

    function testCreatePostValidationFailedResponse()
    {
        $this->client->request('POST', '/posts/');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/validation_failed_response', Response::HTTP_BAD_REQUEST);
    }

    function testGetPostNotFoundResponse()
    {
        $this->client->request('GET', '/posts/-1');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/not_found_response', Response::HTTP_NOT_FOUND);
    }

    function testGetPostResponse()
    {
        $posts = $this->loadFixturesFromFile('posts.yml');

        $this->client->request('GET', '/posts/' . $posts['post1']->getId());

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/show_response');
    }

    function testFullPostUpdateNotFoundResponse()
    {
        $this->client->request('PUT', '/posts/-1');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/not_found_response', Response::HTTP_NOT_FOUND);
    }

    function testFullPostUpdateResponse()
    {
        $posts = $this->loadFixturesFromFile('posts.yml');

        $data =
<<<EOT
        {
            "title": "Rapid API Development",
            "author": "Łukasz Chruściel"
        }
EOT;
        $this->client->request('PUT', '/posts/' . $posts['post1']->getId(), [], [], [
            'CONTENT_TYPE' => 'application/json',
        ], $data);

        $response = $this->client->getResponse();
        $this->assertResponseCode($response, Response::HTTP_NO_CONTENT);
    }

    function testFullPostUpdateValidationFailedResponse()
    {
        $posts = $this->loadFixturesFromFile('posts.yml');

        $this->client->request('PUT', '/posts/' . $posts['post1']->getId());

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/validation_failed_response', Response::HTTP_BAD_REQUEST);
    }

    function testPartialPostUpdateNotFoundResponse()
    {
        $this->client->request('PATCH', '/posts/-1');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'posts/not_found_response', Response::HTTP_NOT_FOUND);
    }

    function testPartialPostUpdateResponse()
    {
        $posts = $this->loadFixturesFromFile('posts.yml');

        $data =
<<<EOT
        {
            "title": "Rapid API Development"
        }
EOT;
        $this->client->request('PATCH', '/posts/' . $posts['post1']->getId(), [], [], [
            'CONTENT_TYPE' => 'application/json',
        ], $data);

        $response = $this->client->getResponse();
        $this->assertResponseCode($response, Response::HTTP_NO_CONTENT);
    }
}
