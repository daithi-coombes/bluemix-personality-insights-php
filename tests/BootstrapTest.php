<?php
/**
 * functional tests for the bootstrapping
 */
namespace PersonalityInsightsPHPTest;
use PersonalityInsightPHP;

class TestBootstrap extends \PHPUnit_Framework_TestCase{

    //test dependencies are loaded
    public function testDependencyLoading()
    {
        $actual = new \GuzzleHttp\Client();
        $expected = '\\GuzzleHttp\\Client';

        $this->assertInstanceOf($expected, $actual);
    }

    //test configuration loaded
}
