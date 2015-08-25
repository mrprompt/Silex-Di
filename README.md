# silex-di-container-provider [![Build Status](https://travis-ci.org/mrprompt/silex-di-container-provider.png)](https://travis-ci.org/mrprompt/silex-di-container-provider)
A simple dependency injection container to Silex.

# Install

```
composer require mrprompt/silex-di-container-provider
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
- *dependency1* and *dependecy2* - Dependencies from the class, must be an alias previously created

## Testing

Just run *phpunit* without parameters

```
phpunit
```