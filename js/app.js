$(function() {
	'use strict';

	var userWidget = $('#UserWidget');

	if ($.cookie('userLoggedIn')) {
		$.ajax({
			url: 'https://' + getUrlPrefix() + '/get-data',
			dataType: 'json',
			xhrFields: {
				withCredentials: true
			}
		}).done(function(response) {
			if (response.user) {
				updatePageToLoggedInState(response.user);
			}
		});
	}

	userWidget.find('button').on('click', function() {
		var button  = $(this);
		var isLogIn = button.attr('data-mode') === 'logIn';

		$.ajax({
			url: 'https://' + getUrlPrefix() + (isLogIn ? '/login' : '/logout'),
			method: 'POST',
			dataType: 'json',
			xhrFields: {
				withCredentials: true
			}
		}).done(function(response) {
			if (isLogIn) {
				updatePageToLoggedInState(response.user);
			} else {
				$.removeCookie('userLoggedIn', { path: '/' });
				location.reload();
			}
		});
	});

	function updatePageToLoggedInState(user) {
		userWidget.find('p').html('<strong>' + user + '</strong> is logged in.');
		userWidget.find('button').text('Log out').attr('data-mode', 'logOut');

		$.cookie('userLoggedIn', 1, { path: '/' });
	}

	function getUrlPrefix()
	{
		return location.hostname + location.pathname;
	}
});
