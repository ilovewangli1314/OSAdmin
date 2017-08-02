<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">修改销售数据</a></li>
    </ul>
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
			    <label>日期</label>
				<input type="text" id="dayTime" name="dayTime" value="<{$dailyRecord.dayTime}>" class="input-xlarge" required="true">
			    <label>活跃用户数</label>
			    <input type="text" name="activeUsers" value="<{$dailyRecord.activeUsers}>" class="input-xlarge" required="true" >
				<label>新增用户数</label>
			    <input type="text" name="addedUsers" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" required="true" >
			    <label>付费用户数</label>
			    <input type="text" name="payUsers" value="<{$dailyRecord.payUsers}>" class="input-xlarge" required="true" >
			    <label>付费率</label>
			    <input type="text" name="payRate" value="<{$dailyRecord.payRate}>" class="input-xlarge" required="true">
			    <label>付费累计金额</label>
			    <input type="text" name="payAmount" value="<{$dailyRecord.payAmount}>" class="input-xlarge" required="true" >
			    <label>ARPU</label>
			    <input type="text" name="arpu" value="<{$dailyRecord.arpu}>" class="input-xlarge" required="true" >
			    <label>ARPPU</label>
			    <input type="text" name="arppu" value="<{$dailyRecord.arppu}>" class="input-xlarge" required="true" >
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>

<script>
    $(function() {
        var date=$( "#dayTime" );
        date.datepicker({ dateFormat: "yy-mm-dd" });
        date.datepicker( "option", "firstDay", 1 );
    });
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>