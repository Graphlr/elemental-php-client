<?php

namespace Gwingo\Elemental\Client;

class ClientResponse
{
    private $_rawResponse;
    private $_arResponse;
    private $_results;
    private $_rows;
    private $_errors = [];

	function __construct( $rawResponse )
	{
		$this->_rawResponse = $rawResponse;
		$this->_arResponse = (array) $this->_rawResponse;
	
	        if( isset( $this->_arResponse['error'] ) )
			{
	            if( !empty( $this->_arResponse['error'] ) )
				{
	                $this->errors[] = $this->_arResponse['error'];
	            }
	        }
	}


    public function getArrayResponse()
    {
        return $this->_arResponse;
    }


    public function getResponse()
    {
        return $this->_rawResponse;
    }


    public function getErrors()
    {
        return $this->errors;
    }


    /**
     * @return bool
     */
    public function hasErrors()
    {
        return !empty( $this->errors );
    }


    public function getBody()
    {
        return $this->_rawResponse;
    }
}
