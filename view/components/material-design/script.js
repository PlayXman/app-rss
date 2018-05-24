import {MDCTextField} from '@material/textfield';
import {MDCSnackbar} from '@material/snackbar';

let snackbar;

class Material {
	static init() {
		new MDCTextField(document.querySelector('.mdc-text-field'));


		const xxx = document.createElement('div');
		xxx.innerHTML = '<div class="mdc-snackbar" aria-live="assertive" aria-atomic="true" aria-hidden="true">\n' +
			'\t<div class="mdc-snackbar__text"></div>\n' +
			'\t<div class="mdc-snackbar__action-wrapper">\n' +
			'\t\t<button type="button" class="mdc-snackbar__action-button"></button>\n' +
			'\t</div>\n' +
			'</div>\n';

		const yyy = xxx.firstChild;

		document.body.appendChild(yyy);

		// const snackbar = new MDCSnackbar(document.querySelector('.mdc-snackbar'));
		snackbar = new MDCSnackbar(yyy);
		const dataObj = {
			message: 'aaa',
			actionText: 'Undo',
			actionHandler: function () {
				console.log('my cool function');
			}
		};

		const aaa = document.createElement("div");
		aaa.innerHTML = '<button>but</button>';
		aaa.firstChild.onclick = ()=>{snackbar.show(dataObj)};
		document.body.appendChild(aaa.firstChild);

		// snackbar.show(dataObj);
	}
}

export {Material};
