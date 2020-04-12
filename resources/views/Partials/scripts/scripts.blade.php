<!-- Bootstrap core JavaScript -->
<script src="{{global_asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{global_asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugin JavaScript -->
<script src="{{global_asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for this template -->
<script src="{{global_asset('js/new-age.min.js')}}"></script>
<!-- wow.js animation library on scroll -->
<script src="{{global_asset('js/wow.js')}}"></script>
<script>
    new WOW().init();
</script>

<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
            navigator.serviceWorker.register('/sw.js').then(function (registration) {
                console.log('ServiceWorker registration :', registration.scope);
            }).catch(function (error) {
                console.log('ServiceWorker registration failed:', error);
            });
        });
    }
</script>

