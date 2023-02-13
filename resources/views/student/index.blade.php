@extends('admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('student.create')}}" class="btn btn-success">Thêm mới sinh viên</a>

                <form class="form-inline float-right" action="">
               
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="keyword" id="" class="form-control" placeholder="Nhập từ tên" aria-describedby="helpId">
                        <button class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Ảnh</th>
                            <th>Quê Quán</th>
                            <th>Giới tính</th>
                            <th>Lớp học</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $value)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->ho_ten}}</td>
                            <td><img src="{{url('uploads')}}/{{$value->hinh_anh}}" alt="" width="100px"></td>
                            <td>{{$value->que_quan}}</td>
                            <td>{{$value->gio_tinh ? 'Nam' : 'Nữ'}}</td>
                            <td>{{$value->lopHoc->ten_lop}}</td>
                            <td>
                                <a href="{{route('student.edit',$value)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                               <form action="{{route('student.destroy',$value)}}" method="POST" onsubmit="return confirm('Muooxn xoa ko')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                               </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
@stop