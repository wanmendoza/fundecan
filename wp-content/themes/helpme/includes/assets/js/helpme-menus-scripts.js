(function($) {

	"use strict";


	$(document).ready(function() {


		helpme_megamenu.menu_item_mouseup();
		helpme_megamenu.megamenu_status_update();

		helpme_megamenu.update_megamenu_fields();

		$( '.remove-helpme-megamenu-background' ).manage_thumbnail_display();
		$( '.helpme-megamenu-background-image' ).css( 'display', 'block' );
		$( ".helpme-megamenu-background-image[src='']" ).css( 'display', 'none' );

		helpme_media_frame_setup();

	});


	var helpme_megamenu = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( helpme_megamenu.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-helpme-megamenu-check', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'helpme-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'helpme-megamenu' );
				}
				helpme_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-helpme-megamenu-check', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );


					if( check_against.is( '.helpme-megamenu' ) ) {

						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'helpme-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'helpme-megamenu' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'helpme-megamenu' );
					}
				}
			});
		}

	}


	$.fn.manage_thumbnail_display = function( variables ) {
		var button_id;

		return this.click( function( e ){
			e.preventDefault();

			button_id = this.id.replace( 'helpme-media-remove-', '' );
			$( '#edit-menu-item-megamenu-background-'+button_id ).val( '' );
			$( '#helpme-media-img-'+button_id ).attr( 'src', '' ).css( 'display', 'none' );
		});
	}

	function helpme_media_frame_setup() {
		var helpmeMediaFrame;
		var item_id;

		$( document.body ).on( 'click.helpmeOpenMediaManager', '.helpme-open-media', function(e){

			e.preventDefault();

			item_id = this.id.replace('helpme-media-upload-', '');

			if ( helpmeMediaFrame ) {
				helpmeMediaFrame.open();
				return;
			}

			helpmeMediaFrame = wp.media.frames.helpmeMediaFrame = wp.media({

				className: 'media-frame helpme-media-frame',
				frame: 'select',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			helpmeMediaFrame.on('select', function(){

				var media_attachment = helpmeMediaFrame.state().get('selection').first().toJSON();

				$( '#edit-menu-item-megamenu-background-'+item_id ).val( media_attachment.url );
				$( '#helpme-media-img-'+item_id ).attr( 'src', media_attachment.url ).css( 'display', 'block' );

			});

			helpmeMediaFrame.open();
		});

	}

	
	function helpme_menus_icon_selector() {
		jQuery('.helpme-visual-selector').find('a').each(function() {
			default_value = jQuery(this).siblings('input').val();
			if(jQuery(this).attr('rel')==default_value){
					jQuery(this).addClass('current');
				}
				jQuery(this).click(function(){

					jQuery(this).siblings('input').val(jQuery(this).attr('rel'));
					jQuery(this).parent('.helpme-visual-selector').find('.current').removeClass('current');
					jQuery(this).addClass('current');
					return false;
				})
		});
	}
	helpme_menus_icon_selector();

	function helpme_use_icon() {

		jQuery('.helpme-add-icon-btn').on('click', function() {

			this_el_id = "#edit-menu-item-menu-icon-" + jQuery(this).attr('data-id');
			icon_el_id = "#helpme-view-icon-" + jQuery(this).attr('data-id');
			//console.log(this_el_id);

			jQuery('.helpme-icon-use-this').on('click', function() {
				icon_value = jQuery('#helpme-icon-value-holder').val();
				if(icon_value == '') {
					jQuery(icon_el_id).attr("class", "");
					jQuery(this_el_id).val("");
				} else {
					jQuery(icon_el_id).attr("class", icon_value);
					jQuery(this_el_id).val(icon_value);
				}
				
				window.parent.tb_remove();
				return false;
			});
		});

		jQuery('.helpme-remove-icon').on('click', function() {
			jQuery(this).siblings('input').val('');
			jQuery(this).siblings('i').attr('class', '');
			return false;

		});

	}
	helpme_use_icon();

})(jQuery);


