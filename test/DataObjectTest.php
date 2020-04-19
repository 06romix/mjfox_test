<?php
declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use MjFoxCore\DataObject;

class DataObjectTest extends TestCase
{
    /**
     * @var \MjFoxCore\DataObject
     */
    private DataObject $dataObject;

    protected function setUp(): void
    {
        $this->dataObject = new DataObject();
        parent::setUp();
    }

    public function testSimpleDataSetAndGet()
    {
        $this->dataObject->setData('a', 1);
        $this->assertSame(1, $this->dataObject->getData('a'));
    }

    public function testSimpleSetAndGet()
    {
        $this->dataObject->setA(1);
        $this->assertSame(1, $this->dataObject->getA());
    }
}
