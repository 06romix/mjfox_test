<?php
declare(strict_types=1);

namespace MjFox;

class DataObject
{
    protected array $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }


    public function getData($value)
    {
        return $this->data[$value];
    }

    public function setData($key, $value)
    {
        return $this->data[$key] = $value;
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
}
