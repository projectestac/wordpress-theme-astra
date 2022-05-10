
window.addEventListener( 'load', function(e) {
	astra_onload_function();
});

function astra_onload_function() {

	/* Do things after DOM has fully loaded */

	var astraMetaBox = document.querySelector( '#astra_settings_meta_box' );
	if( astraMetaBox != null ){

		var titleCheckbox = document.getElementById('site-post-title');

		if( null === titleCheckbox ) {
			titleCheckbox = document.querySelector('.site-post-title input');
		}

		if( null !== titleCheckbox ) {
			titleCheckbox.addEventListener('change',function() {
				var titleBlock = document.querySelector('.editor-post-title__block');
				if( null !== titleBlock ) {
					if( titleCheckbox.checked ){
						titleBlock.style.opacity = '0.2';
					} else {
						titleBlock.style.opacity = '1.0';
					}
				}
			});
		}
	}

	wp.data.subscribe(function () {
		setTimeout( function () {
			// Compatibility for updating layout in editor with direct reflection.
			const contentLayout = ( null !== wp.data.select( 'core/editor' ) && undefined !== wp.data.select( 'core/editor' ).getEditedPostAttribute( 'meta' ) && wp.data.select( 'core/editor' ).getEditedPostAttribute( 'meta' )['site-content-layout'] ) ? wp.data.select( 'core/editor' ).getEditedPostAttribute( 'meta' )['site-content-layout'] : 'default',
				bodyClass = document.querySelector('body');

			switch( contentLayout ) {
				case 'boxed-container':
					bodyClass.classList.add('ast-separate-container' , 'ast-two-container');
					bodyClass.classList.remove('ast-page-builder-template' , 'ast-plain-container');
				break;
				case 'content-boxed-container':
					bodyClass.classList.add('ast-separate-container');
					bodyClass.classList.remove('ast-two-container' , 'ast-page-builder-template' , 'ast-plain-container');
				break;
				case 'plain-container':
					bodyClass.classList.add('ast-plain-container');
					bodyClass.classList.remove('ast-two-container' , 'ast-page-builder-template' , 'ast-separate-container');
				break;
				case 'page-builder':
					bodyClass.classList.add('ast-page-builder-template');
					bodyClass.classList.remove('ast-two-container' , 'ast-plain-container' , 'ast-separate-container');
				break;
			}

			/**
			 * In WP-5.9 block editor comes up with color palette showing color-code canvas, but with theme var() CSS its appearing directly as it is. So updated them on wp.data event.
			 */
			const customColorPickerButtons = document.querySelectorAll( '.components-color-palette__custom-color' );

			for ( let btnCount = 0; btnCount < customColorPickerButtons.length; btnCount++ ) {
				const colorCode = customColorPickerButtons[btnCount].innerText;
				if ( colorCode.indexOf( 'var(--ast-global-color' ) > -1 ) {
					customColorPickerButtons[btnCount].innerHTML = '<span class="ast-theme-block-color-name">' + astraColors[ colorCode ] + '</span>';
				}
			}

			// Title visibility with new editor compatibility update.
			var titleVisibility = document.querySelector( '.title-visibility' ),
				titleBlock = document.querySelector( '.edit-post-visual-editor__post-title-wrapper' );
			if( null === titleVisibility && null !== titleBlock ) {
				var titleVisibilityTrigger = '';
				if( 'disabled' === wp.data.select( 'core/editor' ).getEditedPostAttribute( 'meta' )['site-post-title'] ) {
					titleVisibilityTrigger = '<span class="dashicons dashicons-hidden title-visibility"></span>';
					titleBlock.classList.toggle( 'invisible' );
				} else {
					titleVisibilityTrigger = '<span class="dashicons dashicons-visibility title-visibility"></span>';
				}

				titleBlock.insertAdjacentHTML( 'beforeend', titleVisibilityTrigger );
				document.querySelector( '.title-visibility' ).addEventListener( 'click', function() {
					var titleBlock = document.querySelector( '.edit-post-visual-editor__post-title-wrapper' );
					titleBlock.classList.toggle( 'invisible' );

					if( this.classList.contains( 'dashicons-hidden' ) ) {
						this.classList.add( 'dashicons-visibility' );
						this.classList.remove( 'dashicons-hidden' );
						wp.data.dispatch( 'core/editor' ).editPost(
							{
								meta: {
									'site-post-title': '',
								}
							}
						);
					} else {
						this.classList.add( 'dashicons-hidden' );
						this.classList.remove( 'dashicons-visibility' );
						wp.data.dispatch( 'core/editor' ).editPost(
							{
								meta: {
									'site-post-title': 'disabled',
								}
							}
						);
					}
				});
			}

			var responsivePreview = document.querySelectorAll( '.is-tablet-preview, .is-mobile-preview' );
			if( responsivePreview.length ) {
				document.body.classList.add( 'responsive-enabled' );
			} else {
				document.body.classList.remove( 'responsive-enabled' );
			}
		}, 1 );
	});
}
