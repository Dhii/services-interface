<?php

namespace Dhii\Services\Test\Func;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Dhii\Services\ServiceInterface as Subject;

class ServiceInterfaceTest extends TestCase
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

    public function testInstantiation()
    {
        $subject = $this->createSubject();
        $this->assertInstanceOf(Subject::class, $subject);
        $this->assertIsCallable($subject);
    }
}
