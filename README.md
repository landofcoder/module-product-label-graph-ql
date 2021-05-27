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
## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/allorderdesk)


**Our Magento 2 Extensions List**
* [Megamenu for Magento 2](https://landofcoder.com/magento-2-mega-menu-pro.html/)

* [Page Builder for Magento 2](https://landofcoder.com/magento-2-page-builder.html/)

* [Magento 2 Marketplace - Multi Vendor Extension](https://landofcoder.com/magento-2-marketplace-extension.html/)

* [Magento 2 Multi Vendor Mobile App Builder](https://landofcoder.com/magento-2-multi-vendor-mobile-app.html/)

* [Magento 2 Form Builder](https://landofcoder.com/magento-2-form-builder.html/)

* [Magento 2 Reward Points](https://landofcoder.com/magento-2-reward-points.html/)

* [Magento 2 Flash Sales - Private Sales](https://landofcoder.com/magento-2-flash-sale.html)

* [Magento 2 B2B Packages](https://landofcoder.com/magento-2-b2b-extension-package.html)

* [Magento 2 One Step Checkout](https://landofcoder.com/magento-2-one-step-checkout.html/)

* [Magento 2 Customer Membership](https://landofcoder.com/magento-2-membership-extension.html/)

* [Magento 2 Checkout Success Page](https://landofcoder.com/magento-2-checkout-success-page.html/)


**Featured Magento Services**

* [Customization Service](https://landofcoder.com/magento-2-create-online-store/)

* [Magento 2 Support Ticket Service](https://landofcoder.com/magento-support-ticket.html/)

* [Magento 2 Multi Vendor Development](https://landofcoder.com/magento-2-create-marketplace/)

* [Magento Website Maintenance Service](https://landofcoder.com/magento-2-customization-service/)

* [Magento Professional Installation Service](https://landofcoder.com/magento-2-installation-service.html)

* [Customization Service](https://landofcoder.com/magento-customization-service.html)

