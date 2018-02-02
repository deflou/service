<?php
namespace deflou\interfaces\services;

use deflou\interfaces\services\activities\IServiceAction;
use deflou\interfaces\services\describers\IServiceDescriber;
use deflou\interfaces\triggers\events\ITriggerEvent;
use deflou\interfaces\ICanBeDescribed;
use deflou\interfaces\services\activities\IServiceEvent;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\users\identities\IUserIdentity;

/**
 * Interface IServiceInstance
 *
 * @package deflou\interfaces\services
 * @author deflou.dev@gmail.com
 */
interface IServiceInstance extends ICanBeDescribed
{
    const FIELD__SERVICE_NAME = 'service_name';
    const FIELD__VERSION = 'version';
    const FIELD__USERS = 'users';
    const FIELD__OPTIONS = 'options';
    const FIELD__CREATED = 'created';

    const ROLE__OWNER = 'owner';
    const ROLE__USER = 'user';

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
     * @return array
     */
    public function getUsers();

    /**
     * @param array $users
     *
     * @return $this
     */
    public function setUsers($users);

    /**
     * @param IUserIdentity $user
     *
     * @return bool
     */
    public function isOwner($user): bool;

    /**
     * @param string|IUserIdentity $user
     *
     * @return $this
     */
    public function setOwner($user);

    /**
     * @return array
     */
    public function getOptions();

    /**
     * @param array $options
     *
     * @return $this
     */
    public function setOptions($options);

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getOption($name);

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    public function setOption($name, $value);

    /**
     * @param string $format
     *
     * @return \DateTime|string
     */
    public function getCreated($format = '');

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function setCreated($timestamp);

    /**
     * @return IServiceResolver|null
     */
    public function getResolver();

    /**
     * @return IServiceDescriber|null
     */
    public function getDescriber(): IServiceDescriber;

    /**
     * @param IServiceDescriber $serviceDescriber
     *
     * @return $this
     */
    public function setDescriber(IServiceDescriber $serviceDescriber);

    /**
     * @param ITriggerEvent $triggerEvent
     *
     * @return IServiceEvent|null
     */
    public function identifyServiceEventByTriggerEvent(ITriggerEvent $triggerEvent): IServiceEvent;

    /**
     * @param ITrigger $trigger
     *
     * @return IServiceAction|null
     */
    public function identifyServiceActionByTrigger(ITrigger $trigger): IServiceAction;
}
