(function( $ ) {
	'use strict';

	$(function() {
		
		$('#upload_image').click(open_custom_media_window);

		function open_custom_media_window() {
			if (this.window === undefined) {
				this.window = wp.media({
					title: 'Insert Image',
					library: {type: 'image'},
					multiple: false,
					button: {text: 'Insert Image'}
				});

				var self = this;
				this.window.on('select', function() {
					var response = self.window.state().get('selection').first().toJSON();

					$('.wp_attachment_id').val(response.url);
					$('.image').attr('src', response.url);
                                        $('.image').show();
					
				});
			}
			
			//dd(response);
			this.window.open();
			return false;
		}
	});
	$(function() {
		
		$('#upload_image_2').click(open_custom_media_window);

		function open_custom_media_window() {
			if (this.window === undefined) {
				this.window = wp.media({
					title: 'Insert Image',
					library: {type: 'image'},
					multiple: false,
					button: {text: 'Insert Image'}
				});

				var self = this;
				this.window.on('select', function() {
					var response = self.window.state().get('selection').first().toJSON();

					$('.wp_attachment_id_2').val(response.url);
					$('.image_2').attr('src', response.url);
                                        $('.image_2').show();
					
				});
			}
			
			
			this.window.open();
			return false;
		}
	});
	var number = 244.222;
	console.log(number.toLocaleString('us-US', { style: 'currency', currency: 'USD' }));
	
})( jQuery );

