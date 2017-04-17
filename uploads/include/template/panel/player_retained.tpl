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
        <a href="#page-stats" class="block-heading" data-toggle="collapse">玩家列表</a>
        <div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
              <thead>
                <tr>
					<th style="width:80px">日期</th>
					<th style="width:150px">1日</th>
					<th style="width:80px">2日</th>
					<th style="width:80px">3日</th>
					<th style="width:80px">4日</th>
					<th style="width:80px">5日</th>
					<th style="width:80px">6日</th>
					<th style="width:80px">7日</th>
                </tr>
              </thead>
              <tbody>							  
                <{foreach name=player_retained from=$player_retaineds item=player_retained}>
					<tr>
						<td><{$player_retained.date}></td>
						<td><{$player_retained['day_1']}></td>
						<td><{$player_retained['day_2']}></td>
						<td><{$player_retained['day_3']}></td>
						<td><{$player_retained['day_4']}></td>
						<td><{$player_retained['day_5']}></td>
						<td><{$player_retained['day_6']}></td>
						<td><{$player_retained['day_7']}></td>
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