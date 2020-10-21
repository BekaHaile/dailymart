(function (ETB ) {
    'use strict';
    
    // :: OTP Code resend Timer
    var count = 60;
    var counter = setInterval(timer, 1000);
    //1000 will run it every 1 second

    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            document.getElementById("resendOTP").innerHTML = '<input style="background: none;border: none;" class="resendOTP" type="submit" name="submit1" value="Resend OTP">';
        } else {
            document.getElementById("resendOTP").innerHTML = 'Wait ' + count + ' secs';
        }
    }

})(jQuery);