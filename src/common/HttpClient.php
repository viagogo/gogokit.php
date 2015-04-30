<?php 

namespace Viagogo\Common;

use Viagogo\Exceptions\ViagogoRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\AdapterException;
use GuzzleHttp\Exception\RequestException;

/**
* 
*/
class HttpClient
{	
  /**
   * @var array The headers to be sent with the request
   */
  protected $requestHeaders = array();

  /**
   * @var array The headers received from the response
   */
  protected $responseHeaders = array();

  /**
   * @var int The HTTP status code returned from the server
   */
  protected $responseHttpStatusCode = 0;

  /**
   * @var \GuzzleHttp\Client The Guzzle client
   */
  protected $guzzleClient;

  /**
   * @param \GuzzleHttp\Client|null The Guzzle client
   */
  public function __construct($auth = array())
  {
      $this->guzzleClient = empty($auth) 
          ? new Client()
          : new Client(['defaults' => ['auth' => $auth]]);
  }

  /**
   * The headers we want to send with the request
   *
   * @param string $key
   * @param string $value
   */
  public function setRequestHeader($key, $value)
  {
    $this->requestHeaders[$key] = $value;
  }

  /**
   * The headers returned in the response
   *
   * @return array
   */
  public function getResponseHeaders()
  {
    return $this->responseHeaders;
  }

  /**
   * The HTTP status response code
   *
   * @return int
   */
  public function getResponseHttpStatusCode()
  {
    return $this->responseHttpStatusCode;
  }

  /**
   * Sends a request to the server
   *
   * @param string $url The endpoint to send the request to
   * @param string $method The request method
   * @param array  $bodyParameters The key value pairs to be sent in the body
   *
   * @return response from the server
   *
   * @throws \Viagogo\ViagogoException
   */
  public function send($url, $method = 'GET', $queryParameters = array(), $bodyParameters = array())
  {
    $options = array();
    if ($bodyParameters) {
      $options['body'] = $bodyParameters;
    }

    if ($queryParameters) {
      $options['query'] = $queryParameters;
    }

    $request = $this->guzzleClient->createRequest($method, $url, $options);

    foreach($this->requestHeaders as $k => $v) {
      $request->setHeader($k, $v);
    }

    try 
    {
      $response = $this->guzzleClient->send($request);
    } 
    catch (RequestException $e) 
    {
        throw new ViagogoRequestException($e->getMessage(), $e->getCode());
    }

    $this->responseHttpStatusCode = $response->getStatusCode();
    $this->responseHeaders = $response->getHeaders();

    return json_decode($response->getBody());
  }

}
