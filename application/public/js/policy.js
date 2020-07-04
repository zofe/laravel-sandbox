
if (document.cookie.indexOf("cc_cookie_accept") >= 0) {
    dataLayer.push({'event': 'cookieOk'});
} else {
    $(".privacy-overlay").css('display','block');
    $.ajax({url: "/cookie-policy/modal", success: function(result){
        $(".privacy-modal").html(result);

        $(document).on('click', 'a.showmore', function(event){
            $(".privacy-modal").height(400);
            $("#more").show();
            return false;
        });

        $(document).on('click', 'a.accept_cookie', function(event){
            setCookie('cc_cookie_accept','cc_cookie_accept', 365,'/');
            return false;
        });
    }});
}


function setCookie(cookieName, value, exDays, path) {
    var d = new Date();
    d.setTime(d.getTime() + (exDays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cookieName + '=' + value + '; ' + expires + '; path=' + path + ';';
    console.log(cookieName + '=' + value + '; ' + expires + '; path=' + path + ';');
    dataLayer.push({'event': 'cookieOk'});
    $(".privacy-overlay").css('display','none');
    return false;
}
