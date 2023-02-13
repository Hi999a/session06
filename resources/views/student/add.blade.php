@extends('admin')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-lg-8">
                <form method="POST" action="{{route('student.store')}}" enctype= "multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="ho_ten">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lớp học</label>
                        <select class="form-control" name="lop_hoc_id" id="">
                            @foreach($lop_hoc as $value)
                                <option value="{{$value->id}}">{{$value->ten_lop}}</option>
                            @endforeach
                          </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="file">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Que Quán</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="que_quan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Giới tính</label>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gio_tinh" id="" value="0"> nam
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gio_tinh" id="" value="1" checked> nữ
                            </label>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop