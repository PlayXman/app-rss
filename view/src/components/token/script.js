import {Sha} from "./sha";

/**
 * For handling token. Used for communication with server.
 * Needs `data-seed` attribute on body tag.
 */
class Token {

	/**
	 * Single char numbers formats into double character ones
	 * @private
	 * @param {int} number
	 * @return {string}
	 */
	static formatDate(number) {
		return (number < 10 ? '0' : '') + number;
	}

	/**
	 * Creates hash token
	 * @return {string}
	 */
	static get() {
		const seed = document.body.dataset.seed;
		const date = new Date();
		const sha = new Sha(seed + this.formatDate(date.getFullYear()) + this.formatDate(date.getMonth() + 1) + this.formatDate(date.getDate()) + this.formatDate(date.getHours()));

		return sha.get();
	}

}

export {Token};
