define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Thanhtrung1999_Checkout/newsletter'
            },
            isRegisterNewsletter: true
        });
    }
);
