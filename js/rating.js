function myXMLHttpRequest() {
    var a;
    try {
        a = new ActiveXObject("Msxml2.XMLHTTP")
    } catch (b) {
        try {
            a = new ActiveXObject("Microsoft.XMLHTTP")
        } catch (b) {
            a = !1
        }
    }
    if (!a && "undefined" != typeof XMLHttpRequest) try {
        var a = new XMLHttpRequest
    } catch (a) {
        var a = !1;
        alert("couldn't create xmlhttp object")
    }
    return a
}

function sndReq(a, b, c, d) {
    var e = document.getElementById("unit_ul" + b);
    e.innerHTML = '<div class="loading"></div>', xmlhttp.open("get", "rpc.php?j=" + a + "&q=" + b + "&t=" + c + "&c=" + d), xmlhttp.onreadystatechange = handleResponse, xmlhttp.send(null)
}

function handleResponse() {
    if (4 == xmlhttp.readyState && 200 == xmlhttp.status) {
        var a = xmlhttp.responseText,
            b = new Array;
        a.indexOf("|") != -1 && (b = a.split("|"), changeText(b[0], b[1]))
    }
}

function changeText(a, b) {
    var c = document.all ? 1 : 0,
        d = 0;
    parseInt(navigator.appVersion) >= 5 && (d = 1), d ? $("#" + a).html(b) : c && (document.all[a].innerHTML = b)
}
var xmlhttp;
if (!xmlhttp && "undefined" != typeof XMLHttpRequest) try {
    xmlhttp = new XMLHttpRequest
} catch (a) {
    xmlhttp = !1
}
var ratingAction = {
    "a.rater": function(a) {
        a.onclick = function() {
            var a = this.href.replace(/.*\?(.*)/, "$1"),
                b = a.split("&"),
                c = new Array;
            for (j = 0; j < b.length; j++) {
                var d = b[j].replace(/(.*)=.*/, "$1"),
                    e = b[j].replace(/.*=(.*)/, "$1");
                c[d] = e
            }
            var f = c.q,
                g = c.j,
                h = c.t,
                i = c.c;
            return sndReq(g, f, h, i), !1
        }
    }
};
Behaviour.register(ratingAction);