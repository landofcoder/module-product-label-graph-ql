<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/terms
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_GraphQl
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */

namespace Lof\ProductLabelGraphQl\Model\Resolver;

use Lof\ProductLabel\Api\LabelRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class to resolve custom attribute_set_name field in faq category GraphQL query
 */
class LabelProductImageResolver extends AbstractProductLabelQuery implements ResolverInterface
{
    /**
     * @var StoreManagerInterface
     */
    private $_storeManager;

    /**
     * @var \Lof\ProductLabel\Helper\Config
     */
    protected $helper;

    /**
     * LabelAttributeSetImageResolver constructor.
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param LabelRepositoryInterface $productLabel
     * @param ProductRepositoryInterface $productRepository
     * @param StoreManagerInterface $storeManager
     * @param \Lof\ProductLabel\Helper\Config $helper
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        LabelRepositoryInterface $productLabel,
        ProductRepositoryInterface $productRepository,
        StoreManagerInterface $storeManager,
        \Lof\ProductLabel\Helper\Config $helper
    ) {
        $this->_storeManager = $storeManager;
        $this->helper = $helper;

        parent::__construct(
            $searchCriteriaBuilder,
            $productLabel,
            $productRepository
        );
    }

    /**
     * @inheritDoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (isset($value['product_image']) && $value['product_image'] && isset($value['product_type']) && $value['product_type']) {
            return $this->getImageScr($value['product_image'], $value['product_type']);
        } else {
            return '';
        }
    }

    /**
     * Get image url with mode and site url
     *
     * @return string
     */
    public function getImageScr($image, $type)
    {
        if ($type == 'text_only') {
            return '';
        } else {
            return $this->helper->getImageUrl($image);
        }
    }
}
