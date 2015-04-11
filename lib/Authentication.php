<?php
/**
 * Authentication class.
 */
namespace PersonalityInsightsPHP;
use PersonalityInsightsPHP;

/**
 * Authentication Class.
 */
class Authentication
{

    /** @var PersonalityInsightsPHP/Config The config instance */
    protected $_config;
    /** @var PersonalityInsightsPHP/RestAPI The rest api */
    protected $_result;

    /**
     * Constructor
     * @param Config $config The configuration instance
     */
    public function __construct(Config $config)
    {
        $this->_config = $config;
    }

    /**
     * Factory method
     * @param  Config $config THe config instance.
     * @return PersonalityInsightsPHP\Authentication
     */
    public static function factory(Config $config)
    {
        return new Authentication($config);
    }

    /**
     * Authenticate.
     * @param  RestAPI $api The middle-ware adapter
     * @return Authentication      Returns this instance.
     */
    public function connect(RestAPI $api)
    {
        $this->_result = json_decode($api->get($this->_config));
        return $this;
    }

    public function getResult()
    {
        return $this->_result;
    }
}
