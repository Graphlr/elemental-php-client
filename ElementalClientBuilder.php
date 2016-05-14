<?php

namespace Gwingo\Elemental\Client;

use \Curl\Curl;

class ClientBuilder
{
	const DEFAULT_TIMEOUT = 5;
	private static $TIMEOUT_CONFIG_KEY = "timeout";

	protected $config = [];

	function __construct()
	{
		return 'OK';
	}


    /**
     * Creates a new Client factory
     *
     * @return \Gwingo\Elemental\Client\ClientBuilder
     */
    public static function create()
    {
        return new self();
    }


    /**
     * Add a connection to the handled connections
     *
     * @param string $alias
     * @param string $uri
     *
     * @return $this
     */
    public function addConnection( $alias, $username, $apiKey, $hostname )
    {
        $this->config['connections'][$alias] = [
			"username"	=> $username,
			"password"	=> $apiKey,
			"hostname"	=> $hostname
		];

        return $this;
    }


    public function setDefaultTimeout( $timeout )
    {
        $this->config[self::$TIMEOUT_CONFIG_KEY] = (int) $timeout;

        return $this;
    }


    /**
     * Builds a Client based on the connections given
     *
     * @return \Gwingo\Elemental\Client\Client
     */
    public function build()
    {
		$curl = new Curl();
		$curl->setHeader( "Accept", "application/xml" );
		$curl->setHeader( "Content-Type", "application/xml" );
		$curl->setHeader( "X-Auth-User", $this->config['connections']['default']['username'] );
		$curl->setOpt( CURLOPT_SSL_VERIFYPEER, false );

		return new Client( $curl, $this->config['connections']['default']['username'], $this->config['connections']['default']['password'], $this->config['connections']['default']['hostname'] );
    }


    private function getDefaultTimeout()
    {
        return array_key_exists(self::$TIMEOUT_CONFIG_KEY, $this->config) ? $this->config[self::$TIMEOUT_CONFIG_KEY] : self::DEFAULT_TIMEOUT;
    }
}
