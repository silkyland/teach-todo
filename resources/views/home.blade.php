@extends('layout.master')
@section('title', 'หน้าหลัก')
@section('content')
            <p>
                กรองสถานะ : <a href="#">ทั้งหมด</a> |
                <a href="#">Completed</a> | <a href="#">Incomplete</a>
            </p>
        <p>สวัสดี, {{auth()->user()->name}} | <a onclick="return confirm('แน่ใจหรือไม่ที่จะออกจากระบบจริง?')" href="/logout">ออกจากระบบ</a></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="fa fa-list"></i> รายการที่ต้องทำ
                        @if(auth()->check())
                        <span class="pull-right"
                            ><a href="/create" class="btn btn-xs btn-success"
                                ><i class="fa fa-plus"></i> เพิ่มรายการ</a
                            ></span
                        >
                        @endif
                    </h4>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อรายการ</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>หมวดหมู่</th>
                            <th>สถานะ</th>
                            @if(auth()->check())
                            <th>จัดการ</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a href="/user/{{$product->user_id}}">{{$product->user->name}}</a></td>
                            <td>{{$product->category->name}}</td>
                        <td id="_product_id_{{$product->id}}" onclick="toggle('{{$product->id}}')">@if($product->status == 0) Incomplete @else Completed @endif</td>
                            @if(auth()->check())
                            <td>
                                <a href="/edit/{{$product->id}}" class="btn btn-warning btn-xs"
                                    ><i class="fa fa-edit"></i> edit</a
                                >
                                <a onclick="return confirm('แน่ใจหรือไม่ว่าจะลบข้อมูลนี้จริงๆ')" href="/delete/{{$product->id}}" class="btn btn-danger btn-xs"
                                    ><i class="fa fa-times"></i> delete</a
                                >
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
            @section('script')
                <script>
                    function toggle(id){
                        console.log(id);
                        axios.post('/product/toggle/' + id).then(function(response){
                            $('#_product_id_' + id).html(response.data)
                        }).catch(function(errror){
                            console.log(errror.message)
                        })
                    }
                </script>
            @endsection
@endsection
