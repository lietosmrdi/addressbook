var App = {};

App.contactList = {

	list: null,

	options: {
	    valueNames: [ 
	    	'name',
	    	'email',
	    	'phone',
	    	{
	    		attr: 'data-contact-id',
	    		name: 'id'
	    	}
	    ]
	},

	init: function() {
		this.list = new List('js-contactsList', this.options);
	},

};

App.createContact = {

	init: function() {
		this.bindEvents();
	},

	bindEvents: function() {
		$(document)
			.on('submit', '.js-addNewContact', this.create.bind(this))
			.on('click', '.js-contactRemove', this.destroy.bind(this))
			.on('keyup', '.js-searchContactList', this.search.bind(this))
			.on('click', '.js-contactEdit', this.startEdit.bind(this));
	},

	create: function(event) {
		event.preventDefault();

		var $form = $(event.currentTarget);
		var data = $form.serializeJSON();

		$.ajax({
			url: $form.attr('action'),
			type: $form.attr('method'),
			dataType: 'json',
			data: $form.serialize(),
		})
		.done(function() {

			App.contactList.list.add({
				name: data.name,
				email: data.email,
				phone: data.phone,
			});

			$form[0].reset();
			$form.closest('[data-remodal-id=create-contact]').remodal().close();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	},

	destroy: function(event) {
		event.preventDefault();

		var $el = $(event.currentTarget);
		var $row = $el.closest('tr');

		$.ajax({
			url: '/contact/' + $row.data('contact-id'),
			type: 'delete',
			dataType: 'json',
		})
		.done(function() {
			$row.remove();	
			App.contactList.list.reIndex();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	},

	startEdit: function(event) {
		event.preventDefault();

		var $el = $(event.currentTarget);
		var $row = $el.closest('tr');

		if ($row.find('.contactRow').hasClass('is-active')) {
			this.edit(event);
			$el.html('Edit');
		} else {
			$el.html('Save');
		}

		$row.find('.contactRow').toggleClass('is-active');
	},

	edit: function(event) {

		var $el = $(event.currentTarget);
		var $row = $el.closest('tr');

		var data = {
			name: $row.find('.js-editContactInputName').val(),
			email: $row.find('.js-editContactInputEmail').val(),
			phone: $row.find('.js-editContactInputPhone').val(),
		};

		$.ajax({
			url: '/contact/' + $row.data('contact-id'),
			type: 'put',
			dataType: 'json',
			data: data, 
		})
		.done(function() {

			$row.find('.js-contactDataName').html(data.name);
			$row.find('.js-contactDataEmail').html(data.email);
			$row.find('.js-contactDataPhone').html(data.phone);

			this.contactList.reIndex();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	},

	search: function(event) {
		event.preventDefault();

		var $el   = $(event.currentTarget);
		var value = $el.val();

		App.contactList.list.search(value);
	},

};

App.dropdown = (function() {

	'use strict';

	var config = {
		dropdown: '.dropdown',
		dropdownMenu: '.dropdown-menu',
		trigger: '.js-toggleDropdown',
		activeClass: 'dropdown-active',
	};

	$(document).off(config.trigger);

	$(document).on('click.' + config.trigger, config.trigger, function(event) {
		event.preventDefault();

		var $this = $(this);
		var $dropdown  = $this.closest(config.dropdown).find(config.dropdownMenu);
		var $dropdowns = $(config.dropdownMenu).not($dropdown).removeClass(config.activeClass);

		openDropdown($dropdown);
	});

	$(document).on('click.' + config.trigger, function(event) {			
		if ($(event.target).closest(config.dropdown).length === 0) {
			$(config.dropdownMenu).removeClass(config.activeClass);  
		}
	});
 
	var openDropdown = function(target) {
		var $target = $(target);
		$target.toggleClass(config.activeClass);
	};

	var closeDropdown = function(target) {
		if (!target) {
			throw 'First argument must contain targeted dropdown.';
		}
		$(target).removeClass(config.activeClass);
	};

	return {
		openDropdown: openDropdown,
		closeDropdown: closeDropdown,
	};

})();

(function($) {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    App.contactList.init();
    App.createContact.init();

})(jQuery);