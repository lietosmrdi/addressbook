<tr data-contact-id="{{ $contact->id }}" class="js-editContactForm">

	<td class="name contactRow">
		<input 
			type="text" 
			name="name" 
			class="form-input editContactInput js-editContactInput js-editContactInputName" 
			value="{{ $contact->name }}">
		<span class="fa fa-user contactData-icon"></span>
		<span class="contactData js-contactData js-contactDataName">{{ $contact->name }}</span>
	</td>

	<td class="email contactRow">
		<input 
			type="email" 
			name="email" 
			class="form-input editContactInput js-editContactInput js-editContactInputEmail" 
			value="{{ $contact->email }}">
		<span class="contactData js-contactData js-contactDataEmail">{{ $contact->email }}</span>
	</td>

	<td class="phone contactRow">
		<input 
			type="text" 
			name="phone" 
			class="form-input editContactInput js-editContactInput js-editContactInputPhone" 
			value="{{ $contact->phone }}">
		<span class="contactData js-contactData js-contactDataPhone">{{ $contact->phone }}</span>
	</td>

{{-- 	<td class="tags">
		@foreach ($contact->tags as $tag)
			<span class="tag">#{{ $tag->name }}</span>
		@endforeach
	</td> --}}

	<td class="dropdown">

		<button class="btn btn--link js-toggleDropdown">
			More 
			<span class="fa fa-angle-down"></span>
		</button>

		<ul class="menu dropdown-menu">

			<li class="menu-header">
			    <span class="menu-header-text">
			        What to do
			    </span>
			</li>

			<li class="menu-item">
			    <button class="btn btn--link edit-item-btn js-contactEdit">
					Edit
			    </button>
			</li>

			<li class="menu-item">
			    <button class="btn btn--link btn--danger remove-item-btn js-contactRemove">
					Delete
			    </button>
			</li>

		</ul>
	</td>

</tr>