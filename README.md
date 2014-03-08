[![Build Status](https://travis-ci.org/julianseeger/php-real-coverage.png?branch=master)](https://travis-ci.org/julianseeger/php-real-coverage)
[![Code Coverage](https://scrutinizer-ci.com/g/julianseeger/php-real-coverage/badges/coverage.png?s=1e024112911df161826d6270626cf409f00f8455)](https://scrutinizer-ci.com/g/julianseeger/php-real-coverage/)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/julianseeger/php-real-coverage/badges/quality-score.png?s=c0d591e596fc48b728b46654969d00cdcee9b3d8)](https://scrutinizer-ci.com/g/julianseeger/php-real-coverage/)
[![License](https://poser.pugx.org/julianseeger/php-real-coverage/license.png)](https://packagist.org/packages/julianseeger/php-real-coverage)

[![Latest Unstable Version](https://poser.pugx.org/julianseeger/php-real-coverage/v/unstable.png)](https://packagist.org/packages/julianseeger/php-real-coverage)

What is "real" coverage?
========================

Given you have a Class with 100% coverage

![](https://raw.github.com/julianseeger/php-real-coverage/master/readme-resources/unreal-coverage.png)

But the appropriate test doesn't really test very much of it's behavior

![](https://raw.github.com/julianseeger/php-real-coverage/master/readme-resources/test.png)

When you run **php-real-coverage** on this project

Then you will know, what lines are actually tested

![](https://raw.github.com/julianseeger/php-real-coverage/master/readme-resources/real-coverage.png)

In this example, only line 8, 12 and 18 are neccessary to make the test pass.

QuickStart
==========

Add it to your composer.json
```
"require-dev": {
    "julianseeger/php-real-coverage": "*"
}
```
Generate a coverage-report with phpunit
```
./vendor/bin/phpunit --coverage-php coverage.php
```
And let php-real-coverage test the quality of your coverage
```
./vendor/bin/php-real-coverage coverage.php
```

Roadmap to Version 0.1-Beta
===========================
* rewrite the prototype of RealCoverageRun (the "main" method)
* pass appropriate arguments to phpunit

Roadmap to Version 1.0
======================
* integrate symfony/console
* run only those tests that cover the modified lines (huge speedup)
* add hooks into main algorithm to allow listeners/printers/etc
* support all default phpunit coverage writers (html, text, clover, php)
* review and restructure the architecture


Contribute
==========

Execute the tests
```
composer install --prefer-dist --dev
./vendor/bin/phpunit
```

Make your changes tested and in PSR-2

Execute the the tests again

And make your Pull Request

~~PS: The build will fail if the testcoverage falls below 100%~~