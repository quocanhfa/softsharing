@extends('categories.main')

@section('title')
  Thông tin danh mục phần mềm
@stop

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{asset('admin/home')}}"> Trang Chủ</a></li>
            <li><a href="{{asset('categories/index')}}"> Danh mục phần mềm</a></li>
            <li class="active"> Thông tin danh mục</li>
        </ol>
        <h2><img src="{{asset('assets/image/icon.png')}}" alt="icon"> Danh Mục Phần Mềm</h2>
    </div>
    <div class="row"> 
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li><a href="{{asset('categories/index')}}">Danh mục phần mềm</a></li>
                <li><a href="{{asset('categories/create')}}">Thêm danh mục</a></li>
                <li><a href="{{asset('categories/edit/0')}}">Chỉnh sửa danh mục</a></li>
                <li><a href="{{asset('categories/delete/0')}}">Xóa danh mục</a></li>
                <li  class="active"><a href="{{asset('categories/show')}}">Thông tin danh mục</a></li>
            </ul>
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Thông Tin Danh Mục Phần Mềm</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <label>Điều khoản sử dụng</label>
                        <ol>
                            <li>Chọn tên danh mục muốn xem thông tin</li>
                        </ol>     
                    </div>
                    <div>
                        <form class="well" href="{{asset('categories/show')}}" method="post"> 
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-exclamation-sign" style="padding-left:40px"></span> {{Session::get('fail')}}
                                {{ Session::forget("fail") }}
                            </div>
                        @endif 
                        <p>
                            <label>Tên danh mục phần mềm</label>
                            <select name='id' id='id' class='form-control'>
                                <option value="0">[ Chọn danh mục phần mềm ]</option>
                                @foreach($categoryname as $cat)
                                <option value="{{$cat->id}}"  <?php if(!empty($categorycheck)&&($cat->id == $categorycheck->id)) echo "selected='selected'"; ?>>ID: {{$cat->id}} - {{$cat->name}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p><button class="btn btn-default">Xác nhận</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop