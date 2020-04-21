<?php
declare(strict_types=1);

namespace MjFox;

class DataObject implements DataObjectInterface
{
    protected array $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }


    public function getData(string $key = '')
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return $this->data;
    }

    public function setData($key, $value = null): DataObjectInterface
    {
        if (is_array($key)) {
            $this->data = $key;
        } else {
            $this->data[$key] = $value;
        }
        return $this;
    }

    public function __call($name, $arguments)
    {
        if (substr($name, 0,3) === 'set')  {
            $key = substr($name,3);
            $this->setData($key,$arguments[0]);

        }
        if (substr($name, 0,3) === 'get') {
            $key = substr($name,3);
            return $this->getData($key);
        }
        return $this;
    }

    public function addData(array $array): DataObjectInterface
    {
        // TODO: Implement addData() method.
    }

    public function hasData(string $key = ''): bool
    {
        if (empty($key) || !is_string($key)) {
            return false;
        }
        return array_key_exists($key, $this->data);
    }

    public function unsetData($key = ''): DataObjectInterface
    {
        // TODO: Implement unsetData() method.
    }
}
