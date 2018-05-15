<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

	<div class="block">
		<a href="#page-stats" class="block-heading" data-toggle="collapse">充值详情</a>
		<div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:140px">玩家ID</th>
					<th style="width:100px">充值ID</th>
					<th style="width:100px">充值金额</th>
					<th style="width:100px">充值时间</th>
				</tr>
				</thead>
				<tbody>
				<{foreach name=purchase_info from=$purchase_infos item=purchase_info}>
					<tr>
						<td><{$purchase_info.playerID}></td>
						<td><{$purchase_info.purchaseID}></td>
						<td><{$purchase_info.purchaseNum}></td>
						<td><{$purchase_info.purchaseTime}></td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
			<!--- START 分页模板 --->

			<{$page_html}>

			<!--- END --->
		</div>
	</div>

<!---操作的确认层，相当于javascript:confirm函数--->
<{$osadmin_action_confirm}>

<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
<{include file="footer.tpl" }>