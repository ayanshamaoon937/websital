$(function() {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.ajax-response');

	// Submit button
	var submitBtn = $('#contact-form .tp-contact-form-btn button');

	// Toast
	var toastEl = $('#contact-toast');

	// Custom select behavior for Service field
	(function initCustomSelect(){
		var selectWrap = $('#service-select');
		if (!selectWrap.length) return;
		var triggerEl = selectWrap.find('.cs-trigger');
		var listEl = selectWrap.find('.cs-list');
		var hiddenEl = selectWrap.find('input[type="hidden"][name="service"]');

		triggerEl.on('click', function(){
			selectWrap.toggleClass('open');
		});

		listEl.on('click', '.cs-option', function(){
			var value = $(this).data('value') || '';
			hiddenEl.val(value);
			triggerEl.text(value || (triggerEl.data('placeholder') || 'Select a service'));
			selectWrap.removeClass('open');
		});

		// Close when clicking outside
		$(document).on('click', function(e){
			if (!selectWrap.is(e.target) && selectWrap.has(e.target).length === 0) {
				selectWrap.removeClass('open');
			}
		});
	})();

	// Set up an event listener for the contact form.
	$(form).on("submit", function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Client-side validation
		var required = [
			{ el: $('input[name="name"]'), label: 'Full Name' },
			{ el: $('input[name="email"]'), label: 'Email', type: 'email' },
			{ el: $('input[name="subject"]'), label: 'Subject' },
			{ el: $('input[name="service"]'), label: 'Service' },
			{ el: $('textarea[name="message"]'), label: 'Message' }
		];

		var hasError = false;
		// reset previous state
		$(formMessages).removeClass('success error').text('');
		required.forEach(function(f){
			f.el.removeClass('is-invalid');
		});

		required.forEach(function(f){
			var val = (f.el.val() || '').toString().trim();
			if (!val) {
				hasError = true;
				f.el.addClass('is-invalid');
			}
			if (!hasError && f.type === 'email') {
				var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!re.test(val)) {
					hasError = true;
					f.el.addClass('is-invalid');
				}
			}
		});

		if (hasError) {
			$(formMessages).addClass('error').text('Please complete all required fields correctly.');
			return; // stop here, do not send
		}

		// Disable button and show spinner
		submitBtn.prop('disabled', true);
		var originalBtnHtml = submitBtn.data('original-html');
		if (!originalBtnHtml) {
			submitBtn.data('original-html', submitBtn.html());
			originalBtnHtml = submitBtn.html();
		}
		submitBtn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Sending...');

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData,
			headers: { 'Accept': 'application/json' }
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');


			// Set the message text and ensure it's visible
			$(formMessages).stop(true, true).show().text(response);

			// Auto-hide success message after ~7.5s
			setTimeout(function(){
				$(formMessages).fadeOut(300, function(){
					$(this).removeClass('success error').text('').show();
				});
			}, 7500);

			// Clear the form.
			$('#contact-form input,#contact-form textarea').val('');
			// Reset custom service select
			var cs = $('#service-select');
			cs.removeClass('open');
			cs.find('input[type="hidden"]').val('');
			var trigger = cs.find('.cs-trigger');
			if (trigger.length) {
				var placeholder = trigger.data('placeholder') || 'Select a service';
				trigger.text(placeholder);
			}

			// Show toast
			if (toastEl.length) {
				toastEl.stop(true, true).fadeIn(150).delay(2500).fadeOut(300);
			}
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		})
		.always(function() {
			// Restore button
			submitBtn.prop('disabled', false);
			var original = submitBtn.data('original-html');
			if (original) {
				submitBtn.html(original);
			}
		});
	});

});
