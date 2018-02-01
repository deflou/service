<?php
namespace deflou\interfaces\services;

use deflou\interfaces\ICanBeDescribed;

/**
 * Interface IServiceRegistry
 *
 * @package deflou\interfaces\services
 * @author deflou.dev@gmail.com
 */
interface IServiceRegistry extends ICanBeDescribed
{
    const FIELD__CREATED = 'created';
    const FIELD__BASE_URL = 'base_url';

    /**
     * @param string $format
     *
     * @return string|\DateTime
     */
    public function getCreated($format = '');

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function setCreated($timestamp);

    /**
     * @return string
     */
    public function getBaseUrl(): string;

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setBaseUrl($url);
}
