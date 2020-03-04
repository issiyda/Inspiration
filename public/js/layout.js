$(document).ready(function(){



    //スマホ画面時にボタンクリックしたらサイドバー表示

    $('.js-home-sp-menu').click(function(){
        var button = $('.sidebar');
        button.toggleClass('sidebar-active');
    });




    //カテゴリ画像を下から上に表示


        $(window).scroll(function () {


            $('.js-rise-target').each(function () {
                var target = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();

                // PC用
                if(scroll > target - windowHeight + 350)
                {
                    $(this).css('opacity',1);
                    $(this).css('transform','translateY(0)');

                }
                //スマホ用



            })

            //メリット画像を左から横にスライド表示
            $('.js-slide-target').each(function(){
                var target = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();

                if(scroll > target - windowHeight + 350)
                {
                    $(this).css('opacity',1);
                    $(this).css('transform','translateX(0)');
                }

            })


        })

    フラッシュメッセージの表示
    $('.flash_message').fadeIn("slow", function () {
        $(this).delay(3000).fadeOut("slow");
    });




});
