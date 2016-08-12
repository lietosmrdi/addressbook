<div class="remodal" data-remodal-id="create-contact">

	<button data-remodal-action="close" class="remodal-close"></button>

	<form class="js-addNewContact" action="/" method="post">

		<div class="form-group">
			<label class="form-label">Name</label>
			<input class="form-input" type="text" name="name" placeholder="Name" required>
		</div>

		<div class="form-group">
			<label class="form-label">Email</label>
			<input class="form-input" type="text" name="email" placeholder="Email" required>
		</div>

		<div class="form-group">
			<label class="form-label">Phone</label>
			<input class="form-input" type="text" name="phone" placeholder="Phone" required>
		</div>

		{{ csrf_field() }}

		<button class="btn btn-primary">Create contact</button>
		or 
		<button class="btn btn--link" data-remodal-action="close">cancel</button>

	</form>
</div>
