<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<form id="newRssForm" class="form__cont" method="post" action="../app/index.php">
				<div class="form-group row">
					<label for="rssTitle" class="col-md-3 col-form-label col-form-label-lg">Title *</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-lg" id="rssTitle" name="title" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="rssDescription" class="col-md-3 col-form-label col-form-label-lg">Description *</label>
					<div class="col-md-9">
						<textarea type="text" class="form-control" id="rssDescription" rows="3" name="description" required></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="rssLink" class="col-md-3 col-form-label col-form-label-sm">Link</label>
					<div class="col-md-9">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">🌍</div>
							</div>
							<input type="url" class="form-control form-control-sm" id="rssLink" name="link" placeholder="http://example.com">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="rssImage" class="col-md-3 col-form-label col-form-label-sm">Image</label>
					<div class="col-md-9">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">🌍</div>
							</div>
							<input type="url" class="form-control form-control-sm" id="rssImage" name="image" placeholder="http://image.com/picture.jpg">
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Post</button>
			</form>
		</div>
	</div>
</div>
