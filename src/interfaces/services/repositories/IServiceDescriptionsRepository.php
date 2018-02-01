<?php
namespace deflou\interfaces\services\repositories;

use deflou\interfaces\services\IServiceDescription;

/**
 * Interface IServiceDescriptionsRepository
 *
 * @package deflou\interfaces\services\repositories
 * @author deflou.dev@gmail.com
 */
interface IServiceDescriptionsRepository
{
    /**
     * @param mixed $where
     *
     * @return $this
     */
    public function find($where);

    /**
     * @return IServiceDescription|null
     */
    public function one();

    /**
     * @return IServiceDescription[]
     */
    public function all();

    /**
     * @param IServiceDescription $serviceInstance
     *
     * @return bool
     */
    public function create($serviceInstance): bool;

    /**
     * @param IServiceDescription $serviceInstance
     *
     * @return bool
     */
    public function update($serviceInstance);

    /**
     * @param IServiceDescription $serviceInstance
     *
     * @return bool
     */
    public function delete($serviceInstance): bool;
}
