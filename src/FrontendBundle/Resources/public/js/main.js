
$('.menu-toggle').on('click', function(){

    if($('body').hasClass('open')) {
        $('body').addClass('menu-close');
        setTimeout(function () {
            $('body').toggleClass('open');
            $('body').removeClass('menu-close');
        },500);
    }else {
        $('body').toggleClass('open');
    }
});

// var slider = $('.slider').bxSlider({
//     infiniteLoop: true,
//     auto: true
// });


$('form.form-validate')
  .form({
    // on: 'blur',
    fields: {
      name: {
        identifier  : 'contact_form[name]',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a name'
          }
        ]
      },
      txt: {
        identifier  : 'contact_form[body]',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a massage'
          }
        ]
      },
      email: {
        identifier  : 'contact_form[email]',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a E-mail'
          }
        ]
      },
      phone: {
        identifier  : 'contact_form[telephone]',
        rules: [
          {
            type: 'regExp',
            value: /(^[0-9\-\+]{9,15}$)/,
          }
        ]
      },
      
    }
  })
;

document.addEventListener("DOMContentLoaded", function(){
   setTimeout(function(){
    $('header').addClass('loaded');
   }, 50); 
});


$('.main-wrap__text-block .read-more-hide').click(function(e){
    e.preventDefault();
    $(this).closest('.main-wrap__text-block').find('.txt-hide').slideToggle('slow');
    $(this).hide();
    $('.read-more-show').show();
});

$('.main-wrap__text-block .read-more-show').click(function(e){
    e.preventDefault();
    $(this).closest('.main-wrap__text-block').find('.txt-hide').slideToggle('slow');
    $(this).hide();
    $('.read-more-hide').show();
});


$(document).ready(function () {

    'use strict'

    var Nexus = {

        initialized: false,

        initialize: function () {
            if (this.initialized) return;

            this.initialized = true;
            this.build();
        },
        build: function () {
            this.animation();
        },
        globalArgs: {
            body: $('body'),
            animation: $('body .my-animate'),
            animateArr: [],
            time: new Date().getTime(),

        },

        animation: function () {
            var animation = this.globalArgs.animation;
            var animateArr = this.globalArgs.animateArr;

            /*
            
            dataTop - scroll to the animation start

            */
            animation.each(function () {
                var block = {
                    height: $(this).offset().top,
                    obj: $(this),
                    dataTop: $(this).data('top') != undefined ? $(this).data('top') : 100 ,
                    flag: false
                };

                animateArr.push(block);

            });
        },

        animationCheck: function (scrolled) {
            var animateArr = this.globalArgs.animateArr;
            var heightMonitor = $(window).height();
            var time = this.globalArgs.time;

            if($(window).width() < 992) return;

            if (animateArr[0] && scrolled > animateArr[0].height - ( heightMonitor / 1.1 ) + (animateArr[0].dataTop)) {
                var block = animateArr[0].obj;

                block.addClass('animate-on');

                // var timeNow = new Date().getTime();
                
                // // console.log(time, timeNow);4
                // var t = time + 500;
                // console.log(t, timeNow);
                // // if(t < timeNow){
                // //     setTimeout(function(){
                // //         block.addClass('animate-on');
                // //     },500);
                // // }else{
                //     var timer = timeNow - t;
                //     //  console.log(timer);
                //     setTimeout(function(){
                         
                //     },timer+500);
                // // }
                // this.globalArgs.time = timeNow;
               
                
                // console.log(animateArr[0]);
                // console.log(animateArr[0].dataTop);
                animateArr.splice(0, 1);
                // console.log(animateArr[0]);

            }
        }

    };

    Nexus.initialize();

    window.onscroll = function() {
        var scrolled = window.pageYOffset || document.documentElement.scrollTop;
        Nexus.animationCheck(scrolled);
    }


});