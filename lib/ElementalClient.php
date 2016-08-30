<?php

namespace Gwingo\Elemental\Client;

use \Curl\Curl;

class Client
{
	protected $_connection;
	protected $_username;
	protected $_password;
	protected $_hostname;

	function __construct( Curl $connection, $username, $password, $hostname )
	{
		$this->_connection = $connection;
		$this->_username = $username;
		$this->_password = $password;
		$this->_hostname = $hostname;
	}

	function __destruct()
	{
		if( $this->_connection )
		{
			$this->_connection->close();
		}
	}

	public function get( $query, $params = [] )
	{
		$this->auth( $query );
		$result = $this->_connection->get( $this->_hostname . $query . ( $params ? "?" . http_build_query( $params ) : "" ) );

		return new ClientResponse( $result );
	}

	public function post( $query, $data )
	{
		$this->auth( $query );
		$result = $this->_connection->post( $this->_hostname . $query, $data );

		return new ClientResponse( $result );
	}


	/*
	 * As suggested in the documentation we use a 30 seconds timewindow for our request expires.
	 * Then adding the hash to the header.
	 */
	protected function auth( $query )
	{
		$timestamp = time()+30;

		$this->_connection->setHeader( "X-Auth-Expires", $timestamp );
		$str = $this->_password . md5( $query . $this->_username . $this->_password . $timestamp );
		$hash = md5( $str );

		$this->_connection->setHeader( "X-Auth-Key", $hash );
	}
}
