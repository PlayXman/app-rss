(function () {
	var form = new Form();

	form.form.onsubmit = function () {
		form.fetch();

		return false;
	};
})();

import {MDCTextField} from '@material/textfield';
const textField = new MDCTextField(document.querySelector('.mdc-text-field'));