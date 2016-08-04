# Silex DI Builder 
[![Build Status](https://travis-ci.org/SilexFriends/Di.png)](https://travis-ci.org/SilexFriends/Di) 
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/7b8ed0fc-2f5a-4e6f-84fd-030430a3482e/mini.png)](https://insight.sensiolabs.com/projects/7b8ed0fc-2f5a-4e6f-84fd-030430a3482e)
[![Dependency Status](https://www.versioneye.com/user/projects/55ddde652383e9002500006d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55ddde652383e9002500006d)
[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/mrprompt/Silex-di-builder.svg)](http://isitmaintained.com/project/mrprompt/Silex-di-builder "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/mrprompt/Silex-di-builder.svg)](http://isitmaintained.com/project/mrprompt/Silex-di-builder "Percentage of issues still open")
[![Codacy Badge](https://api.codacy.com/project/badge/grade/430370f1ef0a45d78cb019d125ff95a7)](https://www.codacy.com/app/mrprompt/silex-di-builder)
[![Code Climate](https://codeclimate.com/github/mrprompt/silex-di-builder/badges/gpa.svg)](https://codeclimate.com/github/mrprompt/silex-di-builder)

A simple dependency injection builder to Silex based on YAML file config.

# Install

```
composer require mrprompt/silex-di-builder
```

## Usage
Simple create a di.yml - or other name, of course - file with the structure:


```
services:
  alias1:
    - Full\Class\Name
    - dependency1

  alias2:
    - Full\ClassTwo\Name
    - dependency1
    - dependency2

```

When:

- *alias1* - Is the alias from Silex
- *Full\Class\Name* and *Full\ClassTwo\Name* - The class name to initialize
- *dependency1* and *dependecy2* - Dependencies from the class, must be an alias previously created or anything

In your application bootstrap, register YAML Config Service Provider, with your DI file

```

use DerAlex\Silex\YamlConfigServiceProvider;
use SilexFriends\DI\Container as DiServiceProvider;

....

$app->register(new YamlConfigServiceProvider(__DIR__ . '/../Resources/di.yml'));
$app->register(new DiServiceProvider($app['config']['services']));
 
# $app['config']['services'] is an array with yml content, created by YamlConfigServiceProvider

```

Now, your services is available on $app container.


## Testing

Just run *phpunit* without parameters

```
phpunit
```

Happy Silex Coding :)
