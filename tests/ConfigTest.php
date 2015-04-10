<?php
namespace PersonalityInsightsPHPTest;
use PersonalityInsightsPHP;

class TestConfig extends \PHPUnit_Framework_TestCase
{

    /**
     * @todo double check unit test is functioning.
     */
    public function testSingleton()
    {
        $instance1 = \PersonalityInsightsPHP\Config::getInstance();
        $instance2 = \PersonalityInsightsPHP\Config::getInstance();

        $this->assertSame($instance1, $instance2);
    }

    public function testConfigFile()
    {

        $actual = \PersonalityInsightsPHP\Config::getInstance()
            ->getParams();
        $expected = array(
            'credentials' => array(
                'api-key' => '',
                'api-secret' => '',
            ),
        );

        $this->assertSame($expected, $actual);
    }

    public function testSetConfigParams()
    {
        $expected = array('foo'=>'bar');
        $actual = \PersonalityInsightsPHP\Config::getInstance()
            ->setParams($expected)
            ->getParams();

        $this->assertSame($expected, $actual);
    }
}
