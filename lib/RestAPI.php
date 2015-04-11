<?php
/**
 * RestAPI Adapter for middleware libraries
 */
namespace PersonalityInsightsPHP;
use PersonalityInsightsPHP;
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
        $this->getWorker();
    }

    public static function factory()
    {
        return new RestAPI();
    }

    /**
     * Connect/Authenticate user.
     * @param Config $config The configuration instance.
     * @return RestAPI Returns this instance.
     */
    public function connect(PersonalityInsightsPHP\Config $config)
    {
        $credentials = $config->getParams()['credentials'];
        $url = $credentials['url'];
        StdOut::line("Connecting to {$url}...");

        $client = new GuzzleHttp\Client(array(
            'defaults' => array(
                'auth' => array($credentials['username'], $credentials['password']),
                'body' => "foobar not enought chars",
            ),
        ));
        $client->post($url."/v2/profile");
        die('dead');
        /**
        $this->_response = $this->get($url, array(
            'api_key' => base64_encode($credentials['username'] . ':' . $credentials['password']),
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ));
        */

        $callback($this->_response);
    }

    public function get($url, $params=array())
    {

        $res = $this->getWorker()  //get GuzzleHttp instance
            ->post($url, array(
                'query' => $params,
            ));

        var_dump($res->getBody);
    }

    public function getResult($part='body')
    {
        if ($part=='body') {
            return $this->_response->getBody();
        }
        return $this->_response;
    }

    /**
     * Setup worker, if needed
     */
    private function getWorker()
    {
        if (!$this->_worker instanceOf GuzzleHttp\Client) {
            $this->_worker = new GuzzleHttp\Client();
        }

        return $this->_worker;
    }
}
