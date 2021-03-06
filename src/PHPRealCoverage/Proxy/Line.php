<?php
namespace PHPRealCoverage\Proxy;

interface Line
{
    public function getFilteredContent();

    /**
     * @return bool
     */
    public function isFinal();

    /**
     * @return bool
     */
    public function isMethod();

    /**
     * @return bool
     */
    public function isClass();

    /**
     * @return string
     */
    public function getMethodName();

    /**
     * @return string
     */
    public function getClassName();

    /**
     * @return string
     */
    public function getContent();

    public function __toString();

    /**
     * @param bool $neccessary
     * @return void
     */
    public function setNeccessary($neccessary);

    /**
     * @return bool
     */
    public function isNeccessary();

    /**
     * @return bool
     */
    public function isExecutable();

    /**
     * @return bool
     */
    public function isCovered();

    /**
     * @param string $test
     * @return void
     */
    public function addCoverage($test);

    /**
     * @return void
     */
    public function setExecutable($executable);

    public function getCoverage();

    public function isConstructor();
}
