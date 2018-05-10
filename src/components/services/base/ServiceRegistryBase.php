<?php
namespace deflou\components\services\base;

use deflou\components\services\ServiceRegistryAbstract;

/**
 * Class ServiceRegistryBase
 *
 * @package deflou\components\services\base
 * @author aivanov@fix.ru
 */
class ServiceRegistryBase extends ServiceRegistryAbstract
{
    /**
     * ServiceRegistryBase constructor.
     * @param array $model
     */
    public function __construct($model = [])
    {
        parent::__construct($model);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function getAttribute($name)
    {
        return $this->model[$name];
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    protected function setAttribute($name, $value)
    {
        $this->model[$name] = $value;

        return $this;
    }
}
