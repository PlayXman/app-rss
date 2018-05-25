import {Token} from "../token/script";
import {Message} from "../message/script";

/**
 * Form handling
 */
class Form {

	/**
	 * Constructor
	 */
	constructor() {
		this.formEl = document.getElementById('newRssForm');
	}

	/**
	 * Gets and sets form data
	 * @private
	 * @return {FormData}
	 */
	getData() {
		let formData = new FormData(this.formEl);
		let toDelete = [];

		let inputs = Array.from(formData.entries());
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
	fetch() {
		const t = this;
		//m.startLoader();todo
		
		fetch(t.formEl.action, {
			method: 'post',
			body: t.getData()
		}).then(function (response) {
			return response.json();
		}).then(function (data) {
			//m.stopLoader();todo
			Message.show(data.text);
		});
	}

}

export {Form};
