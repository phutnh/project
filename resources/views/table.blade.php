@extends('layouts.app')
@section('content')
@include('layouts.shared.breadcrumb')
<section class="content"> 
	<div class="box box-primary no-margin-bottom">
	  <div class="box-header with-border">
	    <h3 class="box-title">Title</h3>
	    <div class="box-tools pull-right">
	      <a class="btn btn-box-tool" title="Thêm mới"><i class="fa fa-plus-circle"></i>
	      </a>
	      <a class="btn btn-box-tool" title="Xóa bỏ"><i class="fa fa-remove"></i>
	      </a>
				<a data-toggle="collapse" title="Tìm kiếm nâng cao" class="collapsed btn btn-box-tool" href="#box-filter" aria-expanded="false">
          <i class="fa fa-filter"></i>
        </a>
	    </div>
	  </div>
	  <div class="box-body">
	  	<div id="box-filter" class="collapse">
	  		<form class="form-inline box-form-inline right" id="frm-search-main">
				  <div class="form-group">
				  	<div class="input-group">
				  		<label class="form-control">Nâng cao</label>
				  	</div>
				  	<div class="input-group">
	            <input type="text" name="search[key1]" class="form-control">
	            <span class="input-group-addon">To</span>
	            <input type="text" name="search[key2]" class="form-control">
	            <div class="input-group-btn">
					      <button type="button" class="btn btn-default" id="btn-search-main">
					      	<i class="fa fa-search"></i>
					      </button>
					    </div>
	          </div>
				  </div>
				</form>
	  	</div>
	    <table id="users-table" class="table table-bordered table-striped dt-nowarp" style="width: 100%">
		    <thead>
		    	<tr>
		    		<td>ID</td>
		    		<td>Name</td>
		    		<td>Email</td>
		    	</tr>
		    </thead>
		  </table>
	  </div>
	</div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
	var dataTable = $('#users-table').DataTable({
      ajax: {
		    url: '{{ route('test.ajax') }}',
		    type: "POST",
		    data: function (d) {
		      d.params = $('#frm-search-main').serialize()
		    }
		  },
      columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
      ]
  });

	$('#btn-search-main').click(function() {
	  dataTable.draw();
	});
</script>
@endsection