

var propertyDetailsUtil = {
    sendMail: function (data)
    {
        
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: ipsAjax.ajaxurl,
            data: data,
            success: function (response) {
                if (response.type === "success") {
                    //jQuery("#vote_counter").html(response.vote_count);
                    alert("Message send successfully.");
                }
                else {
                    alert("Please try again later.");
                }
            }
        });
    }
};

jQuery(document).ready(function ($) {
    $(document).ajaxStop($.unblockUI);
    $('#ips-slide-image').slideme({
        arrows: true,
        //pagination: "numbers",
        resizable: {
            width: 990,
            height: 450
        },
        labels: {
            prev: '<<',
            next: '>>'
        }
    });

    $("#ips_btnSendMail").click(function () {
        var data = {
            'action': 'ips_send_mail_to_agents',
            'zipCode': jQuery("#txtZipCode").val(),
            'propertyAddress': jQuery("#ipsPropertyAddress").text(),
            'userMessage': jQuery("#ips_txtUserMessage").val(),
            'postNonce': ipsAjax.postNonce
        };
        $('#ipsMoreInfo').modal('toggle');
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        propertyDetailsUtil.sendMail(data);
        jQuery("#ips_txtUserMessage").val('');
    });
});


