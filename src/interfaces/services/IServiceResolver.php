<?php
namespace deflou\interfaces\services;

use deflou\interfaces\services\describers\IServiceDescriber;

interface IServiceResolver
{
    /**
     * IServiceResolver constructor.
     * @param IServiceInstance $serviceInstance
     * @param IServiceDescriber $serviceDescriber
     */
    public function __construct(IServiceInstance $serviceInstance, IServiceDescriber $serviceDescriber);


}
