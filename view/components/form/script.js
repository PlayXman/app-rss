import {Form} from "./form";

(function () {
	var form = new Form();

	form.form.onsubmit = function () {
		form.fetch();

		return false;
	};
})();
