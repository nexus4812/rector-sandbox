<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use RectorSandbox\Rector\AvoidUndefinedIndexRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(AvoidUndefinedIndexRector::class);
};
