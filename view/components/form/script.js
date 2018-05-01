(function () {
	var form = document.getElementById('newRssForm');

	form.onsubmit = function () {
		fetch(form.action, {
			method: 'post',
			body: new FormData(form)
		}).then(function (response) {
			return response.json();
		}).then(function (data) {
			var m = new Message(data.status, data.text);
			m.render();
		});

		return false;
	};
})();
