<?php
namespace Thanhtrung1999\Catalog\Plugin;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class NewProductFlag
{
    protected $request;
    protected $localeDate;

    public function __construct(RequestInterface $request, TimezoneInterface $localeDate)
    {
        $this->request = $request;
        $this->localeDate = $localeDate;
    }

//    public function afterGetName(\Magento\Catalog\Api\Data\ProductInterface $subject, $result)
//    {
//        $pages = ['catalog_product_view', 'catalog_category_view'];
//        if (in_array($this->request->getFullActionName(), $pages)) {
//            $timezone = new \DateTimeZone($this->localeDate->getConfigTimezone());
//            $now = new \DateTime('now', $timezone);
//            $createdAt = \DateTime::createFromFormat('Y-m-d H:i:s', $subject->getCreatedAt(), $timezone);
//            if ($now->diff($createdAt)->days < 5) {
//                return __('[NEW] ') . $result;
//            }
//        }
//        return $result;
//    }
    public function afterGetName(\Magento\Catalog\Api\Data\ProductInterface $subject, $result)
    {
        $pages = ['catalog_product_view', 'catalog_category_view'];
        if (in_array($this->request->getFullActionName(), $pages)) {
            $new_item = $subject->getEnableNewProduct();
            if ($new_item == 1) {
                return __('[NEW] ') . $result;
            }
        }
        return $result;
    }
}
