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

    /**
     * Constructor
     * @param Config $config The configuration instance
     */
    public function __construct( Config $config )
    {
        $this->_config = $config;
    }

    public function getResults()
    {

    }
}
