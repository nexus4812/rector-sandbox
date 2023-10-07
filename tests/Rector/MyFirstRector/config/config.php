<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use RectorSandbox\Rector\MyFirstRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(MyFirstRector::class);
};
