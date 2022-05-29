<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Exam</title>
</head>

<style>
.container{
  background-color: #2D197C;
  height: 100vh;
  width: 100vw;
  position:relative;
}

.hidden-form{
  display:none;
}

.add--button{
  color: #dc70fa;
  border: 2px solid #dc70fa;
}

.update--button{
  color: #fa9770;
  border: 2px solid #fa9770;
}

.delete--button{
  color: #71fadc;
  border: 2px solid #71fadc;
}

button{
  background:white;
  border-radius:10px;
  font-size:16px;
  padding:5px;
}

main{
  width: 50%;
  background:white;
  padding:20px;
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%);
  border-radius:3px;
}

.create--form{
  width:80% ;
  margin-right: 20px;
  font-size:20px;
  border:1px solid #808080;
  border-radius:3px;
}

table{
  text-align: center;
  width:100%;
}

tr{
  text-align: center;
}


th{
  margin:40px 0 40px 0;
}
</style>

<body>
  <div class="container">
    <main>
      <h1>Todo List</h1>
      @if(count($errors)>0)
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$errors}}</li>
        @endforeach
      </ul>
      @endif
      <form action="/todo/create" method="post">
      @csrf
        <input type="text" name="content" class="create--form">
        <button class="add--button">追加</button>
      </form>
      <table>
        <tr>
          <th class="hidden-form">id</th>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach($task as $task)
        <form action="/" method="post">
        @csrf
        <tr>
          <td  class="hidden-form">
            <input type="text" name="id" value="{{$task->id}}">
          </td>
          <td>{{$task->created_at}}</td>
          <td>
            <input type="text" name="content" value="{{$task->content}}">
          </td>
          <td>
            <button formaction="/todo/update" class="update--button">更新</button>
          </td>
          <td>
            <button formaction="/todo/delete" class="delete--button">削除</button>
          </td>
        </tr>
        </form>
        @endforeach
      </table>
    </main>
  </div>
</body>
</html>