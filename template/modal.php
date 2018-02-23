<div class="modal fade bd-example-modal-lg" id="sprModalCenter" tabindex="-1" role="dialog" aria-labelledby="sprModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="sprModalLongTitle">Довідник</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
                <div class="clearfix"></div>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Пошук по довіднику</span>
                    </div>
                    <input type="text" class="form-control js-spr-search-input" name="firma" >
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary js-spr-search-btn" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
			<div class="modal-body js-modal-body">
				...
			</div>
			<div class="modal-footer">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Додати</span>
                    </div>
                    <input type="text" class="form-control js-spr-search-add-input" name="firma" >
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary js-spr-search-add-btn btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
			</div>
		</div>
	</div>
</div>
<script id="ReestrFormView-TableSpr" type="text/x-dot-template">
	<table class="table table-hover table-bordered table-sm">
		<thead>
		<tr class="text-center">
			<th>№</th>
			<th>Название</th>
		</thead>
		<tbody>
		{{~it.items :value:itm}}
			<tr class="js-Spr-Items-click" data-id="{{=value.id}}" data-value="{{=value.name}}">
				<td class="text-center">{{=itm+1}}.</td>
				<td>{{=value.name}}</td>
			</tr>
		{{~}}
		</tbody>
	</table>
</script>
<script id="ReestrFormView-TableSprPrice" type="text/x-dot-template">
    <table class="table table-hover table-bordered table-sm">
        <thead>
        <tr class="text-center">
            <th>№</th>
            <th>Название</th>
            <th>Цена</th>
        </thead>
        <tbody>
        {{~it.items :value:itm}}
        <tr class="js-Spr-Items-click" data-id="{{=value.id}}" data-value="{{=value.name}}" data-price="{{=value.price}}">
            <td class="text-center">{{=itm+1}}.</td>
            <td>{{=value.name}}</td>
            <td class="text-right">{{=value.price}}</td>
        </tr>
        {{~}}
        </tbody>
    </table>
</script>

<div class="modal fade bd-example-modal-lg" id="sprModalEmail" tabindex="-1" role="dialog" aria-labelledby="sprModalEmailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sprModalLongTitle">Уведомления!!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Сообщение успешно отправленно на Email!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>