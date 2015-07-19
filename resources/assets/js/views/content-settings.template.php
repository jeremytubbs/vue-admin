<h1>Edit Content</h1>
<div v-if="!content.length">Loading...</div>

<form method="POST" v-on="submit: submitContent">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" v-model="content.title" />
	</div>
	<div class="form-group">
		<label>Description</label>
		<textarea name="description" class="form-control" rows="3" v-model="content.description"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-default">Update Content</button>
	</div>
</form>
