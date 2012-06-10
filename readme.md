# Pheanstalk for Laravel #

Simple wrapper for [Pheanstalk](https://github.com/pda/pheanstalk). Added static and dynamic loading.

## Installation ##

Copy the config file to `application/config/pheanstalk.php` and update with your connection information

## Usage ##

```php
<?php

// ----------------------------------------
// producer (queues jobs)

// You can change the connection by changing the first parameter `Pheanstalk::connection('beanstalk1')`, connecitons are handled in the config
Pheanstalk::connection()
  ->useTube('testtube')
  ->put("job payload goes here\n");

// Or dynamically load the default connection
Pheanstalk::useTube('testtube')->put("job payload goes here\n");

// ----------------------------------------
// worker (performs jobs)

$pheanstalk = Pheanstalk::connection();

$job = $pheanstalk
  ->watch('testtube')
  ->ignore('default')
  ->reserve();

echo $job->getData();

$pheanstalk->delete($job);

?>
```