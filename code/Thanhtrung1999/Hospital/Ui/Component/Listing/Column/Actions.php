<?php

namespace Thanhtrung1999\Hospital\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class Actions
 */
class Actions extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                // here we can also use the data from $item to configure some parameters of an action URL
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => '/edit',
                        'label' => __('Edit')
                    ],
                    'remove' => [
                        'href' => '/remove',
                        'label' => __('Remove')
                    ],
                    'duplicate' => [
                        'href' => '/duplicate',
                        'label' => __('Duplicate')
                    ],
                ];
            }
        }

        return $dataSource;
    }
}
