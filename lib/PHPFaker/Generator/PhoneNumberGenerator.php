<?php
/**
 * Phone Number Class
 *
 * @package PHPFaker
 * @version 0.1.0
 * @copyright 2011 Pavel Gopanenko
 * @author Pavel Gopanenko
 * @author Caius Durling
 * @license MIT Licence
 * @link https://github.com/Itart/php-faker
 */
namespace PHPFaker\Generator;

/**
 * Class generate phone numbres data.
 *
 * @package PHPFaker
 * @subpackage Generator
 */
class PhoneNumberGenerator extends AbstractGenerator
{
    private static $_formats = array('+##(#)##########', '+##(#)##########', '0##########', '0##########', '###-###-####', '(###)###-####', '1-###-###-####', '###.###.####', '###-###-####', '(###)###-####', '1-###-###-####', '###.###.####', '###-###-####x###', '(###)###-####x###', '1-###-###-####x###', '###.###.####x###', '###-###-####x####', '(###)###-####x####', '1-###-###-####x####', '###.###.####x####', '###-###-####x#####', '(###)###-####x#####', '1-###-###-####x#####', '###.###.####x#####');

    public function getName()
    {
        return 'phoneNumber';
    }
    
    public function phoneNumber()
    {
        return $this->numerify($this->random(self::$_formats));
    }
}
