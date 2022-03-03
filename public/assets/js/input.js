// $(document).ready(function(){
// 	$.ajaxSetup({
// 		headers: {
// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 		}
// 	});
// 	var i = 1;
// 	var maxField = 5;
//     //    $('.nama_produks').select2({
//     //    		ajax: {
//     //    			tags: true,
//     //    			multiple: true,
// 	// 		    tokenSeparators: [',', ' '],
// 	// 		    minimumInputLength: 2,
// 	// 		    minimumResultsForSearch: 10,
// 	// 		    delay: 240,
//     //    			url: "/administrator/payouts/create",
//     //    			type: "GET",
//     //    			dataType: 'json',
//     //    			data: function (params) {
// 	// 	            var queryParameters = {
// 	// 	                term: params.term
// 	// 	            }
// 	// 	            return queryParameters;
// 	// 	        },
// 	// 	        processResults: function (data) {
// 	// 	            return {
// 	// 	                results: $.map(data, function (item) {
// 	// 	                    return {
// 	// 	                        text: item.nama_produk,
// 	// 	                        id: item.id
// 	// 	                    }
// 	// 	                })
// 	// 	            };
// 	// 	        }
//     //    		}
//     //    });
//        $(document).on('click', '.addData', function(){
// 		   if(i < maxField){
// 			   i++;
// 				$('#addForm').append('<div class="row mt-2"><div class="col-10"><select name="nama_produk[]" class="form-control nama_produks2"><option>--Data Barang--</option><option></option></select></div><div class="col-2"><input type="number" class="form-control" placeholder="qty" name="qty[]"></div></div>');
// 				$('.nama_produks2').select2({
// 				ajax: {
// 					tags: true,
// 					multiple: true,
// 					tokenSeparators: [',', ' '],
// 					minimumInputLength: 2,
// 					minimumResultsForSearch: 10,
// 					delay: 240,
// 						url: "/administrator/payouts/create",
// 						type: "GET",
// 						dataType: 'json',
// 						data: function (params) {
// 						var queryParameters = {
// 							term: params.term
// 						}
// 						return queryParameters;
// 					},
// 				processResults: function (data) {
// 						return {
// 							results: $.map(data, function (item) {
// 								return {
// 									id: item.nama_produk,
//                                     text: item.nama_produk
// 								}
// 							})
// 						};
// 					}
// 				}
// 			});
// 		   }
//        }); 		
// });
// $(document).on('click', '.deleteForm', function () {
//     $(this).parents('tr').remove();
// });