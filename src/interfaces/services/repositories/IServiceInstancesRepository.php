<?php
namespace deflou\interfaces\services\repositories;

use deflou\interfaces\triggers\events\ITriggerEvent;
use deflou\interfaces\services\IServiceInstance;
use deflou\interfaces\triggers\ITrigger;

/**
 * Interface IServiceInstancesRepository
 *
 * @package deflou\interfaces\services\repositories
 * @author deflou.dev@gmail.com
 */
interface IServiceInstancesRepository
{
    /**
     * @param mixed $where
     *
     * @return $this
     */
    public function find($where);

    /**
     * @return IServiceInstance|null
     */
    public function one();

    /**
     * @return IServiceInstance[]
     */
    public function all();

    /**
     * @param IServiceInstance $serviceInstance
     *
     * @return bool
     */
    public function create($serviceInstance): bool;

    /**
     * @param IServiceInstance $serviceInstance
     *
     * @return bool
     */
    public function update($serviceInstance);

    /**
     * @param IServiceInstance $serviceInstance
     *
     * @return bool
     */
    public function delete($serviceInstance): bool;

    /**
     * @param ITriggerEvent $triggerEvent
     *
     * @return IServiceInstance|null
     */
    public function identifyServiceByTriggerEvent(ITriggerEvent $triggerEvent): IServiceInstance;

    /**
     * @param ITrigger $trigger
     *
     * @return IServiceInstance
     */
    public function identifyDestinationServiceByTrigger(ITrigger $trigger);
}
