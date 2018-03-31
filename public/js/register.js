$("#authnxtbtn").click(function () {
    $("#auth").hide();
    $("#store").show();
});

$("#storeprvbtn").click(function () {
    $("#store").hide();
    $("#auth").show();
});

$("#storenxtbtn").click(function () {
    $("#store").hide();
    $("#owner").show();
});

$("#ownerprvbtn").click(function () {
    $("#owner").hide();
    $("#store").show();
});


$('#strtypesel').change(function() {
    $("#strtype").val(this.value);
    var a = $("#strtype").val();
    console.log(a);
});

$("#strlocationbtn").click(function () {
    
    if (navigator.geolocation) {
        iziToast.info({
            title: 'Searching',
            messageColor: 'black',
            timeout: 5000,
            zindex: 999,
            overlay: true,
            toastOnce: true,
            pauseOnHover: false,
            position: 'bottomCenter',
            message: 'Stalking...',
        });
        navigator.geolocation.getCurrentPosition(storePosition, showError, {maximumAge: 300, timeout:5500, enableHighAccuracy: true});
    } else {
        iziToast.warning({
            title: 'Error',
            messageColor: 'black',
            timeout: 3000,
            zindex: 999,
            overlay: true,
            toastOnce: true,
            pauseOnHover: false,
            position: 'bottomCenter',
            message: 'Geolocation is not supported by this browser.',
        });
    }

});

function storePosition(position) {
    var location = position.coords.latitude + "," + position.coords.longitude;
    
    $("#strlocation").val(location);
    var a = $("#strlocation").val();
    console.log(a);
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            iziToast.warning({
                title: 'Caution',
                messageColor: 'black',
                timeout: 3000,
                zindex: 999,
                overlay: true,
                toastOnce: true,
                pauseOnHover: false,
                position: 'bottomCenter',
                message: 'User denied the request for Geolocation.',
            });
            break;
        case error.POSITION_UNAVAILABLE:
            iziToast.warning({
                title: 'Caution',
                messageColor: 'black',
                timeout: 3000,
                zindex: 999,
                overlay: true,
                toastOnce: true,
                pauseOnHover: false,
                position: 'bottomCenter',
                message: 'Location information is unavailable.',
            });
            break;
        case error.TIMEOUT:
            iziToast.warning({
                title: 'Caution',
                messageColor: 'black',
                timeout: 3000,
                zindex: 999,
                overlay: true,
                toastOnce: true,
                pauseOnHover: false,
                position: 'bottomCenter',
                message: 'The request to get user location timed out.',
            });
            break;
        case error.UNKNOWN_ERROR:
            iziToast.warning({
                title: 'Caution',
                messageColor: 'black',
                timeout: 3000,
                zindex: 999,
                overlay: true,
                toastOnce: true,
                pauseOnHover: false,
                position: 'bottomCenter',
                message: 'An unknown error occurred.',
            });
            break;
    }
}

