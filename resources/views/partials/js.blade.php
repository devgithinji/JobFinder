
<script src="{{asset('external/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('external/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('external/js/jquery-ui.js')}}"></script>
<script src="{{asset('external/js/popper.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap.min.js')}}"></script>
<script src="{{asset('external/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('external/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('external/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('external/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('external/js/aos.js')}}"></script>


<script src="{{asset('external/js/mediaelement-and-player.min.js')}}"></script>

<script src="{{asset('external/js/main.js')}}"></script>

<script type="text/javascript">
    window.onload = function () {
        $('#datepicker').datepicker({minDate:new Date(2009,1,12), maxDate:new Date(2020,5,17)});
        $('.fa').on('click',function () {
            var icon =  $('.fa');
            var pwd = $('#password');
            var confirm_pwd = $('#password-confirm');
            if (pwd.attr("type") ==="password") {
                icon .removeClass('fa-eye');
                icon .addClass('fa-eye-slash');
                pwd.attr("type","text");
                confirm_pwd.attr("type","text");
            }else{
                pwd.attr("type","password");
                confirm_pwd.attr("type","password");
                icon .removeClass('fa-eye-slash');
                icon .addClass('fa-eye');
            }
        });

        $('#mailable').on('click',function (e) {
            $('#mailablemodal').modal('show');
        })


    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRkQR0zEJYo-Moz-qwTUwXYYSw4WpdAX0&libraries=places&callback=initAutocomplete" async defer></script>

