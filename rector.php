<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use RectorSandbox\Rector\AvoidUndefinedIndexRector;
use RectorSandbox\Rector\MyFirstRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/sample',
    ]);

    // register a single rule
    $rectorConfig->rule(AvoidUndefinedIndexRector::class);

    // official sample
    // $rectorConfig->rule(MyFirstRector::class);

    // define sets of rules
    //    $rectorConfig->sets([
    //        LevelSetList::UP_TO_PHP_82
    //    ]);
};
