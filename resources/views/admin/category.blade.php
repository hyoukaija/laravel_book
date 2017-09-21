@extends('admin.master')

@section('content')
	<link rel="stylesheet" href="lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;
</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div>
	<span>{{count($categories)}}</span>
</div>
<table class="table">
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
					<th width="100">名字</th>
					<th width="100">栏目编号</th>
					<th>父级分类</th>
					<th width="150">更新时间</th>
					<th width="60">发布时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			@foreach ($categories as $category)
			<tbody>
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->category_no}}</td>
					<td>@if ($category->parent_id != "")
						{{$category->parent->name}}
					@endif</td>
					<td>{{$category->updated_at}}</td>
					<td>{{$category->created_at}}</td>
					<td class="td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="picture_edit('图库编辑','picture-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
			</tbody>	
			@endforeach
			
		</table>
	</div>
</table>
@endsection

@section('my-js')
	
@endsection