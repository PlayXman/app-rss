<form id="newRssForm" method="post" action="../app/index.php" class="form mdc-elevation--z8">
	<div class="text-field-row">
		<div class="text-field-container">
			<div class="mdc-text-field mdc-text-field--box">
				<input id="rssTitle" type="text" class="mdc-text-field__input" name="title" required>
				<label class="mdc-floating-label" for="rssTitle">Title</label>
				<div class="mdc-line-ripple"></div>
			</div>
		</div>
	</div>
	<div class="text-field-row">
		<div class="text-field-container">
			<div class="mdc-text-field mdc-text-field--textarea">
				<textarea id="rssDescription" class="mdc-text-field__input" rows="3" name="description" required></textarea>
				<label class="mdc-floating-label" for="rssDescription">Description</label>
			</div>
		</div>
	</div>
	<div class="text-field-container">
		<div class="mdc-text-field mdc-text-field--box mdc-text-field--with-leading-icon">
			<i class="material-icons mdc-text-field__icon">insert_link</i><input id="rssLink" class="mdc-text-field__input" type="url" name="link">
			<label class="mdc-floating-label" for="rssLink">Link</label>
			<div class="mdc-line-ripple"></div>
		</div>
		<p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent">Eg. http://example.com</p>
	</div>
	<div class="text-field-container">
		<div class="mdc-text-field mdc-text-field--box mdc-text-field--with-leading-icon">
			<i class="material-icons mdc-text-field__icon">photo</i><input id="rssImage" class="mdc-text-field__input" type="url" name="image">
			<label class="mdc-floating-label" for="rssImage">Image</label>
			<div class="mdc-line-ripple"></div>
		</div>
		<p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent">Eg. http://image.com/picture.jpg</p>
	</div>

	<div class="form__button-cont">
		<button type="submit" class="mdc-button mdc-button--raised">Post</button>
	</div>
</form>