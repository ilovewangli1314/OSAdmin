<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">修改玩家数据</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
				<label>ID<span class="label label-info">不可修改</span></label>
				<input type="text" name="id" value="<{$player.id}>" class="input-xlarge" readonly="true">
				<label>注册时间<span class="label label-important" >不可修改</span></label>
				<input type="text" name="registTimeStr" value="<{$player.registTimeStr}>" class="input-xlarge" readonly="true">
			    <label>所处任务关卡</label>
			    <input type="text" name="curTaskID" value="<{$player.data.key_task_data.key_task_curtaskid}>" class="input-xlarge" required="true" >
				<label>金币数</label>
			    <input type="text" name="userCoins" value="<{$player.data.key_user_base_data.userCoins}>" class="input-xlarge" required="true" >
			    <label>累计付费金额</label>
			    <input type="text" name="hadPay" value="<{$player.data.key_iap_data.hadPay}>" class="input-xlarge" required="true" >
			    <label>最后登录时间</label>
			    <input type="text" name="loginTime" value="<{$player.loginTimeStr}>" class="input-xlarge" readonly="true">
			    <label>已开启老虎机</label>
			    <input type="text" name="paySlotsStr" value="<{$player.paySlotsStr}>" class="input-xlarge" required="true" >
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>	
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>