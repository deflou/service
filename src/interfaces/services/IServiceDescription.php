<?php
namespace deflou\interfaces\services;

use deflou\interfaces\services\configs\IServiceConfig;
use deflou\interfaces\services\describers\IServiceDescriber;

/**
 * Interface IServiceDescription
 *
 * @package deflou\interfaces\services
 * @author deflou.dev@gmail.com
 */
interface IServiceDescription
{
    const FIELD__SERVICE_NAME = 'service_name';
    const FIELD__DESCRIBER = 'describer';
    const FIELD__VERSION = 'version';
    const FIELD__CONFIG = 'config';

    /**
     * @return string
     */
    public function getServiceName(): string;

    /**
     * @param string $serviceName
     *
     * @return $this
     */
    public function setServiceName($serviceName);

    /**
     * @return IServiceDescriber
     */
    public function getDescriber(): IServiceDescriber;

    /**
     * @param string|IServiceDescriber $describer
     *
     * @return $this
     */
    public function setDescriber($describer);

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion($version);

    /**
     * @return IServiceConfig
     */
    public function getConfig(): IServiceConfig;

    /**
     * @param array|IServiceConfig $config
     *
     * @return $this
     */
    public function setConfig($config);
}
