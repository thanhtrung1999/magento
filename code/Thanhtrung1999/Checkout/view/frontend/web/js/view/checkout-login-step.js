define(
    [
        'ko',
        'uiComponent',
        'underscore',
        'Magento_Checkout/js/model/step-navigator',
        'Magento_Customer/js/model/customer'
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator,
        customer
    ) {
        'use strict';
        /**
         * check-login - is the name of the component's .html template
         */
        return Component.extend({
            defaults: {
                template: 'Thanhtrung1999_Checkout/check-login'
            },

            //add here your logic to display step (Thêm vào đây logic của bạn để hiển thị step),
            isVisible: ko.observable(true),
            isLogedIn: customer.isLoggedIn(),
            /*step code will be used as step content id in the component template
            (step code sẽ được sử dụng làm id nội dung bước trong mẫu thành phần)*/
            stepCode: 'isLogedCheck',
            //step title value
            stepTitle: 'Logging Status',

            /**
             *
             * @returns {*}
             */
            initialize: function () {
                this._super();
                // register your step (đăng ký step của bạn)
                stepNavigator.registerStep(
                    this.stepCode,
                    //step alias (bí danh của step)
                    null,
                    this.stepTitle,
                    /*observable property with logic when display step or hide step
                    (thuộc tính observable với logic khi hiển thị step hoặc ẩn step)*/
                    this.isVisible,

                    _.bind(this.navigate, this),

                    /**
                     * sort order value
                     * 'sort order value' < 10: step displays before shipping step (step mình tạo sẽ đứng trước shipping step);
                     * 10 < 'sort order value' < 20 : step displays between shipping and payment step (step mình tạo sẽ đứng giữa shipping và payment step)
                     * 'sort order value' > 20 : step displays after payment step (step mình tạo sẽ đứng sau payment step)
                     */
                    15
                );

                return this;
            },

            /**
            * Phương thức navigate() chịu trách nhiệm điều hướng giữa bước checkout
            * trong quá trình thanh toán. Bạn có thể thêm logic tùy chỉnh, ví dụ một số điều kiện
            * để chuyển sang bước tùy chỉnh của bạn
            */
            navigate: function () {
                // this.isVisible(true);
            },

            /**
             * @returns void
             */
            navigateToNextStep: function () {
                stepNavigator.next();
            }
        });
    }
);
