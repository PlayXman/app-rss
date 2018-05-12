var icons = {
	success: {
		icon: '✔'
	},
	error: {
		icon: '✖'
	}
};

var showClass = 'show';

var Message = function () {

	this.loaderEl = document.getElementsByClassName('message__loader')[0];
	this.messageEl = document.getElementsByClassName('message__box')[0];

	this.startLoader = function () {
		this.loaderEl.classList.add(showClass);
	};

	this.stopLoader = function () {
		this.loaderEl.classList.remove(showClass);
	};

	this.showMessage = function (type, text) {
		var t = this;

		t.messageEl.classList.remove('message__box--error');
		t.messageEl.classList.remove('message__box--success');
		t.messageEl.classList.add(`message__box--${type}`);
		t.messageEl.getElementsByClassName('message__icon')[0].innerHTML = icons[type].icon;
		t.messageEl.getElementsByClassName('message__text')[0].innerHTML = text;

		t.messageEl.classList.add(showClass);

		setTimeout(function () {
			t.messageEl.classList.remove(showClass);
		}, 4000);
	};

};
