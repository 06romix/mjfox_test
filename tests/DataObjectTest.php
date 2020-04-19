<?php
declare(strict_types=1);

namespace MjFox\Tests;

use PHPUnit\Framework\TestCase;
use MjFox\DataObject;

class DataObjectTest extends TestCase
{
    /**
     * @var \MjFox\DataObject|\MjFox\DataObjectInterface
     */
    private DataObject $dataObject;

    protected function setUp(): void
    {
        $this->dataObject = new DataObject();
        parent::setUp();
    }

    public function testSimpleDataSetAndGet(): void
    {
        $this->dataObject->setData('a', 1);
        $this->assertSame(1, $this->dataObject->getData('a'));
    }

    public function testMultipleDataSetAndGet(): void
    {
        $this->dataObject->setData('a', 1);
        $this->dataObject->setData('b', 2);
        $this->dataObject->setData('c', 3);
        $this->assertSame(1, $this->dataObject->getData('a'));
        $this->assertSame(2, $this->dataObject->getData('b'));
        $this->assertSame(3, $this->dataObject->getData('c'));
    }

    public function testHasDataMethod(): void
    {
        $this->assertFalse($this->dataObject->hasData('a'));
        $this->dataObject->setData('a', 1);
        $this->assertTrue($this->dataObject->hasData('a'));

        $this->assertFalse($this->dataObject->hasData('b'));
        $this->dataObject->setData('b', false);
        $this->assertTrue($this->dataObject->hasData('b'));
    }

    public function testHasDataWithNull(): void
    {
        $this->assertFalse($this->dataObject->hasData('a'));
        $this->dataObject->setData('a', null);
        $this->assertTrue($this->dataObject->hasData('a'));
    }

    public function testSimpleSetAndGet(): void
    {
        $this->dataObject->setA(1);
        $this->assertSame(1, $this->dataObject->getA());
    }

    public function testMultipleSetAndGet(): void
    {
        $this->dataObject->setA(1);
        $this->assertSame(1, $this->dataObject->getA());
    }
}
