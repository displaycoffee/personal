// Add classes to table elements on options page
function cstmstffAddOptionClasses( selector ) {
	var tableRows = jQuery( selector );
	var labelClass = pluginObj['fieldLabel'].replace( '.', '' );
	var valueClass = pluginObj['fieldValue'].replace( '.', '' );

	if ( tableRows && tableRows.length > 0 ) {
		tableRows.each( function() {
			var currentRow = jQuery( this );
			var currentTh = currentRow.find( 'th' );
			var currentTd = currentRow.find( 'td' );

			if ( !currentTh.hasClass( labelClass ) ) {
				currentTh.addClass( labelClass );
			}
			if ( !currentTd.hasClass( valueClass ) ) {
				currentTd.addClass( valueClass );
			}
		});
	}
}

// Add functionality for selection dates
function cstmstffInitDate( selector ) {
	var dateFields = selector;

	if ( dateFields && dateFields.length > 0 ) {
		dateFields.each( function() {
			var inputTimer = 1000;
			var currentDate = jQuery( this );

			// Month on change event
			currentDate.find( '.date-field-month' ).on( 'change', function() {
				var currentMonth = jQuery( this );

				// Loop through select options on change and update selected attribute and month input
				jQuery.each( currentMonth.find( 'option' ), function() {
					var currentOption = jQuery( this );
					if ( currentMonth.val() == currentOption.val() ) {
						currentOption.attr( 'selected', 'selected' );
						changeDateValue( currentDate, currentOption.val(), 'month' );
					} else {
						currentOption.removeAttr( 'selected' );
					}
				});
			});

			// Watch day field for value change
			currentDate.find( '.date-field-day' ).on( 'keyup', function() {
				var currentDay = jQuery( this );
				setTimeout( function() {
					changeDateValue( currentDate, currentDay.val(), 'day' );
				}, inputTimer);
			});

			// Watch year field for value change
			currentDate.find( '.date-field-year' ).on( 'keyup', function() {
				var currentYear = jQuery( this );
				setTimeout( function() {
					changeDateValue( currentDate, currentYear.val(), 'year' );
				}, inputTimer);
			});
		});

		function changeDateValue( date, newValue, type ) {
			var hiddenDate = date.find( '.date-field-text' );
			var splitDate = hiddenDate.val().split( '/' );

			// Set date index to change value
			var indexDate = 0;
			if ( type == 'day' ) {
				indexDate = 1;
			} else if ( type == 'year' ) {
				indexDate = 2;
			}

			// Update date values
			splitDate[indexDate] = newValue;
			hiddenDate.val( splitDate.join( '/' ) );
		}
	}
}

// WordPress Media Library
function cstmstffSelectImage( selectButton, selectInput, selectedMedia ) {
	// Instantiates the variable that holds the media library frame...
	var cstmstffSelectImageFrame;

	// Runs when the image button is clicked
	selectButton.click( function( e ) {
		// Prevents the default action from occuring
		e.preventDefault();

		// If the frame already exists, re-open it
		if ( cstmstffSelectImageFrame ) {
			cstmstffSelectImageFrame.open();
			return;
		}

		// Sets up the media library frame
		cstmstffSelectImageFrame = wp.media.frames.cstmstffSelectImageFrame = wp.media({
			title   : cstmstffSelectImage.title,
			button  : { text : cstmstffSelectImage.selectButton },
			library : { type : 'image' }
		});

		// Runs when an image is selected
		cstmstffSelectImageFrame.on( 'select', function() {
			// Grabs the attachment selection and creates a JSON representation of the model
			var mediaAttachment = cstmstffSelectImageFrame.state().get( 'selection' ).first().toJSON();

			// Sends the attachment URL to our custom image input field and updates selected media src
			selectInput.val( mediaAttachment.url );
			selectedMedia.attr( 'src', mediaAttachment.url );
		});

		// Opens the media library frame
		cstmstffSelectImageFrame.open();
	});
}
