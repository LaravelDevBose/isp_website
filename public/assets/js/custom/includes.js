$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function header_top_message(type,message) {
    var opts = {
        title: "Over here",
        text: "Check me out. I'm in a different stack.",
        width: "50%",
        cornerclass: "no-border-radius",
        addclass: "stack-custom-top bg-primary"
    };
    switch (type) {
        case 'error':
            opts.text = message;
            opts.addclass = "stack-custom-top bg-danger";
            opts.type = "error";
            break;

        case 'info':
            opts.text = message;
            opts.addclass = "stack-custom-top bg-info";
            opts.type = "info";
            break;

        case 'success':
            opts.text = message;
            opts.addclass = "stack-custom-top bg-success";
            opts.type = "success";
            break;
        case 'warning':
            opts.text = message;
            opts.addclass = "stack-custom-top bg-warning";
            opts.type = "warning";
            break;
    }
    new PNotify(opts);
}

$(document).ready(function() {
    $('.fancybox').fancybox({
        padding: 0,
        openEffect : 'elastic',
        openSpeed  : 150,
        closeEffect : 'elastic',
        closeSpeed  : 150,
        maxWidth    : "60%",
        autoSize    : true,
        autoScale   : true,
        fitToView   : true,
        helpers : {
            title : {
                type : 'inside'
            },
            overlay : {
                css : {
                    'background' : 'rgba(0,0,0,0.3)'
                }
            }
        }
    });
    $('.fancyboxview').fancybox({
        padding: 0,
        openEffect : 'elastic',
        openSpeed  : 150,
        closeEffect : 'elastic',
        closeSpeed  : 150,
        maxWidth    : "95%",
        autoSize    : true,
        autoScale   : true,
        fitToView   : true,
        helpers : {
            title : {
                type : 'inside'
            },
            overlay : {
                css : {
                    'background' : 'rgba(0,0,0,0.3)'
                }
            }
        }
    });
});
