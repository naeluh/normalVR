var gallery = $('.holder'),
    items = gallery.find('.slide-wrapper'),
    len = items.length,
    current = 1,
    /* the current item we're looking */

    first = items.filter(':first'),
    last = items.filter(':last'),

    triggers = $('button');
var over;

var func =  function() {
   // if (!over) {
        slider.loop();
        slider.nextSlide(); 
   //     console.log('timer');
   // }else{
   //     clearTimeout(timer);
   //     console.log('cleared');
   // }
}

var timer;

var v = 1;
var images = [];
var eleArray = [];
var val = 0;
var isTouchSupported = 'ontouchstart' in window;
var sWrap = document.querySelector('.slider-wrap');
var hWrap = document.querySelector('.holder'),
    stop, containerWidth, sNum, panSlideNum;
var frameLi = document.querySelectorAll("ul > li")[this.index];
var frameIndicator = function(numFrames) {
    var f = document.getElementById('frame-indicator');
    if (numFrames <= 1) {
        $('.frame-indicator-wrap')
            .remove();
    } else {
        for (var i = numFrames - 1; i >= 0; i--) {
            var li = document.createElement("li");
            f.appendChild(li);
        }
        document.querySelectorAll(".frame-indicator-wrap ul > li")[0].className = 'selected';
    }
};
    var checkIe = window.requestAnimationFrame;

    var slider = {
        el: {
            holder: $(".holder"),
            imgSlide: $(".slide"),
            grnTxt: $(".green"),
            frameDot: $("#frame-indicator li"),
            prev: $("#p"),
            next: $("#n"),
            slideWrapper: $(".slide-wrapper"),
            mainWrap: $("")

        },
        slideWidth: Number(970),
        touchstartx: undefined,
        touchmovex: undefined,
        movex: undefined,
        index: 1,
        longTouch: undefined,
        init: function() {

            this.bindUIEvents();

            Array.prototype.forEach.call(document.querySelectorAll(".slide-wrapper"), function(arr) {

                val++;

                arr.style.height = "400px";

                arr.style.width = "970px";

                arr.setAttribute("data-slide", val);

            });



            first.before(last.clone(true).addClass("data-duplicate-first"));

            last.after(first.clone(true).addClass("data-duplicate-last"));

            sWrap.style.width = "970px";

            sWrap.style.height = "400px";

            sNum = $('.slide').length;

            hWrap.style.width = Number(970) * Number(sNum) + "px";

            panSlideNum = Number(970) * sNum;

            Array.prototype.forEach.call(document.querySelectorAll(".slide"), function(arr) {

                arr.style.backgroundSize = 'cover';

                arr.style.backgroundPosition = 'center';


            });


            if(checkIe){

                this.el.holder.css({
                    'transform': 'translate3d(-' + ((1 * this.slideWidth) / (Number(970) * sNum)) * 100 + '%,0,0)',
                    '-webkit-transform': 'translate3d(-' + ((1 * this.slideWidth) / (Number(970) * sNum)) * 100 + '%,0,0)'
                });

            }else{

                this.el.holder.css({
                    'left': -(this.slideWidth) + 'px'
                });

            }

            frameIndicator(sNum-2);

            stop = Number(970) * sNum;

            slider.loop();

        },
        loop: function(event) {
            timer = setTimeout(func, 3500);
        },
        previousSlide: function(event) {


            event.stopPropagation();

            event.preventDefault();

            // IMPORTANT VALUE this.touchmovex //
            this.touchmovex = Number(-this.slideWidth);
            // IMPORTANT VALUE this.touchmovex //

            this.movex = this.index * this.slideWidth + (this.touchmovex);

            var absMove = Math.abs(this.index * this.slideWidth - this.movex);

            var trueslide = (this.movex === stop);

            var trueslideDos = (this.movex === 0);

            var sWidth = this.slideWidth;

            //slider.loop();

            if (absMove > this.slideWidth / 2 || this.longTouch === false) {
                if (this.movex < this.index * this.slideWidth && this.index > 0) {
                    this.index--;
                }
            }

            if (checkIe){

                this.el.holder.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd',
                    function() {
                        $('.holder').removeClass('animate');

                        if (trueslideDos) {
                            //console.log(sWidth);
                            $('.holder').css({
                                'transform': 'translate3d(-' + (((sNum - 2) * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                                '-webkit-transform': 'translate3d(-' + (((sNum - 2) * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                            });
                            trueslideDos = false;

                        } else {

                            $('.holder').css({
                                'transform': 'translate3d(-' + ((this.index * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                                '-webkit-transform': 'translate3d(-' + ((this.index * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                            });

                        }
                    });

                this.el.holder.addClass('animate').css({
                    'transform': 'translate3d(-' + ((this.index * this.slideWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                    '-webkit-transform': 'translate3d(-' + ((this.index * this.slideWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                });


            } else {

             var nIndex = this.index;

                this.el.holder.animate({
                    left: "+=" + this.slideWidth
                }, function() {

                    if (nIndex === 0) {

                        $('.holder').css('left', -((sNum - 2) * sWidth));

                    }


                });



            }

            if (this.index === 0) {
                this.index = (sNum - 2);
            }

        },
        nextSlide: function(event) {

            //console.log('NEXT');

            if (event) {

            event.stopPropagation();

            event.preventDefault();


            }

            this.touchmovex = Number(this.slideWidth);

            this.movex = this.index * this.slideWidth + (this.touchmovex);

            var absMove = Math.abs(this.index * this.slideWidth - this.movex);

            var trueslide = (this.movex === stop);

            var trueslideDos = (this.movex === (stop - this.slideWidth));

            var sWidth = this.slideWidth;

            //slider.loop();

            var frameLiAdd = document.querySelectorAll(".frame-indicator-wrap ul > li")[this.index];
            var frameLiRemove = document.querySelectorAll(".frame-indicator-wrap ul > li")[this.index - 1];


            if (absMove > this.slideWidth / 2 || this.longTouch === false) {
                if (this.movex > this.index * this.slideWidth && this.index < Number(sNum) - 1) {
                    this.index++;
                }
            }

            if (checkIe) {

                this.el.holder.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd',
                    function() {
                        $('.holder').removeClass('animate');

                        if (trueslideDos) {
                            //console.log(sWidth);
                            $('.holder').css({
                                'transform': 'translate3d(-' + ((1 * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                                '-webkit-transform': 'translate3d(-' + ((1 * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                            });
                            trueslideDos = false;

                        } else {

                            $('.holder').css({
                                'transform': 'translate3d(-' + ((this.index * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                                '-webkit-transform': 'translate3d(-' + ((this.index * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                            });

                        }
                    });

                this.el.holder.addClass('animate').css({
                    'transform': 'translate3d(-' + ((this.index * this.slideWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                    '-webkit-transform': 'translate3d(-' + ((this.index * this.slideWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                });

            } else {

                var nIndex = this.index;

                this.el.holder.animate({
                    left: "-=" + this.slideWidth
                }, function() {

                    if (nIndex >= sNum - 1) {

                        $('.holder').css('left', '-970px');

                    }


                });


            }

            if (this.index === sNum - 1) {
                this.index = 1;
            }

            if (frameLiAdd === undefined){
                document.querySelectorAll(".frame-indicator-wrap ul > li")[0].className = 'selected';
            }else{
                frameLiAdd.className = 'selected';
            }
            //frameLiAdd.className = 'selected';
            frameLiRemove.className = '';

           // console.log(frameLiAdd);

            console.log('nextSlide: '+this.index || null);

        },
        bindUIEvents: function() {
            this.el.holder.on("touchstart", function(event) {
                clearTimeout(timer);
                slider.tstart(event);
            });
            this.el.holder.on("touchmove", function(event) {
                slider.tmove(event);
            });
            this.el.holder.on("touchend", function(event) {
                slider.tend(event);
                slider.loop();
            });
            this.el.prev.on("click", function(event) {
                slider.previousSlide(event);
            });
            this.el.next.on("click", function(event) {
                slider.nextSlide(event);
            });
            $('#container').mouseenter(function () {
                over = true;
                console.log('mouseenter');
                clearTimeout(timer);
                $('.sliderTools').fadeIn();
            }).mouseleave(function () {
                $('.sliderTools').fadeOut();
                console.log('mouseleave');
                over = false;
                slider.loop();
            });
            $(document).on({
                    'show.visibility': function() {
                        console.log('The page gained visibility; the <code>show</code> event was triggered.');
                        slider.loop();
                    },
                    'hide.visibility': function() {
                        console.log('The page lost visibility; the <code>hide</code> event was triggered.');
                        clearTimeout(timer);
                    }
                });
        },
        tstart: function(event) {

            event.stopPropagation();

            event.preventDefault();

            this.longTouch = false;

            setTimeout(function() {
                window.slider.longTouch = true;
            }, 250);


            if (isTouchSupported) {
                this.touchstartx = event.originalEvent.touches[0].pageX;
            } else {
                this.touchstartx = event.pageX;
            }

            $('.animate').removeClass('animate');

            $('.textAnimate').removeClass('textAnimate');

        },
        tmove: function(event) {

            event.stopPropagation();

            event.preventDefault();

            if (isTouchSupported) {
                this.touchmovex = event.originalEvent.touches[0].pageX;
            } else {
                this.touchmovex = event.pageX;
            }

            this.movex = this.index * this.slideWidth + (this.touchstartx - this.touchmovex);

            if (this.movex < stop) {
                if (this.movex < 0) {
                    var absMove = Math.abs(this.movex);
                    this.el.holder.css({
                        'transform': 'translate3d(' + absMove + 'px,0,0)',
                        '-webkit-transform': 'translate3d(' + absMove + 'px,0,0)'
                    });
                } else {
                    this.el.holder.css({
                        'transform': 'translate3d(-' + this.movex + 'px,0,0)',
                        '-webkit-transform': 'translate3d(-' + this.movex + 'px,0,0)'
                    });
                }
            }

            var frameLiRemove = document.querySelectorAll("ul > li")[this.index];

            frameLiRemove.className = "";

        },
        tend: function(event) {

            event.stopPropagation();

            event.preventDefault();

            var absMove = Math.abs(this.index * this.slideWidth - this.movex);

            var trueslidePrev = (this.movex === 0);

            var trueslideNext = (this.movex === (stop - this.slideWidth));

            var sWidth = this.slideWidth;

            if (absMove > this.slideWidth / 2 || this.longTouch === false) {
                if (this.movex > this.index * this.slideWidth && this.index < Number(sNum) - 1) {
                    this.index++;
                } else if (this.movex < this.index * this.slideWidth && this.index > 0) {
                    this.index--;
                }
            }

            this.el.holder.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd',
                function() {
                    $('.holder').removeClass('animate');

                    if (trueslidePrev) {
                        $('.holder').css({
                            'transform': 'translate3d(-' + (((sNum - 2) * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                            '-webkit-transform': 'translate3d(-' + (((sNum - 2) * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                        });
                        trueslideDos = false;

                    } else if (trueslideNext) {

                        $('.holder').css({
                            'transform': 'translate3d(-' + ((1 * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                            '-webkit-transform': 'translate3d(-' + ((1 * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                        });
                        trueslideDos = false;

                    } else {

                        $('.holder').css({
                            'transform': 'translate3d(-' + ((this.index * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)',
                            '-webkit-transform': 'translate3d(-' + ((this.index * sWidth) / (Number(sWidth) * sNum)) * 100 + '%,0,0)'
                        });

                    }
                });


            this.el.holder.addClass('animate').css({
                'transform': 'translate3d(-' + ((this.index * this.slideWidth) / (Number(970) * sNum)) * 100 + '%,0,0)',
                '-webkit-transform': 'translate3d(-' + ((this.index * this.slideWidth) / (Number(970) * sNum)) * 100 + '%,0,0)'
            });


            if (this.index === 0) {
                this.index = (sNum - 2);
            } else if (this.index === (sNum - 1)) {
                this.index = 1;
            }

            var frameLiAdd = document.querySelectorAll("ul > li")[this.index];
            frameLiAdd.className = 'selected';
        }
    };

    var preloadImages = function(srcs, imgs, callback) {
        var img;
        var remaining = srcs.length;
        for (var i = 0; i < srcs.length; i++) {
            img = new Image();
            img.onload = function() {
                --remaining;
                if (remaining <= 0) {
                    callback();
                }
            };
            img.src = srcs[i];
            imgs.push(img);
        }
    };


    preloadImages(imageSrcs, images, function() {
        if(checkIe){

            $('.holder').css({
                'transform': 'translate3d(0%,0,0)',
                '-webkit-transform': 'translate3d(0%,0,0)'
            });

        }
        //document.getElementById('container').style.display = 'block';
        //document.getElementById('preloader').style.display = 'none';
        $('#preloader').hide();

        $('#sWrap').fadeIn();

        slider.init();
    });





function gnav() {
    var sZe = 2.5223;
    var sZeTwo = 2.7223;
    window.fitText(document.getElementById("gNavHeader1"), sZe);
    window.fitText(document.getElementById("gNavHeader2"), sZe);
    window.fitText(document.getElementById("gNavHeader3"), sZe);
    window.fitText(document.getElementById("gNavCopy1"), sZeTwo);
    window.fitText(document.getElementById("gNavCopy2"), sZeTwo);
    window.fitText(document.getElementById("gNavCopy3"), sZeTwo);

    if (checkIe) {

        var c = 0;
        $("#navContainer").addClass('nav_up');
        $("#bkgrd").addClass('up');
        $("#blContent").addClass('up');
        $('#gblheader > p:nth-child(1) , #gblheader > p:nth-child(2) , #closeNav').click(function() {
            c++;
            $("#navContainer").toggleClass('nav_down', 'nav_up');
            $("#bkgrd").toggleClass('down', 'up');
            $("#blContent").toggleClass('down', 'up');
            $("#gNavContent").toggleClass('pos_down', 'pos_up');
            if (c === 1) {
                $('#gblheader > p:nth-child(2)').fadeIn();
            } else {
                $('#gblheader > p:nth-child(2)').fadeOut();
                c = 0;
            }
        });

    } else {
        $("#gNavContent").removeClass('pos_up');
        $("#gNavContent").css('top', '-265px');
        $('#gblheader > p:nth-child(1) , #gblheader > p:nth-child(2)').toggle(

            function() {
                $("#navContainer").animate({
                    height: "265px"
                }, 500);
                $("#bkgrd").animate({
                    top: "265px"
                }, 500);
                $("#blContent").animate({
                    top: "265px"
                }, 500);
                $("#gNavContent").animate({
                    top: "0"
                }, 500);
                $('#gblheader > p:nth-child(2)').fadeOut();

            },

            function() {
                $("#navContainer").animate({
                    height: "39px"
                }, 500);
                $("#bkgrd").animate({
                    top: "39px"
                }, 500);
                $("#blContent").animate({
                    top: "39px"
                }, 500);
                $("#gNavContent").animate({
                    top: "-265px"
                }, 500);
                $('#gblheader > p:nth-child(2)').fadeIn();
            });

        $('#closeNav').click(function() {
            $("#navContainer").animate({
                height: "39px"
            }, 500);
            $("#bkgrd").animate({
                top: "39px"
            }, 500);
            $("#blContent").animate({
                top: "39px"
            }, 500);
            $("#gNavContent").animate({
                top: "-265px"
            }, 500);
            $('#gblheader > p:nth-child(2)').fadeIn();
        });
    }
}
function addEvent(evnt, elem, func) {
    if (elem.addEventListener) // W3C DOM
        elem.addEventListener(evnt, func, false);
    else if (elem.attachEvent) { // IE DOM
        elem.attachEvent("on" + evnt, func);
    } else { // No much to do
        elem[evnt] = func;
    }
}
addEvent("load", window, gnav);