<?php
/**
 * {
 * lofProductLabelById(entity_id: 1)
 * {
 * entity_id
 * name
 * status
 * product_image
 * }
 * }
 */

namespace Lof\ProductLabelGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class LabelById
 *
 * @package Lof\ProductLabelGraphQl\Model\Resolver
 */
class LabelById extends AbstractProductLabelQuery implements ResolverInterface
{
    /**
     * @inheritDoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $this->validateArgs($args);

        $label = $this->_labelRepository->getById($args['entity_id']);

        return $label->getData();
    }
}
