@section('hidden')
 	<div class="show_hidden">
        <div class="col-xs-1 icon_user"></div>
    </div>
    <div class="hiddenlist">
		<div class="panel panel-primary null">
            <div class="panel-heading">
                <h3 class="panel-title">Danh Sách Thành Viên</h3>
            </div>
            <div class="panel-body background_EB">
                <table class="display" id="users_table_hidden">
                    <thead>
                        <tr>    
                            <th class="col-xs-1">ID</th>
                            <th class="col-xs-9">Tài Khoản</th>
                            <th class="col-xs-1"></th>
                            <th class="col-xs-1"></th>
                        </tr>
                    </thead>
                </table>
            </div>
		</div>
	</div>
@stop

@section('scripts')
    <script type="text/javascript">
        var oTable_hidden;
        $(document).ready(function() {
           oTable_hidden =   $('#users_table_hidden').dataTable({
                "sDom": "<'row'<'col-xs-12'f>r>t<'row'<'col-xs-12'p>>",
                "scrollY":        600,
                "scrollCollapse": true,
                "bLengthChange": false,
                "bInfo" : false,
                "order": [[ 0, "desc" ]],
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('admin/user-accounts/data-hidden') }}",
                "language": {
                    "url":"{{asset('assets/data-table/language/users.json')}}",
                    "sLoadingRecords": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
                    "sProcessing": '<img src="{{asset('assets/image/background/Loading.gif')}}" alt="loading">',
                },
            });                
    });
    </script>
@stop