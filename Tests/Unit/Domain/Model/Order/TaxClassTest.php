<?php

namespace Extcode\Cart\Tests\Unit\Domain\Model\Order;

/*
 * This file is part of the package extcode/cart.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class TaxClassTest extends UnitTestCase
{
    /**
     * @var \Extcode\Cart\Domain\Model\Order\TaxClass
     */
    protected $taxClass = null;

    /**
     * Title
     *
     * @var string
     */
    protected $title;

    /**
     * Value
     *
     * @var string
     */
    protected $value;

    /**
     * Calc
     *
     * @var float
     */
    protected $calc = 0.0;

    public function setUp(): void
    {
        $this->title = 'normal';
        $this->value = '19';
        $this->count = 0.19;

        $this->taxClass = new \Extcode\Cart\Domain\Model\Order\TaxClass(
            $this->title,
            $this->value,
            $this->calc
        );
    }

    /**
     * @test
     */
    public function constructTaxClassWithoutTitleThrowsException()
    {
        $this->expectException(\TypeError::class);

        new \Extcode\Cart\Domain\Model\Order\TaxClass(
            null,
            $this->value,
            $this->calc
        );
    }

    /**
     * @test
     */
    public function constructTaxClassWithoutValueThrowsException()
    {
        $this->expectException(\TypeError::class);

        new \Extcode\Cart\Domain\Model\Order\TaxClass(
            $this->title,
            null,
            $this->calc
        );
    }

    /**
     * @test
     */
    public function constructTaxClassWithoutCalcThrowsException()
    {
        $this->expectException(\TypeError::class);

        new \Extcode\Cart\Domain\Model\Order\TaxClass(
            $this->title,
            $this->value,
            null
        );
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsTitleSetDirectlyByConstructor()
    {
        $this->assertSame(
            $this->title,
            $this->taxClass->getTitle()
        );
    }

    /**
     * @test
     */
    public function getValueInitiallyReturnsValueSetDirectlyByConstructor()
    {
        $this->assertSame(
            $this->value,
            $this->taxClass->getValue()
        );
    }

    /**
     * @test
     */
    public function getCalcInitiallyReturnsCalcSetDirectlyByConstructor()
    {
        $this->assertSame(
            $this->calc,
            $this->taxClass->getCalc()
        );
    }

    /**
     * @test
     */
    public function toArrayReturnsArray()
    {
        $taxClassArray = [
            'title' => $this->title,
            'value' => $this->value,
            'calc' => $this->calc
        ];

        $this->assertEquals(
            $taxClassArray,
            $this->taxClass->toArray()
        );
    }
}
