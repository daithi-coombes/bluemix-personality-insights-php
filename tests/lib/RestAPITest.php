<?php
/**
 * Authentication tests
 */
 namespace PersonalityInsightsPHPTest;
 use PersonalityInsightsPHP;
 use PersonalityInsightsPHP\Config;
 use PersonalityInsightsPHP\RestAPI;

class TestRestAPI extends \PHPUnit_Framework_TestCase
{

    function setUp()
    {
        global $config,
            $credentials;

        $config = Config::getInstance();
        $credentials = $config->getParams()['credentials'];
    }

    /**
     * @covers connect()
     * @covers getResult()
     */
    public function testAuthentication()
    {


        die();

        $actual = RestAPI::factory()
            ->connect(Config::getInstance())
            ->getResult();
        $expected = array('http-code', '200');

        $this->assertSame($expected, $actual);
    }

    /**
     * @group foo
     */
    public function testPostBlob()
    {
        global $credentials;

        //vars
        $text = file_get_contents('tests/sampleText.txt');
        $body = json_encode(array(
            'data' => $text
        ));
        $url = $credentials['url'] . '/v2/profile';

        //setup client
        $client = new \GuzzleHttp\Client(array(
            'defaults' => array(
                'auth' => array($credentials['username'], $credentials['password']),
            ),
        ));

        //make request
        $response = $client->post(
            $url,
            array(
                'body' => $body,
                'headers' => array('Content-Type' => 'text/plain'),
            )
        );

        //test response
        $actual = $response->getStatusCode();
        $expected = 200;
        $this->assertEquals($expected, $actual);
    }
}
