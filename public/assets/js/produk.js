 $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });

	  $('body').on('click', '.Update', function(){
	  	$('.modal-footer button[type=submit]').html('Update Data');
	  	$('.modal-body form').attr('action', `update/`);
	  	var id = $(this).attr('data-id');
	  	// $.get("/administrator" +'/barang/' + id +'/update', function (data){
	  		// alert(data.jenis);
	  		$.ajax({
	  			url: "/administrator" +'/barang/' + id +'/update',
	  			type: "GET",
	  			data: 'JSON',
	  			success: function(data){
	  				// console.log(data.produk.id);
	  				// alert(data.detail.harga);
	  				$('#title').html("Update Data");
				  	$('#exampleModalCenter').modal('show');
				  	$('#id').val(data.produk.id);
				  	$('#produk_id').val(data.detail.produk_id);
				  	$('#users_id').val(data.produk.users_id);
				  	$('#nama_produk').val(data.produk.nama_produk);
				  	$('#qty').val(data.produk.qty);
				  	$('#jenis').val(data.produk.jenis);
				  	$('#bv').val(data.produk.bv);
				  	$('#harga').val(data.detail.harga);
	  			}
	  		});
	  	});
	  $('body').on('click', '.Delete', function(){
	  	var id = $(this).attr('data-id');
	  	// $.get("/administrator" +'/barang/' + id +'/update', function (data){
	  		// alert(data.jenis);
	  		$.ajax({
	  			url: "/administrator" +'/barang/delete' + id +'/data',
	  			type: "GET",
	  			data: 'JSON',
	  			success: function(data){
	  				// console.log(data.produk.id);
	  				// alert(data.detail.harga);
				  	// $('#exampleModalCenter').modal('show');
				  	// $('#id').val(data.produk.id);
				  	// $('#produk_id').val(data.detail.produk_id);
				  	// $('#users_id').val(data.produk.users_id);
				  	// $('#nama_produk').val(data.produk.nama_produk);
				  	// $('#qty').val(data.produk.qty);
				  	// $('#jenis').val(data.produk.jenis);
				  	// $('#bv').val(data.produk.bv);
				  	// $('#harga').val(data.detail.harga);
	  			}
	  		});
	  	});
	  });