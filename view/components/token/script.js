import {Sha} from "./sha";

var Token = {
	formatDate: function (number) {
		return (number < 10 ? '0' : '') + number;
	},

	get: function () {
		var seed = document.body.dataset.seed;
		var date = new Date();
		var sha = new Sha(seed + this.formatDate(date.getFullYear()) + this.formatDate(date.getMonth() + 1) + this.formatDate(date.getDate()) + this.formatDate(date.getHours()));

		return sha.get();
	}
};

export {Token};
