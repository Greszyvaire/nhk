/*
 * panorama360 - jQuery plugin made by Liviu Holhos
 * Copyright (c) 2012 Liviu Holhos (http://liviuholhos.com/)
 */
(function($) {
	$.fn.panorama360 = function(options) {
		return this.each(function() {
			var settings = {
				start_position: 0, // initial start position for the view
				image_width: 0,
				image_height: 0,
				mouse_wheel_multiplier: 10,
				bind_resize: true, // determine if window resize affects panorama viewport
				is360: true, // glue left and right and make it scrollable
				sliding_controls: true, // determine if UI controls for sliding are created
				sliding_direction: 0, // determines the automatic sliding direction: 0 - no automatic slide effect, 1 - right side effect, -1 - left side effect
				sliding_interval: 20, // determines the interval in miliseconds of the sliding timer
				use_preloader: true // show a preloader for the panorama image while it loads
			};
			if (options) $.extend(settings, options);
			var viewport = $(this);
			var panoramaContainer = viewport.children('.panorama-container');
			var viewportImage = panoramaContainer.children('img:first-child');
			if (settings.use_preloader) {
				viewport.css('display','none');
				var preloader = viewport.parent().find('.preloader');
				if (preloader.length == 0) {
					preloader = $('<div class="preloader"></div>').insertAfter(viewport);
				}
				$("img").one('load', function() {
					viewport.fadeIn(200);
					preloader.hide();
				}).each(function() {
					if(this.complete || this.readyState === 4 ) $(this).load();
				});
			}
			if (settings.image_width <= 0 && settings.image_height <= 0) {
				settings.image_width = parseInt(viewportImage.data("width"));
				settings.image_height = parseInt(viewportImage.data("height"));
				if (!(settings.image_width) || !(settings.image_height)) return;
			}
			var image_ratio = settings.image_height / settings.image_width;
			var elem_height = parseInt(viewport.height());
			var elem_width = parseInt(elem_height / image_ratio);
			var image_map = viewportImage.attr('usemap');
			var image_areas;
			var isDragged = false;
			var mouseXprev = 0;
			var scrollDelta = 0;
			var resize_binded = false;
			if (settings.is360) viewportImage.removeAttr("usemap").css("left", 0).clone().css("left", elem_width + "px").insertAfter(viewportImage);
			panoramaContainer.css({
				'margin-left': '-' + settings.start_position + 'px',
				'width': (elem_width * 2) + 'px',
				'height': (elem_height) + 'px'
			});
			setInterval(function() {
				if (isDragged) return false;
				if (scrollDelta < -2 || 2 < scrollDelta) scrollDelta *= 0.98;
				else if (settings.sliding_direction) scrollDelta = -settings.sliding_direction * 2;
				else scrollDelta = 0;
				if (scrollDelta) scrollView(panoramaContainer, elem_width, scrollDelta, settings);
			}, settings.sliding_interval);
			viewport.unbind('mousedown mouseup mousemove mouseout mousewheel contextmenu touchmove touchend');
			viewport.mousedown(function(e) {
				if (isDragged) return false;
				$(this).addClass("grab");
				isDragged = true;
				mouseXprev = e.clientX;
				scrollOffset = 0;
				return false;
			}).mouseup(function() {
				$(this).removeClass("grab");
				isDragged = false;
				if (settings.sliding_direction) settings.sliding_direction = scrollDelta > 0 ? -1 : 1;
				scrollDelta = scrollDelta * 0.45;
				return false;
			}).mousemove(function(e) {
				if (!isDragged) return false;
				scrollDelta = parseInt((e.clientX - mouseXprev));
				mouseXprev = e.clientX;
				scrollView(panoramaContainer, elem_width, scrollDelta, settings);
				return false;
			}).mouseout(function(e) {
				isDragged = false;
			}).bind("mousewheel", function(e, distance) {
				var delta = Math.ceil(Math.sqrt(Math.abs(distance)));
				if (settings.sliding_direction != 0) {
					settings.sliding_direction = distance < 0 ? 1 : -1;
				}
				delta = distance < 0 ? -delta : delta;
				scrollDelta = scrollDelta + delta * 5;
				scrollView(panoramaContainer, elem_width, delta * settings.mouse_wheel_multiplier, settings);
				return false;
			}).bind('contextmenu', stopEvent).bind('touchstart', function(e) {
				if (isDragged) return false;
				isDragged = true;
				mouseXprev = e.originalEvent.touches[0].pageX;
				scrollOffset = 0;
			}).bind('touchmove', function(e) {
				e.preventDefault();
				if (!isDragged) return false;
				var touch_x = e.originalEvent.touches[0].pageX;
				scrollDelta = parseInt((touch_x - mouseXprev));
				mouseXprev = touch_x;
				scrollView(panoramaContainer, elem_width, scrollDelta, settings);
			}).bind('touchend', function(e) {
				isDragged = false;
				if (settings.sliding_direction) settings.sliding_direction = scrollDelta > 0 ? -1 : 1;
				scrollDelta = scrollDelta * 0.45;
			});
			if (image_map) {
				new_area = $("a").addClass("area");
				$('map[name=' + image_map + ']',panoramaContainer).children('area').each(function() {
					switch ($(this).attr("shape").toLowerCase()) {
						case 'rect':
							var area_coord = $(this).attr("coords").split(",");
							var new_area = $(document.createElement('a')).addClass("area").attr("href", $(this).attr("href")).attr("title", $(this).attr("alt"));
							new_area.addClass($(this).attr("class"));
							panoramaContainer.append(new_area.data("stitch", 1).data("coords", area_coord));
							panoramaContainer.append(new_area.clone().data("stitch", 2).data("coords", area_coord));
							break;
					}
				});
				$('map[name=' + image_map + ']',panoramaContainer).remove();
				image_areas = panoramaContainer.children(".area");
				image_areas.mouseup(stopEvent).mousemove(stopEvent).mousedown(stopEvent);
				repositionHotspots(image_areas, settings.image_height, elem_height, elem_width);
			}
			if (settings.sliding_controls) {
				var controls = viewport.parent().find('.controls');
				if (controls.length == 0) {
					var controls = $('<div class="controls"></div>').insertAfter(viewport);
					$('<a class="prev"><span>&#9664;</span></a>').click(function(ev) {
						settings.sliding_direction = -1;
						ev.preventDefault();
					}).appendTo(controls);
					$('<a class="stop"><span>&#8718</span></a>').click(function(ev) {
						settings.sliding_direction = 0;
						ev.preventDefault();
					}).appendTo(controls);
					$('<a class="next"><span>&#9654;</span></a>').click(function(ev) {
						settings.sliding_direction = 1;
						ev.preventDefault();
					}).appendTo(controls);
				}
			}
			if (settings.bind_resize && !resize_binded) {
				resize_binded = true;
				$(window).resize(function() {
					$parent = viewport.parent();
					elem_height = parseInt($parent.height());
					elem_width = parseInt(elem_height / image_ratio);
					panoramaContainer.css({
						'width': (elem_width * 2) + 'px',
						'height': (elem_height) + 'px'
					});
					viewportImage.css("left", 0).next().css("left", elem_width + "px");
					if (image_map) repositionHotspots(image_areas, settings.image_height, elem_height, elem_width);
				});
			}

			if (settings.loaded && $.isFunction(loaded)) {
				settings.loaded();
			}

			if (settings.callback && $.isFunction(settings.callback)) {
				var img = 0;
				$('.panorama-container img').load(function(e) {
					img += 1;
					if (img == 2) settings.callback();
				});
			}
		});
		function stopEvent(e) {
			e.preventDefault();
			return false;
		}
		function scrollView(panoramaContainer, elem_width, delta, settings) {
			var newMarginLeft = parseInt(panoramaContainer.css('marginLeft')) + delta;
			if (settings.is360) {
				if (newMarginLeft > 0) newMarginLeft = -elem_width;
				if (newMarginLeft < -elem_width) newMarginLeft = 0;
			}
			else {
				var right = -(elem_width - panoramaContainer.parent().width());
				if (newMarginLeft > 0) {
					newMarginLeft = 0;
					if (settings.sliding_direction) settings.sliding_direction *= -1;
				}
				if (newMarginLeft < right) {
					newMarginLeft = right;
					if (settings.sliding_direction) settings.sliding_direction *= -1;
				}
			}
			panoramaContainer.css('marginLeft', newMarginLeft + 'px');
		}
		function repositionHotspots(areas, image_height, elem_height, elem_width) {
			var percent = elem_height / image_height;
			areas.each(function() {
				area_coord = $(this).data("coords");
				stitch = $(this).data("stitch");
				switch (stitch) {
					case 1:
						$(this).css({
							'left': (area_coord[0] * percent) + "px",
							'top': (area_coord[1] * percent) + "px",
							'width': ((area_coord[2] - area_coord[0]) * percent) + "px",
							'height': ((area_coord[3] - area_coord[1]) * percent) + "px"
						});
						break;
					case 2:
						$(this).css({
							'left': (elem_width + parseInt(area_coord[0]) * percent) + "px",
							'top': (area_coord[1] * percent) + "px",
							'width': ((area_coord[2] - area_coord[0]) * percent) + "px",
							'height': ((area_coord[3] - area_coord[1]) * percent) + "px"
						});
						break;
				}
			});
		}
	}
})(jQuery);