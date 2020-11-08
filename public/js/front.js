


    $(".sliderone").owlCarousel({
    nav: true,
    loop: true,
    items: 2,
    margin: 0,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        900:{
            items:2,
            nav:true
        }
        },
    navText: [
  '<i class="fas fa-chevron-circle-left"></i>',
  '<i class="fas fa-chevron-circle-right"></i>'
  ]
    });
$(".slidertwo").owlCarousel({
    nav: true,
    loop: true,
    items: 3,
    margin: 30,
    slideSpeed : 500,
    autoPlay: true,
    center: true,
    dots: true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        1100:{
            items:3,
            nav:true
        }
        },
    navText : ["",""],
    onInitialized : function(){
        var activeImg = $('.owl-carousel').find('.active').find('img');
        var comment = activeImg.attr('alt');
        var title = activeImg.attr('title');
        if(comment) $('.image-caption').html('<h4>'+title+'</h4>');
    }

    });    

    owl = $('.owl-carousel').owlCarousel();
    $(".prev").click(function () {
        owl.trigger('prev.owl.carousel');
    });
    $(".next").click(function () {
        owl.trigger('next.owl.carousel');
    });
    
    owl.on('translated.owl.carousel', function(event) {
        var activeImg = $(this).find('.active').find('img');
        var comment = activeImg.attr('alt');
            var title = activeImg.attr('title');
        if(comment) $('.image-caption').html('<h4>'+title+'</h4>');
        
    });

$.fn.followTo = function (pos) {
var $this = this,
    $window = $(window);

$window.scroll(function (e) {
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'fixed',
                top: '5vh',
                right: 2
                
            });
        } else {
            $this.css({
                position: 'absolute',
                top: '20vh',
                right: 2
            });
        }
    });
};

$('.float-block').followTo(140);

$(document).ready(function(){
 var c1 = new Rellax('.c1', {
  speed: 7
 });
 var c2 = new Rellax('.c2', {
  speed: 10
 });
 var c3 = new Rellax('.c3', {
  speed: 7
 });
 var c4 = new Rellax('.c4', {
  speed: 5
 });
});


Share = {
    me : function(el){
        Share.popup(el.href);
        return false;
    },

    popup: function(url) {
        window.open(url,'','toolbar=0,status=0,width=626,height=436');
    }
};

