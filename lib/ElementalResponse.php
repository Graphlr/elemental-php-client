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


//    public function addResult( ClientResult $result )
//    {
//        $this->_results[] = $result;
//    }


    /**
     * @return Result
     */
//    public function getResult()
//    {
//        if( null !== $this->_results && !$this->_results instanceof Result )
//		{
//            reset( $this->_results );
//
//            return $this->_results[0];
//        }
//
//        return $this->_results;
//    }


    /**
     * @return Result[]
     */
//    public function getResults()
//    {
//        return $this->_results;
//    }


//    public function setResult( Result $result )
//    {
//        $this->_results = $result;
//    }


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


    /**
     * @return bool
     */
//    public function containsResults()
//    {
//        if( isset( $this->_rawResponse['data'] ) && !empty( $this->_rawResponse['data'] ) )
//		{
//            return TRUE;
//        }
//
//        return FALSE;
//    }

    /**
     * @return bool
     */
//    public function containsRows()
//    {
//        if( isset( $this->_rawResponse['columns']) && !empty($this->_rawResponse['columns'] ) )
//		{
//            return TRUE;
//        }
//
//        return FALSE;
//    }


//    public function setRows( array $rows )
//    {
//        $this->rows = $rows;
//    }


//    public function geRows()
//    {
//        return $this->rows;
//    }


    /**
     * @return bool
     */
//    public function hasRows()
//    {
//        return null !== $this->rows;
//    }


    public function getBody()
    {
        return $this->_rawResponse;
    }
}
