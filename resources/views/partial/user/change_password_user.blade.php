    <div class="card-header">
        <h4>Изменение пароля</h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('change_pas_save') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-10">
                    <input name="current_Password" type="password" class="form-control" placeholder="Текущий пароль">
                </div>
                <div class="col-sm-10 mt-3">
                    <input name="Password" type="password" class="form-control" placeholder="Новый пароль">
                </div>
                <div class="col-sm-10 mt-3">
                    <input name="Password_confirm" type="password" class="form-control" placeholder="Потверждение">
                </div>
                <div class="row">
                    <input type="submit" class="btn btn-primary" value="Сменить пароль"/>
                </div>
            </div>
        </form>
    </div>
