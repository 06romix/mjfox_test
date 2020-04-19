<?php
declare(strict_types=1);

namespace MjFox;

/**
 * Provide magic methods for getters and setters
 * Also allow convert data to JSON
 *
 * @since v1.0.0
 */
interface DataObjectInterface
{
    /**
     * Set data by key and override all data if key is array
     *
     * @param string|array $key
     * @param mixed|null   $value
     * @return mixed
     */
    public function setData($key, $value = null): DataObjectInterface;

    /**
     * Merge new data into existing
     *
     * @param array $array
     * @return mixed
     */
    public function addData(array $array): DataObjectInterface;

    /**
     * Retrieve data by key or get all data
     *
     * @param string $key
     * @return mixed
     */
    public function getData(string $key = '');

    /**
     * If $key is empty, checks whether there's any data in the object
     *
     * Otherwise checks if the specified attribute is set.
     *
     * @param string $key
     * @return bool
     */
    public function hasData(string $key = ''): bool;

    /**
     * @param null|string|array $key
     * @return \MjFox\DataObjectInterface
     */
    public function unsetData($key = ''): DataObjectInterface;
}
