(function () {
	var form = document.getElementById('newRssForm');

	form.onsubmit = function () {
		var m = new Message();

		m.startLoader();

		fetch(form.action, {
			method: 'post',
			body: new FormData(form)
		}).then(function (response) {
			return response.json();
		}).then(function (data) {
			m.stopLoader();
			m.showMessage(data.status, data.text);
		});

		return false;
	};
})();
