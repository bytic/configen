<?php

namespace ByTIC\Configen\MediaTypes;

/**
 * Class MediaTypeCollections
 * @package ByTIC\Configen\MediaTypes
 */
class MediaTypeCollections
{
    protected $collections = [];

    protected $typesMap = [];

    protected $types = [];

    /**
     * @return array
     */
    public static function collections()
    {
        return static::instance()->getCollections();
    }

    /**
     * @return array
     */
    public static function types()
    {
        return static::instance()->getTypes();
    }

    /**
     * @param $type
     * @return array
     */
    public static function getExtensions($type)
    {
        $type = static::instance()->getType($type);
        if (!is_array($type)) {
            return null;
        }
        return $type;
    }

    /**
     * @param string $type
     * @return string
     */
    public static function findCollection($type)
    {
        return static::instance()->typesMap($type, 'Other');
    }

    /**
     * MediaTypeCollections constructor.
     */
    public function __construct()
    {
        $this->loadData();
    }

    protected function loadData()
    {
        $this->types = require __DIR__ . '/data/types.php';

        $collections = require __DIR__ . '/data/collections.php';
        foreach ($collections as $name => $collection) {
            $this->collections[$name] = $collection;
            foreach ($collection['types'] as $type) {
                $this->typesMap[$type] = $name;
            }
        }
    }

    /**
     * @return array
     */
    protected function getCollections(): array
    {
        return $this->collections;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param $name
     * @return array
     */
    public function getType($name)
    {
        return isset($this->types[$name]) ? $this->types[$name] : null;
    }

    /**
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    protected function typesMap($name, $default = null)
    {
        return isset($this->typesMap[$name]) ? $this->typesMap[$name] : $default;
    }


    /**
     * @return static
     */
    public static function instance()
    {
        static $instance;
        if (!($instance instanceof self)) {
            $instance = new self();
        }
        return $instance;
    }
}
