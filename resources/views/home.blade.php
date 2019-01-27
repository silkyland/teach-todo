@extends('layout.master')
@section('title', 'หน้าหลัก')
@section('content')
            <p>
                กรองสถานะ : <a href="#">ทั้งหมด</a> |
                <a href="#">Completed</a> | <a href="#">Incomplete</a>
            </p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="fa fa-list"></i> รายการที่ต้องทำ
                        <span class="pull-right"
                            ><a href="/create" class="btn btn-xs btn-success"
                                ><i class="fa fa-plus"></i> เพิ่มรายการ</a
                            ></span
                        >
                    </h4>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อรายการ</th>
                            <th>หมวดหมู่</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category->category_name}}</td>
                            <td>Incomplete</td>
                            <td>
                                <a href="/edit/{{$product->product_id}}" class="btn btn-warning btn-xs"
                                    ><i class="fa fa-edit"></i> edit</a
                                >
                                <a href="/delete/{{$product->product_id}}" class="btn btn-danger btn-xs"
                                    ><i class="fa fa-times"></i> delete</a
                                >
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
@endsection
