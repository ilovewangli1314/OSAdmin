<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="well">
	<div class="block">
		<a href="#page-stats" class="block-heading" data-toggle="collapse">商品列表</a>
		<div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:80px">名称</th>
					<th style="width:150px">购买数量</th>
					<th style="width:150px">购买总额</th>
					<th style="width:150px">操作</th>
				</tr>
				</thead>
				<tbody>
				<{foreach name=sale_info from=$sale_infos item=sale_info}>
					<tr>
						<td><{$sale_info.date}></td>
						<td><{$sale_info.pay_users}></td>
						<td><{$sale_info.pay_amount}></td>

						<td>
							<a data-toggle="modal" href="sale_detail.php?sale_id=<{$sale_info.id}>" title="查看"><i class="icon-pencil" href="sale_detail.php?sale_id=<{$sale_info.id}>"></i></a>
						</td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
		</div>
	</div>

	<div class="block">
		<a href="#page-stats" class="block-heading" data-toggle="collapse">商品列表</a>
		<div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:80px">名称</th>
					<th style="width:150px">购买数量</th>
					<th style="width:150px">购买总额</th>
					<th style="width:150px">操作</th>
				</tr>
				</thead>
				<tbody>
				<{foreach name=sale_info from=$sale_infos item=sale_info}>
					<tr>
						<td><{$sale_info.date}></td>
						<td><{$sale_info.pay_users}></td>
						<td><{$sale_info.pay_amount}></td>

						<td>
							<a data-toggle="modal" href="sale_detail.php?sale_id=<{$sale_info.id}>" title="查看"><i class="icon-pencil" href="sale_detail.php?sale_id=<{$sale_info.id}>"></i></a>
						</td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
		</div>
	</div>
</div>	
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>