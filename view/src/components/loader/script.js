import {MDCLinearProgress} from "@material/linear-progress/index";

/**
 * Handles loader actions.
 */
class Loader {

	/**
	 * Constructor
	 */
	constructor() {
		this.mdcLp = new MDCLinearProgress(document.getElementById('loader'));
	}

	/**
	 * Shows loader
	 */
	show() {
		this.mdcLp.open();
	}

	/**
	 * Hides loader
	 */
	hide() {
		this.mdcLp.close();
	}
}

export {Loader};