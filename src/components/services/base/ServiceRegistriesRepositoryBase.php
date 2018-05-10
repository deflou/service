<?php
namespace deflou\components\services\base;

use deflou\components\ApiContainer;
use deflou\interfaces\services\IServiceRegistry;
use deflou\interfaces\services\repositories\IServiceRegistriesRepository;

/**
 * Class ServiceRegistriesRepositoryBase
 *
 * Basic registries repository. Get registry list from a file.
 * Set env parameter DF__SERVICE_REGISTRIES_PATH to point to the registries file.
 * See /vendor/deflou/service/resources/registries.dist.php for an example.
 *
 * @package deflou\components\services\base
 * @author aivanov@fix.ru
 */
class ServiceRegistriesRepositoryBase implements IServiceRegistriesRepository
{
    protected $config = [];
    protected $where = [
        'type' => 'describers',
        'id' => 0
    ];

    /**
     * ServiceRegistriesRepositoryBase constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $registriesPath = getenv('DF__SERVICE_REGISTRIES_PATH');

        if (!$registriesPath) {
            throw new \Exception('Missed or restricted services registries path "' . $registriesPath . '".');
        }

        $this->config = include $registriesPath;
    }

    /**
     * @param mixed $where
     *
     * @return $this
     */
    public function find($where)
    {
        $this->where = $where;

        return $this;
    }

    /**
     * @param IServiceRegistry $serviceRegistry
     *
     * @return bool
     * @throws \Exception
     */
    public function delete($serviceRegistry): bool
    {
        if (!isset($this->config[$serviceRegistry->getType()])) {
            throw new \Exception('Unknown registry type "' . $serviceRegistry->getType() . '".');
        }

        $deleted = false;

        foreach ($this->config[$serviceRegistry->getType()] as $id => $registry) {
            if ($registry['name'] == $serviceRegistry->getName()) {
                unset($this->config[$serviceRegistry->getType()][$id]);
                $deleted = true;
                break;
            }
        }

        return $deleted;
    }

    /**
     * @param IServiceRegistry $serviceRegistry
     *
     * @return bool
     * @throws \Exception
     */
    public function update($serviceRegistry)
    {
        if (!isset($this->config[$serviceRegistry->getType()])) {
            throw new \Exception('Unknown registry type "' . $serviceRegistry->getType() . '".');
        }

        $updated = false;

        foreach ($this->config[$serviceRegistry->getType()] as $id => $registry) {
            if ($registry['name'] == $serviceRegistry->getName()) {
                $this->config[$serviceRegistry->getType()][$id] = $serviceRegistry;
                $updated = true;
                break;
            }
        }

        return $updated;
    }

    /**
     * @param IServiceRegistry $serviceRegistry
     *
     * @return bool
     * @throws \Exception
     */
    public function create($serviceRegistry): bool
    {
        if (!isset($this->config[$serviceRegistry->getType()])) {
            throw new \Exception('Unknown registry type "' . $serviceRegistry->getType() . '".');
        }

        $this->config[$serviceRegistry->getType()][] = $serviceRegistry->describe();

        return true;
    }

    /**
     * @return IServiceRegistry
     * @throws \Exception
     */
    public function one()
    {
        $type = $this->where['type'] ?? 'describers';
        $id = isset($this->where['id']) && ($this->where['id'] >= 0)
            ? $this->where['id']
            : -1;

        if (!isset($this->config[$type])) {
            throw new \Exception('Unknown registry type "' . $type . '".');
        }

        $registry = $id >= 0 ? $this->config[$type][$id] : $this->config[$type][0];

        return $this->initRegistryObject($registry);
    }

    /**
     * @return array
     */
    public function all()
    {
        $type = $this->where['type'] ?? '';
        $registries = $type
            ? $this->config[$type]
            : array_merge($this->config['describers'], $this->config['instances']);

        $registryList = [];

        foreach ($registries as $registry) {
            $registryList[] = $this->initRegistryObject($registry);
        }

        return $registryList;
    }

    /**
     * @param $registry
     *
     * @return IServiceRegistry
     */
    protected function initRegistryObject($registry)
    {
        /**
         * @var $registryObject IServiceRegistry
         */
        $registryObject = ApiContainer::get(IServiceRegistry::class);

        return $registryObject->setName($registry['name'])
            ->setDescription($registry['description'])
            ->setTitle($registry['title'])
            ->setBaseUrl($registry['base_url'])
            ->setType($registry['type'])
            ->setCreated($registry['created']);
    }
}
