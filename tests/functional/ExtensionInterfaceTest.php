<?php

namespace Dhii\Services\Test\Func;

use Dhii\Services\ServiceInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Dhii\Services\ExtensionInterface as Subject;

class ExtensionInterfaceTest extends TestCase
{
    /**
     * Creates an instance of the test subject.
     *
     * @return Subject|MockObject The new instance.
     */
    protected function createSubject(): Subject
    {
        $mock = $this->getMockBuilder(Subject::class)
            ->getMock();

        return $mock;
    }

    /**
     * Tests whether the subject can be instantiated.
     */
    public function testInstantiation()
    {
        $subject = $this->createSubject();
        $this->assertInstanceOf(Subject::class, $subject);
        $this->assertInstanceOf(ServiceInterface::class, $subject);
        $this->assertIsCallable($subject);
    }
}
