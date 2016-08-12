@extends ('layouts/main')

@section ('content')

	@include ('components/navbar')

	<div id="js-contactsList" class="container grid">

	    <div class="columns">

	        <div class="column col-md-3">
		        <h4>Groups</h4>

		        <ul class="groupsList">
			         {!! $tree !!}
		        </ul>
	        </div>

	        <div class="column col-md-9">
				<div class="card">

		        	<h4 class="u-inline">Contacts</h4>

		        	<table class="table table-hover">
					    <thead>
					        <tr>
					            <th 
					            	class="sort" 
					            	data-sort="name">
					            	<button 
					            		class="btn btn--link tooltip tooltip-top"
					            		data-tooltip="Sort by nme">
					            		Name
					            	</button>
					            </th>

					            <th 
					            	class="sort" 
					            	data-sort="email">
					            	<button 
					            		class="btn btn--link tooltip tooltip-top"
					            		data-tooltip="Sort by email">
					            		Email
					            	</button>
					            </th>

					            <th 
					            	class="sort" 
					            	data-sort="phone">
					            	<button 
					            		class="btn btn--link tooltip tooltip-top"
					            		data-tooltip="Sort by phone">
					            		Phone
					            	</button>
					            </th>

					            <th>Tags</th>
					            <th></th>
					        </tr>
					    </thead>

					    <tbody class="list">
						    @foreach ($contacts as $contact)
						        @include ('components/contact')
					        @endforeach
					    </tbody>
					</table>

		        </div>
		    </div>

		</div>

	</div>

	@include ('components/createContact')

@endsection