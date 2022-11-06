require('./bootstrap');

$(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// Colour Picker
	$('.colourpicker').spectrum({
		preferredFormat: "rgb",
		showAlpha: true,
		showInput: true
	});

	// Froala Implementation
	initializeFroalaEditor();

	// Selectize Implementation
	initializeSelectize();

	// Flatpicker Implementation
	initializeFlatPickr();

	// Message timeout
	setTimeout(function () {
		$('.message').animate({
			height: 'toggle',
			opacity: 'toggle'
		}, 500);
	}, 3000);

	// Accordion

	if ($('.accordion dt').hasClass('active')) {
		$('.accordion dt.active').next('dd').show();
	}
	$(document).on('click', '.accordion dt', function () {
		if ($(this).hasClass('active')) {
			$(this).removeClass("active").next('dd').slideUp(200);
		} else {
			$(this).addClass("active").next('dd').slideDown(200);
		}
	});

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
	$('img.svg').each(function () {
		var $img = $(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		$.get(imgURL, function (data) {
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
});

$('.modal').each(function (e, elem) {
	if ($(elem).hasClass('errors')) {
		$('body').addClass('overlayed');
		$('#overlay').show();
		$(elem).show();
	}
});

$(document).on('click', '.create-record', function (e) {
	var target = $(this).data('target');
	$('body').addClass('overlayed');
	$('#overlay').fadeIn(function () {
		$('#' + target).fadeIn('fast');
	})
});

$(document).on('click', 'a[role=cancel-create-record]', function (e) {
	let target = $(this).closest(".modal")[0].id
	$('#' + target).fadeOut('fast', function () {
		$('#' + target)[0].reset();
		$('#overlay').fadeOut('fast');
		$('body').removeClass('overlayed');
	});
});

// Submit form data via AJAX, populate template and append to screen on success
$(document).on('submit', 'form.ajax', function (e) {
	e.preventDefault();
	var url = $(this).attr('action');
  let form = $(this);
	var context = $(this).data('context');
	var data = {};
	$(this).serializeArray().map(function (x) {
		data[x.name] = x.value;
	});
	$.ajax({
		'type': 'post',
		'url': url,
		'data': data
	}).done(function (response) {
		$('a[role=cancel-create-record]').trigger('click');
		if (response.status === 201) {
			console.log(response);

			$('#' + context).append(response.view);
      setTimeout(function() {
        window.scrollTo({ top: document.body.scrollHeight - 100, behavior: 'smooth' })
      }, 200);

			initializeFroalaEditor();
			initializeSelectize();

      $(".field-error").remove();
		} else {
			console.error(response.status, response);
		}
	}).fail(function (response) {
		console.error(response);
    if (response.responseJSON.error !== undefined)
    {
      response.responseJSON.error.forEach((item, index) => {
        form.find("[type=submit]").before("<span class='field-error'>" + item + "</span>");
      })
    }
	});
});

function columnClass(i) {
	return i > 1 ? ('w-1/' + i) : 'w-full';
}

$(".delete-confirm").on("click", function (e) {
	e.preventDefault();

	var result = confirm("Are you sure you want to delete this?");
	if (result)
		window.location.href = $(this).attr("href");
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

window.initializeFroalaEditor = function () {
	$('.froala_editor.lite').froalaEditor({
		// TODO Move key to .env
		key: process.env.MIX_FROALA_EDITOR,
		height: 200,

		// disable quick insert
		quickInsertTags: [],

		// toolbar buttons
		toolbarButtons: [
			'fullscreen',
			'bold', 'italic', 'underline', 'strikeThrough', '|',
			'paragraphFormat', 'fontSize', 'color', '|',
			'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-',
			'insertLink', 'embedly', 'insertTable', '|',
			'insertHR', 'selectAll', 'clearFormatting', '|',
			'spellChecker', 'help', 'html', '|',
			'undo', 'redo'
		],
	});

	$('.froala_editor').froalaEditor({
		// TODO Move key to .env
		key: process.env.MIX_FROALA_EDITOR,
		height: 500,

		// disable quick insert
		quickInsertTags: [],

		// toolbar buttons
		toolbarButtons: [
			'fullscreen',
			'bold', 'italic', 'underline', 'strikeThrough', '|',
			'paragraphFormat', 'fontSize', 'color', '|',
			'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-',
			'insertLink', 'insertFile', 'insertImage', 'insertVideo', 'embedly', 'insertTable', '|',
			'insertHR', 'selectAll', 'clearFormatting', '|',
			'spellChecker', 'help', 'html', '|',
			'undo', 'redo'
		],

		// Upload file
		fileUploadParam: 'file',
		fileUploadURL: '/admin/media',
		fileUploadMethod: 'POST',
		fileMaxSize: 20 * 1024 * 1024,
		fileAllowedTypes: ['*'],

		// Upload image
		imageUploadParam: 'file',
		imageUploadURL: '/admin/media',
		imageUploadMethod: 'POST',
		imageMaxSize: 5 * 1024 * 1024,
		imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml'],

		// Upload video
		videoUploadParam: 'file',
		videoUploadURL: '/admin/media',
		videoUploadMethod: 'POST',
		videoMaxSize: 50 * 1024 * 1024,
		videoAllowedTypes: ['avi', 'mov', 'mp4', 'm4v', 'mpeg', 'mpg', 'wmv', 'ogv'],
	}).on('froalaEditor.file.error', function (e, editor, error, response) {
		console.log(error);
	}).on('froalaEditor.image.error', function (e, editor, error, response) {
		console.log(error);
	}).on('froalaEditor.video.error', function (e, editor, error, response) {
		console.log(error);
	});
}

window.initializeSelectize = function () {
	$('select.selectize').each(function () {
		var create = false;
		var createFilter = null;
		var delimiter = ',';
		var persist = false;
		var openOnFocus = true;
		var sortField = 'value';
		var maxOptions = null;

		if ($(this).data("max-options") !== undefined) {
			maxOptions = $(this).data("max-options");
		}

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
		if ($(this).hasClass('tag')) {
			openOnFocus = false;
			var modelid = $(this).data('model-id');
			create = function (input) {
				var url = 'tag/create';
				var slug = input.toLowerCase().replace(/ /g, '-').replace(/[-]+/g, '-').replace(/[^\w-]+/g, '');
				$.ajax({
					'type': 'get',
					'url': url,
					'async': false,
					'data': {
						name: input,
						slug: slug,
						modelid: modelid,
					}
				}).done(function (response) {
					id = response.id;
					if (response.status === 200) {
						console.log(response);
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

		if ($(this).hasClass('search')) {
			openOnFocus = false;
			maxOptions = 5;
		}

		$(this).selectize({
			delimiter: delimiter,
			persist: persist,
			create: create,
			sortField: sortField,
			openOnFocus: openOnFocus,
			maxOptions: maxOptions,
			createFilter: createFilter
		});
	});
};

window.initializeFlatPickr = function () {
	// https://github.com/flatpickr/flatpickr
	$('input.flatpickr').each(function () {

		// TODO Add parameters via data-attributes
		var mode = $(this).data('mode') || 'single';
		var enableTime = $(this).data('enable-time') || false;
		var noCalendar = $(this).data('no-calendar') || false;
		var dateFormat = $(this).data('date-format') || (enableTime ? 'Y-m-d H:i:S' : 'Y-m-d');
		var altInput = $(this).data('alt-input') || true;
		var altFormat = $(this).data('alt-format') || (enableTime ? 'l F J, Y - h:i K' : 'l F J, Y');
		var monthSelectorType = $(this).data('month-selector-type') || 'static';
		var yearSelectorType = $(this).data('year-selector-type') || 'static';
		var minDate = $(this).data('min-date') || null;
		var maxDate = $(this).data('max-date') || null;

		flatpickr($(this)[0], {
			mode: mode,
			monthSelectorType: monthSelectorType,
			yearSelectorType: yearSelectorType,
			enableTime: enableTime,
			noCalendar: noCalendar,
			dateFormat: dateFormat,
			altInput: altInput,
			altFormat: altFormat,
			minDate: minDate,
			maxDate: maxDate
		})
	});
};
