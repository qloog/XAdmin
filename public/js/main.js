jQuery(function ($) {

    'use strict';

    // ----------------------------------------------
    // Table index
    // ----------------------------------------------

    /*-----------------------------------------------
    # Dropdown Menu Animation 
	# Slider 
	# Navigation fixed 
	# Search
	# Portfolio Filter
	# Chart init
	# Parallax
	# smoothScroll
	# Pretty Photo
    # Google Map Customization
    -------------------------------------------------*/

    // ----------------------------------------------
    // # Preset Color
    // ----------------------------------------------

     (function() {

		var presets = $('.style-chooser ul li');

		$('.style-chooser .toggler').on('click', function(event){
			event.preventDefault();
			$(this).closest('.style-chooser').toggleClass('opened');
		});

		$('.style-chooser ul li a').on('click', function(event){
			event.preventDefault();
			presets.removeClass('active');
			$(this).parent().addClass('active');
			$('#css-preset').removeAttr('href').attr('href', 'css/presets/preset' + $(this).parent().data('preset') + '.css');
		})

    }());
	
	
	// ----------------------------------------------
    // # Dropdown Menu Animation 
    // ----------------------------------------------
	
	(function () {
		$('.dropdown').on('show.bs.dropdown', function(e){
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
		});

		$('.dropdown').on('hide.bs.dropdown', function(e){
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
		});

	}());

    // ----------------------------------------------
    // # Slider 
    // ----------------------------------------------
    
	(function () {

		var time = 7; // time in seconds

	 	var $progressBar,
	      $bar, 
	      $elem, 
	      isPause, 
	      tick,
	      percentTime;
	 
	    //Init the carousel
	    $("#main-slider").find('.owl-carousel').owlCarousel({
	      slideSpeed : 500,
	      paginationSpeed : 500,
	      singleItem : true,
	      navigation : true,
			navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
			],
	      afterInit : progressBar,
	      afterMove : moved,
	      startDragging : pauseOnDragging,
	      //autoHeight : true,
	      transitionStyle : "fadeUp"
	    });
	 
	    //Init progressBar where elem is $("#owl-demo")
	    function progressBar(elem){
	      $elem = elem;
	      //build progress bar elements
	      buildProgressBar();
	      //start counting
	      start();
	    }
	 
	    //create div#progressBar and div#bar then append to $(".owl-carousel")
	    function buildProgressBar(){
	      $progressBar = $("<div>",{
	        id:"progressBar"
	      });
	      $bar = $("<div>",{
	        id:"bar"
	      });
	      $progressBar.append($bar).appendTo($elem);
	    }
	 
	    function start() {
	      //reset timer
	      percentTime = 0;
	      isPause = false;
	      //run interval every 0.01 second
	      tick = setInterval(interval, 10);
	    };
	 
	    function interval() {
	      if(isPause === false){
	        percentTime += 1 / time;
	        $bar.css({
	           width: percentTime+"%"
	         });
	        //if percentTime is equal or greater than 100
	        if(percentTime >= 100){
	          //slide to next item 
	          $elem.trigger('owl.next')
	        }
	      }
	    }
	 
	    //pause while dragging 
	    function pauseOnDragging(){
	      isPause = true;
	    }
	 
	    //moved callback
	    function moved(){
	      //clear interval
	      clearTimeout(tick);
	      //start again
	      start();
	    }

	}());
	
	// ----------------------------------------------
    // # Navigation fixed  
    // ----------------------------------------------	
	
	(function () {
		$(window).on('scroll', function(){
			if( $(window).scrollTop()>65 ){
				$('#onepage #navigation .main-nav').addClass('navbar-fixed-top');
			} else {
				$('#onepage #navigation .main-nav').removeClass('navbar-fixed-top');
			};
		});
	}());
	
		
	
	// ----------------------------------------------
    // # Search
    // ----------------------------------------------

    (function () {

        $('.fa-search').on('click', function() {
            $('.search').fadeIn(500, function() {
              $(this).toggleClass('search-toggle');
            });     
        });

        $('.search-close').on('click', function() {
            $('.search').fadeOut(500, function() {
                $(this).removeClass('search-toggle');
            }); 
        });

    }());

    // ----------------------------------------------
    // # Portfolio Filter
    // ----------------------------------------------
    
	(function () {
		
      var $portfolio_selectors = $('.project-filter >ul>li>a');
		var $portfolio = $('.all-project');
		$portfolio.isotope({
			itemSelector : '.filterable-product',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});

    }());
	


    // ----------------------------------------------
    // # Chart init
    // ----------------------------------------------

   
	(function () {
	
	    $('.skill-circle').easyPieChart( {
			barColor: '#c1c1c1',
			trackColor: '#ffffff',
			rotate: '0',
			lineCap: 'butt',
			scaleLength: '0',
			lineWidth: 10,
			size: 110
		});
	
	}());

       

    // ----------------------------------------------
    // # Parallax Scrolling
    // ----------------------------------------------
    
    (function () {

        function parallaxInit() {       
            $("#parallax-one").parallax("50%", 0.3);
            $("#parallax-two").parallax("50%", 0.3);
        }   
        parallaxInit();

    }());    

    // ----------------------------------------------
    // # smoothScroll
    // ----------------------------------------------

    (function () {

        smoothScroll.init();

    }());


    // ----------------------------------------------
    // # Pretty Photo
    // ----------------------------------------------

    (function () {

        $("a[data-gallery^='prettyPhoto']").prettyPhoto({
        	social_tools: false
        });

    }());
	
    // ----------------------------------------------
    // # Google Map Customization
    // ----------------------------------------------


    (function(){

        //var map;
        //
        //map = new GMaps({
        //    el: '#gmap',
        //    lat: 43.04446,
        //    lng: -76.130791,
        //    scrollwheel:false,
        //    zoom: 14,
        //    zoomControl : true,
        //    panControl : false,
        //    streetViewControl : false,
        //    mapTypeControl: false,
        //    overviewMapControl: false,
        //    clickable: false
        //});
        //
        //var image = '';
        //map.addMarker({
        //    lat: 43.04446,
        //    lng: -76.130791,
        //    icon: image,
        //    animation: google.maps.Animation.DROP,
        //    verticalAlign: 'bottom',
        //    horizontalAlign: 'center',
        //    backgroundColor: '#d3cfcf',
        //     infoWindow: {
        //        content: '<div class="map-info"><address>ThemeRegion<br />234 West 25th Street <br />New York</address></div>',
        //        borderColor: 'red',
        //    }
        //});
          
        var styles = [ 

            {
              "featureType": "road",
              "stylers": [
                { "color": "#c1c1c1" }
              ]
              },{
              "featureType": "landscape",
              "stylers": [
                { "color": "#e3e3e3" }
              ]
              },{
              "elementType": "labels.text.fill",
              "stylers": [
                { "color": "#808080" }
              ]
              },{
              "featureType": "poi",
              "stylers": [
                { "color": "#ffffff" }
              ]
              },{
              "elementType": "labels.text",
              "stylers": [
                { "saturation": 1 },
                { "weight": 0.1 },
                { "color": "#7f8080" }
              ]
            }
      
        ];

    //map.addStyle({
    //        styledMapName:"Styled Map",
    //        styles: styles,
    //        mapTypeId: "map_style"
    //    });
    //
    //    map.setStyle("map_style");
    }());

    

}); // script end