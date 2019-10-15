@extends ('layout')
@section('content')
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<div class="container">
			<div class="col-md-5">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td colspan="3" style="font-weight: bold; text-align: center;color: blue;"> Thông tin chi tiết nhạc sĩ - {{ $v_artist ->name }} </td>
						</tr>
						<tr>
							<th>Họ tên </th>
							<th> Ngày sinh  </th>
							<th> Quốc tịch </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $v_artist ->name }}</td>
							<td>{{ $v_artist ->birthday }}</td>
							<td>{{ $v_artist ->country }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
	</html>
@stop