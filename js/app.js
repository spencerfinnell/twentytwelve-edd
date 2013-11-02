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

					if ( $priceOptions.length === 0 )
						return;

					$priceOptions.click( function(e) {
						$(this)
							.toggleClass( 'active' )
							.find( 'input' )
								.attr( 'checked', ! $(this).attr( 'checked' ) );
					});
				}

			}

			TwentyTwelve_EDD.init();

		});

	}(jQuery));

}