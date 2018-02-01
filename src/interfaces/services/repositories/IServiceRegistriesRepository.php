<?php
namespace deflou\interfaces\services\repositories;

use deflou\interfaces\services\IServiceRegistry;

/**
 * Interface IServiceRegistriesRepository
 *
 * @package deflou\interfaces\services\repositories
 * @author deflou.dev@gmail.com
 */
interface IServiceRegistriesRepository
{
    /**
     * @param mixed $where
     *
     * @return $this
     */
    public function find($where);

    /**
     * @return IServiceRegistry|null
     */
    public function one();

    /**
     * @return IServiceRegistry[]
     */
    public function all();

    /**
     * @param IServiceRegistry $serviceInstance
     *
     * @return bool
     */
    public function create($serviceInstance): bool;

    /**
     * @param IServiceRegistry $serviceInstance
     *
     * @return bool
     */
    public function update($serviceInstance);

    /**
     * @param IServiceRegistry $serviceInstance
     *
     * @return bool
     */
    public function delete($serviceInstance): bool;
}
