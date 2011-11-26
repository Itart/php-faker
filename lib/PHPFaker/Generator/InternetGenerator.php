<?php
/**
 * Internet Class
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
 * Class generate internet data.
 *
 * @package PHPFaker
 * @subpackage Generator
 */
class InternetGenerator extends AbstractGenerator
{
    private static $_domain_suffix = array('co.uk', 'com', 'us', 'org', 'ca', 'biz', 'info', 'name');
    private static $_free = array('gmail.com', 'googlemail.com', 'yahoo.com', 'hotmail.com', 'hotmail.co.uk');
    private static $_name_formats = array(array('firstName'), array('firstName', 'surname'));

    public function getName()
    {
        return 'internet';
    }
    
    protected function sanitiseName($name)
    {
        $name = strtolower($name);
        $n = explode(' ', $name);
        $n = preg_replace("/\W/", "", $n);
        $d = array('.', '_');
        // Randomise the array order
        shuffle($n);
        return join($n, $this->random($d));
    }

    public function domainSuffix()
    {
        return $this->random(self::$_domain_suffix);
    }

    public function domainWord()
    {
        $result = explode(' ', $this->getGenerator('company')->name());
        $result = $result[0];
        $result = strtolower($result);
        $result = preg_replace("/\W/", '', $result);
        return $result;
    }

    public function domainName()
    {
        $result[] = $this->domainWord();
        $result[] = $this->domainSuffix();
        return join($result, '.');
    }

    public function userName($name = null)
    {
        if ($name) {
            return $this->sanitiseName($name);
        }

        // get first_name, surname
        $n = $this->getGenerator('name');
        $a = parent::random(self::$_name_formats);

        foreach ($a as $method) {
            $na[] = $n->$method;
        }

        // run sanitise_name()
        $na = join(' ', $na);
        $result = $this->sanitiseName($na);
        return $result;
    }

    public function email($name = null)
    {
        return join(array($this->userName($name), $this->domainName()), "@");
    }

    public function freeEmail($name = null)
    {
        return join(array($this->userName($name), $this->random(self::$_free)), "@");
    }
}
