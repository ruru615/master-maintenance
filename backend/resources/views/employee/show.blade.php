<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h1>詳細</h1>
<p><a href="{{ route('employee.index')}}"> 社員一覧</a>　</p>
 
<table>
    <tr>
        <th>empNumber</th>
        <th>id</th>
        <th>lastName</th>
        <th>firstName</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    <tr>
        <td>{{ $employee->empNumber }}</td>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->lastName }}</td>
        <td>{{ $employee->firstName }}</td>
        <td>{{ $employee->created_at }}</td>
        <td>{{ $employee->updated_at }}</td>
    </tr>
</table>