<?php
/**
 * RestAPI Adapter for middleware libraries
 */
namespace PersonalityInsightsPHP;
use PersonalityInsightsPHP;
use PersonalityInsightsPHP\Config;
use GuzzleHttp;

/**
 * Adapter pattern for wrapping 3rd party rest libraries.
 */
class RestAPI
{
    /** @var object The middleware Rest API library */
    protected $_worker;
    /** @var array Last request parsed body */
    protected $_response;

    public function __construct()
    {
    }

    /**
     * Factory method
     * @return RestAPI Returns new instance.
     */
    public static function factory(Config $config)
    {

        $obj = new RestAPI;
        $obj->setupWorker($config);

        return $obj;
    }

    /**
     * Analayze a blob of text.
     * @param string $text The text to analyze
     * @return object Returns the response object of the Client library used.
     */
    public function analyzeBlob($text)
    {

        $config = Config::getInstance();
        $url = $config->getParams()['credentials']['url']
             . '/v2/profile';

        return $this->_worker->post(
            $url,
            array(
                'body' => $text,
                'headers' => array('Content-Type' => 'text/plain'),
            )
        );
    }

    /**
     * Get the current worker.
     * @return object
     */
    public function getWorker()
    {
        if ($this->_worker===null) {
            $config = Config::getInstance();
            $this->setupWorker($config);
        }

        return $this->_worker;
    }

    /**
     * Constructs the middleware REST client library.
     * @param Config $config The configuration singleton.
     */
    public function setupWorker(Config $config)
    {

        $credentials = $config->getParams()['credentials'];

        $this->_worker = new \GuzzleHttp\Client(array(
            'defaults' => array(
                'auth' => array($credentials['username'], $credentials['password']),
            ),
        ));
    }
}
