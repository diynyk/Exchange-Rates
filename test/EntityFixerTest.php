<?php

use PHPUnit\Framework\TestCase;

class EntityFixerTest extends TestCase
{
    /**
     * @dataProvider fixPhonesDataProvider
     */
    public function testFixPhones($in, $out)
    {
        $mockObj = 
            $this->getMockBuilder('Fixer\EntityFixer')
            ->disableOriginalConstructor()
            ->getMock();
        $mockObj->phones = [$in];

        $reflectionClass = new ReflectionClass($mockObj);

        $method = $reflectionClass->getMethod('fixPhones');
        $method->setAccessible(true);

        $method->invoke($mockObj);


        $result = $mockObj->phones;


        $this->assertSame(reset($result), $out);
    }

    public function fixPhonesDataProvider()
    {
        return [
            [
                '+380672222222',
                '0672222222'
            ],
            [
                '+380',
                '0'
            ],
            [
                '38',
                '38'
            ],
            [
                '380672222222',
                '0672222222'
            ],
            [
                '80672222222',
                '0672222222'
            ]
        ];
    }
}
