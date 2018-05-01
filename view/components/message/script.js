var icons = {
	success: {
		icon: '✔'
	},
	error: {
		icon: '✖'
	}
};

var Message = function (type, text) {

	this.el = document.createElement(`<div class="message__box">
	<i class="message__icon message__icon--${type}">${icons[type].icon}</i> ${text}
</div>`);

	this.render = function () {
		var t = this;
		var cont = document.getElementById('message_container');

		cont.appendChild(t.el);

		setTimeout(function () {
			cont.removeChild(t.el);
		}, 3000);
	};

};
