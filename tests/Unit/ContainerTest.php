<?php

test('it can resolve a key to the container', function () {

    $binding = new \Core\Container();

    $binding->bind('foo', fn() => 'bar');

    $result = $binding->resolve('foo');

    expect($result)->toBe('bar');

});
