require('./bootstrap');

$(function () {
    require('./cart');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var slideWrapper = $(".main-slider"), iframes = slideWrapper.find('.embed-player'), lazyImages = slideWrapper.find('.slide-image'), lazyCounter = 0;

    // POST commands to YouTube or Vimeo API
    function postMessageToPlayer(player, command) {
        if (player == null || command == null) return;
        player.contentWindow.postMessage(JSON.stringify(command), "*");
    }

    // When the slide is changing
    function playPauseVideo(slick, control) {
        var currentSlide, slideType, startTime, player, video;

        currentSlide = slick.find(".slick-current");
        slideType = currentSlide.attr("class").split(" ")[1];
        player = currentSlide.find("iframe").get(0);
        startTime = currentSlide.data("video-start");

        if (slideType === "vimeo") {
            switch (control) {
                case "play":
                    if ((startTime != null && startTime > 0) && !currentSlide.hasClass('started')) {
                        currentSlide.addClass('started');
                        postMessageToPlayer(player, {
                            "method": "setCurrentTime",
                            "value": startTime
                        });
                    }
                    postMessageToPlayer(player, {
                        "method": "play",
                        "value": 1
                    });
                break;
                case "pause":
                    postMessageToPlayer(player, {
                        "method": "pause",
                        "value": 1
                    });
                break;
            }
        } else if (slideType === "youtube") {
            switch (control) {
                case "play":
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "mute"
                    });
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "playVideo"
                    });
                break;
                case "pause":
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "pauseVideo"
                    });
                break;
            }
        } else if (slideType === "video") {
            video = currentSlide.children("video").get(0);
            if (video != null) {
                if (control === "play") {
                    video.play();
                } else {
                    video.pause();
                }
            }
        }
    }

    // Resize player
    function resizePlayer(iframes, ratio) {
        if (!iframes[0]) return;
        var win = $(".main-slider"),
            width = win.width(),
            playerWidth,
            height = win.height(),
            playerHeight,
            ratio = ratio || 16 / 9;

        iframes.each(function () {
            var current = $(this);
            if (width / ratio < height) {
                playerWidth = Math.ceil(height * ratio);
                current.width(playerWidth).height(height).css({
                    left: (width - playerWidth) / 2,
                    top: 0
                });
            } else {
                playerHeight = Math.ceil(width / ratio);
                current.width(width).height(playerHeight).css({
                    left: 0,
                    top: (height - playerHeight) / 2
                });
            }
        });
    }

    // DOM Ready
    $(function () {
        // Initialize
        slideWrapper.on("init", function (slick) {
            slick = $(slick.currentTarget);
            setTimeout(function () {
                playPauseVideo(slick, "play");
            }, 1000);
            resizePlayer(iframes, 16 / 9);
        });
        slideWrapper.on("beforeChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "pause");
        });
        slideWrapper.on("afterChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "play");
        });
        slideWrapper.on("lazyLoaded", function (event, slick, image, imageSource) {
            lazyCounter++;
            if (lazyCounter === lazyImages.length) {
            lazyImages.addClass('show');
            // slideWrapper.slick("slickPlay");
            }
        });

        //start the slider
        slideWrapper.slick({
            fade: true,
            autoplaySpeed: 4000,
            autoplay: true,
            lazyLoad: "progressive",
            speed: 1000,
            arrows: false,
            dots: true,
            cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
        });
    });

    // Resize event
    $(window).on("resize.slickVideoPlayer", function () {
      resizePlayer(iframes, 16 / 9);
    });

    // Positive message timeout
    setTimeout(function() {
        $('.message.positive').animate({
            height: 'toggle',
            opacity: 'toggle'
        }, 500);
    }, 5000);

    // Accordion

    $('.toggle .toggle-title').not('.active').click(function () {
        if (!$(this).closest('.toggle').hasClass('active')) {
            $('.toggle.active').removeClass('active').find('.toggle-inner').slideUp(200);
            $(this).closest('.toggle').toggleClass('active').find('.toggle-inner').slideToggle(200);
        }
    })

    // Default Slick Slider
    $('.default-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 4000
    });

    // Convert .svg image to SVG format (add class="svg")
    $('img.svg').each(function() {
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }

            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);
        }, 'xml');
    });

    $('select.selectize').each(function () {
        var delimiter = ',';
        var persist = false;
        var openOnFocus = true;
        var sortField = 'value';

        if ($(this).hasClass('sort-index')) {
            sortField = [{
                field: 'index',
                direction: 'desc'
            }, {
                field: '$score'
            }];
        };

        $(this).selectize({
            delimiter: delimiter,
            persist: persist,
            sortField: sortField,
            openOnFocus: openOnFocus
        });
    });
});

function thisURL(params) {
    var url,
        thisURL = document.location.pathname;

    if (params === 1) {
        // option = 1 = full page name with all parameters eg: products.php?id_product=1
        thisURLwithParam = thisURL.substring(0, (thisURL.indexOf('#') == -1) ? thisURL.length : thisURL.indexOf('#'));
        thisURLwithParam = thisURLwithParam.substring(0, getPosition(thisURL, '/', 2));
        url = thisURLwithParam;
    } else {
        // option = null = just the page name (eg: products.php)
        thisURL = thisURL.substring(0, (thisURL.indexOf('#') == -1) ? thisURL.length : thisURL.indexOf('#'));
        thisURL = thisURL.substring(0, (thisURL.indexOf('?') == -1) ? thisURL.length : thisURL.indexOf('?'));
        thisURL = thisURL.substring(0, getPosition(thisURL, '/', 2));
        url = thisURL;
    }

    if (url == '/') {
        url = '/home';
    }

    return url;
}

function thisSubURL(params) {
    var url,
        thisSubURL = document.location.pathname;

    if (params === 1) {
        // option = 1 = full page name with all parameters eg: products.php?id_product=1
        thisURLwithParam = thisSubURL.substring(0, (thisSubURL.indexOf('#') == -1) ? thisSubURL.length : thisSubURL.indexOf('#'));
        thisURLwithParam = thisURLwithParam.substring(0, getPosition(thisSubURL, '/', 3));
        url = thisURLwithParam;
    } else {
        // option = null = just the page name (eg: products.php)
        thisSubURL = thisSubURL.substring(0, (thisSubURL.indexOf('#') == -1) ? thisSubURL.length : thisSubURL.indexOf('#'));
        thisSubURL = thisSubURL.substring(0, (thisSubURL.indexOf('?') == -1) ? thisSubURL.length : thisSubURL.indexOf('?'));
        thisSubURL = thisSubURL.substring(0, getPosition(thisSubURL, '/', 3));
        url = thisSubURL;
    }

    if (url == '/') {
        url = '/home';
    }

    return url;
}

function getPosition(string, subString, index) {
   return string.split(subString, index).join(subString).length;
}

	$('select.selectize').each(function () {
		var create = false;
		var delimiter = ',';
		var persist = false;
		var openOnFocus = true;
		var sortField = 'value';

		// TODO Change parameters to data-attributes
		if ($(this).hasClass('create')) {
			create = true;
		}

		if ($(this).hasClass('sort-index')) {
			sortField = [{
				field: 'index',
				direction: 'desc'
			}, {
				field: '$score'
			}];
		};

		if (create) {
			openOnFocus = false;
			var createUrl = $(this).data('create-url');
			create = function (input) {
				$.ajax({
					'type': 'post',
					'url': createUrl,
					'async': false,
					'data': {
						text: input,
					}
				}).done(function (response) {
					console.log(response);

					if (response.status === 201) {
						console.log(response);
						id = response.id;
					} else {
						console.log('ajaxerror', response);
					}
				}).fail(function (response) {
					console.log('ajaxerror', response);
				}).always(function (response) {
					console.log('ajaxalways', response);
				});
				return {
					value: id,
					text: input
				};
			}
		}

		$(this).selectize({
			delimiter: delimiter,
			persist: persist,
			create: create,
			sortField: sortField,
			openOnFocus: openOnFocus
		});
	});

