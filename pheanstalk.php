<?php

class Pheanstalk {

	/**
	 * Returns a new Pheanstalk connection
	 *
	 * @var    string                 $name
	 * @return Pheanstalk\Pheanstalk
	 */  
	public static function connection($name = 'default')
	{
		$config = Config::get('pheanstalk.connections.' . $name);

		if(!$config)
		{
			throw new Exception('No connection with the name `' . $name . '` found.');
		}

		return new Pheanstalk\Pheanstalk($config['host'], $config['port']);
	}

	/**
	 * So we can dynamically call Pheanstalk methods, uses the default connection
	 **/
	public static function __callStatic($method, $parameters)
	{
		$config = Config::get('pheanstalk.connections.default');

		return call_user_func_array(array(new Pheanstalk\Pheanstalk($config['host'], $config['port']), $method), $parameters);
	}

}