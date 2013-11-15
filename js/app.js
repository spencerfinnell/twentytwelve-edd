/**
 * app.js
 */
if (typeof (jQuery) != 'undefined') {

	(function( $ ) {
		"use strict";

		$(function() {

			var TwentyTwelve_EDD = {

				init : function () {
					this.togglePriceSelection();
				},

				togglePriceSelection : function() {
					var $priceOptions = $( '.edd_price_options li' );
					var type          = $priceOptions.find( 'input' ).prop( 'type' );
					var multi         = 'radio' == type ? false : true;

					if ( $priceOptions.length === 0 )
						return;

					$priceOptions.click( function(e) {
						if ( ! multi ) {
							$priceOptions
								.removeClass( 'active' )
						}

						$(this)
							.toggleClass( 'active' )
							.find( 'input' )
								.prop( 'checked', ! $(this).prop( 'checked' ) );
					});
				}

			}

			TwentyTwelve_EDD.init();

		});

	}(jQuery));

}