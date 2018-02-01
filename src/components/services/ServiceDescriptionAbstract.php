<?php
namespace deflou\components\services;

use deflou\components\services\configs\ServiceConfigBase;
use deflou\interfaces\services\configs\IServiceConfig;
use deflou\interfaces\services\describers\IServiceDescriber;
use deflou\interfaces\services\IServiceDescription;

/**
 * Class ServiceDescriptionAbstract
 *
 * @package deflou\components\services
 * @author deflou.dev@gmail.com
 */
abstract class ServiceDescriptionAbstract implements IServiceDescription
{
    /**
     * @var mixed
     */
    protected $model = null;

    /**
     * ServiceDescriptionAbstract constructor.
     * @param mixed $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->getAttribute(static::FIELD__SERVICE_NAME);
    }

    /**
     * @param string $serviceName
     *
     * @return ServiceDescriptionAbstract
     */
    public function setServiceName($serviceName)
    {
        return $this->setAttribute(static::FIELD__SERVICE_NAME, $serviceName);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->getAttribute(static::FIELD__VERSION);
    }

    /**
     * @param string $version
     *
     * @return ServiceDescriptionAbstract
     */
    public function setVersion($version)
    {
        return $this->setAttribute(static::FIELD__VERSION, $version);
    }

    /**
     * @return IServiceDescriber
     * @throws \Exception
     */
    public function getDescriber(): IServiceDescriber
    {
        $describerClass = $this->getAttribute(static::FIELD__DESCRIBER);

        if ($describerClass) {
            return new $describerClass();
        }

        throw new \Exception('Missed describer class');
    }

    /**
     * @param IServiceDescriber|string $describer
     *
     * @return ServiceDescriptionAbstract
     */
    public function setDescriber($describer)
    {
        $describerClass = is_string($describer) ? $describer : get_class($describer);

        return $this->setAttribute(static::FIELD__DESCRIBER, $describerClass);
    }

    /**
     * @return IServiceConfig
     */
    public function getConfig(): IServiceConfig
    {
        $config = $this->getAttribute(static::FIELD__CONFIG);

        return new ServiceConfigBase($config);
    }

    /**
     * @param array|IServiceConfig $config
     *
     * @return ServiceDescriptionAbstract
     */
    public function setConfig($config)
    {
        $config = is_array($config) ? $config : $config->__toArray();

        return $this->setAttribute(static::FIELD__CONFIG, $config);
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
