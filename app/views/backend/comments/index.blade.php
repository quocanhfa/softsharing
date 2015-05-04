@extends('backend.admin.index')

@section('title')
	Bình Luận
@stop

@section('hidden')
	<div class="show_hidden">
        <div class="col-xs-1 icon_comment"></div>
    </div>
    <div class="hiddenlist">
			<div class="panel panel-primary null">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh Sách Bình Luận</h3>
                </div>
                <div class="panel-body background_EB">
                    <table class="display" id="comments_hidden_table">
                            <thead>
                                <tr>    
                                    <th class="col-xs-1">ID</th>
                                    <th class="col-xs-10">Nội Dung</th>
                                    <th class="col-xs-1"></th>
                                </tr>
                            </thead>
                    </table>
                </div>
			</div>
	</div>
@stop

@section('content')
	@include('backend.modals.delete_confirm') 
    <div class="row">
        <div class="col-xs-12">
			<form method="POST" action="{{ asset('admin/comments/detroy') }}" style="display:inline">
				<div class="panel panel-primary">
			        <div class="panel-heading">
						<a class="close deleteWhite em1_4" data-toggle="modal" href="#confirmDelete" data-title="Xóa bình luận" data-message="Bạn chắc chắn muốn xóa các bình luận đã chọn ?"><span class="glyphicon glyphicon-trash"></span></a>
			            <h3 class="panel-title">Danh Sách Bình Luận</h3>
			        </div>
					<div class="panel-body background_EB">
							<table class="display" id="comments_table">
								<thead>
									<tr>
										<th class="col-xs-1"><div class="icon0"></div></th>
										<th class="col-xs-1">ID</th>
										<th class="col-xs-4">Bình Luận</th>
										<th class="col-xs-2">Người Đăng</th>
										<th class="col-xs-3">Thời Gian</th>
										<th class="col-xs-1"></th>
									</tr>
								</thead>
							</table>
					</div>
				</div>
			</form>

			<div class="panel panel-primary">
				<div class="panel-heading">
				    <h3 class="panel-title">Hoạt Động Bình Luận</h3>
		        </div>
				<div class="panel-body background_EB">
				    <table class="display" id="activities_table">
						<thead>
							<tr>
								<th class="col-xs-1"><div class="icon0"></div></th>
                                <th class="col-xs-2">Thành Viên</th>
                                <th class="col-xs-2">Hoạt Động</th>
                                <th class="col-xs-1">ID</th>
                                <th class="col-xs-3">Thông Tin</th>
                                <th class="col-xs-3">Thời Gian</th>
							</tr>
						</thead>
					</table>
			    </div>
			</div>
		</div>
	</div>

@stop

@section('scripts')
	<script type="text/javascript">
        var oTable;
        var oTable_hidden;
        var oTable_activities;
        var length = window.innerHeight * 0.7;

        function updatetable(){
        	parent.oTable.fnReloadAjax();
            parent.oTable_hidden.fnReloadAjax();
            parent.oTable_activities.fnReloadAjax();
        }

		$(document).ready(function() {
           oTable =   $('#comments_table').dataTable({
                "scrollY":        length,
                "scrollCollapse": true,
                "order": [[ 1, "desc" ]],
                "bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/comments/data') }}",
		        "language": {
		            "url":"{{asset('assets/data-table/language/comments.json')}}",
		            "sLoadingRecords": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
		            "sProcessing": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
		        },
		       	"fnDrawCallback": colorbox_show,
        	}); 

         oTable_hidden =   $('#comments_hidden_table').dataTable({
                "sDom": "<'row'<'col-xs-12'f>r>t<'row'<'col-xs-12'p>>",
                "bLengthChange": false,
                "bInfo" : false,
                "order": [[ 0, "desc" ]],
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('admin/comments/data-hidden') }}",
                "language": {
		            "url":"{{asset('assets/data-table/language/comments.json')}}",
		            "sLoadingRecords": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
		            "sProcessing": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
		        },
                "fnDrawCallback": colorbox_show_hidden,
            });              

        oTable_activities =   $('#activities_table').dataTable({
        	 	"scrollY":        length,
                "scrollCollapse": true,
                "order": [[ 5, "desc" ]],
                "bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/activities/data-comment/0') }}",
		        "language": {
		            "url":"{{asset('assets/data-table/language/activities.json')}}",
		            "sLoadingRecords": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
		            "sProcessing": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
		        },
		       	"fnDrawCallback": colorbox_activity,
        	});                     
	});
    </script>
@stop
