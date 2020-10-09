define([
    "jquery"
], function($){
    "use strict";
    /*return (config, element) => {
        alert(config.message);

        $(element).click(()=>{
            console.log("AAAA");
        });
    };*/
    return {
        'hello': (config, element) => {
            alert(config.message);

            $(element).click(()=>{
                console.log("AAAA");
            });
        }
    };
});
