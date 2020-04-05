<!-- Bootstrap core JavaScript -->
<script src="{{global_asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{global_asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{global_asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{global_asset('js/new-age.min.js')}}"></script>

<!-- Getbutton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+527352769817", // WhatsApp number
            sms: "+527352769817", // Sms phone number
            call_to_action: "¿Dudas? Oprime el botón y hablemos", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "sms,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /Getbutton.io widget -->
