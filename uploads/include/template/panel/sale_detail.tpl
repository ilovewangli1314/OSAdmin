<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="well">
	<div class="block-heading">
		日期: <{$date_str}>
	</div>

	<div class="block">
		<a href="#page-stats-firstpay" class="block-heading" data-toggle="collapse">首次充值列表</a>
		<div id="page-stats-firstpay" class="block-body collapse out">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:80px">时间</th>
					<th style="width:150px">商品名称</th>
					<th style="width:150px">商品价格</th>
					<th style="width:150px">购买人数</th>
				</tr>
				</thead>
				<tbody>
				<{foreach name=first_pay_info from=$first_pay_infos item=first_pay_info}>
					<tr>
						<td><{$first_pay_info.timeRange}></td>
						<td><{$first_pay_info.productName}></td>
						<td><{$first_pay_info.productPrice + '$'}></td>
						<td><{$first_pay_info.purchaseUsers}></td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
		</div>
	</div>

	<div class="block">
		<a href="#page-stats-product" class="block-heading" data-toggle="collapse">商品列表</a>
		<div id="page-stats-product" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:80px">名称</th>
					<th style="width:80px">价格</th>
					<th style="width:150px">购买人数</th>
					<th style="width:150px">购买数量</th>
					<th style="width:150px">购买总额</th>
					<!-- <th style="width:150px">操作</th> -->
				</tr>
				</thead>
				<tbody>
				<{foreach name=product_info from=$product_infos item=product_info}>
					<tr>
						<td><{$product_info.productName}></td>
						<td><{$product_info.productPrice}></td>
						<td><{$product_info.purchaseUsers}></td>
						<td><{$product_info.purchaseNum}></td>
						<td><{$product_info.payAmount}></td>

						<!-- <td>
							<a data-toggle="modal" href="sale_detail.php?sale_id=<{$sale_info.id}>" title="查看"><i class="icon-pencil" href="sale_detail.php?sale_id=<{$sale_info.id}>"></i></a>
						</td> -->
					</tr>
					<{/foreach}>
				</tbody>
			</table>
		</div>
	</div>

	<div class="block">
		<a href="#page-stats-user" class="block-heading" data-toggle="collapse">玩家列表</a>
		<div id="page-stats-user" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:150px">用户设备ID</th>
					<th style="width:150px">用户ID</th>
					<th style="width:150px">购买次数</th>
					<th style="width:150px">购买总额</th>
					<th style="width:150px">设备类型</th>
					<th style="width:150px">国家代码</th>
					<th style="width:200px">注册时间</th>
					<th style="width:150px">所处任务关卡</th>
					<!-- <th style="width:150px">操作</th> -->
				</tr>
				</thead>
				<tbody>
				<{foreach name=user_info from=$user_infos item=user_info}>
					<tr>
						<td><{$user_info.userDeviceID}></td>
						<td><{$user_info.userID}></td>
						<td><{$user_info.purchaseNum}></td>
						<td><{$user_info.payAmount}></td>
						<td><{$user_info.deviceModel}></td>
						<td><{$user_info.countryCode}></td>
						<td><{$user_info.registTimeStr}></td>
						<td><{$user_info.curTaskID}></td>

						<!-- <td>
							<a data-toggle="modal" href="sale_detail.php?sale_id=<{$sale_info.id}>" title="查看"><i class="icon-pencil" href="sale_detail.php?sale_id=<{$sale_info.id}>"></i></a>
						</td> -->
					</tr>
					<{/foreach}>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>