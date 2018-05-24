import {Token} from "../token/script";

var Form = function () {
	this.form = document.getElementById('newRssForm');

	/**
	 * Gets and sets form data
	 * @private
	 * @return {FormData}
	 */
	this.getData = function () {
		var formData = new FormData(this.form);
		var toDelete = [];

		var inputs = Array.from(formData.entries());
		inputs.forEach(function (input) {
			if (input[1].length === 0) {
				toDelete.push(input[0]);
			}
		});
		toDelete.forEach(function (del) {
			formData.delete(del);
		});

		formData.append('token', Token.get());

		return formData;
	};

	/**
	 * Makes AJAX call to server
	 * @public
	 */
	this.fetch = function () {
		var t = this;
		var m = new Message();
		m.startLoader();

		fetch(t.form.action, {
			method: 'post',
			body: t.getData()
		}).then(function (response) {
			return response.json();
		}).then(function (data) {
			m.stopLoader();
			m.showMessage(data.status, data.text);
		});
	}
};

export {Form};
