    <div class="card-header">
        <h4>Информация</h4>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Дата создания</dt>
            <dd>{{\Carbon\Carbon::make(Auth::user()->created_at)->format(' d m Y')}}</dd>
            <dt>Пол</dt>
            <dd>{{Auth::user()->sex}}</dd>
            <dt>Дата рождения</dt>
            <dd>{{\Carbon\Carbon::make(Auth::user()->birthday)->format(' d m Y')}}</dd>
            <dt>Номер телефона</dt>
            <dd>+375{{Auth::user()->tel_number}}</dd>
        </dl>
    </div>
