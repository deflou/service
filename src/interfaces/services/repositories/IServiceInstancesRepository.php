<?php
namespace deflou\interfaces\services\repositories;

use deflou\interfaces\services\IServiceInstance;

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
}
