import {MDCSnackbar} from '@material/snackbar';

//Init Material Snackbar
const Snackbar = new MDCSnackbar(document.querySelector('.mdc-snackbar'));

/**
 * For message handling
 */
class Message {

	/**
	 * Shows snackbar with message
	 * @param {string} msg
	 */
	static show(msg) {
		Snackbar.show({
			message: msg
		});
	}

}

export {Message};