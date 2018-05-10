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
     * @param IServiceRegistry $serviceRegistry
     *
     * @return bool
     */
    public function create($serviceRegistry): bool;

    /**
     * @param IServiceRegistry $serviceRegistry
     *
     * @return bool
     */
    public function update($serviceRegistry);

    /**
     * @param IServiceRegistry $serviceRegistry
     *
     * @return bool
     */
    public function delete($serviceRegistry): bool;
}
