(function () {
	var form = new Form();

	form.onsubmit = function () {
		form.fetch();

		return false;
	};
})();
