# PHPFaker

PHPFaker is a package that generates random fake data for you.

Requirements:

* PHP >= 5.3

To use it simply create a new faker object and then call a subclass & method.

eg:
	
	<?php
		// Do this so it can find the classes needed
        spl_autoload_register(function($class) {
            $classFile = str_replace('\\', '/', $class);
            require_once __DIR__ . '/../lib/' . $classFile . '.php';
        });
		// Create new faker object
		$faker = new PHPFaker\Faker();
		// Output a random name
		echo $faker->name->name;
	?>

Based on original Caius Durling faker library (http://github.com/caius/php-faker)

## CHANGELOG

* 0.5.0
    Update generator registration mechanism
* 0.4.0
	Refactor project http://github.com/caius/php-faker

## LICENCE

Released under the MIT Licence

Copyright (c) 2011 Pavel Gopanenko  
Portions Copyright (c) 2008 Caius Durling  
Portions Copyright (c) 2008 Adam Royle  
Portions Copyright (c) 2008 Fiona Burrows

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
