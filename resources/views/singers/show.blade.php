@extends ('layouts.app')
@section('content')
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<div class="container">
			<div class="col-md-9">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td colspan="9" style="font-weight: bold; text-align: center;color: blue;"> Thông tin chi tiết ca sĩ - {{ $v_singer ->name }} </td>
						</tr>
						<tr>
							<th>Họ tên </th>
							<th> Ngày sinh  </th>
							<th>Chiều cao </th>
							<th> Cân nặng  </th>
							<th> Thể loại </th>
							<th> Quốc tịch </th>
							<th> Sở thích </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $v_singer ->name }}</td>
							<td>{{ $v_singer ->birthday }}</td>
							<td>{{ $v_singer ->height }}</td>
							<td>{{ $v_singer ->weight }}</td>
							<td>{{ $v_singer ->type }}</td>
							<td>{{ $v_singer ->country }}</td>
							<td>{{ $v_singer ->hoppy }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
	</html>
@stop
