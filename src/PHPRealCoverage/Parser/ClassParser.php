<?php

namespace PHPRealCoverage\Parser;

use PHPRealCoverage\Model\CoveredClass;
use PHPRealCoverage\Model\CoveredLine;
use PHPRealCoverage\Model\DynamicClassnameCoveredClass;
use PHPRealCoverage\Model\Line;

class ClassParser
{
    const NAMESPACE_PATTERN = '/namespace ([^\s]+);/Usi';
    const CLASSNAME_PATTERN = '/(^|\n)[^*\/\n]*class\s+([^\s{]+?)[\s{\n]*/Usi';
    const CLASSLINE_PATTERN = '/^[^*\/]*class\s+([^\s{]+?)[\s{\n]*/Usi';
    const METHOD_PATTERN = '/\s*(final)?\s*(public?|private?|protected?)\s*(static)?\s*function\s+(\w+?)/Usi';

    /**
     * @var string
     */
    private $filename;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return CoveredClass
     */
    public function parse()
    {
        $content = file_get_contents($this->filename);

        $class = new DynamicClassnameCoveredClass();
        $class->setName($this->parseName($content));
        $class->setNamespace($this->parseNamespace($content));

        $lines = explode("\n", $content);
        $lineNumber = 1;
        foreach ($lines as $lineAsString) {
            $line = $this->parseLine($lineAsString);
            $class->addLine($lineNumber++, $line);
        }

        return $class;
    }

    public function parseName($content)
    {
        preg_match(self::CLASSNAME_PATTERN, $content, $matches);
        return $matches[2];
    }

    /**
     * @param $input
     * @return Line
     */
    public function parseLine($input)
    {
        $line = new CoveredLine($input);
        $this->detectMethod($input, $line);
        $this->detectClass($input, $line);
        return $line;
    }

    private function detectMethod($input, CoveredLine $line)
    {
        $match = preg_match(self::METHOD_PATTERN, $input, $matches);
        if (!$match) {
            return;
        }

        $line->setMethod(true);
        $line->setFinal($matches[1] === "final");
        $line->setMethodName($matches[4]);
    }

    private function detectClass($input, CoveredLine $line)
    {

        $line->setClass((bool)preg_match(self::CLASSLINE_PATTERN, $input, $matches));

        if ($line->isClass()) {
            $line->setClassName($matches[1]);
        }
    }

    private function isClass($input)
    {
    }

    private function parseNamespace($content)
    {
        preg_match(self::NAMESPACE_PATTERN, $content, $matches);
        return $matches[1];
    }
}
