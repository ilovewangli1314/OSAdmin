<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">修改留存数据</a></li>
    </ul>
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
			    <label>日期</label>
				<input type="text" id="dayTime" name="dayTime" value="<{$dailyRecord.dayTime}>" class="input-xlarge" required="true">
			    <label>1日留存</label>
			    <input type="text" name="retained1" value="<{$dailyRecord.activeUsers}>" class="input-xlarge" required="true" >
				<label>2日留存</label>
			    <input type="text" name="retained2" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" >
			    <label>3日留存</label>
			    <input type="text" name="retained3" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" >
			    <label>4日留存</label>
			    <input type="text" name="retained4" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" >
			    <label>5日留存</label>
			    <input type="text" name="retained5" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" >
			    <label>6日留存</label>
			    <input type="text" name="retained6" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" >
			    <label>7日留存</label>
			    <input type="text" name="retained7" value="<{$dailyRecord.addedUsers}>" class="input-xlarge" >
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>

<script src="<{$smarty.const.ADMIN_URL}>/assets/js/datePickerExt.js"></script>
<script>
    $(function() {
        var date=$( "#dayTime" );
        date.datepicker({ dateFormat: "yy-mm-dd" });
        date.datepicker( "option", "firstDay", 1 );
    });
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>