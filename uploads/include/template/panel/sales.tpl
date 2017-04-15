<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="btn-toolbar" style="margin-bottom:2px;">
	<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<{if $_GET.search }>
<div id="search" class="collapse in">
<{else }>
<div id="search" class="collapse out" >
<{/if }>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>查询所有玩家请留空</label>
		<input type="text" name="player_id" value="<{$_GET.player_id}>" placeholder="输入玩家ID" >
		<input type="hidden" name="search" value="1" > 
	</div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
	</div>
	<div style="clear:both;"></div>
</form>
</div>

	<div class="block">
		<a href="#page-stats" class="block-heading" data-toggle="collapse">销售列表</a>
		<div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:140px">日期</th>
					<th style="width:100px">活跃用户数</th>
					<th style="width:100px">新增用户数</th>
					<th style="width:120px">次日留存</th>
					<th style="width:100px">付费用户数</th>
					<th style="width:100px">付费率</th>
					<th style="width:140px">新增付费用户数</th>
					<th style="width:140px">新增用户付费率</th>
					<th style="width:100px">付费次数</th>
					<th style="width:140px">付费累计金额</th>
					<th style="width:100px">ARPU</th>
					<th style="width:100px">ARPPU</th>
					<th style="width:100px">操作</th>
				</tr>
				</thead>
				<tbody>
				<{foreach name=sale_info from=$sale_infos item=sale_info}>
					<tr>
						<td><{$sale_info.date}></td>
						<td><{$sale_info.active_users}></td>
						<td><{$sale_info.added_users}></td>
						<td><{$sale_info.next_day_retained}></td>
						<td><{$sale_info.pay_users}></td>
						<td><{$sale_info.pay_rate}></td>
						<td><{$sale_info.added_pay_users}></td>
						<td><{$sale_info.added_pay_rate}></td>
						<td><{$sale_info.pay_num}></td>
						<td><{$sale_info.pay_amount}></td>
						<td><{$sale_info.arpu}></td>
						<td><{$sale_info.arppu}></td>

						<td>
							<a data-toggle="modal" href="sale_detail.php?sale_id=<{$sale_info.id}>" title= "查看" ><i class="icon-pencil" href="sale_detail.php?sale_id=<{$sale_info.id}>" ></i></a>
						</td>
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