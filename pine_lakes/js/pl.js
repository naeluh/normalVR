var tag = document.createElement("script");
tag.src = "//www.youtube.com/player_api?a";
var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var o = document.getElementById("Modal");
var vidOverlay = document.getElementById("videoOverlay");
var mVidWrap = document.getElementById("mobileVidOverlay");
var vidWrap = document.getElementById("videoWrapper");
var playButton = document.getElementById("playButton");
var mid = document.getElementById("midContent");
var vid = document.getElementById("video");
var h = document.getElementById("holeBlock");
var n = document.getElementById("next");
var p = document.getElementById("prev");
var t = document.getElementById("thumb");
var main = document.getElementById("mainContent");
var preload = document.getElementById("preload");
var pager = document.getElementById("pager");
var tOne = document.getElementById("t1");
var tTwo = document.getElementById("t2");
var tThree = document.getElementById("t3");
var tFour = document.getElementById("t4");
var links = document.getElementsByTagName("a");
var par = document.getElementById("parNum");
var courseImg = document.getElementById('courseImg');
var player;
var value = isNaN(value) ? 1 : value;
var playerIsReady = false;


window.mobilecheck = function() {
    var check = false;
    (function(a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|android|ipad|playbook|silk|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,
                4))) {
            check = true;
        }
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
};
window.onYouTubePlayerAPIReady = function() {
    player = new YT.Player("video", {
        playerVars: {
        html5: 1
        },
        events: {
            "onReady": onPlayerReady,
            "onStateChange": onPlayerStateChange
        }
    });
};

function onPlayerReady(event) {
    //console.log('a');
    //main.style.display = "block";
    //preload.style.display = "none";
    //fitText(document.getElementById("botContent"), 2.47);
    //fitText(document.getElementById("topContent"), 2.6);
    if (mobilecheck()) {
        playButton.addEventListener("click", function() {
            event.target.setPlaybackQuality('hd720');
            vidOverlay.style.display = "none";
            pager.style.display = "none";
            playerIsReady = true;
        });
    } else {
        playButton.addEventListener("click", function() {
            vidOverlay.style.display = "none";
            player.playVideo();
            pager.style.display = "none";
            event.target.setPlaybackQuality('hd720');
        });
    }
}

function onPlayerStateChange(event) {
    if (event.data === 0) {
        pager.style.display = "block";
        vidOverlay.style.display = "block";
        player.stopVideo();
        player.seekTo(0);
    }
    if (event.data == YT.PlayerState.BUFFERING) {
        event.target.setPlaybackQuality('hd720');
    }
}

vid.onload = function() {
    //console.log('b');
    main.style.display = "block";
    preload.style.display = "none";
   // fitText(document.getElementById("botContent"), 2.47);
   // fitText(document.getElementById("topContent"), 2.6);
};

window.onload = function() {
    if (mobilecheck()) {
        mVidWrap.style.backgroundColor = "rgba(0,0,0,1.0)";
        mVidWrap.style.zIndex = "0";
        mVidWrap.innerHTML = '<div class="spinner"><div class="spinner-container container1"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container2"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container3"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div></div>';
        thumb.remove();
        playButton.remove();
        vid.src = "//www.youtube.com/embed/ZmIeI61hhsM?enablejsapi=1&rel=0&html5=1&vq=hd720";
        vid.onload = function() {
            vidOverlay.style.display = "none";
            vidWrap.style.backgroundColor = "none";
        };
    }
  var data = [{
        "HoleNumber": "1",
        "TeeRow1": "519",
        "TeeRow2": "460",
        "Par": "5",
        "TeeRow3": "445",
        "TeeRow4": "347",
        "Source": "O_3JGSyv1cw"
    }, {
        "HoleNumber": "2",
        "TeeRow1": "369",
        "TeeRow2": "334",
        "Par": "4",
        "TeeRow3": "269",
        "TeeRow4": "240",
        "Source": "vk8lsZyqMEc"
    }, {
        "HoleNumber": "3",
        "TeeRow1": "153",
        "TeeRow2": "138",
        "Par": "3",
        "TeeRow3": "110",
        "TeeRow4": "100",
        "Source": "0beAygrA1bQ"
    }, {
        "HoleNumber": "4",
        "TeeRow1": "398",
        "TeeRow2": "360",
        "Par": "4",
        "TeeRow3": "324",
        "TeeRow4": "226",
        "Source": "HLUdEHKjhnE"
    }, {
        "HoleNumber": "5",
        "TeeRow1": "334",
        "TeeRow2": "319",
        "Par": "4",
        "TeeRow3": "307",
        "TeeRow4": "298",
        "Source": "ryqNGPJQcXU"
    }, {
        "HoleNumber": "6",
        "TeeRow1": "196",
        "TeeRow2": "179",
        "Par": "3",
        "TeeRow3": "160",
        "TeeRow4": "153",
        "Source": "LeewPukCRY0"
    }, {
        "HoleNumber": "7",
        "TeeRow1": "382",
        "TeeRow2": "358",
        "Par": "4",
        "TeeRow3": "279",
        "TeeRow4": "277",
        "Source": "KqHyCpyAF5Y"
    }, {
        "HoleNumber": "8",
        "TeeRow1": "398",
        "TeeRow2": "384",
        "Par": "4",
        "TeeRow3": "292",
        "TeeRow4": "282",
        "Source": "9iiv7urkDlk"
    }, {
        "HoleNumber": "9",
        "TeeRow1": "529",
        "TeeRow2": "505",
        "Par": "5",
        "TeeRow3": "479",
        "TeeRow4": "451",
        "Source": "blRpBRdjeqg"
    }, {
        "HoleNumber": "10",
        "TeeRow1": "519",
        "TeeRow2": "502",
        "Par": "5",
        "TeeRow3": "378",
        "TeeRow4": "374",
        "Source": "163Edza6s0Y"
    }, {
        "HoleNumber": "11",
        "TeeRow1": "385",
        "TeeRow2": "355",
        "Par": "4",
        "TeeRow3": "322",
        "TeeRow4": "248",
        "Source": "NB1gjzEWY7g"
    }, {
        "HoleNumber": "12",
        "TeeRow1": "198",
        "TeeRow2": "171",
        "Par": "3",
        "TeeRow3": "150",
        "TeeRow4": "140",
        "Source": "s4SE_Lei47Q"
    }, {
        "HoleNumber": "13",
        "TeeRow1": "385",
        "TeeRow2": "375",
        "Par": "4",
        "TeeRow3": "365",
        "TeeRow4": "280",
        "Source": "nRxjXaYi5E0"
    }, {
        "HoleNumber": "14",
        "TeeRow1": "495",
        "TeeRow2": "480",
        "Par": "4",
        "TeeRow3": "465",
        "TeeRow4": "360",
        "Source": "eblSm3HvTLQ"
    }, {
        "HoleNumber": "15",
        "TeeRow1": "415",
        "TeeRow2": "405",
        "Par": "4",
        "TeeRow3": "350",
        "TeeRow4": "280",
        "Source": "QJ3xnceUEb8"
    }, {
        "HoleNumber": "16",
        "TeeRow1": "168",
        "TeeRow2": "156",
        "Par": "3",
        "TeeRow3": "132",
        "TeeRow4": "107",
        "Source": "NnHrnSo-ACI"
    }, {
        "HoleNumber": "17",
        "TeeRow1": "339",
        "TeeRow2": "229",
        "Par": "4",
        "TeeRow3": "289",
        "TeeRow4": "259",
        "Source": "KyqH7RCQpTQ"
    }, {
        "HoleNumber": "18",
        "TeeRow1": "430",
        "TeeRow2": "419",
        "Par": "4",
        "TeeRow3": "409",
        "TeeRow4": "400",
        "Source": "dBHCALYvjDY"
    }];


    function showNumber(ev) {
        ev.preventDefault();
        player.stopVideo();
        player.seekTo(0);
        vidOverlay.style.display = "block";
        pager.style.display = "block";
        h.textContent = this.textContent;
        for (var i = data.length - 1; i >= 0; i--) {
            if (data[i].HoleNumber === h.textContent) {
                tOne.textContent = data[i].TeeRow1;
                tTwo.textContent = data[i].TeeRow2;
                tThree.textContent = data[i].TeeRow3;
                tFour.textContent = data[i].TeeRow4;
                par.textContent = data[i].Par;
                courseImg.style.backgroundImage = "url('http://www.golfpinelakes.com/images/431/hole"+ data[i].HoleNumber +".jpg')" ; 
                if (mobilecheck()) {
                    vid.src = "//www.youtube.com/embed/" + data[i].Source + "?enablejsapi=1&vq=hd720";
                } else {
                    player.loadVideoById({
                        'videoId': data[i].Source,
                        'suggestedQuality': 'large'
                    });
                    t.src = "https://img.youtube.com/vi/" + data[i].Source + "/hqdefault.jpg";
                }
            }
        }
        return false;
    }

    function next(ev) {
        ev.preventDefault();
        vidOverlay.style.display = "block";
        player.stopVideo();
        player.seekTo(0);
        pager.style.display = "block";
        var hnuma = Number(h.textContent) + 1;
        h.textContent = hnuma;
        if (hnuma >= 19) {
            h.textContent = 1;
        }
        for (var i = data.length - 1; i >= 0; i--) {
            if (data[i].HoleNumber === h.textContent) {
                tOne.textContent = data[i].TeeRow1;
                tTwo.textContent = data[i].TeeRow2;
                tThree.textContent = data[i].TeeRow3;
                tFour.textContent = data[i].TeeRow4;
                par.textContent = data[i].Par;
                courseImg.style.backgroundImage = "url('http://www.golfpinelakes.com/images/431/hole"+ data[i].HoleNumber +".jpg')" ; 
                if (mobilecheck()) {
                    vid.src = "//www.youtube.com/embed/" + data[i].Source + "?enablejsapi=1&vq=hd720";
                } else {
                    player.loadVideoById({
                        'videoId': data[i].Source,
                        'suggestedQuality': 'large'
                    });
                    t.src = "https://img.youtube.com/vi/" + data[i].Source + "/hqdefault.jpg";
                }
            }
        }
        return false;
    }

    function prev(ev) {
        ev.preventDefault();
        vidOverlay.style.display = "block";
        pager.style.display = "block";
        player.stopVideo();
        player.seekTo(0);
        var hnumb = Number(h.textContent) - 1;
        h.textContent = hnumb;
        if (hnumb <= 0) {
            h.textContent = 18;
        }
        for (var i = data.length - 1; i >= 0; i--) {
            if (data[i].HoleNumber === h.textContent) {
                tOne.textContent = data[i].TeeRow1;
                tTwo.textContent = data[i].TeeRow2;
                tThree.textContent = data[i].TeeRow3;
                tFour.textContent = data[i].TeeRow4;
                par.textContent = data[i].Par;
                courseImg.style.backgroundImage = "url('http://www.golfpinelakes.com/images/431/hole"+ data[i].HoleNumber +".jpg')" ; 
                if (mobilecheck()) {
                    vid.src = "//www.youtube.com/embed/" + data[i].Source + "?enablejsapi=1&vq=hd720";
                } else {
                    player.loadVideoById({
                        'videoId': data[i].Source,
                        'suggestedQuality': 'large'
                    });
                    t.src = "https://img.youtube.com/vi/" + data[i].Source + "/hqdefault.jpg";
                }
            }
        }
        return false;
    }

    function x(ev) {
        ev.preventDefault();
        o.style.opacity = "0.0";
        o.style.filter = "alpha(opacity=0)";
        o.style.zIndex = "-1";
        player.stopVideo();
        player.seekTo(0);
        return false;
    }

    Array.prototype.forEach.call(document.querySelectorAll(".tLink"), function(brr) {
        brr.addEventListener("click", showNumber);
    });

    Array.prototype.forEach.call(document.querySelectorAll(".numberCircle"), function(arr) {
        arr.addEventListener("click", showNumber);
    });

    n.addEventListener("click", next, false);
    p.addEventListener("click", prev, false);

};
