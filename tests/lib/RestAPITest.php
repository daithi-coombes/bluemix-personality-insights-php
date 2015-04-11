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

    /**
     * @covers connect()
     * @covers getResult()
     * @group foo
     */
    public function testAuthentication()
    {

        $text = file_get_contents('tests/sampleText.txt'),
        $body = json_encode(array(
            'data' => $text
        ));
        $config = Config::getInstance();
        $credentials = $config->getParams()['credentials'];
        $url = $credentials['url'] . '/v2/profile';

        $client = new \GuzzleHttp\Client(array(
            'defaults' => array(
                'auth' => array($credentials['username'], $credentials['password']),
            ),
        ));

        $response = $client->post(
            $url,
            array(
                'body' => $blob,
                'headers' => array('Content-Type' => 'text/plain'),
                'future' => true,
            )
        );

        echo $response->getBody();

        die();

        $actual = RestAPI::factory()
            ->connect(Config::getInstance())
            ->getResult();
        $expected = array('http-code', '200');

        $this->assertSame($expected, $actual);
    }
}
