<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;
use RectorSandbox\Rector\AvoidUndefinedIndexRector;
use RectorSandbox\Rector\MyFirstRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/sample',
    ]);

    // register a single rule
//    $rectorConfig->rule(AvoidUndefinedIndexRector::class);

    $rectorConfig->rule(RenameClassRector::class);
    $rectorConfig->importNames();
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        Legacy::class => 'RectorSandbox\Rector\Legacy'
    ]);

    // official sample
    // $rectorConfig->rule(MyFirstRector::class);

    // define sets of rules
    //    $rectorConfig->sets([
    //        LevelSetList::UP_TO_PHP_82
    //    ]);
};
