import {Form} from "./form";
import {MDCTextField} from '@material/textfield';
import {MDCRipple} from '@material/ripple';

(function () {
	//Init Material fields
	document.querySelectorAll('.mdc-text-field').forEach((node)=>{
		new MDCTextField(node);
	});
	document.querySelectorAll('.mdc-button').forEach((node)=>{
		new MDCRipple(node);
	});

	//Init form
	const form = new Form();
	form.formEl.onsubmit = function () {
		form.fetch();

		return false;
	};
})();
