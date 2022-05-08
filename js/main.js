var sliderLength = $(".home-slider").length;
// var sliderCounter = 1;

$(document).ready(function () {
  //Display first slider
  $(".home-slider:first-child").fadeIn(2000);
  $(".home-slider-button:first-child").addClass("slider-button-active");
  $(".home-slider-controller").fadeIn(2000);

  //Form validation
  $("#contactForm").validate({
    rules: {
      name: { required: true },
      surname: { required: true },
      email: { required: true, email: true },
      organisation: { required: true },
      reason: { required: true },
    },
  });

  //Auto slide
  // setInterval(function () {
  //   sliderCounter += 1;

  //   if (sliderCounter > sliderLength) {
  //     sliderCounter = 1;
  //   }

  //   $("#home-slider-" + sliderCounter).trigger("click");
  // }, 10000);
});

//Create Slider Radios
for ($i = 1; $i < sliderLength + 1; $i++) {
  $(".home-slider-controller").append(
    '<span class="home-slider-button" id = home-slider-' + $i + "></span>"
  );
}

//Giving slider unique classes
$(".home-slider").each(function (i, obj) {
  $(this).addClass("home-slider-" + (i + 1));
});

//Slider functionality
$(".home-slider-button").click(function () {
  $(".home-slider-button").removeClass("slider-button-active");
  $(this).addClass("slider-button-active");

  $(".home-slider-controller").hide();
  $(".home-slider-controller").fadeIn(2000);
  $(".home-slider").fadeOut(500);
  $("." + $(this).attr("id")).fadeIn(2000);
});

//Menu functionality
$(".nav-item").click(function () {
  $(".nav-item").removeClass("active");
  $(this).addClass("active");
});

$(window).scroll(function (event) {
  var scroll = $(window).scrollTop();

  if (scroll >= 100) {
    $(".navbar-expand-lg").addClass("stickyMenu");
  } else {
    $(".navbar-expand-lg").removeClass("stickyMenu");
  }
});

$(".increaseItem").click(function () {
  var formName = $(this).attr("id").replace("-increase", "");

  if ($("#" + formName + "-input").val() == "") {
    var formValue = 0;
  } else {
    var formValue = parseInt($("#" + formName + "-input").val());
  }

  formValue += 1;
  $("#" + formName + "-input").val(formValue);
});

$(".decreaseItem").click(function () {
  var formName = $(this).attr("id").replace("-decrease", "");

  if (
    $("#" + formName + "-input").val() == "" ||
    $("#" + formName + "-input").val() <= 0
  ) {
    var formValue = 0;
  } else {
    var formValue = parseInt($("#" + formName + "-input").val());
    formValue -= 1;
  }

  $("#" + formName + "-input").val(formValue);
});
