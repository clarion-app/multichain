# clarion-app/multichain

PHP package for communicating with MultiChain node

* Install

```
composer require clarion-app/multichain
```

* Publish config file

```
php artisan vendor:publish --provider="ClarionApp\MultiChain\MultiChainProvider" --tag=config
```

* To use:

```
use ClarionApp\MultiChain\Facades\MultiChain;

print_r(MultiChain::getinfo());

print_r(MultiChain::liststreams());

// Create a stream call 'mystream', make it an open stream (true)

MultiChain::create("stream", "mystream", true);

```
