<?php

use Fixer\EntityFixer;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class EntityFixerTest extends TestCase
{
    /**
     * @dataProvider fixPhonesDataProvider
     */
    public function testFixPhones($in, $out)
    {
        $fixer = new EntityFixer('', new NullLogger(), new Client());

        $fixer->setPhones([$in]);

        $reflectionClass = new ReflectionClass($fixer);

        $method = $reflectionClass->getMethod('fixPhones');
        $method->setAccessible(true);

        $method->invoke($fixer);

        $result = $fixer->getPhones();

        $this->assertSame(reset($result), $out);
    }

    public function fixPhonesDataProvider()
    {
        return [
            'Long number' => [
                '+380672222222',
                '0672222222'
            ],
            'dummy test' => [
                '+380',
                '0'
            ],
            'dummy false test' => [
                '38',
                '38'
            ],
            'Almost full number' => [
                '380672222222',
                '0672222222'
            ],
            'Old style number' => [
                '80672222222',
                '0672222222'
            ]
        ];
    }
}
