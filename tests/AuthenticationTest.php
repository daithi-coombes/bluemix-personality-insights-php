<?php
/**
 * Authentication tests
 */
 namespace PersonalityInsightsPHPTest;
 use PersonalityInsightsPHP;

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

        $config = PersonalityInsightsPHP\Config::getInstance();
        $client = new \GuzzleHttp\Client();

        $auth_reflection = new \ReflectionClass("PersonalityInsightsPHP\Authentication");
        $actual = $auth_reflection->getProperty('_config');
        $actual->setAccessible(true);

        $auth = new PersonalityInsightsPHP\Authentication( $config );

        $this->assertSame($config, $actual->getValue($auth) );
    }

    /**
     * @todo mock config instance
     */
    public function testConfigSet()
    {
        $config = PersonalityInsightsPHP\Config::getInstance();
        $auth = new PersonalityInsightsPHP\Authentication( $config );
    }

    /**
     * @depends testConfigSet()
     */
    public function testAuthenticate()
    {

        $auth = new PersonalityInsightsPHP\Authentication( $config );
        $actual = $auth->getResult();
        $expected = json_encode(array());

        $this->assertSame($expected, $actual);
    }
}
