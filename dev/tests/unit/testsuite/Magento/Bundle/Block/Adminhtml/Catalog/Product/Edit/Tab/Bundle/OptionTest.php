<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Bundle
 * @subpackage  unit_tests
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Bundle\Block\Adminhtml\Catalog\Product\Edit\Tab\Bundle;

class OptionTest
    extends \PHPUnit_Framework_TestCase
{
    public function testGetAddButtonId()
    {
        $button = new \Magento\Object;

        $itemsBlock = $this->getMock('Magento\Object', array('getChildBlock'));
        $itemsBlock->expects($this->atLeastOnce())
            ->method('getChildBlock')
            ->with('add_button')
            ->will($this->returnValue($button));

        $layout = $this->getMock('Magento\Object', array('getBlock'));
        $layout->expects($this->atLeastOnce())
            ->method('getBlock')
            ->with('admin.product.bundle.items')
            ->will($this->returnValue($itemsBlock));

        $block = $this->getMock('Magento\Bundle\Block\Adminhtml\Catalog\Product\Edit\Tab\Bundle\Option',
            array('getLayout'), array(), '', false);
        $block->expects($this->atLeastOnce())
            ->method('getLayout')
            ->will($this->returnValue($layout));

        $this->assertNotEquals(42, $block->getAddButtonId());
        $button->setId(42);
        $this->assertEquals(42, $block->getAddButtonId());
    }
}
