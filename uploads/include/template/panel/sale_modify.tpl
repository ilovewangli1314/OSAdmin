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
    jQuery(function($){
        $.datepicker.regional['zh-CN'] = {
            clearText: '清除',
            clearStatus: '清除已选日期',
            closeText: '关闭',
            closeStatus: '不改变当前选择',
            prevText: '<上月',
            prevStatus: '显示上月',
            prevBigText: '<<',
            prevBigStatus: '显示上一年',
            nextText: '下月>',
            nextStatus: '显示下月',
            nextBigText: '>>',
            nextBigStatus: '显示下一年',
            currentText: '今天',
            currentStatus: '显示本月',
            monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
            monthNamesShort: ['一','二','三','四','五','六', '七','八','九','十','十一','十二'],
            monthStatus: '选择月份',
            yearStatus: '选择年份',
            weekHeader: '周',
            weekStatus: '年内周次',
            dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
            dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
            dayNamesMin: ['日','一','二','三','四','五','六'],
            dayStatus: '设置 DD 为一周起始',
            dateStatus: '选择 m月 d日, DD',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            initStatus: '请选择日期',
            isRTL: false};
        $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
    });

    $(function() {
        var date=$( "#dayTime" );
        date.datepicker({ dateFormat: "yy-mm-dd" });
        date.datepicker( "option", "firstDay", 1 );
    });
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>