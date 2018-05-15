(function () {
	var form = new Form();

	form.form.onsubmit = function () {
		form.fetch();

		return false;
	};
})();
