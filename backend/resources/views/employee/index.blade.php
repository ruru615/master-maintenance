<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('/js/index.js') }}"></script>
<style>
@media (min-width: 1200px) {
  .empTable {
    margin-top: 50px;
    border-top: #fff;
  }
  td {
    width: 1200px;
    margin: 100px;
    margin-top: 50px;
    text-align: center;
  }
  .keyword {
    width: 300px;
    height: 30px;
    margin-left: 50px;
    border-radius: 5px 5px 5px 5px;
    border: 1px solid #ccc;
  }
  #searchButton {
    width: 70px; 
    height: 30px;
    margin-left: 5px;
    border-radius: 5px 5px 5px 5px;
  }    
  #sort {
    width: 150px;
    height: 30px;
    margin-left: 50px;
    border-radius: 5px 5px 5px 5px;
  }  
  #button {
    width: 200px;
    height: 30px;
    background: #C0C0C0;
    margin-left: 50px;
    border-radius: 5px 5px 5px 5px;
  }
  .deleteButton {
    width: 150px;
    margin-right: 50px;
    background: #C0C0C0;
    border-radius: 5px 5px 5px 5px;
  }
  .form-group {
    margin-top: 50px;
    margin-left: 100px;
  }
  .toggle-input {
    left: 0;
    top: 0;
    width: 100%;
    height: 50%;
    z-index: 5;
    opacity: 0;
    cursor: pointer;
  }
  .toggle-label {
    width: 75px;
    height: 30px;
    padding-top: 30px;
    background: #ccc;
    position: relative;
    display: inline-block;
    border-radius: 46px;
    transition: 0.4s;
    box-sizing: border-box;
  }
  .toggle-label:after {
    content: "";
    position: absolute;
    width: 30px;
    height: 30px;
    border-radius: 100%;
    left: 0;
    top: 0;
    z-index: 2;
    background: #fff;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    transition: 0.4s;
  }
  .toggle-input:checked + .toggle-label {
    background-color: #778ca3;
  }
  .toggle-input:checked + .toggle-label:after {
    left: 40px;
  }
  #toggle {
    width: 10px;
    padding-top: 10px;
    height: 30px;
  }
  .toggle-label .deleteEmployee {
    height: 0;
    padding: 0;
    overflow: hidden;
    opacity: 0;
    transition: 0.8s;
  }
  .toggle-label input:checked ~ .deleteEmployee {
    padding: 10px 0;
    height: auto;
    opacity: 1;
  }
  }
  .pagination {
      text-align: center;
  }

  .pagination li{
      display: inline-block;
  }
</style>

<h1> 社員一覧</h1>
@if ($message = Session::get('success'))
  <p>{{ $message }}</p>
@endif
<div class="form-group">
  <p>
  <label style="margin-left:480px;">ソート</label>
  <label style="margin-left: 120px;">削除フラグ</label>
  </p>
  <form action="{{ route('employee.search') }}" method="post" style="display: inline-block;">
    @csrf
    <input class="keyword" type="text" placeholder="キーワード" name="search">
      <button id=searchButton type="submit">検索</button>
    </form>
    <form name="sort" action="{{route('employee.sort'}}" method="post" style="display: inline-block;">
      @csrf
      <select name="employeeSort" id="sort">
        <option value="empNumber" {{$sortBy == 'empNumber'?'selected':''}}>社員番号</option>
        <option value="id" {{$sortBy == 'id'?'selected':''}}>社員ID</option>
        <option value="lastName" {{$sortBy == 'lastName'?'selected':''>社員姓</option>
      </select>
    </form>
    <input id="toggle" class="toggle-input" type='checkbox' name="deleteEmployee" method="POST"/>
    <label for="toggle" class="toggle-label"></label>
      <button id=button type="submit">CSV出力</button>
    <form action="{{ route('employee.create')}}" method="PUT" style="display: inline-block;">
      @csrf
      @method('PUT')
      <button id=button type="submit">新規登録</button>
    </form>
  </div>
  <table class="empTable">
    <tr>
      <th>社員番号</th>
      <th>社員ID</th>
      <th>社員姓</th>
      <th>社員名</th>
    </tr>
    <!-- @if(isset($_POST['deleteEmployee']))
    <div class="deleteEmployee">
      <tr>
        @foreach ($employees as $employee)
        <td>aaa</td>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->lastName }}</td>
        <td>{{ $employee->firstName }}</td>
        @endforeach
      </tr>
    </div>
    @endif -->
    <tr>
      @foreach ($employees as $employee)
      <td><a href="{{ route('employee.edit', $employee->id)}}">{{ $employee->empNumber }}</a></td>
      <td>{{ $employee->id }}</td>
      <td>{{ $employee->lastName }}</td>
      <td>{{ $employee->firstName }}</td>
      <th>
        <form action="{{ route('employee.destroy', $employee->empNumber)}}" method="POST" onsubmit="return deleteItem()">
          @csrf
          @method('DELETE')
          <input type="submit" name="" value="削除" class="deleteButton">
        </form>
      </th>
    </tr>
    @endforeach
  </table>
</table>

<script>
function deleteItem() {
  var select = confirm('本当に削除してもよろしいですか？');
  return select;
}

var select = document.getElementById('sort');
select.addEventListener('change', function () {
  this.form.submit();
}, false);
</script>