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

    public function testFactory()
    {
        global $config;

        //test RestAPI constructed
        $actual = RestAPI::factory($config);
        $expected = '\\PersonalityInsightsPHP\RestAPI';
        $this->assertInstanceOf($expected, $actual);

        //test client setup
        $actual = $actual->getWorker();
        $expected = '\\GuzzleHttp\\Client';
        $this->assertInstanceOf($expected, $actual);
    }

    public function testAnalyzeBlob()
    {
        global $config;
        $text = file_get_contents('tests/sampleText.txt');

        $response = RestAPI::factory($config)
            ->analyzeBlob($text);
        $actual = $response->getStatusCode();
        $expected = 200;

        $this->assertEquals($expected, $actual);
    }

}
