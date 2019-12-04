<div class="ibox-content form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">資料請求</label>
		<div class="col-sm-6">
			{$OptionRequest[$arr_post.request]}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">資料請求される方</label>
		<div class="col-sm-6">
			{$OptionWho[$arr_post.who]}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">検討コース</label>
		<div class="col-sm-6">
			{foreach from=$arr_post.course item="course" key="key" name="LoopCourse"}
			{$OptionCourse[$course]}<input type="hidden" name="course[]" value="{$course}" ><br>
			{/foreach}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">お問い合わせ内容</label>
		<div class="col-sm-6">
			{$arr_post.comment|nl2br}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">名前</label>
		<div class="col-sm-6">
			{$arr_post.name}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">フリガナ</label>
		<div class="col-sm-6">
			{$arr_post.ruby}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">メールアドレス</label>
		<div class="col-sm-6">
			{$arr_post.mail}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">住所</label>
		<div class="col-sm-6">
			〒{$arr_post.zip}<br>
			{html_select_ken selected=$arr_post.prefecture|default:"" pre=1}{$arr_post.address}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">電話番号</label>
		<div class="col-sm-6">
			{$arr_post.tel}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">学校名</label>
		<div class="col-sm-6">
			{$arr_post.school_name}
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">学年</label>
		<div class="col-sm-6">
			{$arr_post.years}年
		</div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="button clearfix mb20">
		<div class="form-group">
			<div class="fl_right">
				<a href="." type="button" class="btn btn-primary">一覧へ戻る</a>
			</div>
		</div>
	</div>
</div>
