<?php

class Geo
{
	protected $api = 'http://www.telize.com/geoip/%s';
	protected $properties = [];

	publuc function __get($key)
	{
		if(isset($this->properties[$key])) {
			return $this->properties[$key];
		}

		return null;
	}

	public funtion request($ip)
	{
		$url = sprintf($this->api, $ip);
		$data = $this->sendReqest($url);
		
		$this->properties = json_decode($data, true);
	}

	protected funtion sendReqest($url)
	{
		$curl = curl_init();
		curl_setopt(Scurl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(Scurl, CURLOPT_URL, $url);
		// Handle error
		return curl_exec($curl);]
	}
}
?>