<?php

namespace PHPRealCoverage\Mutator;

interface MutatableLine
{
    public function enable();

    public function disable();

    /**
     * @return bool
     */
    public function isEnabled();
}