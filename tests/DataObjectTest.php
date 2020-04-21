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

    public function testSimpleGetData(): void
    {
        $this->assertSame([], $this->dataObject->getData());
    }

    public function testSimpleDataSetAndGet(): void
    {
        $this->dataObject->setData('a', 1);
        $this->assertSame(1, $this->dataObject->getData('a'));
    }

    public function testSetDataToExists(): void
    {
        $this->dataObject->setData('a', 1);
        $this->dataObject->setData(['b' => 1]);
        $this->assertSame(['b' => 1], $this->dataObject->getData());

        $this->dataObject->setData([]);
        $this->assertSame([], $this->dataObject->getData());
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

    public function testHasDataObjectWithNull(): void
    {
        $this->assertFalse($this->dataObject->hasData());
        $this->dataObject->setData('a', null);
        $this->assertTrue($this->dataObject->hasData());
    }

    public function testSimpleAddData(): void
    {
        $this->dataObject->addData(['a' => 1]);
        $this->assertSame(['a' => 1], $this->dataObject->getData());
    }

    public function testAddDataToExists(): void
    {
        $this->dataObject->setData(['a' => 1]);
        $this->dataObject->addData(['b' => 2]);
        $this->assertSame(['a' => 1, 'b' => 2], $this->dataObject->getData());
    }

    public function testMultipleAddDataToExists(): void
    {
        $this->dataObject->setData(['a' => 1]);
        $this->dataObject->addData(['b' => 2]);
        $this->dataObject->addData(['c' => 3]);
        $this->dataObject->addData(['b' => 4]);
        $this->assertSame(['a' => 1, 'b' => 4, 'c' => 3], $this->dataObject->getData());
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
