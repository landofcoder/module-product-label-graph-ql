# Mage2 Module Lof ProductLabelGraphQl

    ``lof/module-productlabelgraphql``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Uses](#markdown-header-uses)

## Main Functionalities
magento 2 product label graphql extension

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Lof`
 - Enable the module by running `php bin/magento module:enable Lof_ProductLabelGraphQl`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require lof/module-productlabelgraphql`
 - enable the module by running `php bin/magento module:enable Lof_ProductLabelGraphQl`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Uses

- Labels included in Product query:
```
{
 products(search: "Joust Duffle Bag", pageSize: 2) {
   total_count
   items {
     name
     sku
     labels {
       total_count
       items {
         entity_id
         name
         exclusively
         use_for_parent
         price_range_enabled
         priority
         product_custom_css
         product_image
         product_image_size
         product_label_text
         product_label_text
         product_position
         product_shape
         product_stock_enabled
         product_text_color
         product_text_size
         product_type          
         cat_custom_css
         cat_image
         cat_image_size
         cat_label_color
         cat_label_text
         cat_position
         cat_shape
         cat_text_color
         cat_text_size
         cat_type
         cond_serialize
         customer_group_enabled
         customer_group_ids
         date_range_enabled
         from_date
         from_price
         is_new
         is_sale
         special_price_only
         status
         stock_higher
         stock_less
         stock_more
         stock_status
         stores
         to_date
         to_price
         by_price
       }
     }
   }
   page_info {
     page_size
     current_page
   }
 }
}
```

- Get List Labels:
```
{
  lofProductLabelList(filter: {}, pageSize: 20, currentPage: 1) {
    total_count
    items {
        entity_id
        name
        exclusively
        use_for_parent
        price_range_enabled
        priority
        product_custom_css
        product_image
        product_image_size
        product_label_text
        product_label_text
        product_position
        product_shape
        product_stock_enabled
        product_text_color
        product_text_size
        product_type          
        cat_custom_css
        cat_image
        cat_image_size
        cat_label_color
        cat_label_text
        cat_position
        cat_shape
        cat_text_color
        cat_text_size
        cat_type
        cond_serialize
        customer_group_enabled
        customer_group_ids
        date_range_enabled
        from_date
        from_price
        is_new
        is_sale
        special_price_only
        status
        stock_higher
        stock_less
        stock_more
        stock_status
        stores
        to_date
        to_price
        by_price
    }
  }
}
```

