<?php
/**
 * Authentication tests
 */
 namespace PersonalityInsightsPHPTest;
 use PersonalityInsightsPHP;
 use PersonalityInsightsPHP\Authentication;
 use PersonalityInsightsPHP\Config;
 use PersonalityInsightsPHP\RestAPI;

class TestAuthentication extends \PHPUnit_Framework_TestCase
{

    /**
     * @todo mock up API endpoint, ie no need for credentials & `Config` is
     * decoupled from tests here.
     */
    function setUp()
    {
        global $config,
            $client;

        $client = new \GuzzleHttp\Client();
        $config = Config::getInstance();
    }

    /**
     * @todo mock config instance
     */
    public function testConfigSet()
    {
        $config = Config::getInstance();

        $auth_reflection = new \ReflectionClass("PersonalityInsightsPHP\Authentication");
        $actual = $auth_reflection->getProperty('_config');
        $actual->setAccessible(true);

        $auth = new Authentication( $config );

        $this->assertSame($config, $actual->getValue($auth) );
    }

    /**
     * @covers connect()
     */
    public function testAuthenticate()
    {
        global $config;

        $auth = Authentication::factory( $config )
            ->connect(new RestAPI);
        var_dump($auth);
        $actual = $auth->getResult();
        $expected = json_encode(array());

        $this->assertSame($expected, $actual);
    }
}
