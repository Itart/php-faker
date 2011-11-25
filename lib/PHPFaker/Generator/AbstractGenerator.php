<?php
/**
 * Abstract Generator Class
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

use PHPFaker\Faker;

/**
 * Class contains common generator functionality.
 *
 * @package PHPFaker
 * @subpackage Generator
 */
abstract class AbstractGenerator
{
    private $_faker;

    /**
     * Return other generator by name.
     *
     * @param string $name
     * @return PHPFaker\Faker\Generator\AbstractGenerator
     */
    protected function getGenerator($name)
    {
        return $this->_faker->getGenerator($name);
    }

    /**
     * Returns a random element from a passed array
     *
     * @param array $array
     * @return string
     * @author Caius Durling
     */
    protected function random($array)
    {
        return $array[mt_rand(0, count($array) - 1)];
    }

    /**
     * Returns a random number between 0 and 9
     *
     * @return integer
     * @author Caius Durling
     */
    protected function randNumber()
    {
        return mt_rand(0, 9);
    }

    /**
     * Returns a random letter from a to z
     *
     * @return string
     * @author Caius Durling
     */
    protected function randLatLetter()
    {
        return chr(mt_rand(97, 122));
    }


    /**
     * Replaces all occurrences of # with a random number
     *
     * @param string $string String you wish to have parsed
     * @return string
     * @author Caius Durling
     */
    protected function numerify($string)
    {
        foreach (str_split($string) as $char) {
            $result[] = str_replace('#', $this->randNumber(), $char);
        }
        return join($result);
    }

    /**
     * Replaces all occurrences of ? with a random letter
     *
     * @param string $string String you wish to have parsed
     * @return string
     * @author Caius Durling
     */
    protected function lexify($string)
    {
        foreach (str_split( $string ) as $char) {
            $result[] = str_replace('?', $this->randLatLetter(), $char);
        }
        return join($result);
    }

    /**
     * Replaces all occurrences of # with a random number and
     * replaces all occurrences of ? with a random letter
     *
     * @param string $string String you wish to have parsed
     * @return string
     * @author Caius Durling
     */
    protected function bothify($string)
    {
        $result = $this->numerify($string);
        $result = $this->lexify($result);
        return $result;
    }

    public function __construct(Faker $faker)
    {
        $this->_faker = $faker;
    }

    public function __call($method, $parameters)
    {
        $method = $this->_faker->normalize($method);

        return call_user_func_array(array($this, $method), $parameters);
    }

    public function __get($var)
    {
        $var = $this->_faker->normalize($var);

        return $this->$var();
    }
}
