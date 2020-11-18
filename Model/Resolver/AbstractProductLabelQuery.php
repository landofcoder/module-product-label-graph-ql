<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Landofcoder
 * @package     Lof_ProductLabelGraphQl
 * @copyright   Copyright (c) Landofcoder (https://landofcoder.com/)
 * @license     https://landofcoder.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Lof\ProductLabelGraphQl\Model\Resolver;

use Exception;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Lof\ProductLabel\Api\LabelRepositoryInterface;

/**
 * Class AbstractGiftQuery
 * @package Lof\GiftSaleRuleGraphQl\Model\Resolver
 */
abstract class AbstractGiftQuery
{
    /**
     * @var LabelRepositoryInterface
     */
    protected $_productLabel;
    
    /**
     * @var ProductRepositoryInterface
     */
    protected $_productRepository;
    

    /**
     * @var int
     */
    protected $_productItemFlag;

    /**
     * @var int
     */
    protected $_categoryItemFlag;
    
    /**
     * AbstractGift constructor.
     * @param LabelRepositoryInterface $productLabel
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        LabelRepositoryInterface $productLabel,
        ProductRepositoryInterface $productRepository
    ) {
        $this->_productLabel = $productLabel;
        $this->_productRepository = $productRepository;
    }
    
    /**
     * @param array $args
     *
     * @throws GraphQlInputException
     */
    protected function validateArgs(array $args)
    {
        if ($this->_productItemFlag && !isset($args['sku'])) {
            throw new GraphQlInputException(__('product id is required.'));
        }
        if ($this->_productItemFlag) {
            $this->_productItemFlag = $this->_productRepository->get($args['sku'])->getId(); // get product id by sku
            if (!$this->_productItemFlag) {
                throw new GraphQlInputException(__('This product item does not exist.'));
            }
        }
        
        if ($this->_categoryItemFlag && !isset($args['category_slug'])) {
            throw new GraphQlInputException(__('Category Slug is required.'));
        }
        if ($this->_categoryItemFlag) {
            try {
                $this->_categoryItemFlag = 0;//get category id by slug
            } catch (Exception $e) {
                throw new GraphQlInputException(__($e->getMessage()));
            }
        }
    }
}
