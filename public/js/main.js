
 $(document).ready(function() {
    // slider js
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true
    });
    $('.play').on('click', function() {
      owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
      owl.trigger('stop.owl.autoplay')
    });



        //   side bar show js
     $("#sidebar_show").on('click',function(){
         $(".sidebar").toggle();
      })

    // cart show js
    $("#cart_show").click(function(){
      $(".cartDown").toggle();
    });

 //subcategory mouse over show
 $(".cat_icon").hover(function(){
  $(".sub-cat-menu").show();
});

$(".sub-cat-menu").on("mouseleave",function(){
  $(".sub-cat-menu").hide();
});


});

