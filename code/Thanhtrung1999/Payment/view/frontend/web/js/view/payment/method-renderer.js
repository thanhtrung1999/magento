define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'testpayment',
                component: 'Thanhtrung1999_Payment/js/view/payment/method-renderer/testpayment'
            }
        );
        return Component.extend({});
    }
);
