
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title></title>
  <style type='text/css'>
    body {
    background-color: rgba(6, 35, 42, 0.75);
    background-size:cover;
    width: 100%;
    margin: 0 auto;
    padding: 0;
    color:#fff;
}
#contain {
    width: 1200px;
    margin: 0 auto;
    position: relative;
    background-color: rgb(0, 0, 0);
}
.outer {
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(16, 22, 23, 0.75);
    z-index: 9999;
    width: 100%;
    height: 100%;
}
.inner {
    position: absolute;
    left: 3%;
    right: 3%;
    top: 4%;
    bottom: 4%;
    padding: 49px;
    background: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    text-align: center;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
}
.close {
    cursor:pointer;
}
#holelist {
    display: block;
    list-style-type: none;
    margin: 0 auto;
    padding: 0;
    position: absolute;
    float:none;
    top: 0;
    left: 0;
    color:#fff;
}
.hole {
    background: radial-gradient(5px -9px, circle, white 8%, red 26px);
    background: -moz-radial-gradient(5px -9px, circle, white 8%, red 26px);
    background: -ms-radial-gradient(5px -9px, circle, white 8%, red 26px);
    background: -o-radial-gradient(5px -9px, circle, white 8%, red 26px);
    background: -webkit-radial-gradient(5px -9px, circle, rgb(255, 255, 255) 8%, rgb(255, 0, 0) 26px);
    background-color: rgb(255, 0, 0);
    border: 2px solid rgb(255, 255, 255);
    border-radius: 50%;
    box-shadow: 1px 1px 1px rgb(0, 0, 0);
    color: rgb(255, 255, 255);
    font: bold 15px/13px Helvetica, Verdana, Tahoma;
    height: 24px;
    padding: 14px 4px 0 3px;
    text-align: center;
    min-width: 32px;
    position: absolute;
}
.selected {
    background-color: rgb(255, 255, 255);
    color: rgb(6, 35, 42);
}
.smooth {
    -moz-animation: fadein 2s;
    /* Firefox */
    -webkit-animation: fadein 2s;
    /* Safari and Chrome */
    -o-animation: fadein 2s;
    /* Opera */
}
@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-moz-keyframes fadein {
    /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-webkit-keyframes fadein {
    /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-o-keyframes fadein {
    /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: 1;
    }
}
  </style>



<script type='text/javascript'>//<![CDATA[
window.onload=function(){
var classbutton = document.getElementsByClassName('hole');
var outervid = document.getElementsByClassName('outer')[0];
var closing = document.getElementsByClassName('close')[0];

function add_removeMulti() {
    for (var i = 0; i < classbutton.length; ++i) {
        var item = classbutton[i];
        item.classList.remove("selected");

    }
    this.classList.add("selected");
    outervid.style.display = "block";
}
for (var i = 0; i < classbutton.length; ++i) {
    var item = classbutton[i];
    item.onclick = add_removeMulti;
}

closing.addEventListener("click", function () {
    outervid.style.display = "none";
});
}//]]>

</script>


<script src="http://debug.phonegap.com/target/target-script-min.js#jsf_qqf"></script></head>
<body>
  <div id="contain">
    <div id="holelist">
        <img src="http://i.imgur.com/PjqhjYz.png" />
        <div class="hole" style="bottom: 180px;left: 347px;">1</div>
        <div class="hole" style="bottom: 150px;left: 138px;">2</div>
        <div class="hole" style="bottom: 168px;left: 62px;">3</div>
        <div class="hole" style="bottom: 179px;left: 202px;">4</div>
        <div class="hole" style="top: 309px;left: 245px;">5</div>
        <div class="hole" style="top: 111px;left: 86px;">6</div>
        <div class="hole" style="top: 115px;left: 167px;">7</div>
        <div class="hole" style="top: 282px;left: 292px;">8</div>
        <div class="hole" style="bottom: 246px;left: 472px;">9</div>
        <div class="hole" style="bottom: 220px;right: 571px;">10</div>
        <div class="hole" style="top: 248px;right: 377px;">11</div>
        <div class="hole" style="top: 156px;right: 239px;">12</div>
        <div class="hole" style="top: 219px;right: 182px;">13</div>
        <div class="hole" style="top: 320px;right: 86px;">14</div>
        <div class="hole" style="bottom: 116px;right: 102px;">15</div>
        <div class="hole" style="top: 336px;right: 228px;">16</div>
        <div class="hole" style="bottom: 255px;right: 277px;">17</div>
        <div class="hole" style="bottom: 187px;left: 746px;">18</div>
    </div>
    <div id="vid">
        <div class="outer smooth" style="display:none;">
            <div class="inner">
                <p class="close">close</p>
            </div>
        </div>
    </div>
</div>

</body>


</html>

