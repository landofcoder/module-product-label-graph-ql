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
 * @package    Lof_ProductLabelGraphQl
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */

namespace Lof\ProductLabelGraphQl\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class to resolve custom attribute_set_name field in product GraphQL query
 */
class ProductAttributeSetLabelsResolver implements ResolverInterface
{
    /**
     * @var \Lof\ProductLabel\Model\Repository\LabelRepository
     */
    protected $labelRepository;

    /**
     * @var \Lof\ProductLabel\Model\LabelViewer
     */
    protected $labelViewer;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;


    public function __construct(
        \Lof\ProductLabel\Model\Repository\LabelRepository $labelRepository,
        \Lof\ProductLabel\Model\LabelViewer $labelViewer,
        SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->labelRepository = $labelRepository;
        $this->labelViewer = $labelViewer;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|Value|mixed|string|null
     * @throws LocalizedException
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (isset($value['entity_id']) && $value['entity_id']) {
            $searchCriteria = $this->searchCriteriaBuilder->build( 'labels', $args);
            $storeId = isset($value['store_id']) && $value['store_id'] ? (int) $value['store_id'] : 0;
            $result = $this->labelRepository->getListByProduct($value['entity_id'], $storeId, $searchCriteria);
            return [
                'total_count' => $result->getTotalCount(),
                'items'       => $result->getItems(),
            ];
        } else {
            return [];
        }
    }
}
