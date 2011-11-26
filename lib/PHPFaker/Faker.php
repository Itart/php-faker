<?php
/**
 * Faker Class
 * Based on http://github.com/caius/php-faker
 *
 * @package PHPFaker
 * @version 0.1.0
 * @copyright 2011 Pavel Gopanenko
 * @author Pavel Gopanenko
 * @author Caius Durling
 * @author ifunk
 * @author FionaSarah
 * @license MIT Licence
 * @link https://github.com/Itart/php-faker
 */

namespace PHPFaker;

use PHPFaker\Generator\AbstractGenerator;

/**
 * Class for provide generating fake data
 *
 * @package PHPFaker
 */
class Faker
{
    private $_instances = array();

    private $_normalized = array();

    public function __get($generator)
    {
        return $this->getGenerator($generator);
    }

    /**
     * Support old notation for reverse compatibility.
     * <code>$faker->phoneNumer</code> as <code>$faker->phone_numer</code>
     *
     * @param string $name
     * @deprecated
     */
    public function normalize($name)
    {
        if (false == strpos($name, '_')) {
            return $name;
        }

        if (isset($this->_normalized[$name])) {
            return $this->_normalized[$name];
        }

        $result = join('', array_map('ucfirst', explode('_', $name)));
        return $this->_normalized[$name] = $result;
    }

    /**
     * Registry generator instance in faker.
     *
     * @param \PHPFaker\Generator\AbstractGenerator $generator Generator instance
     * @return \PHPFaker\Faker
     */
    public function registryGenerator(AbstractGenerator $generator)
    {
        $this->_instances[$generator->getName()] = $generator;

        return $this;
    }

    /**
     * Registry few generators.
     *
     * @param array $generators
     * @return \PHPFaker\Faker
     */
    public function registryGenerators(array $generators)
    {
        foreach ($generators as $generator) {
            $this->registryGenerator($generator);
        }
        return $this;
    }

    /**
     * Remove registered generator.
     *
     * @param string $name Generator access name
     */
    public function removeGenerator($name)
    {
        if (isset($this->_instances[$name])) {
            unset($this->_instances[$name]);
        }

        return $this;
    }

    /**
     * Return generator instance by name.
     * Default generators:
     * <ul>
     * <li>address</li>
     * <li>company</li>
     * <li>internet</li>
     * <li>lorem</li>
     * <li>name</li>
     * <li>phoneNumber</li>
     * </ul>
     *
     * @param string $name Generator access name
     * @throws \RuntimeException Throw is generator not registered
     * @return \PHPFaker\Generator\AbstractGenerator
     */
    public function getGenerator($name)
    {
        $name = $this->normalize($name);

        if (isset($this->_instances[$name])) {
            return $this->_instances[$name];
        }

        $generatorClass = __NAMESPACE__ . '\\Generator\\' . ucfirst($name) . 'Generator';
        if (class_exists($generatorClass)) {
            $this->registryGenerator($generator = new $generatorClass($this));
            return $generator;
        }

        throw new \RuntimeException(sprintf('Generator "%s" not register.', $name));
    }
}
