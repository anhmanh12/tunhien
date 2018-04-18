// Slide
$('#ShowSlide').nivoSlider({
	controlNav: false,
	effect: 'random',
	prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
	nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
	directionNav: true,
	pauseTime: 30000
});

$(window).resize(function(){
	var heightWindow = $(window).height();
	var widthWindow = $(window).width();
	var sizeWindow = widthWindow / heightWindow;
	if(sizeWindow >= 1.6) $('#section07').addClass('farAbout');
	else $('#section07').removeClass('farAbout');
});

var heightWindow = $(window).height();
	var widthWindow = $(window).width();
	var sizeWindow = widthWindow / heightWindow;
	if(sizeWindow >= 1.6) $('#section07').addClass('farAbout');
	else $('#section07').removeClass('farAbout');


// Wow
new WOW().init();

// flip
$(".itemAbout").flip({
	trigger: 'hover'
});

//Counter Up Output capability
$('.counter').counterUp({
	delay: 100,
  time: 4000
});

//Fixtop menu and show back top
$(window).scroll(function(){
	if ($(window).scrollTop() > 10){
	    $('.navbar').addClass('fixed-top animated bounceInDown');
			$('#Top').addClass('d-block animated slideInRight');
	}else{
	    $('.navbar').removeClass('fixed-top animated bounceInDown');
			$('#Top').removeClass('d-block animated slideInRight');
	}
});

$("#Top img").click(function () {
	$('body,html').animate({
		scrollTop: 0
	}, 1000)
})

// Map
var map;
function initMap() {
  // Styles a map in night mode.

	var valLat = 12.267289;
	var ValLng = 109.146878;

  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: valLat, lng: ValLng},
    zoom: 16,
    styles: [
		  {
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#f5f5f5"
		      }
		    ]
		  },
		  {
		    "elementType": "labels.icon",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#616161"
		      }
		    ]
		  },
		  {
		    "elementType": "labels.text.stroke",
		    "stylers": [
		      {
		        "color": "#f5f5f5"
		      }
		    ]
		  },
		  {
		    "featureType": "administrative.land_parcel",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#bdbdbd"
		      }
		    ]
		  },
		  {
		    "featureType": "poi",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#eeeeee"
		      }
		    ]
		  },
		  {
		    "featureType": "poi",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#757575"
		      }
		    ]
		  },
		  {
		    "featureType": "poi.park",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#e5e5e5"
		      }
		    ]
		  },
		  {
		    "featureType": "poi.park",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#9e9e9e"
		      }
		    ]
		  },
		  {
		    "featureType": "road",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#ffffff"
		      }
		    ]
		  },
		  {
		    "featureType": "road.arterial",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#757575"
		      }
		    ]
		  },
		  {
		    "featureType": "road.highway",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#dadada"
		      }
		    ]
		  },
		  {
		    "featureType": "road.highway",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#616161"
		      }
		    ]
		  },
		  {
		    "featureType": "road.local",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#9e9e9e"
		      }
		    ]
		  },
		  {
		    "featureType": "transit.line",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#e5e5e5"
		      }
		    ]
		  },
		  {
		    "featureType": "transit.station",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#eeeeee"
		      }
		    ]
		  },
		  {
		    "featureType": "water",
		    "elementType": "geometry",
		    "stylers": [
		      {
		        "color": "#c9c9c9"
		      }
		    ]
		  },
		  {
		    "featureType": "water",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      {
		        "color": "#9e9e9e"
		      }
		    ]
		  }
		]
  });

	var image = 'http://ld-wp.template-help.com/wordpress_prod-12407/wp-content/uploads/2017/10/car-repair-marker.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: valLat, lng: ValLng},
    map: map,
    icon: image
  });
}

//Slide logo
$('#Product .row').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: true,
	prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
	nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
	cssEase: 'linear',
	slidesToShow: 3,
  	slidesToScroll: 1,
  	responsive: [
    {
      breakpoint: 875,
			autoplay: true,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 660,
			autoplay: true,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});

//Slide logo
$('#LogoSlide #ShowSlide').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: true,
	cssEase: 'linear',
	slidesToShow: 3,
  	slidesToScroll: 1,
  	responsive: [
    {
      breakpoint: 875,
			autoplay: true,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 660,
			autoplay: true,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});

// Rang buoc form lien lac
$('#frmContact').submit(function(){
	var inputName = frm.inputName.value.trim();
	var inputEmail = frm.inputEmail.value.trim();
	var inputPhone = frm.inputPhone.value.trim();
	var inputContent = frm.inputContent.value.trim();

	if(inputName == '' || inputEmail == '' || inputPhone == '' || inputContent == ''){
		alert('Bạn phải nhập đầy đủ nội dung');
		return false;
	}else return true;
});