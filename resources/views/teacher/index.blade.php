@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                            <a href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
                        </h3>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">
                                    Thống kê số lượng cán bộ, giảng viên và nhân viên (gọi chung là cán bộ) của
                                    nhà trường
                                </h4>
                                @if(isset($phanLoaiCanBo))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Phân loại</th>
                                                    <th>Nam</th>
                                                    <th>Nữ</th>
                                                    <th>Tổng số</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>I</td>
                                                    <td>
                                                        <p style="font-weight: bold">Cán bộ cơ hữu 1</p>
                                                        <p>Trong đó:</p>
                                                    </td>
                                                    <td>{{$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->hop_dong_nam}}</td>
                                                    <td>{{$phanLoaiCanBo->bien_che_nu + $phanLoaiCanBo->hop_dong_nu}}</td>
                                                    <td>
                                                        {{$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
                                                         $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>I.1</td>
                                                    <td>
                                                        <p>Cán bộ trong biên chế </p>
                                                    </td>
                                                    <td>{{$phanLoaiCanBo->bien_che_nam}}</td>
                                                    <td>{{$phanLoaiCanBo->bien_che_nu}}</td>
                                                    <td>{{$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu}}</td>
                                                </tr>
                                                <tr>
                                                    <td>I.2</td>
                                                    <td>
                                                        <p>Cán bộ hợp đồng dài hạn (từ 1 năm trở lên) và
                                                            hợp đồng không xác định thời hạn </p>
                                                    </td>
                                                    <td>{{$phanLoaiCanBo->hop_dong_nam}}</td>
                                                    <td>{{$phanLoaiCanBo->hop_dong_nu}}</td>
                                                    <td>{{$phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu}}</td>
                                                </tr>
                                                <tr>
                                                    <td>II</td>
                                                    <td>
                                                        <p style="font-weight: bold">Các cán bộ khác</p>
                                                        <p>Hợp đồng ngắn hạn (dưới 1 năm, bao gồm cả
                                                            giảng viên thỉnh giảng)</p>
                                                    </td>
                                                    <td>{{$phanLoaiCanBo->cb_khac_nam}}</td>
                                                    <td>{{$phanLoaiCanBo->cb_khac_nu}}</td>
                                                    <td>{{$phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold">Tổng</td>
                                                    <td>

                                                    </td>
                                                    <td>{{$phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->bien_che_nam
                                                    + $phanLoaiCanBo->hop_dong_nam}}</td>
                                                    <td>{{$phanLoaiCanBo->cb_khac_nu+$phanLoaiCanBo->bien_che_nu
                                                    + $phanLoaiCanBo->hop_dong_nu}}</td>
                                                    <td>{{$phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu
                                                    +$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
                                                         $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">
                                    Thống kê, phân loại giảng viên (chỉ tính những giảng viên trực tiếp giảng
                                    dạy trong 5 năm gần đây):
                                </h4>
                                @if(count( $giangVien ) != 0)
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Phân loại</th>
                                                    <th>Nam</th>
                                                    <th>Nữ</th>
                                                    <th>Tổng số</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">
                                    Thống kê, phân loại giảng viên cơ hữu theo mức độ thường xuyên sử dụng
                                    ngoại ngữ và tin học cho công tác giảng dạy và nghiên cứu:
                                </h4>
                                @if(!is_null($trinhDo))
									<?php
									$tiengAnh = json_decode( $trinhDo->trinh_do_ngoai_ngu );
									$tinHoc = json_decode( $trinhDo->tin_hoc );
									?>
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">STT</th>
                                                    <th rowspan="2">Tần suất sử dụng</th>
                                                    <th rowspan="1" colspan="2">Tỷ lệ (%) giảng viên cơ hữu sử dụng
                                                        ngoại ngữ và tin học
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="1">Ngoại ngữ</th>
                                                    <th rowspan="1">Tin học</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Luôn sử dụng (trên 80% thời gian của công việc)</td>
                                                    <td>{{$tiengAnh->lv_5}}</td>
                                                    <td>{{$tinHoc->lv_5}}</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Thường sử dụng (trên 60-80% thời gian của công việc) </td>
                                                    <td>{{$tiengAnh->lv_4}}</td>
                                                    <td>{{$tinHoc->lv_4}}</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Đôi khi sử dụng (trên 40-60% thời gian của công việc) </td>
                                                    <td>{{$tiengAnh->lv_3}}</td>
                                                    <td>{{$tinHoc->lv_3}}</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Ít khi sử dụng (trên 20-40% thời gian của công việc) </td>
                                                    <td>{{$tiengAnh->lv_2}}</td>
                                                    <td>{{$tinHoc->lv_2}}</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Hiếm khi sử dụng hoặc không sử dụng (0-20% thời gian của công việc) </td>
                                                    <td>{{$tiengAnh->lv_1}}</td>
                                                    <td>{{$tinHoc->lv_1}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-weight: bold">Tổng</td>
                                                    <td>{{$tiengAnh->lv_5+$tiengAnh->lv_4+$tiengAnh->lv_3+$tiengAnh->lv_2+$tiengAnh->lv_1}}</td>
                                                    <td>{{$tinHoc->lv_5+$tinHoc->lv_4+$tinHoc->lv_3+$tinHoc->lv_2+$tinHoc->lv_1}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection