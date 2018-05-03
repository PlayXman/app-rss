var icons = {
	success: {
		icon: '✔'
	},
	error: {
		icon: '✖'
	}
};

var Message = function () {

	this.loaderEl = document.getElementsByClassName('message__loader')[0];
	this.messageEl = document.getElementsByClassName('message__box')[0];

	this.startLoader = function () {
		this.loaderEl.classList.add('show');
	};

	this.showMessage = function (type, text) {
		var t = this;

		var icon = this.messageEl.getElementsByClassName('message__icon');
		icon.classList.remove('message__icon--error').remove('message__icon--success').add(`message__icon--${type}`);
		icon.innerHTML = icons[type];

		setTimeout(function () {
			cont.removeChild(t.el);
		}, 3000);
	};

};
