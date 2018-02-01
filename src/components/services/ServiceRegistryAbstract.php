<?php
namespace deflou\components\services;

use deflou\interfaces\services\IServiceRegistry;

/**
 * Class ServiceRegistryAbstract
 *
 * @package deflou\components\services
 * @author deflou.dev@gmail.com
 */
abstract class ServiceRegistryAbstract implements IServiceRegistry
{
    /**
     * @var mixed
     */
    protected $model = null;

    /**
     * ServiceRegistryAbstract constructor.
     * @param mixed $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(static::NAME);
    }

    /**
     * @param string $name
     *
     * @return ServiceRegistryAbstract
     */
    public function setName($name)
    {
        return $this->setAttribute(static::NAME, $name);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute(static::TITLE);
    }

    /**
     * @param string $title
     *
     * @return ServiceRegistryAbstract
     */
    public function setTitle($title)
    {
        return $this->setAttribute(static::TITLE, $title);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute(static::DESCRIPTION);
    }

    /**
     * @param string $description
     *
     * @return ServiceRegistryAbstract
     */
    public function setDescription($description)
    {
        return $this->setAttribute(static::DESCRIPTION, $description);
    }

    /**
     * @param string $format
     *
     * @return \DateTime|false|string
     */
    public function getCreated($format = '')
    {
        $created = $this->getAttribute(static::FIELD__CREATED);

        return $format ? date($format, $created) : new \DateTime($created);
    }

    /**
     * @param int $timestamp
     *
     * @return ServiceRegistryAbstract
     */
    public function setCreated($timestamp)
    {
        return $this->setAttribute(static::FIELD__CREATED, $timestamp);
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->getAttribute(static::FIELD__BASE_URL);
    }

    /**
     * @param string $url
     *
     * @return ServiceRegistryAbstract
     */
    public function setBaseUrl($url)
    {
        return $this->setAttribute(static::FIELD__BASE_URL, $url);
    }

    /**
     * @return string
     */
    public function describe()
    {
        return $this->getBaseUrl();
    }

    /**
     * @return mixed|null
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    abstract protected function getAttribute($name);

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    abstract protected function setAttribute($name, $value);
}
