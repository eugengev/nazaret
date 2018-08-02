<script id="OcenkaFormView-List" type="text/x-dot-template">
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-sm">
			<thead>
			<tr class="text-center">
				<th>№ Договора</th>
                <th>№ Оценки</th>
				<th>ДАТА</th>
				<th>Банк/Мета</th>
				<th>Город</th>
				<th>Майно/Адреса</th>
				<th>Статус</th>
				<th>Дія</th>
			</tr>
			</thead>
			<tbody>
			{{~it.items :value:itm}}
			<tr class="js-Reestr-Item{{=value.id}}">
				<td class="text-center">{{=value.nomber}}</td>
                <td class="text-center">{{=value.nomer}}</td>
				<td>{{=value.datework}}</td>
				<td>{{=value.bank}} / {{=value.meta}}</td>
				<td>{{=value.city}}</td>
				<td>{{=value.mname}} / {{=value.opis}}</td>
				<td>
					{{? value.status == 'n' }} новое заданиеы {{?}}
				</td>
				<td class='text-center'><a href="#" class="btn btn-success btn-sm {{? value.vid_id == '3' }} js-ocenca-auto {{?}} {{? value.vid_id == '10' }} js-recenzij {{?}}" data-id="{{=value.id}}" data-rid="{{=value.rid}}"><i class="fa fa-pencil-square-o"></i></a></td>
			</tr>
			{{~}}
			</tbody>
		</table>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			{{~it.page :value:itm}}
			<li class="page-item"><a class="page-link js-reestr-page-show" data-page="{{=value}}" href="#">{{=value+1}}</a></li>
			{{~}}
		</ul>
	</nav>
</script>


<script id="OcenkaFormView-Init" type="text/x-dot-template">
	{{~it.items :value:itm}}
	<li><a rel="nofollow" href="#" class="dropdown-item">
			<div class="notification d-flex justify-content-between">
				<div class="notification-content"><i class="fa fa-envelope"></i>{{=value.name}}</div>
				<div class="notification-time"><small>{{=value.count}}</small></div>
			</div></a></li>
	{{~}}
</script>