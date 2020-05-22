<form name="input" action="mssql.php" method="post" class="form-horizontal">
    <div class="form-group">
    <label for="endpoint" class="col-sm-2 control-label">DB Endpoint</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="endpoint" value=""
        </div>
    </div>
    <br>
    <div class="form-group">
    <label for="database" class="col-sm-2 control-label">DB Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="database" value="">
        </div>
    </div>
    <br>
    <div class="form-group">
    <label for="username" class="col-sm-2 control-label">DB Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="">
        </div>
    </div>
    <br>
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">DB Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" value="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" value="Save" class="btn btn-default"/>
        </div>
    </div>
</form>