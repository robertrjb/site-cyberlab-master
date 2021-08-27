// BANNER SLICK
$('.banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    autoplaySpeed: 3000,
 });

// BOTAO SCROLL
$('nav dt a').click(function(e){
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;
    $('html, body').animate({
        scrollTop: targetOffset - 30
    }, 800);
});

// BOTAO SCROLL FOOTER
$('.menufooter dt a').click(function(e){
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;
    $('html, body').animate({
        scrollTop: targetOffset - 30
    }, 800);
});

// BOTAO DE VOLTAR AO TOPO
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
            $('a[href="#top"]').fadeIn();
        } else {
            $('a[href="#top"]').fadeOut();
        }
    });

    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});