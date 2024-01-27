<?php

class LegacyController
{
    private Legacy $legacy;

    public function __construct(Legacy $legacy)
    {
        $this->legacy = $legacy;
    }
}
