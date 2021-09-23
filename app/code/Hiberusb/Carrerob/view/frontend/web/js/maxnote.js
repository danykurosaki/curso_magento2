require([
    'Magento_Ui/js/modal/alert',
    'jquery'
], function(alert, $) { // Variable that represents the `alert` function
    $("#maxMark").click(function(){
        let getValue = $('#maxMarkData').val();
        alert({
            title: $.mage.__('Max Mark'),
            content: $.mage.__('La nota mas alta es: '+ getValue),
            actions: {
                always: function(){}
            }
        })
    });
});
