<?php
namespace deflou\components\services;

use deflou\interfaces\services\describers\IServiceDescriber;
use deflou\interfaces\services\IServiceInstance;

/**
 * Class ServiceInstanceAbstract
 *
 * @package deflou\components\services
 * @author deflou.dev@gmail.com
 */
abstract class ServiceInstanceAbstract implements IServiceInstance
{
    /**
     * @var mixed
     */
    protected $model = null;

    /**
     * @var IServiceDescriber
     */
    protected $describer = null;

    /**
     * ServiceInstanceAbstract constructor.
     * @param mixed $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(static::NAME);
    }

    /**
     * @param string $name
     *
     * @return ServiceInstanceAbstract
     */
    public function setName($name)
    {
        return $this->setAttribute(static::NAME, $name);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute(static::TITLE);
    }

    /**
     * @param string $title
     *
     * @return ServiceInstanceAbstract
     */
    public function setTitle($title)
    {
        return $this->setAttribute(static::TITLE, $title);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute(static::DESCRIPTION);
    }

    /**
     * @param string $description
     *
     * @return ServiceInstanceAbstract
     */
    public function setDescription($description)
    {
        return $this->setAttribute(static::DESCRIPTION, $description);
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->getAttribute(static::FIELD__SERVICE_NAME);
    }

    /**
     * @param string $serviceName
     *
     * @return ServiceInstanceAbstract
     */
    public function setServiceName($serviceName)
    {
        return $this->setAttribute(static::FIELD__SERVICE_NAME, $serviceName);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->getAttribute(static::FIELD__VERSION);
    }

    /**
     * @param string $version
     *
     * @return ServiceInstanceAbstract
     */
    public function setVersion($version)
    {
        return $this->setAttribute(static::FIELD__VERSION, $version);
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->getAttribute(static::FIELD__USERS);
    }

    /**
     * @param array $users
     *
     * @return ServiceInstanceAbstract
     */
    public function setUsers($users)
    {
        return $this->setAttribute(static::FIELD__USERS, $users);
    }

    /**
     * @param \deflou\interfaces\users\identities\IUserIdentity|string $user
     *
     * @return $this
     */
    public function setOwner($user)
    {
        $userName = is_string($user) ? $user : $user->getName();

        $users = $this->getUsers();
        $users[$userName] = static::ROLE__OWNER;

        $this->setUsers($users);

        return $this;
    }

    /**
     * @param \deflou\interfaces\users\identities\IUserIdentity $user
     *
     * @return bool
     */
    public function isOwner($user): bool
    {
        $userName = is_string($user) ? $user : $user->getName();

        $users = $this->getUsers();

        return isset($users[$userName]) && ($users[$userName] == static::ROLE__OWNER) ? true : false;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->getAttribute(static::FIELD__OPTIONS);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getOption($name)
    {
        $options = $this->getAttribute(static::FIELD__OPTIONS);

        return $options[$name] ?? null;
    }

    /**
     * @param string $format
     *
     * @return \DateTime|false|string
     */
    public function getCreated($format = '')
    {
        $created = $this->getAttribute(static::FIELD__CREATED);

        return $format ? date($format, $created) : new \DateTime('@' . $created);
    }

    /**
     * @param int $timestamp
     *
     * @return ServiceInstanceAbstract
     */
    public function setCreated($timestamp)
    {
        return $this->setAttribute(static::FIELD__CREATED, $timestamp);
    }

    /**
     * @param array $options
     *
     * @return ServiceInstanceAbstract
     */
    public function setOptions($options)
    {
        return $this->setAttribute(static::FIELD__OPTIONS, $options);
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    public function setOption($name, $value)
    {
        $options = $this->getAttribute(static::FIELD__OPTIONS);
        $options[$name] = $value;
        $this->setOptions($options);

        return $this;
    }

    /**
     * @return string
     */
    public function describe()
    {
        return $this->getName();
    }

    /**
     * @return mixed|null
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return IServiceDescriber|null
     */
    public function getDescriber(): IServiceDescriber
    {
        return $this->describer;
    }

    /**
     * @param IServiceDescriber $serviceDescriber
     *
     * @return $this
     */
    public function setDescriber(IServiceDescriber $serviceDescriber)
    {
        $this->describer = $serviceDescriber;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    abstract protected function getAttribute($name);

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    abstract protected function setAttribute($name, $value);
}
